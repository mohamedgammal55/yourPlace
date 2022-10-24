@extends('layouts/admin/master')
@section('title')
    Dashboard | Reservations
@endsection
@section('page_name')
    Reservations
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Reservations Of {{($setting->title) ?? ''}}</h3>
                    <div class="">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">Customer Name</th>
                                <th class="min-w-50px">Car</th>
                                <th class="min-w-50px">Company</th>
                                <th class="min-w-50px">Address</th>
                                <th class="min-w-125px">From , To Date</th>
                                <th class="min-w-125px">Created At</th>
{{--                                @if($request->status == 'new')--}}
                                <th class="min-w-50px rounded-end">Actions</th>
{{--                                @endif--}}
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>Are You Sure Of Deleting<span id="title" class="text-danger"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">Delete !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->
        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3"> Admin Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('layouts/admin/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'car', name: 'car'},
            {data: 'company', name: 'company'},
            {data: 'two_dates', name: 'two_dates'},
            {data: 'address', name: 'address'},
            {data: 'created_at', name: 'created_at'},
{{--            @if($request->status == 'new')--}}
            {data: 'action', name: 'action', orderable: false, searchable: false},
{{--            @endif--}}
        ]
        showData(window.location,columns);

        $(document).on('click','.editBtn',function () {
            var status = $(this).data('status');
            var id = $(this).data('id');

            var url = "{{route('siteReservations.edit',':id')}}?status="+status;
            url = url.replace(':id',id)
            $.get(url,function(data){
                toastr.success('updated successfully')
                $('#dataTable').DataTable().ajax.reload();
            })
        })
    </script>
@endsection


