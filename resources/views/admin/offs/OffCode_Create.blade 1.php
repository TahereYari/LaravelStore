
<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

  

    <title>{{ $store->name }}</title>

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
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>خوش آمدید</span>
                <h2>@if(Auth::user())
                  {{ Auth::user()->name }}
                @endif</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               
                <ul class="nav side-menu">
                  <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> صفحه اصلی </a></li>
             
             
                  <li><a><i class="fa fa-desktop"></i> دسته ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('category-List') }} ">دسته اصلی</a></li>
                      <li><a href="{{ route('subcategory-List') }}">زیر دسته</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> محصولات<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('products_list') }}">لیست محصولات</a></li>
                      {{-- <li><a href="{{ route('subcategory-List') }}"</a></li> --}}
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> تخفیفات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('off_list') }}">لیست تخفیفات</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>کاربران <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">لیست کاربران</a></li>
                      <li><a href="{{ route('comment_list') }}">نظرات کاربران</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>فاکتورها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('Invoice_list') }}">لیست فاکتورها </a></li>
                    </ul>
                  </li>
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
              {{-- <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="true">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right show" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-90px, 21px, 0px);">
                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                      <a class="dropdown-item" href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul> --}}
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

    <div class="right_col" role="main" style="min-height: 1483px;" >
<div class="x_panel">
  <div class="card-body bg-primary text-white mailbox-widget pb-0">
    <h2 class="text-white pb-3"></h2>
    <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
    </ul>
  </div>
    <div class="x_content">
        <br>
        <form   data-parsley-validate="" enctype="multipart/form-data" method="POST" class="contact-form form-horizontal form-label-left" novalidate="" action="{{ route('offcode-insert') }}">
            @csrf

            
            <div class="item form-group">
            
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="offcode"> کد تخفیف 
                </label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" id="offcode" name="offcode"  class="form-control " placeholder=" کد تخفیف">
                </div>

            </div>


            <div class="item form-group">
            
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="offprice"> میزان تخفیف 
                </label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" id="offprice" name="offprice"  class="form-control " placeholder=" میزان تخفیف">
                </div>
                <span class="required">تومان</span>
              
            </div>

       
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">  از تاریخ  
              </label>
              <input type="text" placeholder="YYYY/MM/DD" id="pdpF1" pdp-id="pdp-1780498" name="startdate" class="pdp-el">

              <label class="ml-5" > 
                 تا تاریخ  
              </label>
              <input type="text" placeholder="YYYY/MM/DD" id="pdpF4" pdp-id="pdp-1780498" name="enddate" class="pdp-el ml-3">
          </div>

           

         
        
        
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">انصراف</button>
                    <button class="btn btn-primary" type="reset">پاک کردن</button>
                    <button type="submit" class="btn btn-success">ثبت</button>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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

<script src="{{ asset('panel/build/js/jquery-1.10.1.min.js') }}"></script>
<script src="{{ asset('panel/build/js/persianDatepicker.js') }}"></script>
<script src="{{ asset('panel/build/js/prism.js') }}"></script>

<script>
  $(function () {
    
    $(".usage").persianDatepicker();

    $("#pdpSmall").persianDatepicker({ cellWidth: 14, cellHeight: 12, fontSize: 8 });
    $("#pdpBig").persianDatepicker({ cellWidth: 78, cellHeight: 60, fontSize: 18 });

    //formatting
    $("#pdpF1").persianDatepicker({ formatDate: "YYYY-MM-DD 0h:0m:0s" });
    $("#pdpF4").persianDatepicker({ formatDate: "YYYY-MM-DD 0h:0m:0s" });
    // $("#pdpF4").persianDatepicker({ formatDate: "YYYY/MM/DD 0h:0m:0s" });
    $("#pdpF2").persianDatepicker({ formatDate: "YYYY-0M-0D" });
    $("#pdpF3").persianDatepicker({ formatDate: "YYYY-NM-DW|ND", isRTL: !0 });

    //startDate & endDate
    $("#pdpStartEnd").persianDatepicker({ startDate: "1394/11/12", endDate: "1395/5/5" });
    $("#pdpStartToday").persianDatepicker({ startDate: "today", endDate: "1410/11/5" });
    $("#pdpEndToday").persianDatepicker({ startDate: "1397/11/12", endDate: "today" });

    //selectedBefor & selectedDate
    $("#pdpSelectedDate").persianDatepicker({ selectedDate: "1404/1/1", alwaysShow: !0 });
    $("#pdpSelectedBefore").persianDatepicker({ selectedBefore: !0 });
    $("#pdpSelectedBoth").persianDatepicker({ selectedBefore: !0, selectedDate: "1395/5/5" });

    $("#pdp-data-jdate").persianDatepicker({
        onSelect: function () {
            alert($("#pdp-data-jdate").attr("data-gdate"));
        }
    });
    $("#pdp-data-gdate").persianDatepicker({
        showGregorianDate: true,
        onSelect: function () {
            alert($("#pdp-data-gdate").attr("data-jdate"));
        }
    });

    $("#pdpGregorian").persianDatepicker({ showGregorianDate: true });

    var p = new persianDate();
    $("#pdpStartDateTomarrow").persianDatepicker({ startDate: p.now().addDay(1).toString("YYYY/MM/DD"), endDate: p.now().addDay(4).toString("YYYY/MM/DD") });
  });




  $("jQuerySelectQuery").persianDatepicker({
    months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
    dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
    shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
    showGregorianDate: !1,
    persianNumbers: !0,
    formatDate: "YYYY/MM/DD",
    selectedBefore: !1,
    selectedDate: null,
    startDate: null,
    endDate: null,
    prevArrow: '\u25c4',
    nextArrow: '\u25ba',
    theme: 'default',
    alwaysShow: !1,
    selectableYears: null,
    selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    cellWidth: 25, // by px
    cellHeight: 20, // by px
    fontSize: 13, // by px
    isRTL: !1,
    calendarPosition: {
        x: 0,
        y: 0,
    },
    onShow: function () {},
    onHide: function () {},
    onSelect: function () {},
    onRender: function () {}
 });

        
</script>

