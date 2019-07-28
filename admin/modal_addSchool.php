<!-- Modal -->
<div class="modal fade" id="school" tab-index="-1" role="dialog" aria-labelledby="schoolModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="schoolModalLabel">ADD SCHOOL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="SchoolName" placeholder="School Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="SchoolCode" placeholder="School Code" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="saveSchool">Save changes</button>
            </div>
        </div>
    </div>
</div>