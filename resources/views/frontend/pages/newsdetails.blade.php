@extends('frontend.index')
@section('content')





<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">

         <div class="row mt-5 mb-5">
            <div class="col-lg-8" style="background-color: fff;  box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">


                    <div class="row">
                        <div class="col-lg-6 col-5">
                            <div class="mt-3">
                                <span style="background-color: red; padding: 5px 15px 5px 15px; border-radius: 50px; color: #fff; font-size: 12px;"><i class="fa fa-tag">&nbsp;&nbsp; {{ $NewsDetails->repoter_name }}</i></span>

                            </div>
                        </div>

                        <div class="col-lg-6 col-7">
                            <div class="mt-3">
                                <p style="text-align: right;">প্রকাশিতঃ {{ $NewsDetails->date }} ইং</p>
                            </div>
                        </div>
                    </div>
                    

                    <div class="section-tittle mb-30 pt-30">



                        <h2>{{ $NewsDetails->news_title }}</h2>
                    </div>

                    <div class="about-prea">
                        <p class="about-pera1 mb-25 text-justify">
                            {!! $NewsDetails->short_description !!}
                        </p>
                    </div> 

                    <div class="about-img">
                        <img src="{{ url($NewsDetails->image) }}" alt="">
                    </div>



                    <div class="about-prea">
                        <p class="about-pera1 mb-25 text-justify">
                            {!! $NewsDetails->description !!}
                        </p>


                    </div> 

                    <div class="social-share pt-30">
                        <div class="section-tittle">
                            <h3 class="mr-20">শেয়ার করুনঃ</h3>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                </div>
                <!-- From -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
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


                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget mt-5">
                        <h3 class="widget_title" style="color: red;">সর্বশেষ আরো খবর</h3>

                        @if(isset($MoreNews))
                        @foreach( $MoreNews as $MoreNewsShow)

                        <div class="media post_item" style="background: #fff; padding: 10px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                            <img src="{{ url($MoreNewsShow->image) }}" alt="post" style="width: 110px; height: 90px;">
                            <div class="media-body">
                                
                                <a href="{{ url('newsdetails/'.$MoreNewsShow->id,$MoreNewsShow->news_title) }}" >
                                    <h3>{{ $MoreNewsShow->news_title }}</h3>
                                </a>

                                <span style="padding: 2px 9px 2px 9px; background-color: #f1fcd3; font-size: 15px;">{{ $MoreNewsShow->item_name }}</span>
                            </div>
                        </div>

                        @endforeach
                        @endif

                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About US End -->
</main>



@endsection