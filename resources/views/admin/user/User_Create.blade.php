@extends('layout.admin')

@section('content')


{{-- ************************************************************** --}}


<div class="x_panel">
    <div class="card-body bg-primary text-white mailbox-widget pb-0">
        <h2 class="text-white pb-3"></h2>
        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
        </ul>
      </div>
    <div class="x_content">
        <br>
      
        <form style="margin-right: 20%" id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('register')}}">
            
            @csrf
          
        
            <div class="row">
                <div class="col-md-12 item form-group">
                    <div class="input-group col-md-6  col-sm-6">


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="نام کاربری" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
          
                <div class="col-md-12 item form-group">
                    <div class="input-group col-md-6  col-sm-6" >
                        <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" placeholder="شماره تلفن" value="{{ old('tel') }}" required autocomplete="tel" autofocus >

                        @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
      
             
        </div>   
        <div class="row">
                <div class="col-md-12 item form-group">
                    <div class="input-group col-md-6  col-sm-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="col-md-12 item form-group">
                    <div class="input-group col-md-6  col-sm-6">
                        <select name="role" class="form-control" >
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                      
                            @endforeach
                        </select>
                   
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-12  item form-group">
                <div class="input-group col-md-6  col-sm-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="رمز عبور" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 item form-group">
                <div class="input-group col-md-6  col-sm-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تکرار رمز عبور" required autocomplete="new-password">
                </div>
            </div>
            <div class="col-md-12  item form-group">
                {{-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="image"> تصویر کاربر<span class="required">*</span>
                </label> --}}
                <div class="input-group col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" id="image" name="image" multiple>
                </div>
            </div> 
        </div>
        {{-- <div class="row">
            <div class="col-md-12 item form-group">
                    <div class="input-group">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
             </div>
        </div> --}}
              
        
        
           
                <div class="ln_solid"></div>
                <div class="item form-group" style="margin-left: 10% ">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a class="btn btn-primary" href="{{ route('user_list') }}"> انصراف</a>
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