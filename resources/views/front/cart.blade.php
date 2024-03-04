@php
  use App\Models\Product;
  use App\Models\basket;
@endphp

@extends('layout.home')
@section('content')

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">سبد خرید</h3>
            {{-- <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                    class="fas fa-angle-down mt-1"></i></a></p>
            </div> --}}
          </div>
          @php
            $bsketcheck= basket::where('user_id' ,'=' ,Auth::user()->id)
            ->where('is_pay' ,'=' ,0)->orderByDesc('created_at')->first();
         
          @endphp
          @if($bsketcheck)
          
           @foreach ($basketproducts as $basketproduct)
            @php
             $product= product::where('id','=',$basketproduct->product_id)->first();
           @endphp
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
               <ul>
               

             
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                    src="{{ asset('image/'. $product->image) }}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt" width="100" height="100">
                </div>
           
                <div class="col-md-3 col-lg-3 col-xl-3">
              
                  <p class="lead fw-normal mb-2">{{ $product->name }}</p>
                  {{-- <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p> --}}
                     
                  <p> <span class="text-muted">قیمت نهایی:</span> <span class="text-muted">{{ number_format($basketproduct->pricefull) }} </span></p>
                   
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                <a href="{{ route('stepUp',['basket_id'=>$basket->id  ,'basketproduct_id'=>$basketproduct->id]) }}">
                 
                  <button class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    {{-- <i class="fas fa-plus "></i> --}}
                    <img src="{{ asset('image/plus.png') }}" alt="" width="20" height="20">
                  </button>
                  </a>

                  <input id="form1" min="0" name="quantity" value="{{ $basketproduct->count }}" type="text" disabled style="background: white"
                    class="form-control form-control-sm" />
                 
                    <a href={{ route('stepDown',['basket_id'=>$basket->id  ,'basketproduct_id'=>$basketproduct->id]) }}">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        {{-- <i class="fas fa-minus"></i> --}}
                        <img src="{{ asset('image/minus1.png') }}" alt="" width="20" height="20">
                      </button>
                    </a>
                 
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">قیمت در تخفیف : {{number_format ($basketproduct->offprice) }}</h5>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">قیمت : {{number_format ($product->price) }}</h5>
                </div>

                
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="{{ route('deleteitem_Basket',['basket_id'=>$basket->id  ,'basketproduct_id'=>$basketproduct->id]) }}" class="text-danger">
                    {{-- <i class="fas fa-trash fa-lg"></i> --}}
                    <img src="../image/trash.png" alt="" width="25" height="25">
                  </a>
                </div>
             
            </ul>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>

        <div class="card mb-4">
            
        

          <div class="card mb-4">
         
              
          
            <div class="card-body p-4 d-flex flex-row">
              <form action="{{ route('add_discount',['id'=>$basket->id]) }}" method="GET">
                <div class="form-outline flex-fill">
                  <label class="form-label" for="form1">کد تخفیف</label>
                  <input type="text" id="form1" class="form-control form-control-lg"  name="discount"/>
                 
                </div>
                <button type="submit" class ="btn btn-outline-warning btn-lg ms-3">اعمال کردن کد تخفیف</button>
             {{-- ***********************پیغام کد تخفیف  ******************* --}}
                @if(Session::get('done'))
                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
                
                  <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                    {{ Session::get('done')}}
                    </div>
                  </div>
                @endif
              {{-- ************************************************************************ --}}
              </form>
            </div>
          </div>
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
               <label class="form-label"><h2> <span>قیمت کل : </span>  <span> {{number_format( $basket->price) }} </span> </h2> </label>
         </div>
       </div>
  
          <div class="card">
            <div class="card-body">
             <a href="{{ route('adddress_user') }}">
              <button type="button" class="btn btn-warning btn-block btn-lg">تکمیل فرآیند خرید</button>
            </a> 
            </div>
          </div>
         
        </div>
        @endif
      </div>
    </div>
  </section>

@endsection