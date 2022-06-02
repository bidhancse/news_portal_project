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
            						<h4 class="card-title">Insert News Information</h4>
                  <a href="{{ url('Manage-News') }}" class="btn btn-secondary btn-square">Manage News</a>
                 </div>
                 <div class="card-body">
                  <div class="basic-form">
                   <form method="post" action="{{ url('newsinsert') }}" enctype="multipart/form-data">
                    @csrf

                    @php
                    $Serial = DB::table('newsinformation')->orderBy('sl','DESC')->first();
                    @endphp

                    <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Sl.</label>
                      <input type="text" class="form-control" placeholder="Enter Sl..." name="sl" value="@if(isset($Serial)) {{$Serial->sl+1}}@else 1 @endif" readonly required>
                     </div>

                     <div class="form-group col-md-6">
                      <label>News Title</label>
                      <input type="text" class="form-control" placeholder="Enter News Title..." name="news_title" required>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Item Name</label>
                      <select id="inputState" class="form-control {{-- default-select --}}" name="item_id" >
                       @if(isset($Item))
                       @foreach($Item as $ItemShow)
                       <option value="{{$ItemShow->id}}">{{ $ItemShow->item_name }}</option>
                       @endforeach
                       @endif
                      </select>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Category Name</label>
                      <select id="inputState" class="form-control {{-- default-select --}}" name="category_id" >
                       <option value="">Select One...</option>
                      </select>
                     </div>

                     <div class="form-group col-md-12">
                      <label>Short Description</label>
                      <textarea class="form-control" id="summernotes" name="short_description"></textarea>
                     </div>

                     <div class="form-group col-md-12">
                      <label>Description</label>
                      <textarea class="form-control" id="summernote" name="description"></textarea>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Status</label>
                      <select id="inputState" class="form-control" name="status" required>
                       <option value="1">Active</option>
                       <option value="2">Inactive</option>
                      </select>
                     </div>

                     <div class="form-group col-md-6">
                      <label>Repoter Name</label>
                      <input type="text" class="form-control" placeholder="Enter Repoter Name..." name="repoter_name" required>
                     </div>

                     <div class="form-group col-md-12">
                      <label>News Picture</label>
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


<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="item_id"]').on('change', function(){
      var item_id = $(this).val();
      if(item_id) {
        $.ajax({
          url: "{{  url('/categoryget/') }}/"+item_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
            var d =$('select[name="category_id"]').empty();
            $.each(data, function(key, value){
              $('select[name="category_id"]').append('<option value="'+ value.id +'">' + value.category_name + '</option>');

            });

          },

        });
      } else {
        alert('danger');
      }

    });
  });

</script>



            @endsection