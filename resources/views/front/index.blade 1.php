@php
    use App\Models\discount;
    use App\Models\Product;
@endphp

@extends('layout.home')

@section('content')

{{-- 
       <div>
        <p>لیست محصولات</p>
        @foreach ( $categories as $category)
        <p> {{$category->name}} </p>
        @endforeach
        
       </div> --}}
{{-- //*********** --}}
        <section class="new-section"  >

            <div style="height:400px ; width:90%; margin:0 auto" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators slider-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox"  >
                   
                    <div class="item active" >
                       {{-- <img src="images/slider.jpg" width="1648" height="600" alt=""> --}}
                        <div class="carousel-caption">
                           {{-- <h2>DRESSES <b>&</b> JEANS</h2>
                            <h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
                            <a href="#">Buy Now</a>   --}}
                        </div>
                    </div> 

                    @php
                    $counter = 0;
                  @endphp
                    @foreach ($productSlider as $slider )
                    <div  class="item" {{ $counter == 0 ? 'active'  : '' }}" >
                      
                        <img  src="{{ asset('image/'.$slider->image) }}"  class="d-block w-100"  style="height:400px ; width:100%">
                        <div class="carousel-caption">
                            <h2>{{ $slider->name }} </h2>
                            <h3><Span></Span></h3>
                            <a href="#">افزودن به سبد خرید</a>
                        </div>
                     
                    </div>
                    @php
                    $counter ++ ;
                  @endphp
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section>


        {{-- //******** --}}
     {{-- <section class="new-section" >
        <div class="row " >
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  @php
                    $counter = 0;
                  @endphp
                  @foreach($productSlider as $slider)
                    
                  <div class="carousel-item {{ $counter == 0 ? 'active'  : '' }}">
                    <img src="{{ asset('image/' .$slider ->image) }}" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $slider ->name }}</h5>
                      {{-- <p>{{ $slider ->address }}</p> --}}
                    {{-- </div>
                  </div> --}}
                  {{-- @php
                  $counter ++ ;
                @endphp
        
                  @endforeach
                   --}}
              
                {{-- </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">قبلی</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">بعدی</span>
                </button>
              </div> --}}
        
        {{-- </div>
    </section>  --}}

   

        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>جدیدترین محصولات</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    @foreach ($NewProducts as $NewProduct)
                    <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                        <div class="product-item">
                            <img src="{{asset('image/'.$NewProduct->image)}}" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="{{ route('preview_Product' ,['id'=>$NewProduct->id]) }}">
                                    <i class="pe-7s-look"></i></a>
                                  @if(Auth::user())
                                  <a href="{{ route('favorite_insert' ,['id'=>$NewProduct->id]) }}"><i class="pe-7s-like"></i></a>
                                        @php
                                            $productNumber= product::where('id' ,'=' ,$NewProduct->id)->first();
                                        @endphp
                                        @if ( $productNumber->number==0)
                                        <a href="#"></i>  محصول در انبار موجود نیست</a>
                                        @else
                                        <a href="{{ route('cart_insert',['user_id'=>Auth::user()->id ,'product_id'=>$NewProduct->id]) }}"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                                    
                                        @endif

                                 
                                  @endif 
                               
                              
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="{{ route('preview_Product' ,['id'=>$NewProduct->id]) }}">
                                
                                    @php
                                        $discount=discount:: where('product_id' ,'=',$NewProduct->id)->first();
                                    
                                    @endphp
                            @if($discount &&   (verta($discount->startdate) < verta()) && (verta($discount->enddate) > verta())))
                            @php
                                $offprice1= ( $discount->off * $NewProduct->price)/100;
                                $offprice2=$NewProduct->price-$offprice1;

                                
                                @endphp 
                        
                                <span style="background-color: red ">{{number_format($offprice2)}}تومان</span>
                                <span> <del>{{number_format($NewProduct->price)}}</del> </span>
                                <span style="background-color: rgb(56, 117, 7) " >% {{ $discount->off }}</span>
                        @else
                            <span>{{number_format($NewProduct->price)}}تومان</span>
                        @endif
                        
                                  
                                </a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                 
                  
                   
                </div>
            </div>
        </section>

      

        <section class="offer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeInDown animated ">
                     <a href="{{ route('off_preview') }}">
                        <h2>جدیدترین تخفیفات</h2>
                        <h2>از 20 % تا 50 %</h2>
                    </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>پربازدیدترین ها</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    @foreach ($MostViews as $MostView)
                    <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                        <div class="product-item">
                            <img src="{{asset('image/'.$MostView->image)}}" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="{{ route('preview_Product' ,['id'=>$MostView->id]) }}">
                                        <i class="pe-7s-look"></i></a>
                                    @if(Auth::user())
                                    <a href="{{ route('favorite_insert' ,['id'=>$MostView->id]) }}"><i class="pe-7s-like"></i></a>
                                         @php
                                            $productNumber= product::where('id' ,'=' ,$MostView->id)->first();
                                        @endphp
                                        @if ( $productNumber->number<=0)
                                        <a href="#"></i>  محصول در انبار موجود نیست</a>
                                        @else
                                        <a href="{{ route('cart_insert',['user_id'=>Auth::user()->id ,'product_id'=>$MostView->id]) }}"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                                    
                                        @endif
                                    @endif 
                                 
                                </div>
                            </div>
                            <div class="product-title">
                               
                                    @php
                                        $discount=discount:: where('product_id' ,'=',$MostView->id)->first();
                                    
                                    @endphp
                            @if($discount &&   (verta($discount->startdate) < verta()) && (verta($discount->enddate) > verta()))
                            @php
                                $offprice1= ( $discount->off * $MostView->price)/100;
                                $offprice2=$MostView->price-$offprice1;
                                
                                @endphp 
                        
                                <span style="background-color: red ">{{number_format($offprice2)}}تومان</span>
                                <span> <del>{number_format{($MostView->price)}}</del> </span>
                                <span style="background-color: rgb(56, 117, 7) " >% {{ $discount->off }}</span>
                        @else
                            <span>{{number_format($MostView->price)}}تومان</span>
                        @endif
                        
                                </a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                 
                  
                   
                </div>
            </div>
        </section>

    
        <section class="review-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>دسته بندی ها</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="feedback" class="carousel slide feedback">
                        @foreach ($categorimages as $categorimage )
                        <ol class="carousel-indicators review-controlar">
                          
                           <li  data-slide-to="0" class="active">
                          <a href="{{ route('category_site',['id' =>$categorimage->id]) }}">  <img src="{{asset('image/'.$categorimage->image)}}" width="320" height="439" alt="">
                            
                          </a>
                        </li>
                        </ol>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
 

        @endsection
