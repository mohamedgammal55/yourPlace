<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('site/img/favicon.ico')}}" />

<!-- TITLE -->
<title>@yield('title')</title>

<!-- BOOTSTRAP CSS -->
<link href="{{asset('admin')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{asset('admin')}}/assets/css/style.css" rel="stylesheet"/>
<link href="{{asset('admin')}}/assets/css/skin-modes.css" rel="stylesheet"/>
<link href="{{asset('admin')}}/assets/css/dark-style.css" rel="stylesheet"/>

<!-- SIDE-MENU CSS -->
<link href="{{asset('admin')}}/assets/css/sidemenu.css" rel="stylesheet">

<!--PERFECT SCROLL CSS-->
<link href="{{asset('admin')}}/assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet"/>

<!-- CUSTOM SCROLL BAR CSS-->
<link href="{{asset('admin')}}/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!--- FONT-ICONS CSS -->
<link href="{{asset('admin')}}/assets/css/icons.css" rel="stylesheet"/>

<!-- SIDEBAR CSS -->
<link href="{{asset('admin')}}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('admin')}}/assets/colors/color1.css" />


<!-- TOASTR CSS -->
@toastr_css

<!-- Switcher CSS -->
<link href="{{asset('admin')}}/assets/switcher/css/switcher.css" rel="stylesheet">
<link href="{{asset('admin')}}/assets/switcher/demo.css" rel="stylesheet">

<script defer src="{{asset('admin')}}/assets/iconfonts/font-awesome/js/brands.js"></script>
<script defer src="{{asset('admin')}}/assets/iconfonts/font-awesome/js/solid.js"></script>
<script defer src="{{asset('admin')}}/assets/iconfonts/font-awesome/js/fontawesome.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />
@yield('css')
