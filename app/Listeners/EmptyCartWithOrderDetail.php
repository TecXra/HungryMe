<?php

namespace App\Listeners;

use App\Cart;
use App\Order;
use App\Events\UserBilled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmptyCartWithOrderDetail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserBilled  $event
     * @return void
     */
    public function handle(UserBilled $event)
    {
       $carts = Cart::where('siteuser_id','=', $event->invoice->site_user_id)->get();
       foreach($carts as $cart){
     
            Order::create(['item_quantity' => $cart->item_quantity,
                            'item_id' =>  $cart->item_id,
                            'invoice_id' => $event->invoice->id
                            ]);
            $cart->delete();

       }
       
    }
}
