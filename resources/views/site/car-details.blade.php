@extends('layouts.site.master')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner" style="background-image: url({{getFile($car->image)}})">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1> Vehicle Details </h1>
                <ul class="breadcrumbs">
                    <li><a href="/"> Home </a></li>
                    <li class="active"> Vehicle Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="car-details-section">
                        <!-- Heading start -->
                        <div class="heading-car clearfix">
                            <div class="pull-left">
                                <h3>{{$car->category->title}} {{$car->sub_category->title}}</h3>

                            </div>
                            <div class="pull-right">
                                <h3><span> {{$car->price}}  L.E</span></h3>

                            </div>
                        </div>

                        <!-- Tabbing box start -->
                        <div class="product-slider-box clearfix mb-30">
                            <div class="product-img-slide">
                                <div class="slider-for">
                                    <img src="{{getFile($car->image)}}" style="margin-top:5px" class="img-fluid w-100"
                                         alt="slider-car">
                                    @foreach($car->images as $image)
                                        <img src="{{getFile($image->image)}}" style="margin-top:5px;height: 600px;object-fit: cover"
                                             class="img-fluid w-100" alt="slider-car">
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    <img src="{{getFile($car->image)}}" style="margin-top:5px" class="img-fluid"
                                         alt="slider-car">
                                    @foreach($car->images as $image)
                                        <div class="thumb-slide"><img style="margin-top:5px"
                                                                      src="{{getFile($image->image)}}"
                                                                      class="img-fluid" alt="small-car"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tabbing tabbing-box mb-40">


                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <div class="car-description mb-50">
                                        {!! $car->description !!}
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Contact 2 start -->
                        <div class="contact-2 ca mb-50">

                            <div class="row">

                                <div class="col-8">
                                    <div class="send-btn text-left">
                                        <button type="button" id="reservationButton"
                                                class="btn btn-primary btn-4 btn-md">حجز
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none-992">
                            <h3 class="sidebar-title"> Vehicle Details </h3>

                            <ul>
                                @foreach($car->data as $dataItem)
                                    <li>
                                        <span> {{$dataItem->key}} </span> {{$dataItem->value}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تأكيد الحجز</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  action="{{route('reservations.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$car->id}}" name="car_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="photo" class="form-control-label">من</label>
                                    <input type="date" class="form-control" name="from_date" required value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="photo" class="form-control-label">إلى</label>
                                    <input type="date" class="form-control" name="to_date" required value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="photo" class="form-control-label">العنوان</label>
                                    <select class="form-control" name="address">
                                        @foreach($addresses as $address)
                                            <option >{{$address->address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('site_js')
    <script>
        $(document).on('click', '#reservationButton', function () {
            $('#exampleModal').modal('show');
        });
    </script>
@endsection
