<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function team_leads()
    {
        return $this->belongsTo('App\User','team_lead');
    }

    public function members()
    {
        return $this->belongsTo('App\User','member');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

}
