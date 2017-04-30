<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Order;
use App\Invoice;
use App\SiteUser;
use App\Http\Requests;
use App\Events\UserBilled;
use Illuminate\Http\Request; 

class HungrymeController extends Controller
{ 
	public function getOrderByInvoiceId($id)
    {
    	return Order::where('invoice_id','=', $id)->first();
    }

	public function postOrder(Request $request)
    {
    	return Order::create($request->all());
    }
	public function getOrderById($id)
    {
    	return Order::find($id);
    }

	public function postInvoice(Request $request)
    {

    	$invoice  = Invoice::create($request->all());

    	  event(new UserBilled($invoice));
    	 
    	// logic to get cart  user id and add those row to the order talbe and delete from cart
     
    	return $invoice->site_user_id;
    }
	public function getInvoiceById($id)
    {
    	return Invoice::with('orders.item')->find($id);
    }
	public function deleteByCartId($id)
    {
    		$cart  =  Cart::find($id);
    		$cart->delete();
    	return  true;
    }
	public function postCart(Request $request)
    {
        $cart = Cart::where('item_id','=',$request->input('item_id'))->where('siteuser_id','=',$request->input('siteuser_id'))->first();
       if (isset($cart)) {
           $cart->item_quantity = $cart->item_quantity + $request->input('item_quantity');
           $cart->save();
           return "200";
       } else {
           $cart = Cart::create($request->all());
            return "200";
       }
       
    	
    }
	public function getCartByUserId($id)
    {
    	return Cart::where('siteuser_id','=', $id)->with("item")->get();
    }

	public function postSingleUser(Request $request)
    {
    	
        $site_user = SiteUser::create($request->all());
        return $site_user->id;  
    }


    public function postCheckUser(Request $request)
    {
        
        $site_user = SiteUser::whereEmail($request->input('email'))->wherePassword($request->input('password'))->first();

        if(isset($site_user))
        {
            return "".$site_user->id;
        }else
        {
            return "0";
        }
  
    }


 	public function getSingleUser($id)
    {
    	return SiteUser::find($id);
    }

    public function getAllItems()
    {
    	return Item::all();
    }
     
     public function getSingleItem($id)
    {
    	return Item::find($id);;
    }






    public function getPreviousOrdersByUserId($id)
    {
        $site_user = SiteUser::with('invoices')->find($id);
        return $site_user;
    }





}
