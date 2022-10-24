<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<!-- External CSS libraries -->
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/bootstrap.rtl.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/bootstrap-submenu.css">

<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/fonts/linearicons/style.css">
<link rel="stylesheet" type="text/css"  href="{{asset('site')}}/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" type="text/css"  href="{{asset('site')}}/css/dropzone.css">
<link rel="stylesheet" type="text/css"  href="{{asset('site')}}/css/slick.css">
<link rel="stylesheet" type="text/css"  href="{{asset('site')}}/css/lightbox.min.css">
<link rel="stylesheet" type="text/css"  href="{{asset('site')}}/css/jnoty.css">

<!-- Custom stylesheet -->
<link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/sidebar.css">
@if(\Illuminate\Support\Facades\App::getLocale() == "ar")
    <link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/ar-style.css">
@else
     <link rel="stylesheet" type="text/css" href="{{asset('site')}}/css/style.css">
@endif
<link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('site')}}/css/skins/red.css">

<!-- Favicon icon -->
<link rel="shortcut icon" href="{{asset('site')}}/img/favicon.ico" type="image/x-icon" >
@toastr_css
@yield('site-css')
