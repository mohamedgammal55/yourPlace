@extends('layouts/admin/master')

@section('title')  {{($setting->title) ?? ''}} | Users @endsection
@section('page_name')Users List @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users List</h3>
                    <p class="text-gray mt-2">Users Of The Site</p>
                    <div class="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-20px">Name</th>
                                <th class="min-w-20px">Phone</th>
                                <th class="min-w-20px">Email</th>
                                <th class="min-w-20px">Join At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/admin/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
        ]
        showData('{{route('users.index')}}', columns);
    </script>
@endsection


