<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('image/roz.ico') }}" type="image/ico" />

  

    <title>فروشگاه {{$store->name}}</title>

    <!-- Bootstrap -->
    <!-- <link href="{{ asset('panel/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('panel/vendors/bootstrap/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('panel/vendors/bootstrap/dist/css/persianDatepicker-default.css') }}">
   
    <!-- Font Awesome -->
    <link href="{{asset('panel/vendors/font-awesome/css/Vazir.css')}}" rel="stylesheet">
    <link href="{{asset('panel/vendors/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    
   
    <!-- NProgress -->
    <!-- <link href="{{asset('panel/vendors/nprogress/nprogress.css')}}" rel="stylesheet"> -->
    <link href="{{asset('panel/vendors/nprogress/nprogress-rtl.css')}}" rel="stylesheet">

    <!-- iCheck -->
    <!-- <link href="{{asset('panel/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet"> -->
    <link href="{{asset('panel/vendors/iCheck/skins/flat/green-rtl.css')}}" rel="stylesheet">


    <!-- bootstrap-progressbar -->
    <!-- <link href="{{ asset('panel/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('panel/vendors/bootstrap-progressbar/css/bootstrap-rtl-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    
    
    <!-- JQVMap -->
    <!-- <link href="{{ asset ('panel/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/> -->
    <link href="{{ asset ('panel/vendors/jqvmap/dist/jqvmap-rtl.min.css')}}" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->
    <!-- <link href="{{ asset ('panel/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet"> -->
    <link href="{{ asset ('panel/vendors/bootstrap-daterangepicker/daterangepicker-rtl.css')}}" rel="stylesheet">



    <!-- Custom Theme Style -->
    <!-- <link href="{{ asset ('panel/build/css/custom.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset ('panel/build/css/custom-rtl.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img style="border-radius: 50%" width="50"  height="50" src="{{ asset('image/' . $store->image) }}" alt=""> <span>فروشگاه {{$store->name}}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <a href="{{ route('view_profile',Auth::user()->id) }}">
                <img src="{{ asset('image/'.Auth::user()->image) }}" alt="..." class="img-circle profile_img">
             
              </a>
             </div>
              <div class="profile_info">
                <span>خوش آمدید</span>
                <h2>
                  {{(Auth::check() ? Auth::user()->name : '') }}
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               
                <ul class="nav side-menu">
                  <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> صفحه اصلی <span ></span></a>
                    {{-- <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul> --}}
                  </li>
             
                  <li><a>  فروشگاه <span></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('store_page') }}">نمایش اطلاعات</a></li>
                   
                    </ul>
                  </li>

                  <li><a> دسته ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('category-List') }} ">دسته اصلی</a></li>
                      {{-- <li><a href="{{ route('subcategory-List') }}">زیر دسته</a></li> --}}
                      
                    </ul>
                  </li>
                  <li><a></i> محصولات<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('products_list') }}">لیست محصولات</a></li>
                      {{-- <li><a href="{{ route('subcategory-List') }}"</a></li> --}}
                      
                    </ul>
                  </li>
                  <li><a> تخفیفات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('off_list') }}">لیست تخفیفات</a></li>
                      <li><a href="{{ route('off_code') }}">تخفیف براساس کد</a></li>
                    </ul>
                  </li>
                  <li><a>کاربران <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('user_list') }}">لیست کاربران</a></li>
                      <li><a href="{{ route('Access') }}">سطوح دسترسی</a></li>
                      <li><a href="{{ route('comment_list') }}">نظرات کاربران</a></li>

                    </ul>
                  </li>
                  <li><a>فاکتورها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('Invoice_list') }}">لیست فاکتورها </a></li>
                    </ul>
                  </li>
                  {{-- <li><a><i class="fa fa-clone"></i>ایمیل <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('page_mail') }}"> ارسال ایمیل </a></li>
                  
                    </ul>
                  </li> --}}
                </ul>
              </div>
          

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="dropdown">
                  <a style="margin-left: 140px" class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="{{ asset('image/user.png') }}" width="30" height="30" alt="" aria-hidden="true">
                  <span class="caret"></span></a>
                  <ul style="margin-left: 30px;margin-top: 28px" class="dropdown-menu" style="float: right" >
                     <li><a style="float: right; margin: 11px" href="{{ route('view_profile' ,['id' => Auth::user()->id]) }}" ><i class="fa fa-user" style="color: rgb(12, 11, 11)"></i> پروفایل من </a> </li>  
                                              
                     <li><a style="float: right; margin: 11px" href="{{ route('logout') }}"><i class="fa fa-sign-out" style="color: rgb(8, 8, 8)"></i>  خروج&nbsp;    </a></li>
                    
                  </ul>
                </li>
              </ul>

            
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
     
        <!-- page content -->
    <div class="right_col" role="main" style="min-height: 1483px;" >
      @yield('content')
    </div>

        
          
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           
          </div> 
           <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!-- <script src="{{ asset ('panel/vendors/jquery/dist/jquery.min.js')}}"></script> -->
    <script src="{{ asset ('panel/vendors/jquery/dist/jquery-rtl.min.js')}}"></script>

    <!-- Bootstrap -->
    <!-- <script src="{{ asset('panel/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script> -->
    <script src="{{ asset('panel/vendors/bootstrap/dist/js/bootstrap-rtl.bundle.min.js')}}"></script>


    <!-- FastClick -->
    {{-- <script src="{{ asset ('panel/vendors/fastclick/lib/fastclick.js')}}"></script>  --}}
    <script src="{{ asset ('panel/vendors/fastclick/lib/fastclick-rtl.js')}}"></script>

    <!-- NProgress -->
    <!-- <script src="{{ asset ('panel/vendors/nprogress/nprogress.js')}}"></script> -->
    <script src="{{ asset ('panel/vendors/nprogress/nprogress-rtl.js')}}"></script>

    <!-- Chart.js -->
    <!-- <script src="{{ asset ('panel/vendors/Chart.js/dist/Chart.min.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/Chart.js/dist/Chart-rtl.min.js') }}"></script>

    <!-- gauge.js -->
    <!-- <script src="{{ asset ('panel/vendors/gauge.js/dist/gauge.min.js')}}"></script> -->
    <script src="{{ asset ('panel/vendors/gauge.js/dist/gauge-rtl.min.js')}}"></script>

    <!-- bootstrap-progressbar -->
    <!-- <script src="{{ asset ('panel/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/bootstrap-progressbar/bootstrap-rtl-progressbar.min.js') }}"></script>


    <!-- iCheck -->
    <!-- <script src="{{ asset('panel/vendors/iCheck/icheck.min.js') }}"></script> -->
    <script src="{{ asset('panel/vendors/iCheck/icheck-rtl.min.js') }}"></script>

    <!-- Skycons -->
    <!-- <script src="{{ asset('panel/vendors/skycons/skycons.js') }} "></script> -->
    <script src="{{ asset('panel/vendors/skycons/skycons-rtl.js') }} "></script>

    <!-- Flot -->
    <!-- <script src="{{ asset ('panel/vendors/Flot/jquery.flot.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/Flot/jquery-rtl.flot.js') }}"></script>
    <!-- فارسی سازی نشده -->

    <!-- <script src="{{ asset ('panel/vendors/Flot/jquery.flot.pie.js')}}"></script> -->
    <script src="{{ asset ('panel/vendors/Flot/jquery-rtl.flot.pie.js')}}"></script>

    <!-- <script src="{{ asset ('panel/vendors/Flot/jquery.flot.time.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/Flot/jquery-rtl.flot.time.js') }}"></script>


    <!-- <script src="{{ asset ('panel/vendors/Flot/jquery.flot.stack.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/Flot/jquery-rtl.flot.stack.js') }}"></script>


    <!-- <script src="{{ asset ('panel/vendors/Flot/jquery.flot.resize.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/Flot/jquery-rtl.flot.resize.js') }}"></script>

    <!-- Flot plugins -->
    <!-- <script src="{{ asset ('panel/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/flot.orderbars/js/jquery-rtl.flot.orderBars.js') }}"></script>


    <!-- <script src="{{ asset ('panel/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/flot-spline/js/jquery-rtl.flot.spline.min.js') }}"></script>


    <!-- <script src="{{ asset ('panel/vendors/flot.curvedlines/curvedLines.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/flot.curvedlines/curvedLines-rtl.js') }}"></script>

    <!-- DateJS -->
    <!-- <script src="{{ asset ('panel/vendors/DateJS/build/date.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/DateJS/build/date-rtl.js') }}"></script>

    <!-- JQVMap -->
    <!-- <script src="{{ asset ('panel/vendors/jqvmap/dist/jquery.vmap.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/jqvmap/dist/jquery-rtl.vmap.js') }}"></script>

    <!-- <script src="{{ asset ('panel/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/jqvmap/dist/maps/jquery-rtl.vmap.world.js') }}"></script>


    
    <!-- <script src="{{ asset ('panel/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/jqvmap/examples/js/jquery-rtl.vmap.sampledata.js') }}"></script>

    <!-- bootstrap-daterangepicker -->
    <!-- <script src="{{ asset ('panel/vendors/moment/min/moment.min.js') }}"></script> -->
    <script src="{{ asset ('panel/vendors/moment/min/moment-rtl.min.js') }}"></script>


    <!-- <script src="{{ asset('panel/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script> -->
    <script src="{{ asset('panel/vendors/bootstrap-daterangepicker/daterangepicker-rtl.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('panel/build/js/custom.min.js') }}"></script>
    <!-- <script src="{{ asset('panel/build/js/custom-rtl.min.js') }}"></script> -->
    {{-- *******chart********** --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
    {{-- ***************** --}}
<!-- DataTables  & Plugins -->


    {{-- ****************** --}}
    <script>
       tinymce.init({
        selector: '#tiny'
      });


  var farvardin = {{ Js::from($monthonePrice) }};
  var ordibehesht = {{ Js::from($monthtwoPrice) }};
  var khordad = {{ Js::from($monththreePrice) }};
  var tir= {{ Js::from($monthtirPrice) }};
  var mordad = {{ Js::from($monthfivePrice) }};
  var shahrivar = {{ Js::from($monthsixPrice) }};

  var mehr = {{ Js::from($monthsevenPrice) }};
  var aban = {{ Js::from($montheightPrice) }};
  var azar = {{ Js::from($monthtninePrice) }};
  var daymah = {{ Js::from($monthtenPrice) }};
  var bahman = {{ Js::from($monthelevenPrice) }};
  var esfand = {{ Js::from($monthtewelvePrice) }};

 
      


    // var xValues = ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد" ,"شهریور" ,
    //                "مهر", "آبان", "آذر", "دی", "بهمن" ,"اسفند"];
    // var yValues = [farvardin, ordibehesht, khordad, tir, mordad, shahrivar,
    //                mehr, aban, azar, daymah, bahman, esfand ];
    // var barColors = ["red", "green","blue","orange","brown"];
    
    // new Chart("myChart", {
    //   type: "bar",
    //   data: {
    //     labels: xValues,
    //     datasets: [{
    //       backgroundColor: barColors,
    //       data: yValues
    //     }]
    //   },
    //   options: {
    //     legend: {display: false},
    //     title: {
    //       display: true,
    //       text: "World Wine Production 2018"
    //     }
    //   }
    // });


    var ctxB = document.getElementById("myChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
  type: 'bar',
  data: {
    labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد" ,"شهریور" ,
                   "مهر", "آبان", "آذر", "دی", "بهمن" ,"اسفند"],
    datasets: [{
      label: ' درآمد',
      data: [farvardin, ordibehesht, khordad, tir, mordad, shahrivar,
                   mehr, aban, azar, daymah, bahman, esfand ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',

        'rgba(200, 109, 142, 0.5)',
        'rgba(64, 172, 245, 0.5)',
        'rgba(245, 216, 96, 0.5)',
        'rgba(85, 202, 202, 0.5)',
        'rgba(143, 112, 245, 0.5)',
        'rgba(245, 149, 54, 0.5)',

      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',

        'rgba(256,100,133,2)',
        'rgba(55, 163, 236, 2)',
        'rgba(256, 207, 87, 2)',
        'rgba(76, 193, 193, 2)',
        'rgba(154, 102, 256, 2)',
        'rgba(254, 160, 65, 2)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
    
{{-- <script>

  //bar
  var ctxB = document.getElementById("barChart").getContext('2d');
  var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
      labels:
      ["فروردین", "اردیبهشت", "خرداد ", "تیر", "مرداد", "شهریور" ],
      
      datasets: [{
        label: '# of Votes',
        data: [60000000, 100000000, 80000000, 120000000, 100000000, 130000000],
        data:[$sale->pricefull] ,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',

        
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)' ,

        
        ],
        borderWidth: 1
      }]
    },
  
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }

    }
  });
</script> --}}

  </body>
</html>
