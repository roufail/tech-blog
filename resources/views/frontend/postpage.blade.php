@extends('frontend.template.post')
@section('page_title',$post->title)
@section('content')

<div class="page-wrapper">

    <div class="blog-title-area text-center">
        <ol class="breadcrumb hidden-xs-down">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            @if($post->categories->count() > 0)
            <li class="breadcrumb-item"><a
                    href="{{ route('frontend.category',$post->categories[0]->id) }}">{{ $post->categories[0]->title }}</a>
            </li>
            @endif

            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>

        <span class="color-orange">

            @foreach ($post->categories as $category)
            <a class="bg-orange" href="{{ route('frontend.category',$category->id) }}"
                title="">{{ $category->title}}</a>
            @endforeach


        </span>

        <h3>{{ $post->title }}</h3>

        <div class="blog-meta big-meta">
            <small><a href="tech-single.html"
                    title="{{ $post->created_at->format('d M,Y') }}">{{ $post->created_at->format('d M,Y') }}</a></small>
            <small><a href="{{ route('frontend.author',$post->user->id) }}" title="{{ $post->user->name }}">by
                    {{ $post->user->name }}</a></small>
            <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->post_views }}</a></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                            class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                            class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->



    <div class="single-post-media">
        <img src="upload/tech_menu_08.jpg" alt="" class="img-fluid">
    </div><!-- end media -->

    <div class="blog-content">
        {{ $post->content }}
    </div><!-- end content -->

    <div class="blog-title-area">
        <div class="tag-cloud-single">
            <span>Tags</span>

            @foreach ($post->tags as $tag)
            <small><a href="#" title="{{ $tag->title}}">{{ $tag->title}}</a></small>
            @endforeach
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                            class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                            class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="invis1">


    <x-next-and-previous-posts-component :id="$post->id" />



    <hr class="invis1">

    <div class="custombox authorbox clearfix">
        <h4 class="small-title">About author</h4>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
            </div><!-- end col -->

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <h4><a href="#">Jessica</a></h4>
                <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing
                    elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus
                    congue feugiat. Thanks for stop Tech Blog!</p>

                <div class="topsocial">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                            class="fa fa-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                            class="fa fa-youtube"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                            class="fa fa-pinterest"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                            class="fa fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                            class="fa fa-instagram"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                            class="fa fa-link"></i></a>
                </div><!-- end social -->

            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end author-box -->

    <hr class="invis1">

    <x-related-posts-component :id="$post->id" :categories="$post->categories->pluck('id')->toArray()" />

    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">3 Comments</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="comments-list">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="upload/author.jpg" alt="" class="rounded-circle">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed.
                                Craft
                                beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave
                                deep v
                                laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade
                                swag.
                                Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                        </div>
                    </div>
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                        </a>
                        <div class="media-body">

                            <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                            <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel
                                Neutra
                                selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin
                                coffee.
                                Banksy, elit small.</p>

                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                        </div>
                    </div>
                    <div class="media last-child">
                        <a class="media-left" href="#">
                            <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                        </a>
                        <div class="media-body">

                            <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                            <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v
                                cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko
                                tempor duis single-origin coffee. Banksy, elit small.</p>

                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end custom-box -->

    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">Leave a Reply</h4>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-wrapper">
                    <input type="text" class="form-control" placeholder="Your name">
                    <input type="text" class="form-control" placeholder="Email address">
                    <input type="text" class="form-control" placeholder="Website">
                    <textarea class="form-control" placeholder="Your comment"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- end page-wrapper -->


@endsection
