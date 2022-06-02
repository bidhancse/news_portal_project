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
            						<h4 class="card-title">Update Item Information</h4>
                                  <a href="{{ url('Manage-Item') }}" class="btn btn-secondary btn-square">Manage Item</a>
                              </div>
                              <div class="card-body">
                                  <div class="basic-form">
                                     <form method="post" action="{{url('itemupdate/'.$Data->id)}}" enctype="multipart/form-data">
                                        @csrf



                                        <div class="form-row">

                                           <div class="form-group col-md-6">
                                              <label>Sl.</label>
                                              <input type="text" class="form-control" placeholder="Enter Sl..." name="sl" value="{{ $Data->sl }}" readonly required>
                                          </div>

                                          <div class="form-group col-md-6">
                                              <label>Item Name</label>
                                              <input type="text" class="form-control" placeholder="Enter Item Name..." name="item_name" required value="{{ $Data->item_name}}">
                                          </div>

                                          <div class="form-group col-md-6">
                                              <label>Status</label>
                                              <select id="inputState" class="form-control default-select" name="status" required>
                                                <option value="{{$Data->status}}">@if($Data->status == 1) Active @else Inactive @endif</option>
                                                @if($Data->status == 1)
                                                <option value="2">Inactive</option>
                                                @else
                                                <option value="1">Active</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                          <label>Picture</label>
                                          <input type="file" class="form-control" style="border-radius: 0px;" id="imgInp" name="image">
                                          @if(isset($Data->image))
                                          <img id="blah" src="{{url($Data->image)}}" style="max-height: 50px;">
                                          @else
                                          <img id="blah" src="{{url('public/image/itemimage')}}/1.jpg" style="max-height:50px;">
                                          @endif

                                          <input type="hidden" value="{{ $Data->image }}" name="old_image">
                                      </div>

                                  </div>

                                  <button type="submit" class="btn btn-info btn-square">Update</button>
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