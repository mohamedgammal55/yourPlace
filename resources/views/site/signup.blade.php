<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title> {{trans('site.your_place')}}</title>
    @include('layouts.site.head')
</head>
<body class="comon-index">
<div class="page_loader"></div>
<!-- sign-up section start -->
<div class="login-section">
    <div class="container-fluid">
        <div class="row login-box">
            <div class="col-lg-6 pad-0 form-section">
                <div class="form-inner">
                    <a href="{{route('/')}}" class="logo">
                        <img src="{{($setting->logo) ?? asset('site')}}/img/logos/black-logo.png" alt="logo" style="mix-blend-mode: multiply">
                    </a>
                    <h3 class="mt-4"> Create account </h3>
                    <form id="myForm" action="{{route('postRegister')}}" >
                        @csrf
                        <div class="form-group clearfix">
                            <input name="name" type="text" class="form-control" placeholder=" full name" aria-label="Full Name">
                        </div>
                        <div class="form-group clearfix">
                            <input name="phone" type="text" class="form-control" placeholder=" phone number" aria-label="Phone">
                        </div>
                        <div class="form-group clearfix">
                            <input name="email" type="email" class="form-control" placeholder=" email address " aria-label="Email Address">
                        </div>
                        <div class="form-group clearfix">
                            <input name="password" type="password" class="form-control" placeholder=" password " aria-label="Password">
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-4 btn-primary" id="submitButton"> Register </button>
                        </div>
                        <div class="extra-login clearfix">
                            <span> You Are Always Welcome 👋 </span>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <p>Do have an account ? <a href="{{route('siteLogin')}}">  login now </a></p>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                <div class="info clearfix">
                    <h1>        Welcome with  <span> Your Place </span></h1>
                    <p>
                        The first company in the Arab world that allows you to rent cars from offices and acts as a mediator to guarantee the rights of everyone
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login section end -->
@include('layouts.site.scripts')
@toastr_js
@toastr_render
<script>
    $("form#myForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#myForm').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#submitButton').html('<span style="margin-right: 4px;">انتظر ..</span><span class="spinner-border spinner-border-sm mr-2"></span> ').attr('disabled', true);
            },
            complete: function(){


            },
            success: function (data) {
                if (data.status == 200){
                    toastr.success('مرحبا بك يا '+data.name);
                    window.setTimeout(function() {
                        window.location.href='/profile';
                    }, 1000);
                }
            },
            error: function (data) {
                if (data.status === 500) {
                    $('#submitButton').html(`Register`).attr('disabled', false);
                    toastr.error('هناك خطأ ما');
                }
                else if (data.status === 422) {
                    $('#submitButton').html(`Register`).attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });

                        } else {
                        }
                    });
                }else {
                    $('#submitButton').html(`Register`).attr('disabled', false);
                    toastr.error('يوجد خطأ ما ..');
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>

</body>
</html>
