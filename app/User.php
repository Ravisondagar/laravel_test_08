<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id','designation_id','name','middle_name','last_name','email', 'password','status','team_lead'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function user_profile()
    {
        return $this->hasOne('App\UserProfile');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function team()
    {
        return $this->hasOne('App\Team','team_lead');
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function userprojects()
    {
        return $this->belongsToMany('App\Project', 'user_projects', 'user_id','project_id');
        /*return $this->belongsToMany('App\Project')->withPivot('project_id', 'user_id');*/
    }
}
