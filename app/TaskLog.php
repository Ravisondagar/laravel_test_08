<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{

	protected $fillable = [
        'task_id','user_id','date','start_time','end_time','spent_time', 'description','billable'
    ];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
