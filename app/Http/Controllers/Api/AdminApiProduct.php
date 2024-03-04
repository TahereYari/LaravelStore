<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\images;
use App\Models\picture;
use App\Models\Product;
use App\Models\store;
use Illuminate\Http\Request;

class AdminApiProduct extends Controller
{

    public function chart()
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

         return response( [
      
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
    public function productList()
    {
       $products= Product::where('DeleteStatuse', '=',0)->get(); 
       return response(['products'=>$products]);
    }
    public function productListAll()
    {
       $products= Product::where('DeleteStatuse', '=',0)->get(); 
       return response(['products'=>$products]);
    }

  

    public function productInsert(Request $request)
    {
        
        $randomNumber = random_int(100, 9999);
          $request->validate([
            'name' => 'required|string|unique:products,name',
            'propertise' => 'max:500',
            'image' => 'required|mimes:png,jpg|max:99999',
            'price' => 'required|integer'
            ]);
        $product =new Product();
        $product->name =$request->name;
        $product->price = $request->price;
        $product->propertise = $request->propertise;
        $product->category_id =$request->category_id;
        $product->number =$request->number;
        
      $image = time().'-'. $randomNumber.$request->image->getClientOriginalName();
      $product->image= $image;
      $request->file('image')->move(public_path('image'), $image);

      $product->save();
      $id = $product->id;
  

    
     return response(['id'=>$id]);
    }

//    public function productimages(Request $request)
//    {
  
//         $image=new images();
//         $randomNumber = random_int(100, 9999);
//         $image1=time().'-'.$randomNumber.$request->file('otherimage')->getClientOriginalName();
//         $request->file('otherimage')->move(public_path('image'));
//         $image->image= $image1;

        
//         $image->product_id =$request->input('product_id');

//         $image ->save();

//         return redirect(route('product-images'));
//    }

    public function productPictures(Request $request,$product_id)
    {
       
      if ($request->image1)
       {
        $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image1=time().'-'.$randomNumber.$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('image'),$image1);
            $pictures->image1= $image1;
            $pictures->product_id =$product_id;
            $pictures->save();
        } 
        if ($request->image2)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image2=time().'-'.$randomNumber.$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path('image'),$image2);
            $pictures->image1= $image2;
            $pictures->product_id =$product_id;
            $pictures->save();
        }

        if ($request->image3)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image3=time().'-'. $randomNumber.$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path('image'),$image3);
            $pictures->image1= $image3;
            $pictures->product_id =$product_id;
            $pictures->save();
        }
       
        if ($request->image4)
         {
            $randomNumber = random_int(100, 9999);  
            $pictures = new picture();
            $image4=time().'-'. $randomNumber.$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path('image'),$image4);
            $pictures->image1= $image4;
            $pictures->product_id =$product_id;
            $pictures->save();
        }
        if ($request->image5)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
             $image5=time().'-'. $randomNumber.$request->file('image5')->getClientOriginalName();
            $request->file('image5')->move(public_path('image'),$image5);
            $pictures->image1= $image5;
            $pictures->product_id =$product_id;
            $pictures->save();
        }

        if ($request->image6)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
             $image6=time().'-'. $randomNumber.$request->file('image6')->getClientOriginalName();
            $request->file('image6')->move(public_path('image'),$image6);
            $pictures->image1= $image6;
            $pictures->product_id =$product_id;
            $pictures->save();
        }
        if ($request->image7)
        {  
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image7=time().'-'. $randomNumber.$request->file('image7')->getClientOriginalName();
            $request->file('image7')->move(public_path('image'),$image7);
            $pictures->image1= $image7;
            $pictures->product_id =$product_id;
            $pictures->save();
        }
     
        return response(['pictures'=>$pictures,200]);
      
    }



    public function productUpdate(Request $request,$id)
    {
            $product=Product::findorfail($id);
            $randomNumber = random_int(100, 9999);

            $request->validate([
            
                'propertise' => 'max:500',
                'price' => 'required|integer'
                ]);

            if ($product->name != $request->input('name') && $request -> name)
            {
              $request->validate([
                'name' => 'required|string|unique:products,name'
                 ]);
                 $product->name =$request->name;

            }

            // if ($request -> name){
            //     $product->name =$request->name;

            //  }

        
            $image=false;
        
            if ($request -> file('image'))

             {
                $request ->validate([
                'image' => 'required|mimes:png,jpg|max:99999'
                ]);
                $image= time().'-'. $randomNumber.$request -> file('image')->getClientOriginalName();
                $request -> file('image') ->move(public_path('image') , $image);
                $product->image= $image;
             }

      
        
             if ($request -> price){
                $product->price = $request->price;

             }

             if ($request -> propertise){
                $product->propertise = $request->propertise;
             }
           
             if ($request -> category_id){
                $product->category_id =$request->category_id;
             }
    
             if ($request -> number){
                $product->number =$request->number;
             }
    
      
        $product->update();
       return response('updated');

    }

    public function productDelete($id)
    {
       $product=Product::findorfail($id);
       $product->DeleteStatuse='1';
       $product->save();
       return response('Deleted');
    }

    public function basketproducts($priduct_id)
    {
       $product=Product::findorfail($priduct_id)->get();
       
       return response(['product'=>$product]);
    }

    
}
