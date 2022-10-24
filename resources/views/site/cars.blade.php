@extends('layouts.site.master')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1></h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"> All Cars</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <form method="GET">
                        <div class="widget advanced-search2">
                            <h3 class="sidebar-title">بحث  </h3>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="nearest">
                                    <option value="" selected>الكل</option>
                                    <option value="yes">الأقرب</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="year">
                                        <option value="" selected>سنة الصنع</option>
                                        @foreach(range(date('Y'), 1950) as $year)
                                            <option value="{{$year}}" {{$year==$request->year?'selected':''}}>{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="motion_vector">
                                        <option value="" selected>الكل</option>
                                        <option value="أتوماتيك" {{'أتوماتيك'==$request->motion_vector?'selected':''}}>أتوماتيك</option>
                                        <option value="مانيوال" {{'مانيوال'==$request->motion_vector?'selected':''}}>مانيوال</option>
                                    </select>
                                </div>
                                <div class="range-slider clearfix">
                                    <label> السعر </label>
                                    <div data-min="0" data-max="200000" data-min-name="min_price"
                                         data-max-name="max_price" data-unit="L.E" class="range-slider-ui ui-slider"
                                         aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-4 btn-lg btn-w-100"> بحث </button>
                                </div>
                        </div>
                        <!-- Brands start -->
                        <div class="widget brands">
                            <h3 class="sidebar-title"> الماركات </h3>
                                @foreach($categories as $category)
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox{{$category->id}}" {{in_array($category->id,$request->categories)?'checked':''}} name="categories[]" value="{{$category->id}}" type="checkbox">
                                    <label for="checkbox{{$category->id}}">
                                        {{$category->title_ar}}
                                    </label>
                                </div>
                                @endforeach
                        </div>
                        </form>
                        <!-- Posts By Category Start -->
{{--                        <div class="posts-by-category widget">--}}
{{--                            <h3 class="sidebar-title"> الفئات </h3>--}}
{{--                            <ul class="list-unstyled list-cat">--}}
{{--                                <li><a href="#">فارهة <span>(45)</span></a></li>--}}
{{--                                <li><a href="#"> شاحنات <span>(21)</span> </a></li>--}}
{{--                                <li><a href="#"> سيارات رياضية <span>(19)</span></a></li>--}}
{{--                                <li><a href="#"> سيدان <span>(22) </span></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

                        <!-- Question start -->
                        <div class="widget question widget-3">
                            <h5 class="sidebar-title">Follow us</h5>
                            <div class="social-list clearfix">
                                <ul>
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>عرض {{$cars->count()}} من {{$count}} سيارة</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                @foreach($cars as $car)
                    <!-- Car box 2 start -->
                        <div class="car-box-2" style="height: 290px">
                            <div class="row g-0">
                                <div class="col-lg-5 col-md-5">
                                    <div class="photo-thumbnail">
                                        <div class="photo">
                                            <img class="d-block w-100" src="{{getFile($car['image'])}}" style="height: 290px"
                                                 alt="car">
                                            <a href="{{route('carDetails',$car['id'])}}">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                            <div class="price-box">
                                                <br>
                                                <span> {{$car['price']}} L.E </span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 align-self-center">
                                    <div class="detail">
                                        <style>
                                            .userInfo{
                                                display: flex;
                                                align-items: center;
                                                /*padding: 10px 20px;*/
                                                margin-bottom: 10px;
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
                                                margin-bottom: 20px;
                                            }
                                            .detail{
                                                padding: 10px 25px !important;
                                            }
                                        </style>
                                        <div class="userInfo" >
                                            <div class="imgSize">
                                                <img class="img" src="{{getFile($car['owner']['photo'])}}">
                                            </div>
                                            <p class="userName">
                                                {{$car['owner']['name']}}
                                            </p>
                                        </div>
                                        <h1 class="title">
                                            <a href="{{route('carDetails',$car['id'])}}"> {{$car['category']['title_ar']??''}} {{$car['sub_category']['title_ar']??''}} </a>
                                        </h1>
                                        <div class="location">
                                            <a href="{{route('carDetails',$car['id'])}}">
                                                {{round($car['distance'],2)}} كم
                                            </a>
                                            <i class="flaticon-road"></i>

                                        </div>
                                        <ul class="facilities-list clearfix">
                                            @foreach($car['data'] as $dataItem)
                                                <li>{{$dataItem['value']}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->

@endsection
@section('site_js')
    @if($request->has('min_price'))
        <script>
            $(document).ready(function()
            {
                $('input[name="min_price"]').val('{{$request->min_price}}');
                $('.min-value').text('{{$request->min_price}} L.E');
            })
        </script>
    @endif

    @if($request->has('max_price'))
        <script>
            $(document).ready(function()
            {
                $('input[name="max_price"]').val('{{$request->max_price}}');
                $('.max-value').text('{{$request->max_price}} L.E');
            })
        </script>
    @endif
@endsection
