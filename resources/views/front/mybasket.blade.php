
@extends('layout.home')
@section('content')
<section class="new-section">
<div class="container">
    <div class="table-responsive">
        <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
            <tbody>
                <!-- row -->
                <thead>
                    <th class="pl-3" style="align-content: center"><span> شماره فاکتور </span></th>
                    <th  class="pl-3" style="align-content: center"><span>تاریخ خرید</span></th>
                    <th  class="pl-3" style="align-content: center"><span>  تاریخ ارسال سفارش </span></th>
                    <th  class="pl-3" style="align-content: center"><span> مبلغ کل خرید</span></th>
                    <th  class="pl-3" style="align-content: center"><span> نمایش</span></th>

                </thead>
                @foreach ($mybaskets as $basket)
                <tr>
                    <!-- label -->
                    <td class="pl-3">
                      
                           <span>{{ $basket->InvoiceNumber }}</span>
                            {{-- <label class="custom-control-label" for="cst1">&nbsp;</label> --}}
                       
                    </td>
                    <!-- star -->
                    <td>
                        <span class="mb-0 text-muted"> {{ verta($basket->created_at)}}</span>
                    </td>
                    <td>
                        @if($basket->send==1)
                          <span class="mb-0 text-muted"> {{ verta($basket->updated_at)}}</span>
                         @elseif($basket->is_pay==0)
                         <span class="mb-0 text-muted"> کنسل شده </span>
                         @else
                         <span class="mb-0 text-muted"> ارسال نشده </span>
                        
                         @endif
                      
                    </td>
                   
                    <td>
                        <span class="mb-0 text-muted"> {{ $basket->price}}</span>
                    </td>

                    <td>
                        <li class="list-inline-item text-danger">
                            <a href="{{ route('myproduce_Sale' ,['id' => $basket->id]) }}">
                            <i class="pe-7s-look" style="font-size:36px"></i>
                            </a>
                        </li>
                    </td>
             
                  
                </tr>
                @endforeach
             
            </tbody>
        </table>
       
    </div>
    <div class=" row p-4">
        {{ $mybaskets->links() }}

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
    vertical-align: top;
    background-color: #fff;
    text-align: center;
    border-top: 1px solid rgba(120,130,140,.13);
}
.font-light {
    font-weight: 300;
}
</style>


  @endsection
