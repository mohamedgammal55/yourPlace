<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('company.update')}}" >
    @csrf
        <input type="hidden" value="{{$admin->id}}" name="id">
        <div class="form-group">
            <label for="name" class="form-control-label">Photo</label>
            <input type="file" id="testDrop" class="dropify" name="photo" data-default-file="{{get_user_file($admin->photo)}}"/>
        </div>
        <div class="form-group">
            <label for="name" class="form-control-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$admin->name}}">
        </div>
        <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$admin->email}}">
        </div>
        <div class="form-group">
            <label for="password" class="form-control-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="********">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateButton">Update</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
