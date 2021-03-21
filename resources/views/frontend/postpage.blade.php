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
                <h4><a href="#">{{ $post->user->name }}</a></h4>

                @if($user_meta_data && count($user_meta_data) > 0)

                @if(isset($user_meta_data['bio']))
                <p>{{ $user_meta_data['bio'] }}</p>
                @endif

                <div class="topsocial">
                    @if(isset($user_meta_data['facebook']))
                    <a href="{{$user_meta_data['facebook']}}" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                            class="fa fa-facebook"></i></a>
                    @endif  

                    @if(isset($user_meta_data['youtube']))
                    <a href="{{$user_meta_data['youtube']}}" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                            class="fa fa-youtube"></i></a>
                    @endif
                    @if(isset($user_meta_data['twitter']))
                    <a href="{{$user_meta_data['twitter']}}" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                            class="fa fa-twitter"></i></a>
                    @endif
                    @if(isset($user_meta_data['website']))
                    <a href="{{$user_meta_data['website']}}" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                            class="fa fa-link"></i></a>
                    @endif

                </div><!-- end social -->
                @endif


            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end author-box -->

    <hr class="invis1">

    <x-related-posts-component :id="$post->id" :categories="$post->categories->pluck('id')->toArray()" />

    <hr class="invis1">
    @if($comments->count() > 0)
    <div class="custombox clearfix">
        <h4 class="small-title">{{$post->comments_count}} Comments</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="comments-list">

                    @foreach ($comments as $comment)
                        
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="upload/author.jpg" alt="" class="rounded-circle">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading user_name">{{ $comment->user ? $comment->user->name : $comment->name}} <small>{{ $comment->created_at->diffForhumans() }}</small></h4>
                            <p>{{ $comment->content }} </p>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        {{ $comments->render() }}
    </div><!-- end custom-box -->
    @endif


    <hr class="invis1">

    <div class="custombox clearfix">
        <h4 class="small-title">Leave a Reply</h4>
        <div class="row">
            <div class="col-lg-12">
            <form method="post" action="{{ route('frontend.post.comment',$post->id) }}" class="form-wrapper">
                @csrf
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror 
                <input type="text" name="name" class="form-control" placeholder="Your name">
                
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="text" name="email" class="form-control" placeholder="Email address">
                
                @error('content')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- end page-wrapper -->


@endsection
