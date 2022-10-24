<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title> {{trans('site.your_place')}}</title>
    @include('layouts.site.head')
</head>
<body class="comon-index">
<div class="page_loader"></div>
<div class="login-section">
    <div class="container-fluid">
        <div class="row login-box">
            <div class="col-lg-6 pad-0 form-section">
                <div class="form-inner">
                    <a href="{{route('/')}}" class="logo mt-100">
                        <img src="{{($setting->logo) ?? asset('site')}}/img/logos/black-logo.png" alt="logo"
                             style="mix-blend-mode: multiply">
                    </a>
                    <h3 class="mt-4"> Login To Your Account </h3>
                    <form action="{{route('postLogin')}}" method="POST" id="LoginForm">
                        @csrf
                        <div class="form-group clearfix">
                            <input name="email" required type="email" class="form-control" placeholder=" Email Address "
                                   aria-label="Email Address">
                        </div>
                        <div class="form-group clearfix">
                            <input name="password" required type="password" class="form-control"
                                   placeholder=" Password " aria-label="Password">
                        </div>
                        <div class="form-group clearfix">
                            <select class="form-control" name="type">
                                <option value="user">User</option>
                                <option value="company">Company</option>
                            </select>
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" id="loginButton" class="btn btn-lg btn-4 btn-primary"> Login</button>
                        </div>
                        <div class="extra-login clearfix">
                            <span> You Are Always Welcome 👋 </span>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <p>Don't have an account ? <a href="{{route('siteRegister')}}" class="thembo"> sign up </a></p>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 pad-0 none-992 bg-img">
                <div class="info clearfix">
                    <h1> Welcome with <span> Your Place </span></h1>
                    <p>
                        The first company in the Arab world that allows you to rent cars from offices and acts as a
                        mediator to guarantee the rights of everyone
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login section end -->

<!-- Full Page Search -->

@include('layouts.site.scripts')
@toastr_js
@toastr_render
<script>
    $("form#LoginForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#LoginForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loginButton').html('<span style="margin-right: 4px;">wait ..</span><span class="spinner-border spinner-border-sm mr-2"></span> ').attr('disabled', true);
            },
            complete: function () {


            },
            success: function (data) {
                if (data.status == 200) {
                    toastr.success('مرحبا بك يا ' + data.name);
                    window.setTimeout(function () {
                        window.location.href = '{{url('/')}}';
                    }, 1000);
                } else if (data.status == 201) {
                    toastr.success('مرحبا بك يا ' + data.name);
                    window.setTimeout(function () {
                        window.location.href = '{{url('/admin/home')}}';
                    }, 1000);
                } else {
                    toastr.error('بيانات الدخول غير صحيحة');
                    $('#loginButton').html(`login`).attr('disabled', false);
                }
            },
            error: function (data) {
                if (data.status === 500) {
                    $('#loginButton').html(`login`).attr('disabled', false);
                    toastr.error('هناك خطأ ما');
                } else if (data.status === 422) {
                    $('#loginButton').html(`login`).attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });

                        } else {
                        }
                    });
                } else {
                    $('#loginButton').html(`login`).attr('disabled', false);
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
