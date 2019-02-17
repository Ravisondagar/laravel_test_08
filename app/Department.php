<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function userprofiles()
    {
        return $this->hasMany('App\UserProfile');
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
