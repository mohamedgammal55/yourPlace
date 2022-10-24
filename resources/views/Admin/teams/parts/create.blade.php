    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('team.store')}}">
        @csrf
        <div class="form-group">
            <label for="photo" class="form-control-label">Photo</label>
            <input type="file" class="dropify" name="photo" accept="image/png, image/gif, image/jpeg,image/jpg"/>
        </div>
        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="job" class="form-control-label">Job</label>
                    <input type="text" class="form-control" name="job">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="facebook" class="form-control-label">Facebook Link <i class="fab fa-facebook"></i> </label>
                    <input type="text" class="form-control" name="facebook">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="gmail" class="form-control-label">Gmail Link <i class="fab fa-google"></i></label>
                    <input type="email" class="form-control" name="gmail">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="twitter" class="form-control-label">Twitter Link <i class="fab fa-twitter"></i></label>
                    <input type="text" class="form-control" name="twitter">
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
