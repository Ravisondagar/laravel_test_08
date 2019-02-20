<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends Model
{
	use Sluggable;

    protected $fillable = [
        'parent_id','name'
    ];

    public function project()
    {
    	 return $this->belongsTo('App\Project');
    }

    public function parent(){
        return $this->belongsTo('App\ProjectCategory','parent_id');
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
