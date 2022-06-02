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
            						<h4 class="card-title">Update Settings Information</h4>
                 </div>
                 <div class="card-body">
                  <div class="basic-form">
                   <form method="POST" action="{{url('updatesettings/'. $Data->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Enter Title..." name="title" value="{{ $Data->title }}">
                     </div>

                     <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" class="form-control" placeholder="Enter Email..." name="email" value="{{ $Data->email }}">
                     </div>

                     <div class="form-group col-md-6">
                      <label>Phone</label>
                      <input type="text" class="form-control" placeholder="Enter Phone..." name="phone" value="{{ $Data->phone }}">
                     </div>

                     <div class="form-group col-md-6">
                      <label>Facebook Url</label>
                      <input type="text" class="form-control" placeholder="Enter Facebook Url..." name="facebook" value="{{ $Data->facebook }}">
                     </div>
                     <div class="form-group col-md-4">
                      <label>Twitter Url</label>
                      <input type="text" class="form-control" placeholder="Enter Twitter Url..." name="twitter" value="{{ $Data->twitter }}">
                     </div>

                     <div class="form-group col-md-4">
                      <label>Instagram Url</label>
                      <input type="text" class="form-control" placeholder="Enter Instagram Url..." name="instagram" value="{{ $Data->instagram }}">
                     </div>

                     <div class="form-group col-md-4">
                      <label>Youtube Url</label>
                      <input type="text" class="form-control" placeholder="Enter Youtube Url..." name="youtube" value="{{ $Data->youtube }}">
                     </div>

                     <div class="form-group col-md-6">
                      <label>Favicon</label>
                      <input type="file" class="form-control" name="favicon">
                      @if(isset( $Data->favicon))
                      <img src="{{ url( $Data->favicon) }}" style="max-height: 50px;">
                      @endif
                      <input type="hidden" value="{{  $Data->favicon }}">
                     </div>

                     <div class="form-group col-md-6">
                      <label>Logo</label>
                      <input type="file" class="form-control" name="logo">
                      @if(isset( $Data->logo))
                      <img src="{{ url( $Data->logo) }}" style="max-height: 50px;">
                      @endif
                      <input type="hidden" value="{{  $Data->logo }}">
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