@extends('layout.admin')
@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Form Design <small>different form elements</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                    <li><a class="dropdown-item" href="#">Settings 1</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
      
        <form  id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('store-insert') }}">
            
            @csrf


            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">نام فروشگاه <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام فروشگاه" value="{{ $store->name }}">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone"> تلفن<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="phone" name="phone"  class="form-control " value="{{ $store->tel }}"  onkeyup="javascript:this.value=separate(this.value);" placeholder="تلفن">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email"> ایمیل <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="name" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $store->email }}" placeholder="ایمیل" name="email"  required autocomplete="email">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="insta"> آدرس اینستاگرام<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  name="instagram"  class="form-control " value="{{ $store->instagram }}" placeholder=" آدرس اینستاگرام">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> آدرس تلگرام <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="telgram"  class="form-control " placeholder=" آدرس تلگرام " value="{{ $store->telegram }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> آدرس فروشگاه <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="address"  class="form-control " placeholder=" آدرس فروشگاه " value="{{ $store->address }}" >
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tiny"> توضیحات <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="describe" placeholder=" توضیحات..." >{{ $store->describe }}</textarea>
                </div>
            </div>

          
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">عکسی برای فروشگاه انتخاب کنید<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image" multiple value="{{ $store->image }}">
                </div>
            </div>
            <input type="hidden" name="id"  class="form-control " value="{{ $store->id }}">
                
        
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

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@endsection
<script>
    function visibleform()
    {
        document.getElementById("demo-form2").style.visibility = "visible";
    }
</script>