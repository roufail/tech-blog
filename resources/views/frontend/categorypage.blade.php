@extends('frontend.template.category')

@section('content')


<div class="page-wrapper">
    <div class="blog-grid-system">
        <div class="row">
           
           @foreach ($category->posts as $post)    
           <div class="col-md-6">
               <div class="blog-box">
                   <div class="post-media">
                       <a href="{{ route('frontend.post',$post->id) }}" title="{{ $post->title }}">
                           <img src="{{ $post->home_post_image }}" alt="" class="img-fluid">
                           <div class="hovereffect">
                               <span></span>
                           </div><!-- end hover -->
                       </a>
                   </div><!-- end media -->
                   <div class="blog-meta big-meta">

                    @if($post->categories->count() > 0)
                        @foreach ($post->categories as $child_category)
                        <span class="color-orange">
                        <a class="bg-orange" href="{{ route('frontend.category',$child_category->id) }}"
                            title="">{{ $child_category->title}}</a>
                        @endforeach
                       </span>
                    @endif                       
                       
                       
                       <h4><a href="{{ route('frontend.post',$post->id) }}" title="{{ $post->title }}">{{ $post->title }}</a></h4>
                       <p>{{ trim_content($post->content,15) }}</p>
                       <small><a href="{{ route('frontend.post',$post->id) }}" title="">{{ $post->created_at->format('d M,Y') }}</a></small>
                       <small><a href="{{ route('frontend.author',$post->user_id) }}" title="">by  {{ $post->user->name }}</a></small>
                       <small><a href="{{ route('frontend.post',$post->id) }}" title=""><i class="fa fa-eye"></i> {{ $post->post_views}}</a></small>
                   </div><!-- end meta -->
               </div><!-- end blog-box -->
           </div><!-- end col -->
           @endforeach

            





        </div><!-- end row -->
    </div><!-- end blog-grid-system -->
</div><!-- end page-wrapper -->

<hr class="invis3">

<div class="row">

    {{ $category->posts->render() }}
    {{-- <div class="col-md-12">
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
    </div><!-- end col --> --}}
</div><!-- end row -->

@endsection
