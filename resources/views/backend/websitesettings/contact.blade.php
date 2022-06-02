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
            						<h4 class="card-title">Update Contact Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" action="{{ url('contactupdate/'.$Data->id) }}" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Contact Details</label>
                                                <textarea class="form-control" id="summernote" name="description">{{ $Data->description }}</textarea>
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