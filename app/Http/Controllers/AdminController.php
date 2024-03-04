<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\role;
use App\Models\store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hekmatinasser\Verta\Verta;

class AdminController extends Controller
{
   public function Admin()
   {
      
      $roleuser=role::where('name','=','user')->first()->id;
     
      $roleadmin=role::where('name','=','admin')->first()->id;

      $userCount =User::all()->count();

      $useruser= User::where('role_id' , '=', $roleuser)->count();
      $usernotuser= User::where('role_id' , '!=', $roleuser)->count();

      $sales= BasketProduct::all();
      $store = store::orderByDesc('created_at')->first();

      $products= Product::all()->count();//****تعداد کل محصولات */

    //**********************فروش امروز*************** */
       
         $year=now()->year;
         $month=now()->month();
         $day=now()->day();
         $date=date("Y-m-d");
         $basketstoday = basket::where('created_at','Like','%'.$date.'%')->get();

         // $basketstoday = basket::whereYear('created_at', '=', $year)
         //                ->whereMonth('created_at', '=', $month)
         //                ->WhereDay('created_at', '=', $day)
         //                ->get();

         $p=0;
         foreach($basketstoday as $basket)
         {
            $p += $basket->price;
         }
        $price=$p;
      //********************************************* */
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


      //********************************************* */
      return view('admin.admin' , [
      'userCount'=> $userCount,
      'sales'=> $sales,
      'store' => $store,
      'useruser' =>$useruser,
      'usernotuser' =>$usernotuser,
      'products' =>$products,
      'price' => $price,
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
      'monthtewelvePrice' => $monthtewelvePrice,
      
   ]);
          //  ******شهریور*****
   }


   

   
  
}


