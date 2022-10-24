    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('sliders.store')}}">
        @csrf
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="title_ar" class="form-control-label">Main Title (ar)</label>
                    <input type="text" class="form-control" name="title_ar">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="title_en" class="form-control-label">Main Title (en)</label>
                    <input type="text" class="form-control" name="title_en">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="sub_title_ar" class="form-control-label">Sub Title (ar)</label>
                    <input type="text" class="form-control" name="sub_title_ar">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="sub_title_en" class="form-control-label">Sub Title (en)</label>
                    <input type="text" class="form-control" name="sub_title_en">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="button_text_ar" class="form-control-label">button text (ar)</label>
                    <input type="text" class="form-control" name="button_text_ar">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="button_text_en" class="form-control-label">button text (en)</label>
                    <input type="text" class="form-control" name="button_text_en">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="button_link" class="form-control-label">Button Link</label>
                    <input type="text" class="form-control" name="button_link" placeholder="https://google.com">
                </div>
            </div>

        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addButton">Add</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
