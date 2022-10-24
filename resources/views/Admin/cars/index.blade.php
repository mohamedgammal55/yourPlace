@extends('layouts/admin/master')

@section('title')  {{($setting->title) ?? ''}} | vehicles @endsection
@section('page_name')  vehicles @endsection

@section('css')
    <style>
    .modal-fullscreen{
        max-width:100%!important;
        max-height:100%!important;
        width:100% !important;
        height:100% !important;
        margin:0 !important;
    }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Vehicles List</h3>
                    <p class="text-gray mt-2">Vehicles</p>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add New
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-20px">Photo</th>
                                <th class="min-w-20px">Category</th>
                                <th class="min-w-20px">Model</th>
                                <th class="min-w-20px">Price</th>
                                <th class="min-w-20px">Images</th>
                                <th class="min-w-50px rounded-end">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
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

        <!-- Edit MODAL -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3"> سيارة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
    </div>

    <div style="display:none;">
        <table id="sample_table">
            <tr id="">
                <td><span class="sn"></span>.</td>
                <td>
                    <input type="text" name="key[]"  class="form-control"  placeholder="العنوان..." >
                </td>
                <td>
                    <input type="text" name="value[]"  class="form-control"  placeholder=" القيمة..." >
                </td>
                <td><a class="btn btn-xs delete-record " data-id="1"><i style="color: #f4516c" class="fa fa-trash"></i></a></td>
            </tr>
        </table>
    </div>

    @include('layouts/admin/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'category', name: 'category'},
            {data: 'sub_category', name: 'sub_category'},
            {data: 'price', name: 'price'},
            {data: 'images', name: 'images'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('cars.index')}}', columns);
        // Delete Using Ajax
        deleteScript('{{route('cars.delete')}}');
        // Add Using Ajax
        showAddModal('{{route('cars.create')}}');
        addScript();
        // Edit Using Ajax
        showEditModal('{{route('cars.edit',':id')}}');
        editScript();

        jQuery(document).delegate('a.add-record', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#sample_table tr'),
                size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'rec-'+size);
            element.find('.delete-record').attr('data-id', size);
            element.appendTo('#tbl_posts_body');
            element.find('.sn').html(size);

        });
        jQuery(document).delegate('a.delete-record', 'click', function(e) {

            e.preventDefault();

            var numdivs = $('.MainDivs').length;

            if (numdivs == 2){
                alert('لا يمكن الحذف')
            }else {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();

                //regnerate index number on table
                $('#tbl_posts_body tr').each(function (index) {
                    //alert(index);
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            }
            // var didConfirm = confirm("Are you sure You want to delete");
            // if (didConfirm == true) {

            // } else {
            //   return false;
            // }
        });

        $(document).on('click','.imagesBtn',function () {
            var url = "{{route('cars.show',':id')}}"
            var id = $(this).data('id');
            url = url.replace(':id',id)
                $('#modal-body').html(loader)
                $('#editOrCreate').modal('show')
                setTimeout(function () {
                    $('#modal-body').load(url)
                }, 250)
        })

        $(document).on('submit', 'Form#imagesForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(imgUploadArray);
            for (var i = 0; i < imgUploadArray.length; i++) {
                formData.append('images[]', imgUploadArray[i]);
            }

            var url = $('#imagesForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">انتظر ..</span>').attr('disabled', true);
                },
                success: function (data) {
                    if (data.status == 200) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success('تم الاضافة بنجاح');
                    } else
                        toastr.error('There is an error');
                    $('#addButton').html(`اضافة`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('هناك خطأ ما ..');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, key);
                                });
                            }
                        });
                    } else
                        toastr.error('هناك خطأ ما ..');
                    $('#addButton').html(`اضافة`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).on('click','.deleteFromOld',function()
        {
            var id = $(this).data('id');

            var method = {
                _token:"{{csrf_token()}}"
            }
            var url = "{{route('car.images.delete',':id')}}"
            url = url.replace(':id',id)
            $('#modal-body').html(loader)

            $.post(url,method,function (data) {
                setTimeout(function () {
                    $('#modal-body').load(data.url)
                }, 250)
            })
        })

    </script>
@endsection


