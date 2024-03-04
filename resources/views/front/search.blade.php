@php
    use App\Models\discount;
    use App\Models\Product;
@endphp

@extends('layout.home')

@section('content')
<section class="new-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ $categoriename->name }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            
           
            @foreach ($products as $product)
            <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                <div class="product-item">
                    <img src="{{asset('image/'.$product->image)}}" class="img-responsive" width="255" height="322" alt="">
                    <div class="product-hover">
                        <div class="product-meta">
                            <a href="{{ route('preview_Product' ,['id'=>$product->id]) }}">
                                <i class="pe-7s-look"></i></a>
                          @if(Auth::user())
                          <a href="{{ route('favorite_insert' ,['id'=>$product->id]) }}"><i class="pe-7s-like"></i></a>
                          @php
                          $productNumber= product::where('id' ,'=' ,$product->id)->first();
                          @endphp
                          @if ( $productNumber->number==0)
                          <a href="#"></i>  محصول در انبار موجود نیست</a>
                          @else
                          <a href="{{ route('cart_insert',['user_id'=>Auth::user()->id ,'product_id'=>$product->id]) }}"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                          @endif

                          @endif 
                        
                      
                        </div>
                    </div>
                    <div class="product-title">
                       
                           
                            @php
                            $discount=discount:: where('product_id' ,'=',$product->id)->first();
                                   
                            @endphp
                           @if($discount &&  ($discount->startdate < now()) && ($discount->enddate > now()))
                           @php
                               $offprice1= ( $discount->off * $product->price)/100;
                               $offprice2=$product->price-$offprice1;
                               
                               @endphp 
                       
                               <span>{{$offprice2}}تومان</span>
                               <span> <del>{{$product->price}}</del> </span>
                       @else
                           <span>{{$product->price}}تومان</span>
                       @endif
                       
                            
                    
                    </div>
                </div>
               
            </div>
            @endforeach
           
         
          
           
        </div>
    </div>
</section>
@endsection