@extends('backend.index')
@section('content')

 <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    
                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                <div class="card">
                 <div class="card-header">
                  <h4 class="card-title">Manage Category</h4>
                  <a href="{{ url('Category') }}" class="btn btn-secondary btn-square">Category Add</a>
                 </div>
                 <div class="card-body">
                  <div class="table-responsive" style="overflow-Y: hidden;">
                   <table id="example" class="display" >
                    <thead>
                     <tr>
                      <th>Sl.</th>
                      <th>Item Name</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th>Picture</th>
                      <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>

                     @if(isset($Category))
                     @foreach($Category as $CategoryShow)

                     <tr>
                      <td>{{ $CategoryShow->sl }}</td>

                      <td>{{ $CategoryShow->item_name }}</td>
                      <td>{{ $CategoryShow->category_name }}</td>

                      <td>
                       @if($CategoryShow->status == 1)
                       <a href="{{ url('inactivecategory/'.$CategoryShow->id) }}">
                        <span class="badge light badge-success">
                         <i class="fa fa-circle text-success mr-1"></i>
                         Active
                        </span>
                       </a>
                       @else
                       <a href="{{ url('activecategory/'.$CategoryShow->id) }}">
                        <span class="badge light badge-danger">
                         <i class="fa fa-circle text-danger mr-1"></i>
                         Inactive
                        </span>
                       </a>
                       @endif
                      </td>

                      <td>
                       @if(isset($CategoryShow->image))
                       <img src="{{url($CategoryShow->image)}}" style="max-height:50px;" class="zoom">
                       @else
                       <img src="{{url('public/image/categoryimage')}}/1.jpg" class="zoom" style="max-height:50px;">
                       @endif
                      </td>

                      <td>
                       <div class="d-flex">
                        <a href="{{url('editcategory/'.$CategoryShow->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <a href="{{url('deletecategory/'.$CategoryShow->id)}}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are You sure ?')"><i class="fa fa-trash"></i></a>
                       </div>
                      </td>

                     </tr>

                     @endforeach
                     @endif

                    </tbody>
                   </table>
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </div>
        <!--**********************************
            Content body end
            ***********************************-->


            @endsection