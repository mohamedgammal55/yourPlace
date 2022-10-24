@extends('layouts.site.master')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>  About </h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('/')}}"> Home </a></li>
                <li class="active">  About </li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Service center strat -->
<div class="about-car content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="about-car-photo">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($abouts as $about)
                            <div class="carousel-item {{($loop->first) ? 'active' : ''}}">
                                <img src="{{asset($about->photo)}}" class="d-block w-100" alt="...">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 align-self-center">
                <div class="best-used-car">
                    <h3>About <span>  {{ ($setting->title) ?? ''}}</span></h3>
                    <p>
                        {{$setting->about_us}}
                    </p>
                 </div>
            </div>
        </div>
    </div>
</div>
<!-- Service center end -->


<!-- Partners strat -->
<div class="partners">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-slider slide-box-btn">
                    @foreach($brands as $brand)
                    <div class="custom-box"><img src="{{getFile($brand->photo)}}" alt="brand" class="img-fluid"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->
@endsection
