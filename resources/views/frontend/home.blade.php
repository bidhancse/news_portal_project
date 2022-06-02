@extends('frontend.index')
@section('content')


<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>সর্বশেষ খবর</strong>
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">

                                    @if(isset($NewsHeadline))
                                    @foreach( $NewsHeadline as $NewsHeadlineShow)

                                    <li class="news-item">{{ $NewsHeadlineShow->news_title }}</li>
                                    
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->

                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{ url($LatestNews->image) }}" alt="">
                                <div class="trend-top-cap">
                                    <span>{{ $LatestNews->item_name }}</span>
                                    <h2><a href="{{ url('newsdetails/'.$LatestNews->id,$LatestNews->news_title) }}">{{ $LatestNews->news_title }}</a></h2>
                                </div>
                            </div>
                        </div>

                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">

                                @if(isset($LatestNewsBottom))
                                @foreach( $LatestNewsBottom as $LatestNewsBottomShow)

                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ url($LatestNewsBottomShow->image) }}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color3" >{{ $LatestNewsBottomShow->item_name }}</span>
                                            <h4><a href="{{ url('newsdetails/'.$LatestNewsBottomShow->id,$LatestNewsBottomShow->news_title) }}">{{ $LatestNewsBottomShow->news_title }}</a></h4>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">


                       @if(isset($LatestNewsRight))
                       @foreach( $LatestNewsRight as $LatestNewsRightShow)

                       <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="{{ url($LatestNewsRightShow->image) }}" alt="" style="width: 120px; height: 100px;">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">{{ $LatestNewsRightShow->item_name }}</span>
                            <h4><a href="{{ url('newsdetails/'.$LatestNewsRightShow->id,$LatestNewsRightShow->news_title) }}">{{ $LatestNewsRightShow->news_title }}</a></h4>
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

    @php

    $ItemOne = DB::table('iteminformation')->where('status',1)->limit('1')->get();
    $Category = DB::table('categoryinformation')->where('status',1)->limit('5')->get();

    @endphp

    @if(isset($ItemOne))
    @foreach( $ItemOne as $ItemOneShow)

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>{{ $ItemOneShow->item_name }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav>                                                                     
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">সব</a>

                                    @if(isset($Category))
                                    @foreach( $Category as $CategoryShow)
                                    @if($ItemOneShow->id == $CategoryShow->item_id)

                                    <a class="nav-item nav-link"  data-toggle="tab" href="#category{{ $CategoryShow->id }}">{{ $CategoryShow->category_name }}</a>

                                    @endif
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

                                        @php
                                        $Items = DB::table('newsinformation')->where('item_id',$ItemOneShow->id)->orderBy('id','DESC')->limit('6')
                                        ->get();

                                        @endphp

                                        @if(isset($Items))
                                        @foreach($Items as $ItemsShow)
                                        @if($ItemOneShow->id == $ItemsShow->item_id)

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ url($ItemsShow->image) }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <h4 style="margin-left: 10px;"><a href="{{ url('newsdetails/'.$ItemsShow->id,$ItemsShow->news_title) }}">{{ $ItemsShow->news_title }}</a></h4>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>

                            @foreach( $Category as $CategoryShow)

                            <!-- Card two -->
                            <div class="tab-pane fade" id="category{{ $CategoryShow->id }}">
                                <div class="whats-news-caption">
                                    <div class="row">

                                        @php
                                        $CategoryNews = DB::table('newsinformation')->where('category_id',$CategoryShow->id)->orderBy('id','DESC')->limit('6')->get();
                                        @endphp

                                        @if(isset($CategoryNews))
                                        @foreach($CategoryNews as $CategoryNewsShow)
                                        @if($CategoryShow->id == $CategoryNewsShow->category_id)

                                        <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Follow Us</h3>
                </div>
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('public/frontend')}}/assets/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">  
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('public/frontend')}}/assets/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('public/frontend')}}/assets/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{ asset('public/frontend')}}/assets/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block">
                    <img src="{{ asset('public/frontend')}}/assets/img/news/news_card.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @endif
</section>
<!-- Whats New End -->
<!--   Weekly2-News start -->
<div class="weekly2-news-area gray-bg pt-10 pb-50" >

    @if(isset($Item))
    @foreach( $Item as $ItemShow)



    <div class="container mt-5">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>{{ $ItemShow->item_name }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">


                        @php
                        $News = DB::table('newsinformation')->where('item_id',$ItemShow->id)->orderBy('id','DESC')
                        ->get();
                        @endphp

                        @if(isset($News))
                        @foreach($News as $Newsshow)
                        @if($ItemShow->id == $Newsshow->item_id)


                        <div class="weekly2-single" style=" background-color: #fff; padding: 10px; height: 280px; box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;">
                            <div class="weekly2-img">
                                <img src="{{ url($Newsshow->image) }}" alt="">
                            </div>
                            <div class="weekly2-caption" >
                                <span class="color1">{{ $ItemShow->item_name }}</span>
                                <h4 ><a href="{{ url('newsdetails/'.$Newsshow->id,$Newsshow->news_title) }}" style="font-size: 13px; letter-spacing: 0.5px;
                                line-height: 25px;">{{ $Newsshow->news_title }}</a></h4>
                            </div>

                            {{-- <div style="position: absolute; bottom: 0px; padding-top: 5px; font-size: 12px; border-top: 1px dashed #ddd; width: 92%">
                                <span><i class="fa fa-tag">&nbsp;&nbsp; {{ $Newsshow->repoter_name }} </i></span>
                            </div> --}}
                            
                        </div> 

                        @endif
                        @endforeach
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @endif
</div>           
<!-- End Weekly-News -->


<!--   Weekly-News start -->
<div class="weekly-news-area pt-50">
    <div class="container">
     <div class="weekly-wrapper">
        <!-- section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-30">
                    <h3>{{ $BottomItem->item_name }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="weekly-news-active dot-style d-flex dot-style">

                    @if(isset($BottomNews))
                    @foreach($BottomNews as $BottomNewsshow)
                    @if($BottomItem->id == $BottomNewsshow->item_id)

                    <div class="weekly-single">
                        <div class="weekly-img">
                            <img src="{{ url($BottomNewsshow->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="weekly-caption">
                            <span class="color1">{{ $BottomNewsshow->item_name }}</span>
                            <h4><a href="{{ url('newsdetails/'.$BottomNewsshow->id,$BottomNewsshow->news_title) }}">{{ $BottomNewsshow->news_title }}</a></h4>
                        </div>
                    </div> 

                    @endif
                    @endforeach
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
</div>           
<!-- End Weekly-News -->


</main>


@endsection