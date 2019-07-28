<!-- Modal -->
<div class="modal fade" id="department" tab-index="-1" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">ADD DEPARTMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="index_admin.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="departmentName" title="Department Name" placeholder="Department Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="departmentCode" title="Department Code" placeholder="Department Code" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="schoolName" id="school" onChange="getSchool(this.value);">
                                <option value="" selected="selected" disabled="disabled">--Select School--</option>
                                <?php
                                include '../connect.php';
                                $sql = "SELECT * FROM school";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch()) {
                                    ?>
                                <option value="<?php echo $row['school_id']; ?>"><?php echo $row['school_code']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" id="showSchool">

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="saveDepart">Save changes</button>
            </div>
        </div>
    </div>
</div>