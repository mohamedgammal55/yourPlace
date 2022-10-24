    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        </div>

        <div class="form-group">
            <label for="title" class="form-control-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="desc" class="form-control-label">Details</label>
            <textarea rows="4" type="text" class="form-control" name="desc"></textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addButton">Add</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
