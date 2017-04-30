<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{      
     protected $fillable = ['fullname','email','password' ];


    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
