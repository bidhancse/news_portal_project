@extends('backend.index')
@section('content')


		<!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
			<div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					<h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
				</div>
				<div class="row">

					@php

					$RegisterUser = DB::table('users')->get();
					$ActiveUser = DB::table('users')->where('status',1)->get();
					$InactiveUser = DB::table('users')->where('status',2)->get();
					$Totalitem = DB::table('iteminformation')->where('status',1)->get();
					$Totalcategory = DB::table('categoryinformation')->where('status',1)->get();
					$Totalnews = DB::table('newsinformation')->where('status',1)->get();

					@endphp

					<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-secondary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-Admin') }}" style="color: #fff;">Register User</a></p>
										<h3 class="text-white">{{ Count($RegisterUser) }}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-Admin') }}" style="color: #fff;">Active User</a></p>
										<h3 class="text-white">{{ Count($ActiveUser) }}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-Admin') }}" style="color: #fff;">Inactive User</a></p>
										<h3 class="text-white">{{ Count($InactiveUser) }}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    

                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
											<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
											<polyline points="14 2 14 8 20 8"></polyline>
											<line x1="16" y1="13" x2="8" y2="13"></line>
											<line x1="16" y1="17" x2="8" y2="17"></line>
											<polyline points="10 9 9 9 8 9"></polyline>
										</svg>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-Item') }}" style="color: #fff;">Total Item</a></p>
										<h3 class="text-white">{{ Count($Totalitem) }}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>


                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-warning">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
											<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
											<polyline points="14 2 14 8 20 8"></polyline>
											<line x1="16" y1="13" x2="8" y2="13"></line>
											<line x1="16" y1="17" x2="8" y2="17"></line>
											<polyline points="10 9 9 9 8 9"></polyline>
										</svg>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-Category') }}" style="color: #fff;">Total Category</a></p>
										<h3 class="text-white">{{ Count($Totalcategory) }}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-secondary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
											<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
											<polyline points="14 2 14 8 20 8"></polyline>
											<line x1="16" y1="13" x2="8" y2="13"></line>
											<line x1="16" y1="17" x2="8" y2="17"></line>
											<polyline points="10 9 9 9 8 9"></polyline>
										</svg>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1"><a href="{{ url('Manage-News') }}" style="color: #fff;">Total Publish News</a></p>
										<h3 class="text-white">{{ Count($Totalnews) }}</h3>
									</div>
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