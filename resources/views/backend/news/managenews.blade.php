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
                  <h4 class="card-title">Manage News</h4>
                  <a href="{{ url('News') }}" class="btn btn-secondary btn-square">News Add</a>
                 </div>
                 <div class="card-body">
                  <div class="table-responsive" style="overflow-Y: hidden;">
                   <table id="example" class="display" >
                    <thead>
                     <tr>
                      <th>Sl.</th>
                      <th>Repoter Name</th>
                      <th>Title</th>
                      <th>Item Name</th>
                      <th>Category Name</th>
                      <th>Short Details</th>
                      <th>Status</th>
                      <th>Picture</th>
                      <th>Action</th>
                     </tr>
                    </thead>
                    <tbody>

                     @if(isset($News))
                     @foreach($News as $NewsShow)


                     <tr>
                      <td>{{ $NewsShow->sl }}</td>
                      <td>{{ $NewsShow->repoter_name }}</td>
                      <td>{{ $NewsShow->news_title }}</td>
                      <td>{{ $NewsShow->item_name }}</td>
                      <td>{{ $NewsShow->category_name }}</td>
                      <td>{!! $NewsShow->short_description !!}</td>


                      <td>
                       @if($NewsShow->status == 1)
                       <a href="{{ url('inactivenews/'.$NewsShow->id) }}">
                        <span class="badge light badge-success">
                         <i class="fa fa-circle text-success mr-1"></i>
                         Active
                        </span>
                       </a>
                       @else
                       <a href="{{ url('activenews/'.$NewsShow->id) }}">
                        <span class="badge light badge-danger">
                         <i class="fa fa-circle text-danger mr-1"></i>
                         Inactive
                        </span>
                       </a>
                       @endif
                      </td>
                      <td>
                       @if(isset($NewsShow->image))
                       <img src="{{url($NewsShow->image)}}" style="max-height:50px;" class="zoom">
                       @else
                       <img src="{{url('public/image/newsimage')}}/1.jpg" class="zoom" style="max-height:50px;">
                       @endif
                      </td>

                      <td>
                       <div class="d-flex">
                        <a href="{{url('editnews/'.$NewsShow->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <a href="{{url('deletenews/'.$NewsShow->id)}}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are You sure ?')"><i class="fa fa-trash"></i></a>
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