<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\discount;
use App\Models\offcode;
use App\Models\offtableProduct;
use App\Models\Product;
use App\Models\store;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Facades\Verta;


class OffsController extends Controller
{
    public function offList()
    {
     
        $discountProducts=discount::paginate(10);
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
      
        return view('admin.offs.Off-List' ,[
            'discountProducts'=>$discountProducts,
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

    public function offCreate()
    {
        $store = store::orderByDesc('created_at')->first();


        $products=Product::where('DeleteStatuse', '=',0)->get();
        // $categories=Category::where('DeleteStatuse', '=',0)->get();

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

        return view('admin.offs.Off_Create' ,[
            'products'=>$products,
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

    public function offInsert(Request $request)
    {
       
        $diss=new discount();
        $startdate =Verta::parse($request->input('startdate'))->datetime();
        $enddate=Verta::parse($request->input('enddate'))->datetime();
        
        // $startdate =$request->input('startdate');
        // $enddate=$request->input('enddate');
    
        $diss->product_id=$request->input('product');
        $diss->startdate =$startdate;
        $diss->enddate = $enddate;
        $diss->off=$request->input('offprice');
        $diss->save();
         
                // $diss->products()->attach($request->input('products'));
       
    
       return redirect(route('off_list'));

    }

    public function discountEdit($id)
    {
        $store = store::orderByDesc('created_at')->first();
      
       $discount= discount::find($id);
       $products = Product::all();

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

       return view('admin.offs.off_Edit' ,[
        'discount' =>$discount ,
        'products'=>$products,
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
//********************************************************OffCode******************************************** */
    public function offCode()
    {
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

        $store = store::orderByDesc('created_at')->first();
        $offCodes=offcode::paginate(10);
     
        return view('admin.offs.OffCode_list',[
            'offCodes'=>$offCodes ,
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

            
            ] );
    }

    public function offcodeCreate()
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

        return view('admin.offs.OffCode_Create', [ 
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

    public function offcodeInsert(Request $request)
    {
        $offcode=new offcode();
      
        $enddate1=Verta::parse($request->input('enddate'))->datetime();
        $startdate1=Verta::parse($request->input('startdate'))->datetime();
       
        // $enddate=$request->input('enddate');
        // $startdate=$request->input('satartdate');
       
                $offcode->satartdate =$startdate1;
                $offcode->enddate = $enddate1;

                $offcode->price=$request->offprice;
                $offcode->code=$request->offcode;
                $offcode->save();
         
                // $diss->products()->attach($request->input('products'));
       
    
       return redirect(route('off_code'));
    }
}
