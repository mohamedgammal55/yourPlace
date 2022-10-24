@extends('layouts.site.master')
@section('content')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>Profile</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="team-page content-area">
        <div class="container">
            <!-- Heading -->
            <h1 class="heading-2">Profile</h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row g-0 team-2 mb-50">
                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-12">
                            <div class="photo">
                                <img src="{{get_user_file(user()->user()->photo)}}" alt="avatar-9" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-8 col-sm-12 align-self-center bg">
                            <div class="detail">
                                <h4>
                                    <a href="#">{{user()->user()->name}}</a>
                                </h4>
                                <h5>Since : {{user()->user()->created_at}}</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="#">{{user()->user()->email}}</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="#"> {{user()->user()->phone}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('editProfile')}}" class="btn btn-lg btn-2 btn-primary">Update Profile</a>
                </div>
{{--                <div class="col-lg-4">--}}
{{--                    <div class="sidebar-right">--}}
{{--                        <div class="best-team widget">--}}
{{--                            <h3 class="sidebar-title">Latest Users</h3>--}}
{{--                            @foreach($users as $user)--}}
{{--                            <div class="d-flex mb-4 team-5">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{get_user_file($user->photo)}}" class="flex-shrink-0" style="margin-right: 1rem!important;" alt="team">--}}
{{--                                </a>--}}
{{--                                <div class="align-self-center">--}}
{{--                                    <h5>--}}
{{--                                        <a href="#">{{$user->name}}</a>--}}
{{--                                    </h5>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <i class="flaticon-mail"></i><a href="mailto:{{$user->email}}">{{$user->email}}</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i class="flaticon-phone"></i><a href="tel:{{$user->phone}}">{{$user->phone}}</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <!-- Related car start -->
        </div>
    </div>

    <div class="testimonial-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 bg-image"></div>
                <div class="col-lg-6 col-md-12 col-pad bg-grea">
                    <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                            <button type="button" data-bs-target="#carouselExampleFade2" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <div class="testimonial-info">
                                    <div class="main-title">
                                        <h1>Why Clients <span>Love Us</span></h1>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem Ipsum Lorem Ipsum is simply dummy text of the printing. as been the industry</p>
                                    <div class="avatar">
                                        <img src="{{asset('site/img')}}/avatar/avatar-1.jpg" alt="testimonial-user">
                                    </div>
                                    <h4>Karen Paran</h4>
                                    <p class="job">CEO, Brick Consulting</p>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <div class="testimonial-info">
                                    <div class="main-title">
                                        <h1>Why Clients <span>Love Us</span></h1>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem Ipsum Lorem Ipsum is simply dummy text of the printing. as</p>
                                    <div class="avatar">
                                        <img src="{{asset('site/img')}}/avatar/avatar-3.jpg" alt="testimonial-user">
                                    </div>
                                    <h4>Carolyn Stone</h4>
                                    <p class="job">Web Designer, Uk</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-info">
                                    <div class="main-title">
                                        <h1>Why Clients <span>Love Us</span></h1>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem Ipsum Lorem Ipsum is simply dummy text.</p>
                                    <div class="avatar">
                                        <img src="{{asset('site/img')}}/avatar/avatar-4.jpg" alt="testimonial-user">
                                    </div>
                                    <h4>Michelle Nelson</h4>
                                    <p class="job">Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
