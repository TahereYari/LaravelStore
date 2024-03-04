<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\discount;
use App\Models\offcode;
use App\Models\Product;
use App\Models\store;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class OffsApiController extends Controller
{
    public function offList()
    {
     
        $discountProducts=discount::all();
       // $Products = Product::where('id','=',$discountProducts->product_id)->first();
        
       // return response(['discountProducts'=>$discountProducts ,  'Products'=>$Products]);
         return response(['discountProducts'=>$discountProducts ]);
      
    }

    

    public function offInsert(Request $request)
    {
       
        $diss=new discount();
        // $startdate =Verta::parse($request->startdate)->datetime();
        // $enddate=Verta::parse($request->enddate)->datetime();
        $request->validate([
            'product_id' => ['required','unique:discounts'],
            
        ]);
        
        $startdate =$request->startdate;
        $enddate=$request->enddate;
        $diss->product_id=$request->product_id;
        $diss->startdate =$startdate;
        $diss->enddate = $enddate;
        $diss->off = $request->offprice;
        $diss->save();

        return response(['diss'=>$diss]);

    }

    public function discountEdit(Request $request,$id)
    {
      
       $discount= discount::find($id);
     

       if($request->startdate){
        $discount->startdate = $request->startdate;
       }

       if($request->enddate){
        $discount->enddate = $request->enddate;
       }

       if($request->product_id){
        $discount->product_id = $request->product_id;
       }

       if($request->offprice){
        $discount->off = $request->offprice;
       }
       $discount->update();

       return response(['discount' => $discount]);
    }
//********************************************************OffCode******************************************** */
    public function offCode()
    {

        $offCodes=offcode::paginate(10);
     
        return  response(['offCodes'=>$offCodes]);
    }

 

    public function offcodeInsert(Request $request)
    {
        $offcode=new offcode();
      
        // $enddate1=Verta::parse($request->input('enddate'))->datetime();
        // $startdate1=Verta::parse($request->input('startdate'))->datetime();
       
        $request->validate([
            'code' => 'required|string|unique:offcodes,code',
           
            ]);
        
        $satartdate=$request->satartdate;
        $enddate=$request->enddate;

        $offcode->satartdate =$satartdate;
        $offcode->enddate = $enddate;

        $offcode->price=$request->price;
        $offcode->code=$request->code;
        $offcode->save();
    
          // $diss->products()->attach($request->input('products'));
       
    
       return response(['offcode' => $offcode]);
    }

    public function offcodeEdit(Request $request,$id)
    {
        $offcode=offcode::find($id);
      
        // $enddate1=Verta::parse($request->input('enddate'))->datetime();
        // $startdate1=Verta::parse($request->input('startdate'))->datetime();
       
        
        $satartdate=$request->satartdate;
        $enddate=$request->enddate;

        
       if($request->satartdate){
        $offcode->satartdate =$satartdate;
       }

       if($request->enddate){
       
        $offcode->enddate = $enddate;
       }

       if($request->price){
        $offcode->price=$request->price;
       }

       if($request->code){
        $offcode->code=$request->code;
       }

        $offcode->update();
    
          // $diss->products()->attach($request->input('products'));
       
    
       return response(['offcode' => $offcode]);
    }
}
