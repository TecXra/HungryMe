<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ 
    protected $fillable = ['item_quantity','item_id','invoice_id' ];


     public function item()
    {
        return $this->belongsTo('App\Item');
    }

     public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
}
