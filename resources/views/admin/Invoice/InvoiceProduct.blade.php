@php
    use App\Models\basket;
    use App\Models\Product;
@endphp
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
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block"> </span>
                            </a>
                        </li>

                     
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                                <div class="col-sm-12 col-md-6">
                                    <h4 class="font-light mb-0"><i class="ti-email mr-2"></i> لیست فاکتورها </h4>
                                </div>
                             
                            </div>
                            <!-- Mail list-->
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <!-- row -->
                                        <thead>
                                            <th class="pl-3" style="align-content: center"><span> نام محصول</span></th>
                                            <th class="pl-3" style="align-content: center"><span> عکس محصول</span></th>
                                            <th  class="pl-3" style="align-content: center"><span>تعداد</span></th>
                                            <th  class="pl-3" style="align-content: center"><span>  قیمت هرعدد </span></th>
                                            <th  class="pl-3" style="align-content: center"><span> میزان تخفیف</span></th>
                                            <th  class="pl-3" style="align-content: center"><span>قیمت * تعداد</span></th>
                                            <th  class="pl-3" style="align-content: center"><span> قیمت نهایی </span></th>

                                        </thead>
                                        @foreach ($basketproducts as $detail)
                                        <tr>
                                            <!-- label -->
                                            @php
                                                $product= product::where('id' ,'=' ,$detail->product_id )->first();
                                            @endphp
                                            <td class="pl-3">
                                                   <span>{{  $product->name }}</span>
                                            </td>
                                            <td class="pl-3">
                                               <img src="{{ asset('image/'. $product->image)  }}" width="100" height="50" alt="">
                                             </td>
                                            <!-- star -->
                                            <td>
                                                <span class="mb-0 text-muted"> {{ $detail->count}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ number_format($detail->price)}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ number_format($detail->offprice)}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ number_format($detail->pricefull)}}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-muted"> {{ number_format($detail->pricefull)}}</span>
                                            </td>
                                           
                                            {{-- <td>
                                                <li class="list-inline-item text-danger">
                                                    <a href="#">
                                                        <span class="ml-2 font-normal text-dark">نمایش</span>
                                                    </a>
                                                </li>
                                            </td> --}}
                                           
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>قیمت کل</td>
                                            <td>{{ number_format($basket->price  + $basket->offcode) }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>  میزان تخفیف  نهایی</td>
                                            <td>{{ $basket->offcode }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>قیمت قابل پرداخت </td>
                                            <td> {{ number_format($basket->price)  }}</td>
                                        </tr>

                                        <tr >
                                            <td>آدرس </td>
                                            <td colspan="6" ><p style="text-overflow: clip"> {{ $basket->Address()->address }} </p></td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="sent" aria-labelledby="sent-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Lets check profile</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="spam" aria-labelledby="spam-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Come on you have a lot message</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delete" aria-labelledby="delete-tab" role="tabpanel">
                        <div class="row p-3 text-dark">
                            <div class="col-md-6">
                                <h3 class="font-light">Just do Settings</h3>
                                <h4 class="font-light">you can use it with the small code</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
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
