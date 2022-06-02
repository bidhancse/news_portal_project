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
            						<h4 class="card-title">Insert Admin Information</h4>
                  <a href="{{ url('Manage-Admin') }}" class="btn btn-secondary btn-square">Manage Admin</a>
                 </div>
                 <div class="card-body">
                  <div class="form-validation">

                   <form class="form-valide"method="post" action="{{ url('usercreate') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                     <div class="col-xl-6">

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Name
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="text" class="form-control"  name="name" placeholder="Enter a Name..." required>
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label" >Email <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="text" class="form-control"  name="email" placeholder="Enter a email..." required>
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Password
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="password" class="form-control" name="password" placeholder="Enter a Password..." required>
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Phone 
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="text" class="form-control" name="phone" placeholder="Enter a Phone..." required>
                       </div>
                      </div>

                     </div>

                     <div class="col-xl-6">

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Date of Birth 
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="date" class="form-control" name="birthdate" required>
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Address 
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="text" class="form-control" name="address" placeholder="Enter a Address...">
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Status
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <select class="form-control default-select" name="status">
                         <option value="1">Active</option>
                         <option value="2">Inactive</option>
                        </select>
                       </div>
                      </div>

                      <div class="form-group row">
                       <label class="col-lg-4 col-form-label">Picture
                        <span class="text-danger">*</span>
                       </label>
                       <div class="col-lg-6">
                        <input type="file" class="form-control" name="image">
                       </div>
                      </div>
                     </div>
                    </div>

                    <div class="row">
                     <div class="col-lg-6">
                      <button type="submit" class="btn btn-info btn-square">Submit</button>
                      <button type="reset" class="btn btn-warning btn-square">Reset</button>
                     </div>

                    </div>
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