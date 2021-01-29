<div class="sidebar">
    <br /><br /> 

    @if($popular_posts->count() > 0)
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach ($popular_posts as $popular_post)
                    <a href="{{ route('frontend.post',$popular_post->id) }}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{  $popular_post->sidebar_image }}" alt=""
                            class="img-fluid float-left">
                            <h5 class="mb-1">{{  $popular_post->title }}</h5>
                            <small>{{  $popular_post->created_at->format('d M,Y') }}</small>
                        </div>
                    </a>
            @endforeach
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->
    @endif

    @if($recent_comments_posts->count() > 0)
    <div class="widget">
        <h2 class="widget-title">Recent Comments</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach ($recent_comments_posts as $recent_comments_post)
                    <a href="{{ route('frontend.post',$recent_comments_post->post->id) }}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{  $recent_comments_post->post->sidebar_image }}" alt=""
                            class="img-fluid float-left">
                            <h5 class="mb-1">{{  $recent_comments_post->post->title }}</h5>
                            <small>{{  $recent_comments_post->created_at->format('d M,Y') }}</small>
                        </div>
                    </a>
            @endforeach

            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->
    @endif
</div><!-- end sidebar -->
