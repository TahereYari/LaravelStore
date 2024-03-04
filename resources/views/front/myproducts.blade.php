@php
    use App\Models\basket;
    use App\Models\Product;
@endphp
@extends('layout.home')
@section('content')
<section class="new-section">
<div class="container">
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
                    <td> {{ number_format($basket->price) }}</td>
                </tr>

                <tr >
                    <td>آدرس </td>
                    <td colspan="6" ><p style="text-overflow: clip"> {{ $basket->Address()->address }} </p></td>
                </tr>
            </tbody>
        </table>
       
    </div>
</div>
</section>

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
    text-align: center;
}
.table td, .table th {
    padding: .9375rem .4rem;
    background-color: #fff;
    vertical-align: top;
    text-align: center;
    border-top: 1px solid rgba(120,130,140,.13);
}
.font-light {
    font-weight: 300;
}
</style>


  @endsection
