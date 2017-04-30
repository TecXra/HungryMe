<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	 
    protected $fillable = ['item_name','item_description','price','image'];

     public function carts()
    {
        return $this->hasMany('App\Cart');
    }
  	public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
