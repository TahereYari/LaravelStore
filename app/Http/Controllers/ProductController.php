<?php

namespace App\Http\Controllers;
use App\Helpers;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\images;
use App\Models\picture;
use App\Models\Product;
use App\Models\store;
use App\Models\subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $store = store::orderByDesc('created_at')->first();
       $products= Product::where('DeleteStatuse', '=',0)->paginate(10); 
       
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
       
       return view('admin.Product.Product-List', [
        'products' =>$products , 
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

    public function productCreate()
    {
        $store = store::orderByDesc('created_at')->first();
        $categories= Category::where('DeleteStatuse','=',0)->get();
        // $subcategory =subcategory::all();
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
        
        return view('admin.Product.Product-Create' ,[
            'categories' => $categories ,  
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

    public function productInsert(Request $request)
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

        $randomNumber = random_int(100, 9999);
          $request->validate([
            'name' => 'required|string|unique:products,name',
            'propertise' => 'max:500',
            'image' => 'required|mimes:png,jpg|max:99999',
            'price' => 'required|integer'
            ]);
        $product =new Product();
        $product->name =$request->input('name');
       
        $product->price = $request->input('price');
        $product->propertise = $request->input('propertise');
         $product->propertise = $request->input('propertise');
        $product->category_id =$request->input('category');
        $product->number =$request->input('number');
        // $subcategory = $request ->input('subcategory');

       
          
      $image = time().'-'. $randomNumber.$request->image->getClientOriginalName();
      $product->image= $image;
      $request->file('image')->move(public_path('image'), $image);

      $product->save();
      $id = $product->id;
  

    
     return view('admin.Product.Product-Pictures',[
        'id'=>$id 
        ,'store' =>$store,

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
        ])->with('done','محصول با موفقیت اضافه شد.');
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

    public function productPictures(Request $request)
    {
       
       
   
      if ($request->image1)
       {
        $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image1=time().'-'.$randomNumber.$request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('image'),$image1);
            $pictures->image1= $image1;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        } 
        if ($request->image2)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image2=time().'-'.$randomNumber.$request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path('image'),$image2);
            $pictures->image1= $image2;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }

        if ($request->image3)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image3=time().'-'. $randomNumber.$request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path('image'),$image3);
            $pictures->image1= $image3;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }
       
        if ($request->image4)
         {
            $randomNumber = random_int(100, 9999);  
            $pictures = new picture();
            $image4=time().'-'. $randomNumber.$request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path('image'),$image4);
            $pictures->image1= $image4;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }
        if ($request->image5)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
             $image5=time().'-'. $randomNumber.$request->file('image5')->getClientOriginalName();
            $request->file('image5')->move(public_path('image'),$image5);
            $pictures->image1= $image5;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }

        if ($request->image6)
        {
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
             $image6=time().'-'. $randomNumber.$request->file('image6')->getClientOriginalName();
            $request->file('image6')->move(public_path('image'),$image6);
            $pictures->image1= $image6;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }
        if ($request->image7)
        {  
            $randomNumber = random_int(100, 9999);
            $pictures = new picture();
            $image7=time().'-'. $randomNumber.$request->file('image7')->getClientOriginalName();
            $request->file('image7')->move(public_path('image'),$image7);
            $pictures->image1= $image7;
            $pictures->product_id =$request->product_id;
            $pictures->save();
        }
     
        return redirect(route('products_list'))->with('done','محصول با موفقیت اضافه شد.');;
      
    }

    public function productEdit($id)
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


        $store = store::orderByDesc('created_at')->first();

        $product = Product::findorfail($id);
        $categories =Category::all();
        return view('admin.Product.Product-Edit' ,[
            'product' => $product , 
            'categories' =>  $categories,
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

    public function productUpdate(Request $request)
    {
            $product=Product::findorfail($request->input('id'));
            $randomNumber = random_int(100, 9999);

            $request->validate([
            
                'propertise' => 'max:500',
                'price' => 'required|integer'
                ]);

            if ($product->name != $request->input('name'))
            {
            $request->validate([
                'name' => 'required|string|unique:products,name'
            ]);
            }

        
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

        $product->name =$request->input('name');
        
        $product->price = $request->input('price');
        $product->propertise = $request->input('propertise');
    
        $product->category_id =$request->input('category');
    
        $product->number =$request->input('number');
        $product->update();
        return redirect(route('products_list'))->with('editdone','تغییرات با موفقیت انجام شد.');

    }

    public function productDelete($id)
    {
       $product=Product::findorfail($id);
       $product->DeleteStatuse='1';
       $product->save();
       return redirect(route('products_list'))->with('deletedone','محصول با موفقیت حذف شد.');
    }

    public function preiewSubCategory($id)
    {
        $store = store::orderByDesc('created_at')->first();

        $subcategorie=subcategory::where('category_id' , '=',$id);
        return view('admin.Product.Product-Create' ,[
            'subcategorie' => $subcategorie,
            'store' =>$store
        ]);
    }
    
}
