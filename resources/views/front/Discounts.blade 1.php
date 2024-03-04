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
                    <h1>لیست تخفیفات</h1>
                </div>
            </div>
        </div>
        <div class="row">
            
           
            @foreach ($discounts as $discount)
            <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                <div class="product-item">
                    <img src="{{asset('image/'.$discount->product()->image)}}" class="img-responsive" width="255" height="322" alt="">
                    <div class="product-hover">
                        <div class="product-meta">
                            <a href="{{ route('preview_Product' ,['id'=>$discount->product_id]) }}">
                                <i class="pe-7s-look"></i></a>
                          @if(Auth::user())
                          <a href="{{ route('favorite_insert' ,['id'=>$discount->product_id]) }}"><i class="pe-7s-like"></i></a>
                            @php
                            $productNumber= product::where('id' ,'=' ,$discount->product_id)->first();
                            @endphp
                            @if ( $productNumber->number==0)
                            <a href="#"></i>  محصول در انبار موجود نیست</a>
                            @else
                            <a href="{{ route('cart_insert',['user_id'=>Auth::user()->id ,'product_id'=>$discount->product_id]) }}"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                            @endif

                        @endif 
                      
                          
                        </div>
                    </div>
                    <div class="product-title">
                      
                              @php
                                $offprice1= ( $discount->off * $discount->product()->price)/100;
                                $offprice2=$discount->product()->price - $offprice1;
                                
                                @endphp 
                        
                                <span style="background-color: red">{{number_format($offprice2)}}تومان</span>
                                <span> <del>{{number_format($discount->product()->price)}}</del> </span>
                                <span style="background-color: rgb(56, 117, 7) " >% {{ $discount->off }}</span>
                      
                            
                        </a>
                    </div>
                </div>
               
            </div>
            @endforeach
           
         
          
           
        </div>
    </div>
</section>
@endsection