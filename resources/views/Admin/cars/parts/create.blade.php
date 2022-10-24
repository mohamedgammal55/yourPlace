<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('cars.store')}}">
    @csrf


    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="photo" class="form-control-label">Photo</label>
                <input type="file" class="dropify" name="image" accept="image/png, image/gif, image/jpeg,image/jpg"/>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="photo" class="form-control-label">Details</label>
                <textarea id="ckTextarea" name="description"></textarea>

            </div>
        </div>
    </div>

    <hr style="width:100%;text-align:left;margin-left:0;color: black;background: black">

    <div class="row">
       <div class="col-sm-4">
           <div class="form-group">
               <label for="photo" class="form-control-label">Price</label>
               <input type="text" class="form-control numbersOnly" name="price" placeholder="السعر">

           </div>
       </div>
       <div class="col-sm-4">
           <div class="form-group">
               <label for="photo" class="form-control-label">Category</label>
               <select class="form-control" name="category_id" id="choices-category">
                   <option value="">Choose Model</option>
                   @foreach($categories as $category)
                       <option value="{{$category->id}}">{{$category->title_ar}}</option>
                   @endforeach
               </select>
           </div>
       </div>
       <div class="col-sm-4">
           <div class="form-group">
               <label for="photo" class="form-control-label">Model</label>
               <select class="form-control" name="sub_category_id" id="choices-subCategory">
                   <option value="">Choose The Category</option>

               </select>
           </div>
       </div>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0;color: black;background: black">
    <div class="table-responsive-md col-sm-12">
        <table class="table table-striped-table-bordered table-hover table-checkable table-" id="tbl_posts">
            <thead>
            <tr>

                <th>#</th>
                <th ></th>
                <th ></th>
                <th>
                    <a class="btn btn-info add-record click" data-added="0"><i class="fa fa-plus"></i></a>
                </th>
            </tr>
            </thead>
            <tbody id="tbl_posts_body">
            <tr >
                <td><span class="sn">1</span>.</td>
                <td>
                    <input type="text" name="key[]" readonly  class="form-control" value="Year"  placeholder="" >
                </td>
                <td>
                    <select name="value[]"  class="form-control">
                        @foreach(range(date('Y'), 1950) as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                </td>

                <td></td>
            </tr>
            <tr >
                <td><span class="sn">2</span>.</td>
                <td>
                    <input type="text" name="key[]" readonly  class="form-control" value="Motor"  placeholder="" >
                </td>
                <td>
                    <select class="form-control" name="value[]">
                        <option value="أتوماتيك">Automatic</option>
                        <option value="مانيوال">Manual</option>
                    </select>
                </td>

                <td></td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="addButton">Add</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
    CKEDITOR.replace( 'ckTextarea' );


    // Show sub categories
    var categories = JSON.parse('<?php echo json_encode($categories) ?>');
    $(document).on('change', '#choices-category', function () {
        var id = $(this).val();
        var category = categories.filter(oneObject => oneObject.id == id)
        if (category.length > 0) {
            var subsCategory = category[0].sub_category
            $('#choices-subCategory').html('<option value="">Choose Model</option>')
            $.each(subsCategory, function (index) {
                console.log(subsCategory[index].title_ar)

                $('#choices-subCategory').append('<option value="' + subsCategory[index].id + '">' + subsCategory[index].title_ar + '</option>')
            })
        }
    })
</script>
