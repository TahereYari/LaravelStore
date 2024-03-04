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
        <form id="demo-form2" data-parsley-validate="" enctype="multipart/form-data" method="POST" class="form-horizontal form-label-left" novalidate="" action="{{ route('category-update') }}">
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام دسته" value="{{  $category->name   }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name" ><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="description" placeholder="توضیحات ...">{{  $category->description  }}</textarea>
                </div>
            </div>
            <div class="item form-group">
               
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" id="name" name="id"  class="form-control " placeholder="نام دسته" value="{{ $category->id }}">
                </div>
            </div>
        
        
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">انصراف</button>
                    <button class="btn btn-primary" type="reset">پاک کردن</button>
                    <button type="submit" class="btn btn-success">ویرایش</button>
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