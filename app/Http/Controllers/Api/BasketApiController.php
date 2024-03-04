<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AddressUser;
use App\Models\basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\discount;
use App\Models\offcode;
use App\Models\Product;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketApiController extends Controller
{
   
     
   
  public function pageCart()
  {
   
    $basket= basket::where('user_id' ,'=',Auth::user()->id)
    ->where('is_pay' ,'=',0)
    ->orderByDesc('created_at')->first();
    
    
    if($basket)
    {
      $basketproducts=BasketProduct::where('basket_id' ,'=',$basket->id)->get();
      return response([
        'basketproducts'=>$basketproducts,
        'basket'=>$basket,
       
      ]);
    }
    else
    {
      return response('سبد خرید شما خالی است');
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
       
         return response(['basket'=>$basket ,'basketproduct'=> $basketproduct]);
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
         
          return response(['basket'=>$basket , 'basketproducts2'=>$basketproducts2]);
      }

      public function stepDown($basket_id , $basketproduct_id)
      {
        $basketproduct=BasketProduct::find($basketproduct_id);
        $product=Product::where('id' ,'=',$basketproduct->product_id)->first();
        $basket=basket::where('id', '=' ,$basket_id);

        $discount =discount::where('product_id' ,'=',$basketproduct->product_id)->first();
        
          if($basketproduct)
          {
            if($basketproduct->count > 1){
                $basketproduct->update(['count' =>  $basketproduct->count-1]);
            }
          
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

          return response(['basket'=>$basket , 'basketproducts2'=>$basketproducts2]);
      }

      public function deleteItemBasket( $basket_id ,$basketproduct_id)
      {

        $basketproduct=BasketProduct::find($basketproduct_id);
        $basket =basket::find($basket_id);
        $basketproduct->delete();

        $basket->price =  $basket->price - $basketproduct->pricefull;
        $basket->update();
 
        return response('Deleted');
      }

      public function addDiscount(Request $request , $basket_id)
      {
        
        
           //اگر کد تخفیف وارد شده وجود داشت 
          //آن را برای کاربر بررسی میکند که قبلا از آن استفاده کرده است یا خیر
          //اگر استفاده کرده بود پیغام میدهد قبلا استفاده کردی 
          //اگر کلا وجود تداشت یا تاریخ آن گذشته بود پیغام میدهد کد تخفیف برای شم وجود ندارد 
      
        
        $offcode=offcode::where('code' ,'=' ,$request->discount)->first();
    
        $basket=basket::where('id' ,'=' ,$basket_id)->first();
        
        
       if($request->discount && $offcode)
        {
           
          $basketsuser =basket::where('user_id' ,'=',Auth::user()->id)
          ->where('offcode_id' ,'=', $offcode->id)->first();
         
         
          if ($offcode &&  (($offcode->startdate) < now()) && (($offcode->enddate) > now()) && $request->discount)
          {
           
              if($basketsuser)
              {
                //تکراری نبود کد تخفیف برای یک کاربر
                return response(['error'=>'شما قبلا از این کد تخفیف استفاده کردید.']);
              }
              else
              {
                $basket->price= $basket->price - $offcode->price;
                $basket->offcode_id=$offcode->id;
                $basket->offcode=$offcode->price;
                $newPrice = $basket->price;
                $basket->update();
                return response(['error'=>'کد تخفیف برای شما اعمال شد.','newPrice'=>$newPrice]);
              }
  
          } 
          else
          {
            return response(['error'=>'کد تخفیفی برای شما وجود ندارد']);
          }

        }
       
       
      
        else
        {
          return response(['error'=>'کد تخفیفی برای شما وجود ندارد']);
        }
     
       
     
     }
      

      public function Checkout($address_id)
      {
        $basket= basket::where('user_id' ,'=',Auth::user()->id)
        ->where('is_pay' ,'=',0)
        ->orderByDesc('created_at')->first();
   
          if($basket)
          {
            $basket->is_pay=1;
            $basket->address_id = $address_id;
            $basket->update();
          }
          return response([' basket'=> $basket]);

      }


      public function adddressUser()
      {
        $address= AddressUser::where('user_id' , '=' , Auth::user()->id)->get();
        $store = store::orderByDesc('created_at')->first();
        

        return response([
          'address' =>$address,
          'store' => $store
        ]);
      }


      
    
}
