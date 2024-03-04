<!doctype html>
<html  dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mart - HTML5 Resoponsive onepage e-commerce template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="{{ asset('MainPanel/css/style-rtl.css') }}">

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
                                <li><a href="#"><i class="pe-7s-call"></i><span>123-123456789</span></a></li>
                                <li><a href="#"><i class="pe-7s-mail"></i><span> info@mart.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <li><a href="{{ route('register') }}"></i>ثبت نام</a></li>
                                <li><a href="{{ route('login') }}"></i>ورود</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



{{-- <div class="row mt-2"> --}}
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card" style="margin: 0 auto"> --}}
            

                {{-- <div class="card-body"> --}}
                  
                    <form style="float: right" action="{{route('Comment_insert')}}" method="POST" enctype="multipart/form-data" class="contact-form form-horizontal form-label-left" >
                        @csrf
                    <div class="row">
                            <div class=" item form-group">
                                <div class="input-group col-md-6  col-sm-6">

                                    <input type="text" class="form-control" name="posetive" id="posetive" placeholder="نکات مثبت">
                                </div>
                            </div>
                      
                            <div class="item form-group">
                                <div class="input-group col-md-6  col-sm-6" >
                                  
                                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
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
                                    <input type="submit" class="contact-submit" value="Send" />
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="product_id" id="product_id" value="{{ $id}}" placeholder="نکات منفی"">
                            </div>
                        </div>

                    </form>
                {{-- </div>
            </div> --}}
        </div>
    </div>
    </div>
{{-- </div> --}}


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="center">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
                
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


