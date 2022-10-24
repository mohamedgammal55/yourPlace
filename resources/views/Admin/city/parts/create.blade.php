<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('city.store')}}">
    @csrf

    <div class="form-group">
        <label for="title" class="form-control-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="addButton">Add</button>
    </div>
</form>
