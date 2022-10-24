@extends('layouts.site.master')
@section('content')
    <!-- Banner start -->
    <div class="banner-2">
        <div class="slider-container">

            <div class="left-slide">
                @foreach($sliders as $slider)
                    <div style="background-color:#222e56">
                        <div class="banner-info-3">
                            <h1>{{$slider['title_'.\Illuminate\Support\Facades\App::getLocale()]}} </h1>
                            <p>
                                {{$slider['sub_title_'.\Illuminate\Support\Facades\App::getLocale()]}}
                            </p>
                            <a href="{{$slider->button_link}}" class="btn btn-lg btn-7"> {{$slider['button_text_'.\Illuminate\Support\Facades\App::getLocale()]}} </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="right-slide">
                @foreach($sliders as $slider)
                    <div style="background-image: url({{url($slider->photo)}})"></div>
                @endforeach
            </div>
            <div class="action-buttons">
                <button class="down-button">
                    <i class="fas fa-arrow-down"></i>
                </button>
                <button class="up-button">
                    <i class="fas fa-arrow-up"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Banner end -->

    <!-- Search box 3 start -->
    <div class="search-box-3 sb-7">
        <div class="container">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="GET" action="{{route('cars')}}">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="categories[]">
                                        <option selected disabled>{{trans('site.marka')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category['title_ar']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="year">
                                        <option disabled selected>{{trans('site.made_year')}}</option>
                                        @foreach(range(date('Y'), 1950) as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="motion_vector">
                                        <option value="" selected>{{trans('site.all')}}</option>
                                        <option value="أتوماتيك">{{trans('site.automatic')}}</option>
                                        <option value="مانيوال">{{trans('site.manual')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="range-slider">
                                        <div data-min="0" data-max="200000" data-unit="LE" data-min-name="min_price"
                                             data-max-name="max_price" class="range-slider-ui ui-slider"
                                             aria-disabled="false"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="btn btn-block button-theme btn-md">
                                        {{trans('site.Search')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search box 3 end -->


    @if(count($latestCar))
        <!-- Featured car start -->
        <div class="featured-car content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1> {{trans('site.newest')}} <span> {{trans('site.cars')}} </span></h1>
                    <p>
                        {{trans('site.save_client_trust')}}
                    </p>
                </div>
                <div class="row">
                    @foreach($latestCar as $car)
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">
                                <div class="photo-thumbnail">
                                    <div class="photo">
                                        <img class="d-block w-100" src="{{getFile($car->image)}}" style="height: 300px" alt="car">
                                        <a href="{{route('carDetails',$car->id)}}">
                                            <span class="blog-one__plus"></span>
                                        </a>
                                    </div>
                                    <div class="tag-2 bg-active">newest</div>
                                    <div class="price-box">
                                        <span> {{$car->price}}  LE </span>
                                    </div>
                                </div>
                                <style>
                                    .userInfo{
                                        display: flex;
                                        align-items: center;

                                        padding: 10px 20px;

                                    }
                                    .userInfo .imgSize {
                                        width: 50px;
                                        height: 50px;
                                    }
                                    .userInfo .imgSize .img{

                                        object-fit: cover;
                                        width: 100%;
                                        height: 100%;
                                        border-radius: 50%;
                                    }
                                    .userInfo p {
                                        font-size: 17px;
                                        color: #212121;
                                        padding-left: 10px;
                                    }
                                    .detail{
                                        padding: 10px 25px !important;
                                    }
                                </style>
                                <div class="userInfo" >
                                    <div class="imgSize">
                                        <img class="img" src="{{getFile($car->owner->photo)}}">
                                    </div>
                                    <p class="userName">
                                        {{$car->owner->name}}
                                    </p>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="#"> {{$car->category['title_ar']}} {{$car->sub_category['title_ar']}} </a>
                                    </h1>
                                    <ul class="facilities-list clearfix">
                                        @foreach($car->data as $key => $dataItem)
                                            @if($key < 5)
                                                <li>{{$dataItem->value}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Featured car end -->
    @endif




    <!-- Counters strat -->
    <div class="counters-4 bg-counter">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 align-self-center">
                    <div class="main-title main-title-3">
                        <h1>More than 10 years of  <span>  experience </span></h1>
                        <p class="mb-0">
                            We always strive to provide the best cars to our customers
                        </p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8">
                    <div class="infos clearfix">
                        <div class="media counter-box b-button b-right d-flex">
                            <div class="media-left">
                                <i class="flaticon-car"></i>
                            </div>
                            <div class="media-body">
                                <h1 class="counter Starting">967</h1>
                                <p> Cars </p>
                            </div>
                        </div>
                        <div class="media counter-box b-button d-flex">
                            <div class="media-left">
                                <i class="flaticon-blog"></i>
                            </div>
                            <div class="media-body">
                                <h1 class="counter">1276</h1>
                                <p> Reviews </p>
                            </div>
                        </div>
                        <div class="media counter-box b-right d-flex">
                            <div class="media-left">
                                <i class="flaticon-user"></i>
                            </div>
                            <div class="media-body">
                                <h1 class="counter">396</h1>
                                <p> Happy Clients </p>
                            </div>
                        </div>
                        <div class="media counter-box d-flex">
                            <div class="media-left">
                                <i class="flaticon-medal"></i>
                            </div>
                            <div class="media-body">
                                <h1 class="counter">177</h1>
                                <p> Rewards </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->


    @if(count($teams) > 0)
        <!-- Our team 2 start -->
        <div class="our-team-2 content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1> Our Special <span> Team </span></h1>
                    <p> We Hope To Provide The Best Team and qualifications</p>
                </div>
                <div class="featured-slider row slide-box-btn slider"
                     data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($teams as $team)
                        <div class="slide slide-box">
                            <div class="team-1">
                                <div class="photo">
                                    <img src="{{get_user_file($team->photo)}}" alt="{{$team->name}}"
                                         style="height: 300px;width: 100%" class="img-fluid">
                                    <div class="overlay">
                                        <div class="border">
                                            @if($team->facebook)
                                                <div class="icon-holder">
                                                    <a href="{{$team->facebook}}" class="facebook-bg"><i
                                                            class="fa fa-facebook"></i></a>
                                                </div>
                                            @endif
                                            @if($team->twitter)
                                                <div class="icon-holder">
                                                    <a href="{{$team->twitter}}" class="twitter-bg"><i
                                                            class="fa fa-twitter"></i></a>
                                                </div>
                                            @endif
                                            @if($team->gmail)
                                                <div class="icon-holder">
                                                    <a href="mailto:{{$team->gmail}}" class="google-bg"><i
                                                            class="fa fa-google-plus"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <h4><a href="#"> {{$team->name}} </a></h4>
                                    <h5>{{$team->job}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <div class="text-center">--}}
{{--                    <a href="#"--}}
{{--                       class="btn btn-1 btn-lg"><span> عرض الكل </span>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- Our team 2 end -->
    @endif


    {{--    <!-- Full Page Search -->--}}
    {{--    <div id="full-page-search">--}}
    {{--        <button type="button" class="close">×</button>--}}
    {{--        <form action="index.html#" class="search-header">--}}
    {{--            <input type="search" value="" placeholder="type keyword(s) here"/>--}}
    {{--            <button type="submit" class="btn btn-sm button-theme">Search</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
@endsection
