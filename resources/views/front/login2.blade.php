@extends('layout.home')
@section('content')


<div class="x_panel">

    <div class="x_content">
        <br>
      
        <form  id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('product-insert') }}">
            
            @csrf

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام محصول <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام محصول">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">قیمت محصول<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="price"  class="form-control " placeholder="قیمت محصول">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> تعداد <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="number"  class="form-control " placeholder="تعداد">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ویژگی ها <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="propertise" placeholder="ویژگی ها ..."></textarea>
                </div>
            </div>

          
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> عکس محصول <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image">
                </div>
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

@endsection