
@extends('layout.admin')
@section('content')
@php
use Hekmatinasser\Verta\Facades\Verta;

@endphp
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
    
      <div class="card-body bg-primary text-white mailbox-widget pb-0">
        <h2 class="text-white pb-3"></h2>
        <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
        </ul>
      </div>
          <div class="row" style="margin: 3%">
            <a href="{{ route('offcode_create') }}" class="btn btn-round btn-primary">افزودن  تخفیف</a>
          </div>
     <div class="table-responsive">   
      <table id="datatable-buttons" class="table email-table no-wrap table-hover v-middle mb-0 font-14" style="width: 100%;"  aria-describedby="datatable-buttons_info">
          <thead>
            <tr role="row">
          
              <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">کدتخفیف</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending"> میزان تخفیف (تومان)</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">تاریخ  شروع تخفیف</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">تاریخ  پایان تخفیف</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">ویرایش</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">حذف</th>
          </thead>


          <tbody>
            
            
          
            @foreach ($offCodes as $offCode )
              
          
            <tr role="row" class="odd">
           
                <td tabindex="0" class="sorting_1">{{ $offCode->code }}</td>
                <td>{{number_format($offCode->price)  }}</td>
          
                   <td>{{ Verta($offCode->startdate )}}</td>
                   <td>{{ Verta($offCode->enddate) }}</td>
             
                <td>
                  <li class="list-inline-item text-info mr-3">
                    <a href="#">
                            <i class="fa fa-edit" style="font-size:26px;color:rgb(57, 190, 16)"></i>
                       
                        {{-- <span class="ml-2 font-normal text-dark">افزودن</span> --}}
                    </a> 
                </li> 
                </td>
                <td>
                  <li class="list-inline-item text-info mr-3">
                    <a href="#">
                            <i class="fa fa-trash" style="font-size:26px;color:rgb(207, 94, 19)"></i>
                    </a> 
                 </li> 
                </td>
            </tr>
         
            @endforeach
         
       
   
            </tbody>
        </table>
     </div> 
        <div class="row mt-3" style="margin-right: 50% ">
          {{ $offCodes->links() }}
        </div>
         
       
      </div>
    </div>
  </div>
</div>
    </div>
  </div>

  @endsection