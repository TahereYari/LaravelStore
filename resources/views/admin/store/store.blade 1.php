
@extends('layout.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-primary text-white mailbox-widget pb-0">
                    <h2 class="text-white pb-3"></h2>
                    <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                    
                        <li class="nav-item">
                            <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#sent" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-export"></i></span>
                                <span class="d-none d-md-block"></span>
                            </a>
                        </li>
                     
                       
                    </ul>
                </div>
                    <div class="table-responsive">
                        <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                            <tbody>
                                <!-- row -->
                                <thead>
                                    <th colspan="2" class="pl-3" style="align-content: center"><span> اطلاعات فروشگاه</span></th>
                                </thead>
                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span>نام فروشگاه</span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->name }}</span>
                                    </td>
                                </tr>  

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> شماره تلفن</span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->tel }}</span>
                                    </td>
                                </tr> 

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> ایمیل </span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->email }}</span>
                                    </td>
                                </tr> 

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> آدرس اینستاگرام</span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->instagram }}</span>
                                    </td>
                                </tr> 

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span>آدرس تلگرام</span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->telegram }}</span>
                                    </td>
                                </tr> 

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> آدرس فروشگاه </span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $store->address }}</span>
                                    </td>
                                </tr> 

                                {{-- <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> توضیحات </span>
                                    </td>
                                    <td class="pl-3">
                                        <span>{{ $stor->describe }}</span>
                                    </td>
                                </tr>  --}}

                                <tr>
                                    <!-- label -->
                                    <td class="pl-3">
                                            <span> تصویر </span>
                                    </td>
                                    <td class="pl-3">
                                        <span><img src="{{ asset('image/'.$store->image)}}" width="50" height="50"></span>
                                    </td>
                                </tr> 

            
                         
                              
                                
                                
                            

                                    {{-- <td>
                                        <li class="list-inline-item text-danger">
                                            <a href="{{ route('Invoice_product' ,['id' => $sends->id]) }}">
                                                <i class="fa fa-eye" style="font-size:36px"></i>
                                            </a>
                                        </li>
                                    </td> --}}
                                
                                    
                                {{-- </tr> --}}
                                
                            <tr>

                            </tr>
                            @if($storecount=0)
                            <td colspan="2">
                                <a href="{{ route('store-create') }}" class="btn btn-round btn-primary">افزودن اطلاعات فروشگاه</a>
                            </td>
                            @else
                            <td colspan="2">
                                <a href="{{ route('store-edit' ,['id' => $store->id]) }}" class="btn btn-round btn-primary">ویرایش اطلاعات فروشگاه</a>
                            </td>
                            @endif
                             
                            </tbody>
                        </table>
                        
                    </div>
                  
            </div>
        </div>
    </div>
</div>

<style>
    body{
    background: #edf1f5;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.mailbox-widget .custom-tab .nav-item .nav-link {
    border: 0;
    color: #fff;
    border-bottom: 3px solid transparent;
}
.mailbox-widget .custom-tab .nav-item .nav-link.active {
    background: 0 0;
    color: #fff;
    border-bottom: 3px solid #2cd07e;
}
.no-wrap td, .no-wrap th {
    white-space: nowrap;
}
.table td, .table th {
    padding: .9375rem .4rem;
    vertical-align: top;
    border-top: 1px solid rgba(120,130,140,.13);
}
.font-light {
    font-weight: 300;
}
</style>


  @endsection
