@extends('layouts.site.master')
@section('content')
<style>
    .tapDiv{
        display: none;
    }
</style>
    <div class="services  mainMarket">
        <div id="particles-js"></div>
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-right: 40%">
                    <div class="service-info-3">
                        <div class="icon">
                            <i class="fa fa-first-order"></i>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:{}">الحجوزات</a></h3>
                            <p>عرض جميع الحجوازت الحالية والسابقة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end banner jump -->
    <!-- ================ -->
    <section class="market">
        <div class="container">
            <div class="row justify-content-between ">

                <!-- info-->
                <div class="col-lg-12 col-md-12 ">
                    <!-- button next + prev -->
                    <div class="buttonSildBar ">
                        <button class="next " ><a href="#" class="tapButton active" data-show="nexts">الحالية</a></button>
                        <button class="prev" ><a href="#" class="tapButton" data-show="prevs">السابقة</a></button>
                    </div>
                    <!-- next -->
                    <div class="nextPreve">
                        <div class="nexts active tapDiv"  id="nexts">
                            <div class="row">
                                @foreach($reservations->where('status','new') as $reservation)
                                <div class="col-lg-6 ">
                                    <div class="car-box-3">
                                        <div class="photo-thumbnail">
                                            <div class="photo">
                                                <img class="d-block w-100" src="{{getFile($reservation->car->image)}}"
                                                     style="height: 300px" alt="car">
                                                <a href="http://engwheels.com/ar/car-details/3">
                                                    <span class="blog-one__plus"></span>
                                                </a>
                                            </div>
                                            <div class="price-box">


                                                <span>{{$reservation->price}} LE</span>
                                            </div>
                                        </div>



                                        <div class="userInfo">
                                            <div class="imgSize">
                                                <img class="img" src="{{getFile($reservation->company->photo)}}">
                                            </div>
                                            <div>
                                                <p class="userName">
                                                    {{$reservation->company->name}}
                                                </p>
                                            </div>


                                        </div>
                                        <div class="detail">
                                            <div  style="display: inline-block;width: 100%">
                                                <h1 class="title" style="display: inline-block">
                                                    <a href="{{route('carDetails',$reservation->car_id)}}">{{$reservation->car->category['title_ar']}} {{$reservation->car->sub_category['title_ar']}}</a>
                                                </h1>
                                                <h1 class="title float-end" style="display: inline-block">
                                                    <h6 style="color: grey">من {{$reservation->from_date}} الى {{$reservation->to_date}} فى منطقة
                                                        {{$reservation->address}}</h6>
                                                </h1>
                                            </div>

                                            <ul class="facilities-list clearfix">
                                                @foreach($reservation->car->data as $key => $dataItem)
                                                    @if($key < 9)
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
                        <!-- prev -->
                        <div class="prevs tapDiv" id="prevs">
                            <div class="row">
                                @foreach($reservations->where('status','!=','new') as $reservation)
                                    <div class="col-lg-6 ">
                                        <div class="car-box-3">
                                            <div class="photo-thumbnail">
                                                <div class="photo">
                                                    <img class="d-block w-100" src="{{getFile($reservation->car->image)}}"
                                                         style="height: 300px" alt="car">
                                                    <a href="http://engwheels.com/ar/car-details/3">
                                                        <span class="blog-one__plus"></span>
                                                    </a>
                                                </div>
                                                <div class="price-box">


                                                    <span>{{$reservation->price}} LE</span>
                                                </div>
                                            </div>



                                            <div class="userInfo">
                                                <div class="imgSize">
                                                    <img class="img" src="{{getFile($reservation->company->photo)}}">
                                                </div>
                                                <div>
                                                    <p class="userName">
                                                        {{$reservation->company->name}}
                                                    </p>
                                                </div>


                                            </div>
                                            <div class="detail">
                                                <div  style="display: inline-block;width: 100%">
                                                    <h1 class="title" style="display: inline-block">
                                                        <a href="{{route('carDetails',$reservation->car_id)}}">{{$reservation->car->category['title_ar']}} {{$reservation->car->sub_category['title_ar']}}</a>
                                                    </h1>
                                                    <h1 class="title float-end" style="display: inline-block">
                                                        <h6 style="color: grey">من {{$reservation->from_date}} الى {{$reservation->to_date}} فى منطقة
                                                            {{$reservation->address}}</h6>
                                                    </h1>
                                                </div>

                                                <ul class="facilities-list clearfix">
                                                    @foreach($reservation->car->data as $key => $dataItem)
                                                        @if($key < 9)
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
                </div>
            </div>
        </div>
    </section>


@endsection

@section('site_js')
    <script src="{{url('site/js/particles.min.js')}}"></script>
    <script src="{{url('site/js/app_1.js')}}"></script>
    <script>
        $(document).on('click','.tapButton',function()
        {
            var id = $(this).data('show');
            $('.tapButton').removeClass('active')
            $(this).addClass('active')

            $('.tapDiv').removeClass('active')
            $('#'+id).addClass('active')
        })
    </script>
@endsection
