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
      
        <form  id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('Access_insert') }}">
            
            @csrf
        
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">نام گروه دسترسی <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input  type="text" id="name" name="name"  class="form-control " placeholder="نام گروه دسترسی">
                </div>
            </div>

            
            <div class="item form-group">
                <div class="form-check mb-3 "style="margin-right: 8rem">
                    <label class="form-check-label col-md-3 col-sm-3 label-align " for="create"><span class="pl-2">افزودن</span>
                    </label>
                    {{-- <input type="checkbox" class="form-check-input pl-1" name="access"  id= "{{$permission->id }}" value= "{{$permission->id }}">  --}}
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="create"  name="create" value=1>
                        <label class="custom-control-label" for="create">&nbsp;</label>
                    </div>
               </div>
            </div>

            <div class="item form-group">
                <div class="form-check mb-3"  style="margin-right: 8rem">
                    <label class="form-check-label col-md-3 col-sm-3 label-align " for="read"><span class="pl-2">نمایش</span>
                    </label>
                    {{-- <input type="checkbox" class="form-check-input pl-1" name="access"  id= "{{$permission->id }}" value= "{{$permission->id }}">  --}}
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="read"  name="read" value=1>
                        <label class="custom-control-label" for="read">&nbsp;</label>
                    </div>
               </div>
            </div>

            <div class="item form-group">
                <div class="form-check mb-3"  style="margin-right: 8rem">
                    <label class="form-check-label col-md-3 col-sm-3 label-align " for="edit"><span class="pl-2">ویرایش</span>
                    </label>
                    {{-- <input type="checkbox" class="form-check-input pl-1" name="access"  id= "{{$permission->id }}" value= "{{$permission->id }}">  --}}
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="edit"  name="edit" value=1>
                        <label class="custom-control-label" for="edit">&nbsp;</label>
                    </div>
               </div>
            </div>

            <div class="item form-group">
                <div class="form-check mb-3" style="margin-right: 8rem">
                    <label class="form-check-label col-md-3 col-sm-3 label-align " for="delete"><span class="pl-2">حذف</span>
                    </label>
                    {{-- <input type="checkbox" class="form-check-input pl-1" name="access"  id= "{{$permission->id }}" value= "{{$permission->id }}">  --}}
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="delete"  name="delete" value=1>
                        <label class="custom-control-label" for="delete">&nbsp;</label>
                    </div>
               </div>
            </div>


            <div class="ln_solid"></div>
            <div class="item form-group" style="margin-right: 20% ">
                <div class="col-md-6 col-sm-6 offset-md-3" >
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