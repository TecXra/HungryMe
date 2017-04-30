<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{ 
     protected $fillable = ['item_quantity','item_id','siteuser_id' ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
