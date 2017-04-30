<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $fillable = ['site_user_id','total_price' ];

   	public function orders()
    {
        return $this->hasMany('App\Order');
    }

     public function siteUser()
    {
        return $this->belongsTo('App\SiteUser');
    }
}
