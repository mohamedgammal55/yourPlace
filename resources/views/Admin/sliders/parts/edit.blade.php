    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('sliders.update',$slider->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$slider->id}}">
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{getFile($slider->photo)}}"/>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="title_ar" class="form-control-label">main title (ar)</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$slider->title_ar}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="title_en" class="form-control-label">main title (en)</label>
                    <input type="text" class="form-control" name="title_en" value="{{$slider->title_en}}">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="sub_title_ar" class="form-control-label">sub title (ar)</label>
                    <input type="text" class="form-control" name="sub_title_ar"  value="{{$slider->sub_title_ar}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="sub_title_en" class="form-control-label">sub title (en)</label>
                    <input type="text" class="form-control" name="sub_title_en"  value="{{$slider->sub_title_en}}">
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="button_text_ar" class="form-control-label">button text (ar)</label>
                    <input type="text" class="form-control" name="button_text_ar"  value="{{$slider->button_text_ar}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="button_text_en" class="form-control-label">button text (en)</label>
                    <input type="text" class="form-control" name="button_text_en"  value="{{$slider->button_text_en}}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="button_link" class="form-control-label">button link</label>
                    <input type="text" class="form-control" name="button_link" placeholder="https://google.com/">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            <button type="submit" class="btn btn-success" id="updateButton">update</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
