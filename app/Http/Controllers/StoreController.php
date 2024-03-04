<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
   public function storePage()
   {
     
    $store = store::orderByDesc('created_at')->first();

      $storecount= store::count();

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
    
    return view('admin.store.store',[
      'store' =>$store,
      'storecount' =>$storecount,

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

   public function storeCreate()
   {
    $store = store::orderByDesc('created_at')->first();

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

     return view('admin.store.Store_Create',[ 
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

   public function storeInsert(Request $request)
   {
      $store=new store();

      $randomNumber = random_int(100, 9999);
      $image = time().'-'. $randomNumber. $request->image->getClientOriginalName();
      $request->image->move(public_path('image'),$image);

     $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:stores'],
          'tel' => [ 'numeric', 'digits:12'],
      ]);

      $store->name = $request->name;
      $store->tel1 = $request->phone;
      $store->email = $request->email;
      $store->instagram = $request->instagram;
      $store->telegram = $request->telgram;
      $store->address = $request->address;
      $store->describe = $request->describe;
      $store->image = $image ;

      $store->save();

      return route('store_page');
   }

   public function storeEdit($id)
   {
     $store=store::findorfail($id);

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

     return  view('admin.store.Store-Edit' ,[
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
}
