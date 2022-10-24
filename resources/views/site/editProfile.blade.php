@extends('layouts.site.master')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet"/>
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1> edit profile </h1>
                <ul class="breadcrumbs">
                    <li><a href="/"> Home </a></li>
                    <li class="active"> Edit Profile</li>
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
                <h1> Edit <span> Profile </span></h1>
            </div>
            <form action="{{route('updateProfile')}}" id="UpdateForm" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Photo</label>
                                    <input type="file" class="dropify" name="photo"
                                           data-default-file="{{asset($user->photo)}}"
                                           accept="image/png,image/webp , image/gif, image/jpeg,image/jpg"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floating-full-name" name="name"
                                           value="{{$user->name}}">
                                    <label for="floating-full-name"> Full Name </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floating-phone-Number" name="phone"
                                           value="{{$user->phone}}" maxlength="20"
                                           onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    <label for="floating-phone-Number"> Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floating-email-address" name="email"
                                           value="{{$user->email}}">
                                    <label for="floating-email-address"> Email </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floating-password" name="password"
                                           placeholder="*******">
                                    <label for="floating-password"> Password </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" id="pac-input" style="height: 40px;width: 250px;padding: 15px">
                                <input type="hidden" name="latitude" id="latitude" value="{{$user->latitude}}">
                                <input type="hidden" name="longitude" id="longitude" value="{{$user->longitude}}">
                                <div class="map" id="map" style="max-height: 400px">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send-btn text-center">
                                    <button type="submit" id="sendBtn" class="btn btn-primary btn-4 btn-lg"> Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="row">
                <div class="col-md-11">
                    <div class="notice notice-info mb-3">
                        <strong>My Addresses</strong> To Deliver Cars
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-info bomd" title="New Address"
                                style="padding: 1.2rem;color: white">
                            <i class="fas fa-plus ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{route('addNewAddress')}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" required class="form-control"
                                                   placeholder="type your address..."
                                                   name="address">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <form>
                <div class="row">
                    <div class="col-ld-12">
                        @foreach($user->addresses as $address)
                            <div class="row" id="row{{$address->id}}">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <div class="form-floating mb-3">
                                            <input type="text" readonly class="form-control" id="floating-full-name"
                                                   name="name"
                                                   value="{{$address->address}}">
                                            <label for="floating-full-name"> Address Num:{{$loop->iteration}} </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button type="button" data-id="{{$address->id}}"
                                                class="btn btn-outline-primary bomd" id="deleteBtn{{$address->id}}"
                                                title="Delete"
                                                style="padding: 1.2rem">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact 2 end -->


@endsection
@section('site_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify()
    </script>
    <script>
        $("form#UpdateForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#UpdateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#sendBtn').html(' <span style="margin-left: 4px;color: white">Wait </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
                },
                complete: function () {


                },
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success('Profile Updated Succesfully');
                        window.location.reload();
                        $('#sendBtn').html('Update');
                    } else {
                        toastr.warning('Error');
                    }
                },
                error: function (data) {
                    if (data.status == 500) {
                        $('#sendBtn').html('Update');
                        toastr.error('Server Error Please Report A Bug');
                    } else if (data.status == 422) {
                        $('#sendBtn').html('Update');
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, key);
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
        $('[id^="deleteBtn"]').on('click', function () {
            var id = ($(this).data("id"));
            $.ajax({
                type: 'POST',
                url: "{{route('DeleteAddress')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {
                    if (data.status == 200) {
                        $('#row' + id).hide();
                        toastr.success('Address Removed Successfully');
                    }
                }
            });
        });
    </script>
    <script>
        $("#pac-input").focusin(function () {
            $(this).val('');
        });
        // $('#latitude').val('');
        // $('#longitude').val('');

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{($user->latitude) ?? 39.1003215}}, lng: {{($user->longitude) ?? 30.6003215}}},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            @if ($user->latitude == null || $user->longitude == null)
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(pos),
                            map: map,
                            title: 'موقعك الحالي'
                        });
                        markers.push(marker);
                        marker.addListener('click', function () {
                            geocodeLatLng(geocoder, map, infoWindow, marker);
                        });
                        // to get current position address on load
                        google.maps.event.trigger(marker, 'click');
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    console.log('Browser does not support Geolocation');
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            @endif

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log(results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });

            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                var latlng = {
                    lat: markerCurrent.position.lat(),
                    lng: markerCurrent.position.lng()
                };
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
            }

            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function splitLatLng(latLng) {
            var newString = latLng.substring(0, latLng.length - 1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGJZRVH7V8iTcIrjCjJaXwpNWbeIKDiRk&libraries=places&callback=initAutocomplete&language=ar&region=EG
async defer"></script>
@endsection

