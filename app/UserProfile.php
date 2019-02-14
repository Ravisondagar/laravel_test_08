<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class UserProfile extends Model
{

    protected $fillable = [
        'user_id','department_id','designation_id','photo','mobile','phone','pan_number','zipcode','marital_status','management_level','join_date','gender','dob','age','hobby','address_1','address_2','city','state','country','attach','google','facebook','website','skype','linkedin','twitter'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setPhotoAttribute($file) {
        $source_path = upload_tmp_path($file);
        
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'photo');
            Image::make($source_path)->resize(400,200)->save($source_path);
            upload_move($file,'photo','front');
            Image::make($source_path)->resize(50,50)->save($source_path);
            upload_move($file,'photo','thumb');
            @unlink($source_path);
                //$this->deleteFile();
        }
        $this->attributes['photo'] = $file;
        if ($file == '') 
        {
                //$this->deleteFile();
            $this->attributes['photo'] = "";
        }
    }
     public function photo_url($type='original') 
    {
        if (!empty($this->photo))
            return upload_url($this->photo,'photo',$type);
        elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
            return tmp_url($this->$photo);
        else
            return asset('images/default.png');
    }
}
