<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = [
        'industry_id','name','logo','email','website','phone','fax','address_1','address_2','city','state','country','zipcode'
    ];
    public function industry()
    {
    	 return $this->belongsTo('App\Industry');
    }
}
