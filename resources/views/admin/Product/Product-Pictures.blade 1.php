@extends('layout.admin')
@section('content')

<div class="x_panel">
    <div class="card-body bg-primary text-white mailbox-widget pb-0">
        <h2 class="text-white pb-3"></h2>
        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
        </ul>
      </div>
    <div class="x_content">
        <br>
       
        <form id="demo-form2"  class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('product-pictures')}}">
            @csrf
      
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >عکس  1<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image1" />
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >عکس 2<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image2" />
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" > عکس 3<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image3" />
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >عکس 4<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image4" />
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >عکس 5<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image5" />
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >عکس 6<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image6" />
                </div>
            </div>
            
    
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">عکس 7<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image7" />
                </div>
            </div>

            <div class="item form-group">
           
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" class="form-control" name="product_id" value="{{ $id }}" />
                </div>
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

        {{-- <form id="demo-form2"  class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('product-images')}}">
            @csrf
     
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> سایر عکس ها  <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="otherimage" multiple >
                </div>
                <li class="list-inline-item text-info mr-3">
                    <a href="#">
                        <button type="submit" class="btn btn-circle btn-success text-white" >
                            <i class="fa fa-plus"></i>
                        </button>
                        <span class="ml-2 font-normal text-dark">افزودن</span>
                    </a>
                </li>
            </div>

            <div class="item form-group">
    
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" class="form-control" name="product_id" value="{{ $id }}" />   </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">انصراف</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">ثبت</button>
                </div>
            </div>

        </form> --}}
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