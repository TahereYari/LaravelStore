<!doctype html>
<html  dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>فروشگاه گل رز</title>
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


<section class="new-section" >



<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>
    
                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}
    
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
<section class="new-section"></section>

{{-- <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                
            </div>
        </div>
    </div>
</footer> --}}

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


