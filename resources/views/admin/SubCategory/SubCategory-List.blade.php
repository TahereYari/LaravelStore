
@extends('layout.admin')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Button Example <small>Users</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        <p class="text-muted font-13 m-b-30">
          The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
        </p>
        <a href="{{ route('subcategory-create') }}" class="btn btn-round btn-primary">افزودن زیر دسته جدید</a>
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
          <div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#">
          <span>Copy</span></a><a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>PDF</span></a><a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Print</span></a></div><div class="dataTables_length" id="datatable-buttons_length"><label>Show <select name="datatable-buttons_length" aria-controls="datatable-buttons" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-buttons">
        </label>
      </div>
      <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
          <thead>
            <tr role="row">
          
              <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 115px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">نام دسته</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">توضیحات</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">نوع دسته</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">ویرایش</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178px;" aria-label="Position: activate to sort column ascending">حذف</th>
          </thead>


          <tbody>
            
            
          
            @foreach ( $subcategories as $subcategory )

            <tr role="row" class="odd">
              <td tabindex="0" class="sorting_1">{{ $subcategory->subname }}</td>
              <td tabindex="0" class="sorting_1">{{ $subcategory->subdescription }}</td>
              <td tabindex="0" class="sorting_1">{{ $subcategory->category()->name }}</td>
              <td tabindex="0" class="sorting_1"><a href="{{ route('subcategory-edit' ,['id' => $subcategory->id]) }}">ویرایش</a></td>
              <td tabindex="0" class="sorting_1"><a href="{{ route('subcategory-delete' ,['id' => $subcategory->id]) }}">حذف</a></td>
            </tr>

            @endforeach
       
   
            </tbody>
        </table><div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-buttons" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-buttons" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-buttons" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable-buttons" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div>
        <div class="row">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>

  @endsection

     
     
