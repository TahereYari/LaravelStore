<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AddressUser;
use App\Models\basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\Comment;
use App\Models\discount;
use App\Models\favorite;
use App\Models\offcode;
use App\Models\picture;
use App\Models\Product;
use App\Models\role;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeApiController extends Controller
{
 
   public function Admin()
   {
      
      $roleuser=role::where('name','=','user')->first()->id;
     
      $roleadmin=role::where('name','=','admin')->first()->id;

      $userCount =User::all()->count();

      $useruser= User::where('role_id' , '=', $roleuser)->count();
      $usernotuser= User::where('role_id' , '!=', $roleuser)->count();

      $sales= BasketProduct::all();
   

      $products= Product::all()->count();//****تعداد کل محصولات */

   //  //**********************فروش امروز*************** */
       
   //       $year=now()->year;
   //       $month=now()->month();
   //       $day=now()->day();
   //       $date=date("Y-m-d");
   //       $basketstoday = basket::where('created_at','Like','%'.$date.'%')->get();

   //       // $basketstoday = basket::whereYear('created_at', '=', $year)
   //       //                ->whereMonth('created_at', '=', $month)
   //       //                ->WhereDay('created_at', '=', $day)
   //       //                ->get();

   //       $p=0;
   //       foreach($basketstoday as $basket)
   //       {
   //          $p += $basket->price;
   //       }
     //   $price=$p;
    


      //********************************************* */
      return response( [
      'userCount'=> $userCount,
      // 'sales'=> $sales,
      'useruser' =>$useruser,
      'usernotuser' =>$usernotuser,
      'products' =>$products,


   ]);
          //  ******شهریور*****
   }

   public function discount($product_id)  {
      $product = Product::where('id','=',$product_id)->first();
      $discount= discount:: where('product_id' ,'=',$product_id)->first();
     
      if($discount &&   (verta($discount->startdate) < verta()) && (verta($discount->enddate) > verta())){
         $offprice1= ( $discount->off * $product->price)/100;
         $offprice2=$product->price-$offprice1;
    //  return response(['offprice2'=>$offprice2]);
        
      }
      else{
         $offprice2 =0;
      }
      return response(['offprice2'=>$offprice2 , 'product'=>$product]);
    
      
   }
    
    public function Home()
    {
      
       $productSlider=Product::orderByDesc('updated_at')->limit(4)->get();
       $NewProducts=Product::orderByDesc('created_at')->limit(6)->get();
       $discounts= discount::all();
      
       $MostViews=Product::orderByDesc('counter')->limit(6)->get();
      $categories=Category::orderByDesc('created_at')->limit(8)->where('DeleteStatuse','=',0)->get();
       $categorimages=Category::orderByDesc('created_at')->where('DeleteStatuse','=',0)->get();
       $store = store::orderByDesc('created_at')->first();
      
    

        return response([
            
           'productSlider' =>$productSlider,
           'NewProducts' => $NewProducts,
           'MostViews' =>$MostViews,
           'categories'=>$categories,
          
           'discounts' => $discounts,
           'categorimages' => $categorimages,
           

        ]);
    }
    public function category_underMenu($id)
    {
        $products_menu=Product::where('DeleteStatuse','=',0)->where('category_id','=',$id);
        return view('front.index' ,['products_menu' => $products_menu]);
    }

//********************************PreviewProduct*********************************************/

public function previewProduct($product_id)
{
 
      $Product_one = Product::find($product_id);
      $Product_one->counter +=1;
      $Product_one->update();
      $pictureOfProducts = picture::where('product_id','=',$product_id)->get();
      $comments=Comment::where('product_id','=',$product_id)->where('preview','=' ,1)->get();
      

      return response([
        'Product_one' => $Product_one ,
        'pictureOfProducts' => $pictureOfProducts,
        'comments'=>$comments
       ]);
}


   //**********************************Comment*********************************************/
  
   
   public function CommentInsert(Request $request)
   {
   
       $comment=new Comment();
   
       $comment->title = $request->title;
       $comment->posetive = $request->posetive;
       $comment->negative = $request->negative;
       $comment->emteaz = $request->emteaz;
       $comment->comment = $request->comment;
       $comment->product_id = $request->product_id;
       $comment->user_id = Auth::user()->id;
       $comment->save();
       return response(['comment'=> $comment]);
   }
   
     //**********************************favorite*********************************************/
  
   public function favoriteView()
   {
    
     $favorites = favorite::where('user_id','=',Auth::user()->id)->get();

     return response([
      'favorites'=>$favorites,
      ]);
   }

   public function favoriteInsert($product_id)
   {
      $favorites = favorite::where('user_id','=',Auth::user()->id )
      ->where( 'product_id','=',$product_id)
      ->first();
      if( $favorites){
         $favorites->delete();
         return response(['message'=>'محصول مورد نظر از لیست علاقه مندی ها حذف شد']);

      }
      else{
         $favorite=new favorite();
         $favorite->user_id = Auth::user()->id;
         $favorite->product_id=$product_id;
         $favorite->save();
         return response(['message'=>'محصول مورد نظر به لیست علاقه مندی شما اضافه شد.']);
      }
  

   }

   public function favorite($product_id)
   {
      $favorites = favorite::where('user_id','=',Auth::user()->id && 'product_id','=',$product_id)->get();
      if( $favorites){
         $favorites->delete();
         return response(['message'=>'محصول مورد نظر از لیست علاقه مندی ها حذف شد']);

      }
      else{
         $favorite=new favorite();
         $favorite->user_id = Auth::user()->id;
         $favorite->product_id=$product_id;
         $favorite->save();
         return response(['message'=>'محصول مورد نظر به لیست علاقه مندی شما اضافه شد.']);
      }
  

   }

   public function favoriteDelete($product_id)
   {
    $favorite = favorite::where('product_id','=',$product_id)->first();
    $favorite->delete();

    return response(['message'=>'محصول مورد نظر از لیست علاقه مندی ها حذف شد']);
   }

     public function categorySite($category_id)
      {
         $categoriename=category::where('id' , '=', $category_id)->first();
         $products =Product::where('category_id' , '=',  $category_id)->get();
        
         return response([
            'categoriename'=>$categoriename->name,
            'products' => $products
            
         ]);
      }
      public function search($q)
      {
        // $q= $request ->get('q');
         $categorie=category::where('name' , 'Like', '%'. $q.'%')->first()->id;
         $categoryname=category::where('name' , 'Like', '%'. $q.'%')->first();

         $products =Product::where('category_id' , '=',  $categorie)->get();
        
         return response(['categoriename'=>$categoryname,'products' => $products ]);
      }


     
      //****************************************OFF*********************************************/
      public function offPreview()
      {
       
       
         $products = Product ::first()->id;
         $discounts= discount::where('startdate' ,'<=' , now())
         ->where('enddate' ,'>' , now())
         ->get();
       
       
        return response(['discounts' => $discounts]);

      }

    
}
