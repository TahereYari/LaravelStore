<?php

namespace App\Http\Controllers;

use App\Models\AddressUser;
use App\Models\basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\Comment;
use App\Models\discount;
use App\Models\favorite;
use App\Models\favoriteProducts;
use App\Models\favoritProduct;
use App\Models\offcode;
use App\Models\picture;
use App\Models\Product;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Facades\Verta;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
  
    public function Home()
    {
      
       $productSlider=Product::orderByDesc('updated_at')->limit(4)->get();
       $NewProducts=Product::orderByDesc('created_at')->limit(4)->get();
       $discounts= discount::all();
      
       $MostViews=Product::orderByDesc('counter')->limit(4)->get();
      $categories=Category::orderByDesc('created_at')->limit(8)->where('DeleteStatuse','=',0)->get();
       $categorimages=Category::orderByDesc('created_at')->where('DeleteStatuse','=',0)->get();
       $store = store::orderByDesc('created_at')->first();
      
       $categoryList=Category::where('DeleteStatuse','=',0)->get();

        return view('front.index' ,[
            
           'productSlider' =>$productSlider,
           'NewProducts' => $NewProducts,
           'MostViews' =>$MostViews,
           'categories'=>$categories,
           'categoryList' =>$categoryList,
           'discounts' => $discounts,
           'categorimages' => $categorimages,
           'store' => $store

        ]);
    }
    public function category_underMenu($id)
    {
        $products_menu=Product::where('DeleteStatuse','=',0)->where('category_id','=',$id);
        return view('front.index' ,['products_menu' => $products_menu]);
    }

//********************************PreviewProduct*********************************************/

