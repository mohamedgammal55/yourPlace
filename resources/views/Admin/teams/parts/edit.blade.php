    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('team.update',$team->id)}}" >
    @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$team->id}}">
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg"
                   data-default-file="{{getFile($team->photo)}}"/>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$team->name}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="job" class="form-control-label">Job</label>
                    <input type="text" class="form-control" name="job" value="{{$team->job}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="facebook" class="form-control-label">Facebook Link <i class="fab fa-facebook"></i> </label>
                    <input type="text" class="form-control" name="facebook" value="{{$team->facebook}}">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="gmail" class="form-control-label">Gmail Link <i class="fab fa-google"></i></label>
                    <input type="email" class="form-control" name="gmail" value="{{$team->gmail}}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="twitter" class="form-control-label">Twitter Link <i class="fab fa-twitter"></i></label>
                    <input type="text" class="form-control" name="twitter" value="{{$team->twitter}}">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateButton">Update</button>
        </div>
    </form>
<script>
    $('.dropify').dropify()
</script>
