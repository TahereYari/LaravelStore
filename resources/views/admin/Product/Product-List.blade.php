
@extends('layout.admin')
@section('content')

<div class="col-md-12 col-sm-12 ">
{{-- //****************************************************** --}}
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
{{-- //****************************************************** --}}

  @if(Session::get('deletedone'))

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
    {{ Session::get('deletedone')}}
    </div>
  </div>
  @endif
{{-- //****************************************************** --}}

@if(Session::get('editdone'))

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
  {{ Session::get('editdone')}}
  </div>
</div>
@endif
{{-- //****************************************************** --}}
  
  <div class="x_panel">
    
      <div class="card-body bg-primary text-white mailbox-widget pb-0">
        <h2 class="text-white pb-3"></h2>
        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
        </ul>
      </div>
    <div class="row" style="margin: 3%">
      <a href="{{ route('product-create') }}" class="btn btn-round btn-primary">افزودن محصول جدید</a>
    </div>
  
    <div class="table-responsive">
      <table id="datatable-buttons" class="table email-table no-wrap table-hover v-middle mb-0 font-14" style="width: 100%;"  aria-describedby="datatable-buttons_info">
          <thead>
            <tr role="row">
          
              <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="Name: activate to sort column descending"> نام محصول</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">نوع دسته</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">عکس</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">تعداد</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">قیمت</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">ویرایش</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">حذف</th>
          </thead>


          <tbody>
            
            
          
            @foreach ($products as $product )

            <tr role="row" class="odd">
              <td tabindex="0" class="sorting_1">{{ $product->name }}</td>
              <td tabindex="0" class="sorting_1">{{ $product->category()->name }}</td>
              <td tabindex="0" class="sorting_1"><img src="{{ asset('image/'. $product->image)  }}" width="100" height="50" alt=""></td>
              <td tabindex="0" class="sorting_1">{{ $product->number }}</td>
              <td tabindex="0" class="sorting_1">{{ number_format($product->price) }}</td>
              
              <td tabindex="0" class="sorting_1">
               <li class="list-inline-item text-info mr-3">
                    <a href="{{ route('product_edit' ,['id' => $product->id]) }}">
                            <i class="fa fa-edit" style="font-size:26px;color:rgb(57, 190, 16)"></i>
                       
                        {{-- <span class="ml-2 font-normal text-dark">افزودن</span> --}}
                    </a> 
                </li> 
             </td>
              <td tabindex="0" class="sorting_1">
                <li class="list-inline-item text-info mr-3">
                  <a href="{{ route('product_delete' ,['id' => $product->id]) }}">
                          <i class="fa fa-trash" style="font-size:26px;color:rgb(207, 94, 19)"></i>
                     
                      {{-- <span class="ml-2 font-normal text-dark">افزودن</span> --}}
                  </a> 
              </li> 
              </td>
            </tr>

            @endforeach
       
   
            </tbody>
        </table>
    </div> 
        <div class="row mt-3" style="margin-right: 50% ">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>

  @endsection