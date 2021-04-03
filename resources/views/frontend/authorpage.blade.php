@extends('frontend.template.author')
@section('author',$user->name);
@section('content')
<div class="page-wrapper">
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">{{$user->name}}</h4>
                                <div class="row">
                                    {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->
 --}}
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4>{{$user->name}}</h4>
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

                            <div class="blog-list clearfix">
                            
                            @foreach ($user->posts as $post)    
                            
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('frontend.post',$post->id) }}" title="{{ $post->title }}">
                                                <img src="{{ $post->home_post_image }}" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="{{ route('frontend.post',$post->id) }}" title="{{ $post->title }}">{{ $post->title }}</a></h4>
                                        <p>{{ trim_content($post->content,15) }}</p>

                                        @if($post->categories->count() > 0)
                                        @foreach ($post->categories as $child_category)
                                            <small class="firstsmall"><a class="bg-orange" href="{{ route('frontend.category',$child_category->id) }}" title="">{{ $child_category->title}}</a></small>
                                        @endforeach
                                       </span>
                                        @endif                       
                


                                        
                                        
                                        <small><a href="{{ route('frontend.post',$post->id) }}" title="">{{ $post->created_at->format('d M,Y') }}</a></small>
                                        <small><a href="{{ route('frontend.author',$post->user_id) }}" title="">by {{ $post->user->name }}</a></small>
                                        <small><a href="{{ route('frontend.post',$post->id) }}" title=""><i class="fa fa-eye"></i>  {{ $post->post_views}}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                @endforeach


                                
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            {{ $user->posts->render()}}
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
