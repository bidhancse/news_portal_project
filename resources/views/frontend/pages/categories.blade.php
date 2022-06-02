@extends('frontend.index')
@section('content')


<style>
    .blog_right_sidebar .widget_title {
    font-size: 16px;
    margin-bottom: 30px;
}
</style>

<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix" style="background-color: #fbf9ff;">


        <div class="container">
            <div class="blog_right_sidebar" style="background-color: red;">
                <aside class="single_sidebar_widget popular_post_widget mt-3">
                    <h3 class="widget_title" style="background-color: #fff; padding: 10px;">{{ $CategoryName->item_name }}&nbsp;&nbsp;&nbsp; > &nbsp;&nbsp;&nbsp;  <span style="color: red;">{{ $CategoryName->category_name }}</span></h3>


                    @if(isset($CategoriesNews))
                    @foreach( $CategoriesNews as $CategoriesNewsShow )


                    <div class="media post_item" style="background: #fff; padding: 10px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                        <img src="{{ url($CategoriesNewsShow->image) }}" alt="post" class="mt-1" style="width: 110px; height: 100px; border-radius: 5px;">
                        <div class="media-body">

                            <a href="{{ url('newsdetails/'.$CategoriesNewsShow->id,$CategoriesNewsShow->news_title) }}" >
                                <h4 style="color: red;">{{ $CategoriesNewsShow->news_title }}</h4>
                            </a>


                            @php
                            $content = substr($CategoriesNewsShow->short_description, 0,660);
                            @endphp

                            <p>
                                {!! $content !!}.....
                            </p>

                        </div>
                    </div>

                    @endforeach
                    @endif

                </aside>
            </div>
        </div>

    </div>



</main>





@endsection