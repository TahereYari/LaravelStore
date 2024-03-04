
@extends('layout.admin')
@section('content')


{{-- **///******************************* --}}
     
  <div class="x_panel">
    
        <div class="card-body bg-primary text-white mailbox-widget pb-0">
            <h2 class="text-white pb-3"></h2>
            <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
            </ul>
        </div>
    <div class="table-responsive">
        <table id="datatable-buttons" class="table email-table no-wrap table-hover v-middle mb-0 font-14" style="width: 100%;"  aria-describedby="datatable-buttons_info">
            <tbody>
                <!-- row -->
                <thead>
                <tr role="row">
                    <th class="pl-3" style="align-content: center"><span> نام کاربر</span></th>
                    <th  class="pl-3" style="align-content: center"><span>اسم محصول</span></th>
                    <th  class="pl-3" style="align-content: center"><span> نکات مثبت</span></th>
                    <th  class="pl-3" style="align-content: center"><span> نکات منفی </span></th>
                    <th  class="pl-3" style="align-content: center"><span> دیدگاه  </span></th>
                    <th  class="pl-3" style="align-content: center"><span> امتیاز  </span></th>
                    <th  class="pl-3" style="align-content: center"><span> تاریخ  </span></th>
                    <th  class="pl-3" style="align-content: center"><span> نمایش  </span></th>
                    <th  class="pl-3" style="align-content: center"><span> عملیات  </span></th>
                </tr>
                </thead>
                @foreach ($comments as $comment)
                <tr>
                    <!-- label -->
                    <td class="pl-3">
                      
                           <span>{{ $comment->user()->name }}</span>
                            {{-- <label class="custom-control-label" for="cst1">&nbsp;</label> --}}
                       
                    </td>
                    <!-- star -->
                    <td>
                        <span class="mb-0 text-muted"> {{ $comment->product()->name}}</span>
                    </td>
                    <td>
                        <span class="mb-0 text-muted"> {{ $comment->posetive}}</span>
                    </td>
                    <td>
                        <span class="mb-0 text-muted">{{ $comment->negative}}</span>
                    </td>
                 
                    <td>                        
                         <pre> <span  class="text-dark"> {{ $comment->comment}}</span></pre>
                    </td>
                  
                    <td class="text-muted">{{ $comment->emteaz}}</td>
                   
                    <td class="text-muted">{{ $comment->created_at}}</td>
                    
                        @if ($comment->preview==1)
                        <td class="text-muted">نمایش داده میشود</td>
                        @else
                        <td class="text-muted">نمایش داده نمیشود</td>
                        @endif
                      
                   
                    
                    <td class="pl-3">
                        {{-- <div class="custom-control custom-checkbox">
                            
                                <input type="checkbox" name="preview" class="custom-control-input" id="cst7" />
                                <label class="custom-control-label" for="cst7">&nbsp;</label>
                            
                        </div> --}}
                        <li class="list-inline-item text-info mr-3">
                            <a href="{{ route('comment_activity',['id'=> $comment->id]) }}">
                                <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <span class="ml-2 font-normal text-dark">نمایش</span>
                            </a>
                        </li>
                        <li class="list-inline-item text-danger">
                            <a href="{{ route('comment_delete',['id'=> $comment->id]) }}">
                                <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <span class="ml-2 font-normal text-dark">حذف</span>
                            </a>
                        </li>
                    </td>
                </tr>
                @endforeach
            
         
            
          
         
             
             
            </tbody>
        </table>
       
    </div>
    <div class=" row p-4">
        {{ $comments->links() }}
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
