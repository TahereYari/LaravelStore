@php
    use App\Models\discount;
    use App\Models\Product;
    use Hekmatinasser\Verta\Facades\Verta;
@endphp
@extends('layout.home')

@section('content')

<section class="new-section">
    <div class="container pb-5" style="margin:0 auto">
            <div class="row row col-lg-10">
                <div class="col-lg-10 mt-5">
                    <div class="card mb-3">
                        <div class="product-item"  >
                            <img class="card-img img-fluid" src="{{asset('image/'.$Product_one->image)}}" class="img-responsive"  alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    @if(Auth::user())
                                        <a href="{{ route('favorite_insert' ,['id'=>$Product_one->id]) }}"><i class="pe-7s-like"></i></a>
                                        @php
                                        $productNumber= product::where('id' ,'=' ,$Product_one->id)->first();
                                        @endphp
                                        @if ( $productNumber->number==0)
                                        <a href="#"></i>  محصول در انبار موجود نیست</a>
                                        @else
                                        <a href="{{ route('cart_insert',['user_id'=>Auth::user()->id ,'product_id'=>$Product_one->id]) }}"><i class="pe-7s-cart"></i>افزودن به سبد خرید</a>
                                    
                                        @endif
                                    @endif 
                                </div>
                            </div>
                            <div class="product-title">
                                @php
                                $discount=discount:: where('product_id' ,'=',$Product_one->id)->first();        
                                @endphp
                                    @if($discount &&   (verta($discount->startdate) < verta()) && (verta($discount->enddate) > verta()))
                                    @php
                                        $offprice1= ( $discount->off * $Product_one->price)/100;
                                        $offprice2=$Product_one->price-$offprice1;
                                        
                                        @endphp 
                                
                                        <span style="background-color: red ">{{number_format($offprice2)}}تومان</span>
                                        <span> <del>{{number_format($Product_one->price)}}</del> </span>
                                        @else
                                            <span>{{number_format($Product_one->price)}}تومان</span>
                                        @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="margin-top: 2% ">
                
                        <table class="table email-table no-wrap table-hover v-middle mb-0 font-14" style="background-color: #fff">
                            <tbody >
                                <!-- row -->
                                <thead>
                                    <th></th>
                                </thead>
                            
                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                        <h2 class="card-title">نام محصول: <span>{{$Product_one->name}}</span>   </h2>
                                    </td>
                                </tr>
                    
                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                        <p class="card-text">  تعداد : {{$Product_one->number}}  </p>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                        <p class="card-text">ویژگی ها: <br> {!! $Product_one->propertise !!}</p>
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div> 
    </div> 
    <div style="height:200px ; width:30%; margin:0 auto" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators slider-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div  class="carousel-inner " role="listbox"  >
           
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
          @if($Product_one->pictures())
          @foreach ($Product_one->pictures() as $picture)
            <div  class="item" {{ $counter == 0 ? 'active'  : '' }}" >
              
                <img  src="{{ asset('image/'.$picture->image1) }}"  class="d-block w-100"  style="height:200px ; width:100%">
                {{-- <div class="carousel-caption">
                    <h2> </h2>
                    <h3></h3>
                    <a href="#"></a>
                </div> --}}
             
            </div>
            
            @php
            $counter ++ ;
          @endphp
             @endforeach
             @endif  
        </div>

        

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" style="width:22px height:32px !important" role="button" data-slide="prev">
            <span class="pe-7s-angle-left glyphicon-chevron-left" style="font-size: 50px !important" aria-hidden="true"></span>
        </a>
        <a href="#carousel-example-generic" class="right carousel-control"  style="width:22px height:32px !important" role="button" data-slide="next">
            <span class="pe-7s-angle-right glyphicon-chevron-right" style="font-size: 50px !important" aria-hidden="true"></span>
        </a>
    </div>  
</section>
    




<div class="row row mt-2">
    <div class="container">
        <div>
           
            @if(Auth::user())
            <a href="{{ route('Comment',['id'=> $Product_one->id])}}"> <h3>ثبت نظر </h3> </a>
            @else
            <a href="{{ route('login')}}">  <h3> برای ثبت نظر در مورد محصول وارد حساب کاربری خود شوید </h3></a>
            @endif
       
        </div>
    </div>
</div>

