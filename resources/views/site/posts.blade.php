@extends('layouts.site.master')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1> News </h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('/')}}"> Home </a></li>
                <li class="active"> News </li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="blog-2">
                    <div class="photo">
                        <img src="{{asset($post->photo)}}" alt="blog" class="img-fluid w-100">
                    </div>
                    <div class="blog-one__single-text-box detail">
                        <h3 class="title">
                            <a href="#"> {{$post->title}}  </a>
                        </h3>
                        <p>
                            {{$post->desc}}
                        </p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
{{--        <!-- Page navigation start -->--}}
{{--        <div class="pagination-box hidden-mb-45 text-center">--}}
{{--            <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination">--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="car-list-leftsidebar.html"><i class="fa fa-angle-right"></i></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </div>
</div>
<!-- Blog body end -->
@endsection
