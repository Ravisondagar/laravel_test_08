<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
        'user_id','name','notes','start_date','end_date','priority'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasklogs()
    {
        return $this->hasMany('App\TaskLog');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function task_category()
    {
        return $this->belongsTo('App\TaskCategory');
    }
}
