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
      
        <form  id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('product-insert') }}">
            
            @csrf
          
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">نام دسته اصلی  <span class="required">  </span>
                    </label>
                    <select name="category" style="width: 50%" class="form-control" id="name">
                        @foreach ($categories as $category )
                        <option value= "{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select> 
              
                </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام محصول <span class="required">  </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  class="form-control " placeholder="نام محصول">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">قیمت محصول<span class="required">  </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="price"  class="form-control "  onkeyup="javascript:this.value=separate(this.value);" placeholder="قیمت محصول">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> تعداد <span class="required">  </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="name" name="number"  class="form-control " placeholder="تعداد">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ویژگی ها <span class="required"> </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" rows="3" id="tiny" name="propertise" placeholder="ویژگی ها ..."></textarea>
                </div>
            </div>

          
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> عکس محصول <span class="required">  </span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image" multiple>
                </div>
            </div>


              
        
        
        
            <div class="ln_solid"></div>
            
            <div class="item form-group" style="margin-right: 20% ">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <a class="btn btn-primary" href="{{ route('products_list') }}"> انصراف</a>
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