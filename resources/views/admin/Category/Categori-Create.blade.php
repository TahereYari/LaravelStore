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
        <form   data-parsley-validate="" enctype="multipart/form-data" method="POST" class="contact-form form-horizontal form-label-left" novalidate="" action="{{ route('category-insert') }}">
            @csrf
            <div class="item form-group">
            
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام دسته <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام دسته">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">توضیحات <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea style="text-align: right" class="form-control" rows="3" id="tiny" name="description" placeholder="توضیحات ..."></textarea>
                </div>
            </div>
              
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> انتخاب عکس براساس نوع دسته بندی  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image" multiple>
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