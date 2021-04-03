@extends('frontend.template.master')

@section('template')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-star bg-orange"></i> Author by: @yield('author')</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url("/")}}">Home</a></li>
                    <li class="breadcrumb-item active">@yield('author')</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section">
    <div class="container">
        <div class="row">
            
            

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                @yield('content')
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <x-sidebar />
            </div><!-- end col -->


        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
