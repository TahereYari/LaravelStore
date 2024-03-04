@php
    $sum=0
@endphp

<!doctype html>
<html class="no-js" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>فروشگاه {{ $store->name }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('image/roz.ico') }}" type="image/ico" />

        <link rel="stylesheet" href="{{ asset('MainPanel/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('MainPanel/css/font-awesome.css') }}">
    
   
       
    

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>  --}}
       
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
   
        

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preloader-area">
            	<div class="preloader-box">
            		<div class="preloader"></div>
            	</div>
            </div>
        </div>

       
        <section class="header-top-section">
            <div class="container">
                <div class="row">
                    <div  class="col-md-6">
                        <div class="header-top-content">
                            <ul class="nav nav-pills navbar-left">
                                <li><a href="#"><i class="pe-7s-call"></i><span>{{$store->tel}}</span></a></li>
                                <li><a href="#"><i class="pe-7s-mail"></i><span>{{$store->email}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                               
                                @if(Auth::user())
                                
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="{{ asset('image/user.png') }}" width="30" height="30" alt="" aria-hidden="true">
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu" >
                                        <li><a  style="float: right" href="{{ route('favorite_view') }}"><i class="pe-7s-like" style="color: red"></i>لیست علاقه مندی ها</a></li>
                                        <li><a style="float: right" href="{{ route('my_baskets' ,['user_id' => Auth::user()->id]) }}"><i class="pe-7s-cart" style="color: red"></i>لیست خریدهای من </a></li>
                                        <li><a style="float: right" href="{{ route('user_profile')}}" ><i class="pe-7s-user" style="color: red"></i>پروفایل من</a> </li>  
                                        {{-- <li ><div style="border: 3px rgb(37, 3, 3)"></div></li>                                --}}
                                       <li><a style="float: right" href="{{ route('logout') }}"><i class="pe-7s-right-arrow" style="color: red"></i>خروج</a></li>
                                      
                                    </ul>
                                  </li>
                            
                             
                              
                             
                                @else
                                <li><a href="{{ route('register') }}"></i>ثبت نام</a></li>
                                <li><a href="{{ route('login') }}"></i>ورود</a></li>
                                @endif
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        {{-- <a href="{{ route('page_cart') }}"><span> سبد خرید&nbsp;</span> <span class="shoping-cart">0</span> --}}
                        
                        <a class="navbar-brand" href="#"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/' .$store->image) }}" alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">درباره ما</a></li>
   
                            <li><a href="#">ارتباط با ما</a></li>


                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">لیست محصولات
                                <span class="caret"></span></a>
                                {{-- <ul class="dropdown-menu">
                               
                                    @foreach ($categoryList as $categorysList )
                                        <li><a class="dropdown-toggle" data-toggle="dropdown" style="float: right" href="#">{{ $categorysList->name }}</a>
                                            <span class="caret"></span></a>                                   
                                            @foreach ($categorysList->products() as $products)
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-toggle" data-toggle="dropdown" style="float: right" href="#">{{ $products->name }}</a></li>
                                                </ul> 
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul> --}}
                              </li>
                            <li class="active"><a href="{{ route('home') }}">صفحه اصلی</a></li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right cart-menu">

                       <li>
                        {{-- <a href="#" class="search-btn "><i width="20" height="20" class="pe-7s-search" aria-hidden="true"></i></a> --}}
                        <a href="#" class="search-btn "><img src="{{ asset('image/search.png') }}" width="20" height="20" alt="" aria-hidden="true"></a>
                      
                    </li>
                        <li>
                            {{-- <a class="navbar-brand" href="#"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/' .$store->image) }}" alt=""></a> --}}
                  
                           <a href="{{ route('page_cart') }}"><span> سبد خرید&nbsp;</span> <span class="shoping-cart">0</span>
                           </a>
                        </li>
                    </ul>

                    
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>


        </header>
        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated" method="GET" action="{{ route('search') }}">
                            <div class="form-group">
                                <input type="text" class="form-control subscribe" name="q"  placeholder="جستجو براساس نوع دسته ...">
                                <button type="submit" class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->

       
            @yield('content')
        

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>با ما در ارتباط باشید</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1></h1>
                            <h3></h3>
                            <p>{{ $store->describe }}</p>
                            <div class="contact-info">
                                <p><b> آدرس :{{ $store->address }}</p>
                                <p><b>تلفن:</b> {{ $store->tel }}</p>
                                <p><b>ایمیل:</b> {{ $store->email }}</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="{{ $store->instagram }}"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/instagram.jpg') }}" alt=""></i></a></li>
                                    <li><a href="{{ $store->telegram }}"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/telegram.png') }}" alt=""></i></a></li>
                                    <li><a href="{{ $store->telegram }}"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/youtube.png') }}" alt=""></i></a></li>
                                    <li><a href="{{ $store->instagram }}"><img style="border-radius: 50%" width="40"  height="40" src="{{ asset('image/tweeter.jpg') }}" alt=""></i></a></li>
                                 
{{--                                     
                                    {{--                                     
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder=" نام">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="ایمیل">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="عنوان">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="شماره تماس">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="پیام شما ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="ارسال" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="center"> <i class="fa fa-love"></i><a href=""></a></p>
                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- JQUERY -->
        <!-- <script src="{{ asset('MainPanel/js/vendor/jquery-1.11.2.min.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/vendor/jquery-rtl-1.11.2.min.js') }}"></script>

        <!-- <script src="{{ asset('MainPanel/js/vendor/bootstrap.min.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/vendor/bootstrap-rtl.min.js') }}"></script>

        <!-- <script src="{{ asset('MainPanel/js/isotope.pkgd.min.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/isotope-rtl.pkgd.min.js') }}"></script>

        <!-- <script src="{{ asset('MainPanel/js/owl.carousel.min.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/owl.carousel-rtl.min.js') }}"></script>
        
        
        
        <!-- <script src="{{ asset('MainPanel/js/wow.min.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/wow-rtl.min.js') }}"></script>


        <!-- <script src="{{ asset('MainPanel/js/custom.js') }}"></script> -->
        <script src="{{ asset('MainPanel/js/custom-rtl.js') }}"></script>
   
       <script>
                            document.addEventListener("DOMContentLoaded", function(){
                // make it as accordion for smaller screens
                if (window.innerWidth > 992) {

                    document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

                        everyitem.addEventListener('mouseover', function(e){

                            let el_link = this.querySelector('a[data-bs-toggle]');

                            if(el_link != null){
                                let nextEl = el_link.nextElementSibling;
                                el_link.classList.add('show');
                                nextEl.classList.add('show');
                            }

                        });
                        everyitem.addEventListener('mouseleave', function(e){
                            let el_link = this.querySelector('a[data-bs-toggle]');

                            if(el_link != null){
                                let nextEl = el_link.nextElementSibling;
                                el_link.classList.remove('show');
                                nextEl.classList.remove('show');
                            }


                        })
                    });

                }
                // end if innerWidth
                });


       
       </script>









    </body>
</html>
