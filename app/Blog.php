<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Blog extends Model
{
	protected $fillable = [
        'blog_category_id','name','description','photo','status'
    ];
    
    public function blog_category()
    {
    	 return $this->belongsTo('App\BlogCategory');
    }

    public function user()
    {
         return $this->belongsTo('App\User');
    }

    public function setPhotoAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'blog_photo');
            Image::make($source_path)->resize(690,388)->save($source_path);
            upload_move($file,'blog_photo','front');
            Image::make($source_path)->resize(230,303)->save($source_path);
            upload_move($file,'blog_photo','thumb');
            @unlink($source_path);
        }
        $this->attributes['photo'] = $file;
        if ($file == '') 
        {
            $this->attributes['photo'] = "";
        }
    }
    public function photo_url($type='original') 
    {
        if (!empty($this->photo))
            return upload_url($this->photo,'blog_photo',$type);
        elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
            return tmp_url($this->$photo);
        else
            return asset('images/graduate.png');
    }
}
