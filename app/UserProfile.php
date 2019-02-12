<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function setImageAttribute($file) {
        $source_path = upload_tmp_path($file);
        
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'image');
            Image::make($source_path)->resize(400,200)->save($source_path);
            upload_move($file,'image','front');
            Image::make($source_path)->resize(50,50)->save($source_path);
            upload_move($file,'image','thumb');
            @unlink($source_path);
                //$this->deleteFile();
        }
        $this->attributes['image'] = $file;
        if ($file == '') 
        {
                //$this->deleteFile();
            $this->attributes['image'] = "";
        }
    }
    public function image_url($type='original') 
    {
        if (!empty($this->image))
            return upload_url($this->image,'image',$type);
        elseif (!empty($this->image) && file_exists(tmp_path($this->image)))
            return tmp_url($this->$image);
        else
            return asset('image/default.jpg');
    }
}
