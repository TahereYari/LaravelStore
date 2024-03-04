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
        <form id="demo-form2" data-parsley-validate="" enctype="multipart/form-data" method="POST" class="form-horizontal form-label-left" novalidate="" action="{{ route('subcategory-insert') }}">
            @csrf
            <div class="item form-group">
            
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام دسته <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="subname"  class="form-control " placeholder="نام دسته">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">توضیحات <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="subdescription" placeholder="توضیحات ..."></textarea>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">دسته اصلی <span class="required">*</span>
                </label>
                <select name="category" class="form-control">
                    @foreach ($categories as $category )
                    <option value= "{{ $category -> id }}">{{ $category -> name }} </option>
                    @endforeach
                </select>
            </div>
         
        
        
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="button">انصراف</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
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