@if($latest_posts->count() == 3)
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            @foreach ($latest_posts as $post)
            @php
            $image_size = "home_post_image950X530";
            $class= "first-slot";
            if($loop->iteration == 2) {
            $class= "second-slot";
            $image_size = "home_post_image460X530";
            } elseif($loop->iteration == 3) {
            $class= "last-slot";
            $image_size = "home_post_image460X530";
            }
            @endphp
            <div class="{{ $class }}">
                <div class="masonry-box post-media">
                    <img src="{{ $post->$image_size }}" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">


                                @foreach ($post->categories as $category)
                                <a class="bg-orange" href="{{ route('frontend.category',$category->id) }}"
                                    title="">{{ $category->title}}</a>
                                @endforeach


                                <h4><a href="{{ route('frontend.post',$post->id) }}" title="">{{ $post->title }}</a>
                                </h4>
                                <small><a href="{{ route('frontend.post',$post->id) }}"
                                        title="">{{ $post->created_at->format('d M,Y') }}</a></small>
                                <small><a href="{{ route('frontend.author',$post->user->id) }}" title="">by
                                        {{ $post->user->name }}</a></small> </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
            @endforeach


        </div><!-- end masonry -->
    </div>
</section>
@endif
