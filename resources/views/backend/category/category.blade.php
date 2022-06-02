@extends('backend.index')
@section('content')

 <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
            	<div class="container-fluid">

            		<!-- row -->
            		<div class="row">
            			<div class="col-lg-12">
            				<div class="card">
            					<div class="card-header">
            						<h4 class="card-title">Insert Category Information</h4>
                  <a href="{{ url('Manage-Category') }}" class="btn btn-secondary btn-square">Manage Category</a>
                 </div>
                 <div class="card-body">
                  <div class="basic-form">
                   <form method="post" action="{{ url('categoryinsert') }}" enctype="multipart/form-data">
                    @csrf

                    @php
                    $Serial = DB::table('categoryinformation')->orderBy('sl','DESC')->first();
                    @endphp

                    <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Sl.</label>
                      <input type="text" class="form-control" placeholder="Enter Sl..." name="sl" value="@if(isset($Serial)) {{$Serial->sl+1}}@else 1 @endif" readonly required>
                     </div>
                     
                     <div class="form-group col-md-6">
                      <label>Item Name</label>
                      <select id="inputState" class="form-control default-select" name="item_id" required>

                       @if(isset($Item))
                       @foreach($Item as $ItemShow)
                       <option value="{{$ItemShow->id}}">{{ $ItemShow->item_name }}</option>
                       @endforeach
                       @endif

                      </select>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Category Name</label>
                      <input type="text" class="form-control" placeholder="Enter Category Name..." name="category_name" required>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Status</label>
                      <select id="inputState" class="form-control default-select" name="status" required>
                       <option value="1">Active</option>
                       <option value="2">Inactive</option>
                      </select>
                     </div>

                     <div class="form-group col-md-12">
                      <label>Picture</label>
                      <input type="file" class="form-control" name="image">
                     </div>

                    </div>

                    <button type="submit" class="btn btn-info btn-square">Submit</button>
                    <button type="reset" class="btn btn-warning btn-square">Reset</button>
                   </form>
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