@extends('layout.home')
@section('content')

<section class="new-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1> محصولات مورد علاقه</h1>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach ($favorites as $favorite)
            <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.4s">
                <div class="product-item">
                    <img src="{{asset('image/'.$favorite->product()->image)}}" class="img-responsive" width="255" height="322" alt="">
                    <div class="product-hover">
                        <div class="product-meta">
                            <a href="{{ route('preview_Product' ,['id'=>$favorite->product_id]) }}">
                                <i class="pe-7s-look"></i></a>
                            <a href="{{ route('favorite_delete',['id'=>$favorite->product_id]) }}"><i class="pe-7s-like" ></i></a>
                           
                            <a href="#"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                        </div>
                    </div>
                    <div class="product-title">
                           
                            <span>{{$favorite->product()->price}}</span>
                       
                    </div>
                </div>
            </div>

            @endforeach
         
          
           
        </div>
    </div>
</section> 

@endsection