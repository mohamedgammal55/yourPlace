<!DOCTYPE html>
<html lang="{{\Illuminate\Support\Facades\App::getLocale()}}" dir="{{(\Illuminate\Support\Facades\App::getLocale() == "ar") ? "rtl" : "ltr"}}">
<head>
    <title> {{trans('site.your_place')}}</title>
    @include('layouts.site.head')
</head>
<body class="comon-index">
<div class="page_loader"></div>
@include('layouts.site.header')

    @yield('content')

@include('layouts.site.footer')
@include('layouts.site.scripts')
@toastr_js
@toastr_render
</body>
</html>
