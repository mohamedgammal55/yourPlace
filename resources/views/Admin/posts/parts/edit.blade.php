    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('posts.update',$post->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$post->id}}">
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg" data-default-file="{{getFile($post->photo)}}"/>
        </div>

        <div class="form-group">
            <label for="title" class="form-control-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <label for="desc" class="form-control-label">Details</label>
            <textarea rows="4" type="text" class="form-control" name="desc">{{$post->desc}}"</textarea>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateButton">Update</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
