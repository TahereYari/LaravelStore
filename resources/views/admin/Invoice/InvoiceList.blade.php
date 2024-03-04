
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
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block"> ارسال نشده ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#sent" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-export"></i></span>
                                <span class="d-none d-md-block">ارسال شده ها</span>
                            </a>
                        </li>
                     
                       
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <h4 class="font-light mb-0"><i class="ti-email mr-2"></i> لیست فاکتورهای ارسال نشده</h4>
                                </div>
                              
                            </div>
                           
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <!-- row -->
                                        <thead>
                                            <th class="pl-3" style="align-content: center"><span> نام کاربر</span></th>
                                            <th class="pl-3" style="align-content: center"><span> شماره فاکتور </span></th>
                                            <th  class="pl-3" style="align-content: center"><span>تاریخ خرید</span></th>
                                            <th  class="pl-3" style="align-content: center"><span> میزان خرید </span></th>
                                            <th  class="pl-3" style="align-content: center"><span> نمایش</span></th>
                                            <th  class="pl-3" style="align-content: center"><span> ارسال</span></th>

                                        </thead>
                                        @foreach ($baskets as $basket)
                                        <tr>
                                            <!-- label -->
                                            <td class="pl-3">
                                                   <span>{{ $basket->user()->name }}</span>
                                             </td>
                                             <td class="pl-3">
                                                <span>{{ $basket->InvoiceNumber }}</span>
                                          </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ verta($basket->created_at)}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{number_format( $basket->price)}}</span>
                                            </td>
                                           
                                            <td>
                                                <li class="list-inline-item text-danger">
                                                    <a href="{{ route('Invoice_product' ,['id' => $basket->id]) }}">
                                                        <i class="fa fa-eye" style="font-size:36px"></i>
                                                    </a>
                                                </li>
                                            </td>
                                     
                                            <td>
                                                <li class="list-inline-item text-danger">
                                                    <a href="{{ route('Invoice_Send' ,['id' => $basket->id]) }}">
                                                        <i class="fa fa-check" style="font-size:36px;color:rgb(13, 133, 13)"></i>
                                                    
                                                    </a>
                                                </li>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                 
                                    
                                  
                                 
                                     
                                     
                                    </tbody>
                                </table>
                               
                            </div>
                            <div class=" row p-4">
                                {{ $baskets->links() }}

                              </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sent" aria-labelledby="sent-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <h4 class="font-light mb-0"><i class="ti-email mr-2"></i> لیست فاکتورهای ارسال شده</h4>
                                </div>
                              
                            </div>
                           
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <!-- row -->
                                        <thead>
                                            <th class="pl-3" style="align-content: center"><span> نام کاربر</span></th>
                                            <th class="pl-3" style="align-content: center"><span> شماره فاکتور</span></th>
                                            <th  class="pl-3" style="align-content: center"><span>تاریخ خرید</span></th>
                                            <th  class="pl-3" style="align-content: center"><span> میزان خرید </span></th>
                                            <th  class="pl-3" style="align-content: center"><span> تاریخ ارسال</span></th>
                                            <th  class="pl-3" style="align-content: center"><span> نمایش</span></th>

                                        </thead>
                                        @foreach ( $basketssends as $sends)
                                        <tr>
                                            <!-- label -->
                                            <td class="pl-3">
                                                   <span>{{ $sends->user()->name }}</span>
                                            </td>
                                            
                                            <td class="pl-3">
                                                <span>{{ $sends->InvoiceNumber }}</span>
                                         </td>
                                            
                                            <td>
                                                <span class="mb-0 text-muted"> {{ verta($sends->created_at)}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ number_format($sends->price)}}</span>
                                            </td>
                                           
                                            <td>
                                                <li class="list-inline-item text-danger">
                                                    <span class="mb-0 text-muted"> {{ verta($sends->updated_at)}}</span>
                                                </li>
                                            </td>

                                            <td>
                                                <li class="list-inline-item text-danger">
                                                    <a href="{{ route('Invoice_product' ,['id' => $sends->id]) }}">
                                                        <i class="fa fa-eye" style="font-size:36px"></i>
                                                    </a>
                                                </li>
                                            </td>
                                     
                                           
                                        </tr>
                                        @endforeach
                                    
                                     
                                    </tbody>
                                </table>
                               
                            </div>
                            <div class=" row p-4">
                                {{  $basketssends->links() }}

                              </div>
                        </div>
                    </div>
                 
                  
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
