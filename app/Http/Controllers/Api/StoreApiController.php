<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\store;
use Illuminate\Http\Request;

class StoreApiController extends Controller
{
    public function storePage()
    {
      
     $store = store::orderByDesc('created_at')->first();
       $storecount= store::count();
      return response(['store' =>$store]);
    }
    public function storeSite()
    {
      
     $store = store::orderByDesc('created_at')->first();
       $storecount= store::count();
      return response(['store' =>$store]);
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
       $store->tel1 = $request->tel;
       $store->email = $request->email;
       $store->instagram = $request->instagram;
       $store->telegram = $request->telegram;
       $store->address = $request->address;
       $store->describe = $request->describe;
       $store->image = $image ;
 
       $store->save();
 
       return response(['store' =>$store,200]);
    }
 
    public function storeEdit(Request $request,$id)
    {
      $randomNumber = random_int(100, 9999);
      $store=store::findorfail($id);

      if($request->name){
        $store->name = $request->name;
      }

      if($request->tel){
        $store->tel1 = $request->tel;
      }


      if($request->email){
        $store->email = $request->email;
      }

      if($request->instagram){
        $store->instagram = $request->instagram;
      }

      if($request->address){
        $store->address = $request->address;
      }

      if($request->describe){
        $store->describe = $request->describe;
      }

      
      if($request->telegram){
        $store->telegram = $request->telegram;
      }

      if($request->image){
        $image = time().'-'. $randomNumber. $request->image->getClientOriginalName();
        $request->image->move(public_path('image'),$image);
        $store->image = $image ;

      }
      
       $store->update();

      return   response(['store'=>$store,'Updated']);
    }
}
