<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
    use Sluggable;

    protected $fillable = [
        'parent_id','name'
    ];

    public function blogs()
    {
    	return $this->hasMany('App\Blog');
    }

    public function parent(){
        return $this->belongsTo('App\BlogCategory','parent_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