<section style="background-color: #f7f6f6;">
      {{-- ******* --}}
      <div class="container" style="direction: rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-primary text-white mailbox-widget pb-0">
                       
                        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#comment" role="tab" aria-selected="true">
                                    <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                    <span class="d-none d-md-block"> دیدگاهها</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#savecomment" role="tab" aria-selected="false">
                                    <span class="d-block d-md-none"><i class="ti-export"></i></span>
                                    <span class="d-none d-md-block">ثبت نظرات</span>
                                </a>
                            </li>
                       
                           
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="comment" aria-labelledby="inbox-tab" role="tabpanel">
                            <div class="container bootstrap snippets bootdey">
      
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-comment">
                                            <h3 class="text-success">دیدگاهها</h3>
                                            <hr/>
                                            <ul class="comments">
                                          @if($Product_one->comments())
                                           @foreach ($comments as $comment)
                                            <li class="clearfix">
                                                @if ($comment->user()->image)
                                                <img width="70" height="70px" src="{{ asset('image/'.$comment->user()->image) }}" class="avatar" alt="">
                                                @else
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
                                             
                                                @endif
                                               
                                          
                                              <div class="post-comments">
                                                  <p class="meta">{{ verta($comment->created_at) }} <a href="#"> {{ $comment->user()->name }}</a> : <i class="pull-right"><a href="#"><small></small></a></i></p>
                                                  <p>
                                                    {{ $comment->comment }}
                                                  </p>
                                              </div>
                                            </li>
                                             @endforeach
                                            @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="savecomment" aria-labelledby="sent-tab" role="tabpanel">
                            <div class="container bootstrap snippets bootdey">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        {{-- <div class="card" style="margin: 0 auto"> --}}
                                        
                            
                                            {{-- <div class="card-body"> --}}
                                              
                                                <form style="float: right" action="{{route('Comment_insert')}}" method="POST" enctype="multipart/form-data" class="contact-form form-horizontal form-label-left" >
                                                    @csrf
                                                <div class="row">
                                                    <div class="item form-group">
                                                        <div class="input-group col-md-6  col-sm-6" >
                                                          
                                                            <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
                                                        </div>
                                                    </div>
                                                        <div class=" item form-group">
                                                            <div class="input-group col-md-6  col-sm-6">
                            
                                                                <input type="text" class="form-control" name="posetive" id="posetive" placeholder="نکات مثبت">
                                                            </div>
                                                        </div>
                                                  
                                                    
                                                    </div>  
                                                    <div class="row">
                                                        <div class=" item form-group">
                                                            <div class="input-group col-md-6  col-sm-6">
                            
                                                                <input type="text" class="form-control" name="emteaz" id="emteaz" placeholder="امتیاز">
                                                            </div>
                                                        </div>
                                                    </div>   
                                                        <div class="row">
                                                            <div class=" item form-group">
                                                                <div class="input-group col-md-6  col-sm-6">
                                
                                                                <input type="text" class="form-control" name="negative" id="negative" placeholder="نکات منفی"">
                                                            </div>
                                                        </div>
                            
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <textarea name="comment" id="comment" class="form-control" cols="30" rows="5" placeholder="نظرات..."></textarea>
                                                            </div>
                                                        </div>
                                                        {{-- </div> --}}
                            
                                                        {{-- <div class="row"> --}}
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="submit" class="contact-submit" value="ارسال" />
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <input type="hidden" class="form-control" name="product_id" id="product_id" value="{{ $Product_one->id}}" placeholder="نکات منفی"">
                                                        </div>
                                                    </div>
                            
                                                </form>
                                            {{-- </div>
                                        </div> --}}
                                    </div>
                                </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- ********** --}}

  </section>


{{-- ***************css********** --}}
<style>
    body{
        background: #edf1f5;
        margin-top:20px;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }
    .mailbox-widget .custom-tab .nav-item .nav-link {
        border: 0;
        color: #1d0606;
        border-bottom: 3px solid transparent;
    }
    /* .mailbox-widget .custom-tab .nav-item .nav-link.active {
        background: 0 0;
        color: #fff;
        border-bottom: 3px solid #2cd07e;
    } */
    .no-wrap td, .no-wrap th {
        white-space: nowrap;
    }
    .table td, .table th {
        padding: .9375rem .4rem;
        vertical-align: top;
        border-top: 1px solid rgba(120,130,140,.13);
    }
    .font-light {
        font-weight: 300;
    }
</style>
{{-- ************************************ --}}

@endsection
