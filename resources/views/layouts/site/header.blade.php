<!-- Top header start -->
<header class="top-header bg-active" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7">
                <div class="list-inline">
                    <a href="tel:+201099999999"><i class="fa fa-phone"></i>+01099999999</a>
                    <a href="tel:  Hello@gmail.com"><i class="fa fa-envelope"></i> Hello@gmail.com</a>
                    <a href="tel:  Hello@gmail.com"><i class="fa fa-clock-o"></i>Sun - Fri: 9:00am - 7:00pm</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5">
                <ul class="top-social-media pull-left">
                    @if(user()->check())
                        <a href="{{route('reservations.index')}}" class="sign-in"><i class="fa fa-first-order"></i>
                            حجوزاتى
                        </a>
                        <a href="{{route('profile')}}" class="sign-in">{{user()->user()->name}}</a>
                        <a href="{{route('siteLogout')}}" class="sign-in"><i class="fa fa-sign-out"></i>
                            تسجيل الخروج
                        </a>

                    @else
                        <li>
                            <a href="{{route('siteLogin')}}" class="sign-in"><i class="fa fa-sign-in"></i> {{trans('site.Login')}} </a>
                        </li>
                        <li>
                            <a href="{{route('siteRegister')}}" class="sign-in"><i class="fa fa-user"></i> {{trans('site.register')}} </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header sticky-header sh-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand company-logo-2" href="{{route('/')}}">
                <img src="{{asset('site')}}/img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" id="drawer">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="{{route('/')}}" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{trans('site.home')}}
                        </a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('cars')}}" id="navbarDropdownMenuLink11"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            السيارات
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('about')}}" id="navbarDropdownMenuLink11"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{trans('site.about_us')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('posts')}}"> {{trans('site.news')}} </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('contact')}}"> {{trans('site.contact_us')}} </a>
                    </li>
                    <li class="nav-item dropdown m-hide">
                        {{--                        <a href="#full-page-search" class="nav-link h-icon">--}}
                        {{--                            <i class="fa fa-search"></i>--}}
                        {{--                        </a>--}}
                    </li>
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"--}}
{{--                           aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{trans('site.lang')}}--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"--}}
{{--                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                    {{ $properties['native'] }}--}}
{{--                                </a>--}}
{{--                            @endforeach--}}

{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="{{asset('site')}}/img/logos/black-logo.png" alt="logo">
        </div>
        <div class="sidebar-navigation">
            <ul class="menu-list">
                <li><a href="{{route('/')}}" class="active pt0"> {{trans('site.home')}} </a>

                </li>
                <li>
                    <a href="{{route('cars')}}"> Vehicles </a>
                </li>


                <li><a href="{{route('about')}}">{{trans('site.about_us')}} </a>

                </li>
                <li><a href="{{route('posts')}}">{{trans('site.news')}} </a>
                </li>
                <li>
                    <a href="{{route('contact')}}"> {{trans('site.contact_us')}}</a>
                </li>
                <li>
                    {{--                    <a href="#full-page-search">--}}
                    {{--                        <i class="fa fa-search"></i>--}}
                    {{--                    </a>--}}
                </li>

{{--                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                    <li>--}}
{{--                        <a rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            {{ $properties['native'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

            </ul>
        </div>
        <div class="get-in-touch">
            <h3 class="heading"> Contact With Us  </h3>
            <div class="get-in-touch-box d-flex mb-2">
                <i class="flaticon-phone"></i>
                <a href="tel:01099999999">01099999999</a>
            </div>
            <div class="get-in-touch-box d-flex mb-2">
                <i class="flaticon-mail"></i>
                <div class="media-body">
                    <a href="#"> hello@gmail.com</a>
                </div>
            </div>

        </div>

    </div>
</nav>
<!-- Sidenav end -->
