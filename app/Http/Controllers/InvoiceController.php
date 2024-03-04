<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\basket;
use App\Models\Product;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\store;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
   public function InvoiceList()
   {
        $store = store::orderByDesc('created_at')->first();

        $baskets= basket::where('send' ,'=' ,0)
        ->where('is_pay' ,'=' ,1)
        ->paginate(20);
        $basketssends= basket::where('send' ,'=' ,1)
        ->where('is_pay' ,'=' ,1)
        ->paginate(20);

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();


        return view('admin.Invoice.InvoiceList',[
            'baskets'=>$baskets,
            'basketssends' => $basketssends,
            'store' =>$store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
        ]);
   }

//    public function InvoiceListnotsend()
//    {
//     $basketsNotsend= basket::where('send' ,'=' ,0)->paginate(20);
//     return view('admin.Invoice.InvoiceList',[
//         'baskets'=>$basketsNotsend
//     ]);
//    }

   public function InvoiceProduct($id)
   {
        $store = store::orderByDesc('created_at')->first();

        $basketproducts=BasketProduct::where('basket_id' ,'=',$id)->get();
        $basket=basket::where('id' ,'=' ,$id)->first();

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();
  

        return view('admin.Invoice.InvoiceProduct' ,[
            'basketproducts' =>$basketproducts,
            'basket' =>$basket,
            'store' =>$store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
        ]);
 

   }

   public function InvoiceSend($id)
   {
        $basket = basket::where('id' ,'=' ,$id)->first();

        $basket->send = 1;
        $basket->update();

        return redirect()->back();
   }

   public function myBaskets($user_id)
   {
      $store = store::orderByDesc('created_at')->first();
  
       $categoryList=Category::where('DeleteStatuse','=',0)->get();
        $mybaskets= basket::where('user_id' , '=' ,$user_id)
        // ->where('is_pay' , '=' ,1)
        ->paginate(20);

        return view('front.mybasket' ,[
          'store' => $store,
            'mybaskets' => $mybaskets,
            'categoryList' => $categoryList
           
        ]);

   }

   public function myproduceSale($id)
   {

        $store = store::orderByDesc('created_at')->first();
        
        $basketproducts=BasketProduct::where('basket_id' ,'=',$id)->get();
        $basket=basket::where('id' ,'=' ,$id)->first();
        $categoryList=Category::where('DeleteStatuse','=',0)->get();

        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();
  
        return view('front.myproducts' ,[
            'basketproducts' =>$basketproducts,
            'basket' =>$basket,
            'categoryList' =>$categoryList,
            'store' => $store,

            'monthonePrice' => $monthonePrice,
            'monthtwoPrice' => $monthtwoPrice,
            'monththreePrice' => $monththreePrice,
            'monthtirPrice' => $monthtirPrice,
            'monthfivePrice' => $monthfivePrice,
            'monthsixPrice' => $monthsixPrice,
      
            'monthsevenPrice' => $monthsevenPrice,
            'montheightPrice' => $montheightPrice,
            'monthtninePrice' => $monthtninePrice,
            'monthtenPrice' => $monthtenPrice,
            'monthelevenPrice' => $monthelevenPrice,
            'monthtewelvePrice' => $monthtewelvePrice
        ]);
   }
}
