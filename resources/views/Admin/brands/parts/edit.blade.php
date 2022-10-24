<form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('city.update',$city->id)}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$city->id}}">

    <div class="form-group">
        <label for="title" class="form-control-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{$city->title}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
        <button type="submit" class="btn btn-success" id="updateButton">Update</button>
    </div>
</form>

