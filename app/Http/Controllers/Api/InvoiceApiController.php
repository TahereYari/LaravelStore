<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AddressUser;
use App\Models\basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceApiController extends Controller
{


  

    public function InvoiceList()
    {
         $basketsNotSend= basket::where('send' ,'=' ,0)
         ->where('is_pay' ,'=' ,1)
         ->get();
         $basketssends= basket::where('send' ,'=' ,1)
         ->where('is_pay' ,'=' ,1)
         ->get();
 
         return response([
             'basketsNotSend'=>$basketsNotSend,
             'basketssends' => $basketssends,
             
         ]);
    }
 
 //    public function InvoiceListnotsend()
 //    {
 //     $basketsNotsend= basket::where('send' ,'=' ,0)->paginate(20);
 //     return view('admin.Invoice.InvoiceList',[
 //         'baskets'=>$basketsNotsend
 //     ]);
 //    }
 
    public function InvoiceProduct($basket_id)
    {
 
         $basketproducts=BasketProduct::where('basket_id' ,'=',$basket_id)->get();
         $basket=basket::where('id' ,'=' ,$basket_id)->first();
         $address = AddressUser::where('id' ,'=' ,$basket->address_id)->first();
       
 
         return response([
             'basketproducts' =>$basketproducts,
             'basket' =>$basket,
             'address'=>$address
           
         
         ]);
  
 
    }
 
    public function InvoiceSend($basket_id)
    {
         $basket = basket::where('id' ,'=' ,$basket_id)->first();
 
         $basket->send = 1;
         $basket->update();
 
         return response(['message' => '.سبدخرید ارسال شد']);
    }
 
    public function myBaskets($user_id)
    {

         $mybaskets= basket::where('user_id' , '=' ,$user_id)
         // ->where('is_pay' , '=' ,1)
         ->get();
 
         return response([
             'mybaskets' => $mybaskets,
         ]);
 
    }
 
 
    public function myproduceSale($basket_id)
    {

         $basketproducts=BasketProduct::where('basket_id' ,'=',$basket_id)->get();
         $basket=basket::where('id' ,'=' ,$basket_id)->first();
        

         return response([
             'basketproducts' =>$basketproducts,
             'basket' =>$basket,
         ]);
    }
}
