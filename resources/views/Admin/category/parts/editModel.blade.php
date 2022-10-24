<form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('model.update',$model->id)}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$model->id}}">

    <div class="form-group">
        <label for="title_ar" class="form-control-label">Title Ar</label>
        <input type="text" class="form-control" name="title_ar" value="{{$model->title_ar}}">
    </div>

    <div class="form-group">
        <label for="title_en" class="form-control-label">Title En</label>
        <input type="text" class="form-control" name="title_en" value="{{$model->title_en}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="updateButton">Update</button>
    </div>
</form>

