@extends('frontend.template.home')

@section('content')

<div class="page-wrapper">
    <div class="blog-top clearfix">
        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
    </div><!-- end blog-top -->

    <div class="blog-list clearfix">






        @if($posts->count() > 0)

        @foreach ($posts as $post)
        <div class="blog-box row">
            <div class="col-md-4">
                <div class="post-media">
                    <a href="{{ route('frontend.post',$post->id) }}" title="">
                        <img src="{{ $post->home_post_image }}" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->


            <div class="blog-meta big-meta col-md-8">
                <h4><a href="{{ route('frontend.post',$post->id) }}" title="">{{ $post->title }}</a></h4>
                <p>{{ trim_content($post->content,15) }}</p>

                @if($post->categories->count() > 0)
                <small class="firstsmall">
                    @foreach ($post->categories as $category)
                    <a class="bg-orange" href="{{ route('frontend.category',$category->id) }}"
                        title="">{{ $category->title}}</a>
                    @endforeach
                </small>
                @endif


                <small><a href="{{ route('frontend.post',$post->id) }}"
                        title="">{{ $post->created_at->format('d M,Y') }}</a></small>
                <small><a href="{{ route('frontend.author',$post->user->id) }}" title="">by
                        {{ $post->user->name }}</a></small>
                <small><a href="{{ route('frontend.post',$post->id) }}" title=""><i class="fa fa-eye"></i> 0</a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->

        <hr class="invis">
        @endforeach
        @else
        No posts yet
        @endif












    </div><!-- end blog-list -->


</div><!-- end page-wrapper -->

<hr class="invis">


{{ $posts->render() }}
{{-- <div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div><!-- end col -->
</div><!-- end row --> --}}

@endsection
