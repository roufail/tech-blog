@if($related_posts->count() > 0)
<div class="custombox clearfix">
    <h4 class="small-title">You may also like</h4>
    <div class="row">

        @foreach ($related_posts as $related_post)
        <div class="col-lg-6">
            <div class="blog-box">
                <div class="post-media">
                    <a href="{{ route('frontend.post',$related_post->id) }}" title="{{ $related_post->title }}">
                        <img src="{{ $related_post->RelatedPostImage365X210 }}" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span class=""></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta">
                    <h4><a href="{{ route('frontend.post',$related_post->id) }}"
                            title="{{ $related_post->title }}">{{ $related_post->title }}</a></h4>


                    @foreach ($related_post->categories as $category)
                    <small><a href="{{ route('frontend.category',$category->id) }}"
                            title="">{{ $category->title}}</a></small>
                    @endforeach


                    <small><a href="{{ route('frontend.post',$related_post->id) }}"
                            title="{{ $related_post->title }}">{{ $related_post->created_at->format('d M,Y') }}</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->
        </div><!-- end col -->
        @endforeach



    </div><!-- end row -->
</div><!-- end custom-box -->
@endif
