<div class="custombox prevnextpost clearfix">
    <div class="row">
        @if($previousPost)
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="{{ route('frontend.post',$previousPost->id) }}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between text-right">
                            <img src="{{ $previousPost->NextPreviousPostImage70X40 }}" alt=""
                                class="img-fluid float-right">
                            <h5 class="mb-1">{{ $previousPost->title }}</h5>
                            <small>Prev Post</small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @endif

        @if($nextPost)
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="{{ route('frontend.post',$nextPost->id) }}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{ $nextPost->NextPreviousPostImage70X40 }}" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{ $nextPost->title }}</h5>
                            <small>Next Post</small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @endif


    </div><!-- end row -->
</div><!-- end author-box -->