public function previewProduct($id)
{
  $store = store::orderByDesc('created_at')->first();
 
    $Product_one = Product::find($id);
    $Product_one->counter +1;
    $Product_one->save();
   $pictureOfProducts = picture::where('product_id','=',$id)->get();

  $categoryList=Category::where('DeleteStatuse','=',0)->get();
  $products_menu=Product::where('DeleteStatuse','=',0)->where('category_id','=',$id);
  $comments=Comment::where('product_id','=',$id)->where('preview','=' ,1)->get();

 
    return view('front.PreviewProduct' ,[
        'Product_one' => $Product_one ,
        'pictureOfProducts' => $pictureOfProducts,
        'categoryList' =>$categoryList,
        'products_menu' => $products_menu,
        'comments'=>$comments,
        'store' => $store
    ]);
}


   //**********************************Comment*********************************************/
   public function Comment($id)
   {
       // $Product_comment=Product::find($id);
       $store = store::orderByDesc('created_at')->first();
       
      return view('front.Comment' ,[
        'id' =>$id,
        'store' => $store
      ]);
       
   }
   
   public function CommentInsert(Request $request)
   {
    $store = store::orderByDesc('created_at')->first();

       $comment=new Comment();
   
       $comment->title = $request->input('title');
       $comment->posetive = $request->input('posetive');
       $comment->negative = $request->input('negative');
       $comment->emteaz = $request->input('emteaz');
       $comment->comment = $request->input('comment');
       $comment->product_id = $request->input('product_id');
       $comment->user_id = Auth::user()->id;
       $comment->save();
       return redirect(route('preview_Product',[
        'id'=> $comment->product_id,
        'store' => $store
      ]));
   }
   
     //**********************************favorite*********************************************/
  
   public function favoriteView()
   {
     $categoryList=Category::where('DeleteStatuse','=',0)->get();
     $favorites = favorite::where('user_id','=',Auth::user()->id)->get();
     $store = store::orderByDesc('created_at')->first();
   
     return view('front.favorite',[
      'categoryList'=>$categoryList ,
      'favorites'=>$favorites,
      'store' => $store
    ]);
   }

   public function favoriteInsert($id)
   {
  
      $favorite=new favorite();
      $favorite->user_id = Auth::user()->id;
      $favorite->product_id=$id;
      $favorite->save();
      return redirect()->back();
   }

   public function favoriteDelete($id)
   {
    $favorite = favorite::where('product_id','=',$id)->first();
    $favorite->delete();

    return redirect()->back();
   }

     public function categorySite($id)
      {
        $store = store::orderByDesc('created_at')->first();
        
        $categoryList=Category::where('DeleteStatuse','=',0)->get();
     
         $categoriename=category::where('id' , '=', $id)->first();

         $products =Product::where('category_id' , '=',  $id)->get();
        
         return view('front.search' , [
            'products' => $products,
            'categoryList'=>$categoryList,
            'categoriename'=>$categoriename,
            'store' => $store
            
        ]);
      }
      public function search(Request $request)
      {
        $store = store::orderByDesc('created_at')->first();
        
        $categoryList=Category::where('DeleteStatuse','=',0)->get();
         $q= $request ->get('q');
         $categorie=category::where('name' , 'Like', '%'. $q.'%')->first()->id;
         $categoriename=category::where('name' , 'Like', '%'. $q.'%')->first();

         $products =Product::where('category_id' , '=',  $categorie)->get();
        
         return view('front.search' , [
            'products' => $products,
            'categoryList'=>$categoryList,
            'categoriename'=>$categoriename,
            'store' => $store
            
        ]);
      }


     //**********************************Cart*********************************************/
  
     
      public function pageCart()
      {
        $categoryList=Category::where('DeleteStatuse','=',0)->get();
        $basket= basket::where('user_id' ,'=',Auth::user()->id)
        ->where('is_pay' ,'=',0)
        ->orderByDesc('created_at')->first();
        $store = store::orderByDesc('created_at')->first();
        
        if($basket)
        {
          $basketproducts=BasketProduct::where('basket_id' ,'=',$basket->id)->get();
          return view('front.cart' ,[
            'categoryList'=>$categoryList,
            'basketproducts'=>$basketproducts,
            'basket'=>$basket,
            'store' => $store
          ]);
        }
        else
        {
          return view('front.cart' ,[
            'categoryList'=>$categoryList,
            'store' => $store

          ]);
        }
      
       

        
      }
   
      public function cartInsert($user_id,$product_id)
      {
       
        $basket= basket::where('user_id' ,'=',$user_id)->orderByDesc('created_at')->first();
        
        $product=Product::where('id' ,'=',$product_id)->first();
        $discount=discount::where('product_id','=' ,$product_id)->first();
     
        $invoice_number = random_int(100, 9999);

        $sum=0;
        if(!$basket ||$basket->is_pay==1 )
        {
          //اگر سبد خرید وجود نداشت یا پردختش برابر1 بود یک سبد خرید جدید ایجاد کن
         
          $newbasket= new basket();
          $newbasket->user_id = $user_id;
          $newbasket->InvoiceNumber = $invoice_number;
          $newbasket->save();
          $basket_id=$newbasket->id;

          //محصول رو به سبد خرید اضافه کن
          $basketproduct= new BasketProduct();
          $basketproduct->product_id	=$product_id;
          $basketproduct->basket_id	= $basket_id;
          $basketproduct->count	= 1;
          $product->update(['number' =>  $product->number-1]);

          $basketproduct->price	= $product->price;

         if ($discount &&  ($discount->startdate < now()) && ($discount->enddate > now()))
          {
                  //اگر تخفیف داشتیم قیمت نهایی برابر است با قیمت تخفیف ضربدر تعداد
                $offprice1= ( $discount->off *  $product->price)/100;
                $offprice2= $product->price-$offprice1;
                $basketproduct->offprice	= $offprice2;

                $basketproduct->pricefull	=  $basketproduct->offprice * $basketproduct->count;
                $basketproduct->save();

                $sum = $sum + $basketproduct->offprice;
                $newbasket->price= $sum ;
                $newbasket->update();
            
              } 
              else
              {
                
                $basketproduct->pricefull	= $product->price * $basketproduct->count;
                $basketproduct->save();
                $sum = $sum + $basketproduct->pricefull;
                $newbasket->price= $sum ;
                $newbasket->update();
              }

        }

  
       elseif($basket  && $basket->is_pay==0)
        {
            // اگر سبد خرید وجودداشت و پرداختش برابر 0 بود
            //
            $basketproducts=BasketProduct::where('basket_id' ,'=',$basket->id)
            ->where('product_id' ,'=',$product_id)->first();
            if($basketproducts)
            {
              //اگر محصولی که وجود دارد توی سبد خرید هست تعداد و قیمتش را آپدیت کن
              $basketproducts->update(['count' =>  $basketproducts->count+1]);
              if ($discount &&  ($discount->startdate < now()) && ($discount->enddate > now()))
              {
                
                  //اگر تخفیف داشتیم قیمت نهایی برابر است با قیمت تخفیف ضربدر تعداد
                  // $offprice1= ( $discount->off *  $product->price)/100;
                  // $offprice2= $product->price-$offprice1;
                  // $basketproducts->offprice = $offprice2;

                $basketproducts->update(['pricefull' => $basketproducts->offprice * $basketproducts->count]);
                
                }
                else
                {
                  $basketproducts->update(['pricefull' =>  $product->price * $basketproducts->count]);
                }
                $product->update(['number' =>  $product->number-1]);
              $sum = $sum +$basketproducts->pricefull;
              $basket->price= $sum ;
              $basket->update();
              
            }
          
            else
            {
              //اگر محصول تکراری نبود آنرا به سبد اضافه کن
              $basketproduct= new BasketProduct();
              $basketproduct->product_id	=$product_id;
              $basketproduct->basket_id	= $basket->id;
              $basketproduct->count	= 1;
              $basketproduct->price	= $product->price;
              if ($discount &&  ($discount->startdate < now()) && ($discount->enddate > now()))
              {
                //اگر تخفیف داشتیم قیمت نهایی برابر است با قیمت تخفیف ضربدر تعداد
                $offprice1= ( $discount->off *  $product->price)/100;
                $offprice2= $product->price-$offprice1;
                $basketproduct->offprice=$offprice2;
                $basketproduct->pricefull	=  $offprice2 * $basketproduct->count;
              }
              else
              {
              
                $basketproduct->pricefull	= $product->price * $basketproduct->count;
              }

              $product->update(['number' =>  $product->number-1]);
              $basketproduct->save();

              $sum = $sum + $basketproduct->pricefull;
              $basket->price= $sum ;
              $basket->update();
            
            
            }
    
        }
        if ($basket)
         {
          $basketproducts2=BasketProduct::where('basket_id' ,'=',$basket->id)->get();
            $sum=0;
            foreach($basketproducts2 as $basketproduct)
            {
              $sum += $basketproduct->pricefull;
        
            }
            $basket->price=$sum;
            $basket->update();
         }
       
         return redirect()->back();
        // عمکرد سبد خرید :اگر سبد خرید وجود نداشت یاپرداختش برابر یک بود 
        // یک سبد خرید ایجاد و یک بسکت پروداکت ایجاد میکنیم
        //    و اولین محصول را با آن اضافه میکنیم
        //    در مرحله ی بعد(در غیر اینصورت) اگر سبد خریدی داشتیم که پرداختش صفر بود
        //    دوتا حالت را در نظر میگیرم 
        //    یک: اگر محصول تکراری بود تعداد و قیمتش را آپدیت میکنیم
        //    دو: اگر تکراری نبودمحصول را اضافه میکنیم
        //    و در هر مرجله بررسی میکنیم که آیا تخفیف داریم با خیر اگر داشتیم آن را اعمال میکنیم

      }

      public function stepUp($basket_id,$basketproduct_id)
      {
        $basket=basket::where('id', '=' ,$basket_id);
        $basketproduct=BasketProduct::find($basketproduct_id);
        $product=Product::where('id' ,'=',$basketproduct->product_id)->first();
       
        $discount =discount::where('product_id' ,'=',$basketproduct->product_id)->first();
        
          if($basketproduct)
          {
             $basketproduct->update(['count' =>  $basketproduct->count+1]);
             if($discount && ($discount->startdate < now()) && ($discount->enddate > now()))
             {
             
              $basketproduct->update(['pricefull' =>  $basketproduct->offprice * $basketproduct->count]);
           
            }
             else
              {
                $basketproduct->update(['pricefull' =>  $product->price * $basketproduct->count]);
             }

            
           

          }
          if ($basket)
          {
           $basketproducts2=BasketProduct::where('basket_id' ,'=', $basket_id)->get();
       
             $sum=0;
             foreach($basketproducts2 as $basketproduct)
             {
               $sum += $basketproduct->pricefull;
         
             }
             $basket->update(['price' =>  $sum]);
          }
         
          return redirect()->back();
      }

      public function stepDown($basket_id , $basketproduct_id)
      {
        $basketproduct=BasketProduct::find($basketproduct_id);
        $product=Product::where('id' ,'=',$basketproduct->product_id)->first();
        $basket=basket::where('id', '=' ,$basket_id);

        $discount =discount::where('product_id' ,'=',$basketproduct->product_id)->first();
        
          if($basketproduct)
          {
             $basketproduct->update(['count' =>  $basketproduct->count-1]);
             if($discount && ($discount->startdate < now()) && ($discount->enddate > now()))
             {
             
              $basketproduct->update(['pricefull' =>  $basketproduct->offprice * $basketproduct->count]);
             }
             else
              {
                $basketproduct->update(['pricefull' =>  $product->price * $basketproduct->count]);
             }
         
          }

          if ($basket)
          {
           $basketproducts2=BasketProduct::where('basket_id' ,'=', $basket_id)->get();
       
             $sum=0;
             foreach($basketproducts2 as $basketproduct)
             {
               $sum += $basketproduct->pricefull;
         
             }
             $basket->update(['price' =>  $sum]);
          }

          return redirect()->back();
      }

      public function deleteItemBasket( $basket_id ,$basketproduct_id)
      {

        $basketproduct=BasketProduct::find($basketproduct_id);
        $basket =basket::find($basket_id);
        $basketproduct->delete();

        $basket->price =  $basket->price - $basketproduct->pricefull;
        $basket->update();
 
        return redirect()->back();
      }

      public function addDiscount(Request $request , $id)
      {
        
           //اگر کد تخفیف وارد شده وجود داشت 
          //آن را برای کاربر بررسی میکند که ثبلا از آن استفاده کرده است یا خیر
          //اگر استفاده کرده بود پیغام میدهد قبلا استفاده کردی 
          //اگر کلا وجود تداشت یا تاریخ آن گذشته بود پیغام میدهد کد تخفیف برای شم وجود ندارد 
      
        
        $offcode=offcode::where('code' ,'=' ,$request->discount)->first();
    
        $basket=basket::where('id' ,'=' ,$id)->first();
        
       if($request->discount && $offcode)
        {
           
          $basketsuser =basket::where('user_id' ,'=',Auth::user()->id)
          ->where('offcode_id' ,'=', $offcode->id)->first();
          if ($offcode &&  (verta($offcode->startdate) < verta()) && (verta($offcode->enddate) > verta()) && $request->discount)
          {
           
              if($basketsuser)
              {
                //تکراری نبود کد تخفیف برای یک کاربر
                return redirect()->back()->with('done','شما قبلا از این کد تخفیف استفاده کردید.');
              }
              else
              {
                $basket->price= $basket->price - $offcode->price;
                $basket->offcode_id=$offcode->id;
                $basket->offcode=$offcode->price;
                $basket->update();
                return redirect()->back()->with('done','کد تخفیف برای شما اعمال شد.');
              }
  
          } 

        }
       
       
      
        else
        {
          return redirect()->back()->with('done','کد تخفیفی برای شما وجود ندارد');
        }
     
       
     
     }
      


      public function adddressUser()
      {
        $address= AddressUser::where('user_id' , '=' , Auth::user()->id)->get();
        $store = store::orderByDesc('created_at')->first();
        

        return view('front.address',[
          'address' =>$address,
          'store' => $store
        ]);
      }

      public function Checkout($id)
      {
        $basket= basket::where('user_id' ,'=',Auth::user()->id)
        ->where('is_pay' ,'=',0)
        ->orderByDesc('created_at')->first();
   
          if($basket)
          {
            $basket->is_pay=1;
            $basket->address_id=$id;
            $basket->update();
          }
          return redirect(route('home'));

      }
      //****************************************OFF*********************************************/
      public function offPreview()
      {
        $categoryList=Category::where('DeleteStatuse','=',0)->get();
       
        $store = store::orderByDesc('created_at')->first();

        $products = Product ::first()->id;
         $discounts= discount::where('startdate' ,'<=' , now())
         ->where('enddate' ,'>' , now())
         ->get();
       
       
        return view('front.Discounts' ,[
          'discounts' => $discounts,
          'categoryList' =>$categoryList,
          'store' => $store
        ]);

      }

      public function UserProfile()
      {
        // $user=User:: findorfail($);

        $categoryList=Category::where('DeleteStatuse','=',0)->get();
       
        $store = store::orderByDesc('created_at')->first();
        return view('front.User_profile',[
          'store' => $store,
          'categoryList' =>$categoryList,
          // 'user' =>$user

        ]);
      }
}
