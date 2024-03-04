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
       
        <form id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('product_Update') }}">
            @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">نام دسته اصلی  <span class="required"> </span>
                </label>
                <select style="width: 50%" name="category" class="form-control">
                    @foreach ($categories as $category )
                    @if($category->id == $product->category_id)
                    <option value= "{{ $category->id }}" selected> {{ $category->name }} </option>
                    @else
                    <option value= "{{ $category->id }}"> {{ $category->name }} </option>
                    @endif
                   
                    @endforeach
                </select>
                 {{-- <a href="{{ route('product-category' , ['id' => $category->id]) }}"> <span>نمایش</span> </a>
             --}}
            </div>

 

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام محصول <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام محصول" value="{{ $product->name }}">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">قیمت محصول<span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="price"  class="form-control " placeholder="قیمت محصول" value="{{ $product->price }}">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> تعداد <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="number"  class="form-control " placeholder="تعداد" value="{{ $product->number }}">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tiny">ویژگی ها <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="propertise" placeholder="ویژگی ها ...">{{ $product->propertise }}</textarea>
                </div>
            </div>

          
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> عکس محصول <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image" value="{{$product->image}}">
                   <br>
                    <img src="{{ asset('image/' .$product->image) }}" height="100" alt="">
                </div>
            </div>

      

              
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 ">
                    <input type="hidden" id="name" name="id"  class="form-control "  value="{{ $product->id }}">
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