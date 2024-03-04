@extends('layout.home')
@section('content')

<section class="new-section">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card" style="margin: 0 auto"> --}}
            

                {{-- <div class="card-body"> --}}
                  
                    <form style="float: right"   action="{{ route('userSite_edit') }}" method="POST" enctype="multipart/form-data" class="contact-form form-horizontal form-label-left" >
                        @csrf
                    <div class="row">
                            <div class="col-md-12 item form-group">
                                <div class="input-group col-md-6  col-sm-6">


                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="نام کاربری" value="{{Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                      
                            <div class="col-md-12 item form-group">
                                <div class="input-group col-md-6  col-sm-6" >
                                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" placeholder="شماره تلفن" value="{{Auth::user()->tel }}" required autocomplete="tel" autofocus >

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ایمیل" name="email" value="{{Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12  item form-group">
                                <div class="input-group col-md-6  col-sm-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{ __('Current Password') }}" required autocomplete="new-password">

                                    @error('password')
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ __('Current Password') }}" required autocomplete="new-password">
                              </div>
                            </div>
                            <div class="col-md-12  item form-group">
                                {{-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="image"> تصویر کاربر<span class="required">*</span>
                                </label> --}}
                                <div class="input-group col-md-6 col-sm-6 ">
                                    <input type="file" class="form-control" id="image" name="image" multiple>
                                </div>
                              
                            </div>
                            <div class="col-md-12  item form-group">
                             
                                <img  width="100" height="100" src="{{ asset('image/'. Auth::user()->image)  }}" alt="">
                              
                            </div>
                
                            <div class="col-md-12 item form-group">
                                <div class="input-group">
                                    {{-- <input type="submit" class="contact-submit" value="Send" /> --}}
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{-- {{ __('Register') }} --}}
                                            ثبت
                                        </button>
                                    </div>
                                </div>

                            
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id }}"  >
                          
                            </div>
                        </div>
                    </div>
                    </form>
                {{-- </div>
            </div> --}}
        </div>
    </div>
    </div>
</section>

@endsection