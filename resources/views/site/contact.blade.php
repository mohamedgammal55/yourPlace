@extends('layouts.site.master')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1> {{trans('site.contact_us')}} </h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('/')}}"> {{trans('site.home')}} </a></li>
                <li class="active"> {{trans('site.contact_us')}} </li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1> {{trans('site.contact')}}  <span> {{trans('site.with_us')}} </span></h1>
            <p> {{trans('site.for_questions')}} </p>
        </div>
        <form action="{{route('create.contact')}}" id="contactForm" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floating-full-name" name="name" placeholder="  الإسم بالكامل ">
                                <label for="floating-full-name">  {{trans('site.Full_name')}}  </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floating-email-address" name="email" placeholder="Email Address">
                                <label for="floating-email-address">  {{trans('site.E-mail')}} </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floating-subject" name="title" placeholder="الموضوع">
                                <label for="floating-subject">{{trans('site.The_Topic')}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floating-phone-Number" name="phone" placeholder="رقم الجوال" maxlength="20" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                <label for="floating-phone-Number">{{trans('site.phone_number')}}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="رسالتك" id="floatingTextarea2" name="message" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">{{trans('site.your_message')}}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" id="sendBtn" class="btn btn-primary btn-4 btn-lg">  {{trans('site.Send')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info-2">
                        <div class="ci-box d-flex mb-3">
                            <div class="icon">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="detail">
                                <h5>{{trans('site.phone_number')}}</h5>
                                <p><a href="#">01099999999</a></p>
                            </div>
                        </div>
                        <div class="ci-box d-flex  mb-3">
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <div class="detail">
                                <h5>{{trans('site.E-mail')}}</h5>
                                <p><a href="#">  Hello@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="ci-box d-flex  mb-3">
                            <div class="icon">
                                <i class="flaticon-earth"></i>
                            </div>
                            <div class="detail">
                                <h5>{{trans('site.contact_mail')}}</h5>
                                <p><a href="#">  Hello@gmail.com</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact 2 end -->

@endsection
@section('site_js')
<script>
    $("form#contactForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#contactForm').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#sendBtn').html(' <span style="margin-left: 4px;color: white">{{trans('site.wait')}} </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
            },
            complete: function(){


            },
            success: function (data) {
                if (data.status == 200){
                    toastr.success('We Have Received Your Message Successfully');
                    $('#contactForm')[0].reset();
                    $('#sendBtn').html("{{trans('site.Send')}}");
                }else {
                    toastr.warning('Error');
                }
            },
            error: function (data) {
                if (data.status == 500) {
                    $('#sendBtn').html("{{trans('site.Send')}}");
                    toastr.error('خطأ غير متوقع يرجي اعادة المحاولة');
                }
                else if (data.status == 422) {
                    $('#sendBtn').html("{{trans('site.Send')}}");
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value,key);
                            });
                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
@endsection

