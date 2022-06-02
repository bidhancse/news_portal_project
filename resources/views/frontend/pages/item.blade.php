@extends('frontend.index')
@section('content')

<style>
    .whats-news-area .nav-tabs .nav-item, .about-area .nav-tabs .nav-item, .contact-section .nav-tabs .nav-item {
    display: block;
    color: #fff;
    text-transform: capitalize;
    font-size: 16px;
}

.whats-news-area .whats-news-caption .single-what-news .what-cap h4 a, .about-area .whats-news-caption .single-what-news .what-cap h4 a, .contact-section .whats-news-caption .single-what-news .what-cap h4 a {
    font-size: 14px;
    font-weight: 500;
    line-height: 1.4;
}
</style>


<main>

    <!-- Trending Area Start -->
    <div class="trending-area fix mt-5">
        <div class="container">
            <div class="trending-main">

                <div class="pb-8" style="border-bottom: 1px dashed #ddd;">
                    <h1>{{ $ItemLatestNews->item_name }}</h1>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{ url($ItemLatestNews->image) }}" alt="">
                                <div class="trend-top-cap">
                                    <span>{{ $ItemLatestNews->item_name }}</span>
                                    <h2><a href="{{ url('newsdetails/'.$ItemLatestNews->id,$ItemLatestNews->news_title) }}">{{ $ItemLatestNews->news_title }}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">

                        @if(isset($RightLatestNews))
                        @foreach( $RightLatestNews as $RightLatestNewsShow)

                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="{{ url($RightLatestNewsShow->image) }}" alt="" style="width: 120px; height: 100px;">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color3">{{ $RightLatestNewsShow->item_name }}</span>
                                <h4><a href="{{ url('newsdetails/'.$RightLatestNewsShow->id,$RightLatestNewsShow->news_title) }}">{{ $RightLatestNewsShow->news_title }}</a></h4>
                            </div>
                        </div>

                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->


    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>{{ $ItemName->item_name }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                                     
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-radius: 50px; background-color: #000;">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">সব</a>

                                        @if(isset($CategoryName))
                                        @foreach( $CategoryName as $CategoryNameShow)

                                        <a class="nav-item nav-link"  data-toggle="tab" href="#{{ $CategoryNameShow->id }}">{{ $CategoryNameShow->category_name }}</a>

                                        @endforeach
                                        @endif

                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                    <div class="whats-news-caption">
                                        <div class="row">

                                            @if(isset($ItemNews))
                                            @foreach($ItemNews as $ItemNewsShow)
                                            @if($ItemName->id == $ItemNewsShow->item_id)

                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ url($ItemNewsShow->image) }}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <h4 style="margin-left: 10px;"><a href="{{ url('newsdetails/'.$ItemNewsShow->id,$ItemNewsShow->news_title) }}">{{ $ItemNewsShow->news_title }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif
                                            @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                @foreach( $CategoryName as $CategoryShow)

                                <!-- Card two -->
                                <div class="tab-pane fade" id="{{ $CategoryShow->id }}">
                                    <div class="whats-news-caption">
                                        <div class="row">

                                            @php
                                            $CategoryNews = DB::table('newsinformation')->where('category_id',$CategoryShow->id)->orderBy('id','DESC')->limit('8')->get();
                                            @endphp

                                            @if(isset($CategoryNews))
                                            @foreach($CategoryNews as $CategoryNewsShow)
                                            @if($CategoryShow->id == $CategoryNewsShow->category_id)

                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ url($CategoryNewsShow->image) }}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <h4 style="margin-left: 10px;"><a href="{{ url('newsdetails/'.$CategoryNewsShow->id,$CategoryNewsShow->news_title) }}">{{ $CategoryNewsShow->news_title }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif
                                            @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->

</main>


@endsection