<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Students</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="reference_number" class="col-sm-3 control-label">Reference Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="reference_number" name="reference_number" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mname" class="col-sm-3 control-label">Middle Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="mname" name="mname">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="phone" class="col-sm-3 control-label">Phone Number</label>

                  	<div class="col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="residence_status" class="col-sm-3 control-label">Residence Status</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="residence_status" id="residence_status" required>
                        <option value="" selected>- Select -</option>
                        <option value="Resident">Resident</option>
                        <option value="Non-Resident">Non-Resident</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="residence" class="col-sm-3 control-label">Residence</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="residence" name="residence">
                    </div>
                </div>
                <div class="form-group">
                    <label for="programme" class="col-sm-3 control-label">Programme</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="programme" name="programme">
                    </div>
                </div>
                <div class="form-group">
                    <label for="admission_year" class="col-sm-3 control-label">Admission Year</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="admission_year" name="admission_year">
                    </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-3 control-label">Level</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="level" name="level">
                    </div>
                </div>
                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="reference_number"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php">
            		<input type="hidden" class="empid" name="id">
                 <div class="form-group">
                    <label for="edit_reference_number" class="col-sm-3 control-label">Reference Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_reference_number" name="reference_number" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_mname" class="col-sm-3 control-label">Middle Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_mname" name="mname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_phone" class="col-sm-3 control-label">Phone Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_phone" name="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_residence_status" class="col-sm-3 control-label">Residence Status</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="residence_status" id="edit_residence_status" required>
                        <option selected id="residence_status_val"></option>
                        <option value="Resident">Resident</option>
                        <option value="Non-Resident">Non-Resident</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_residence" class="col-sm-3 control-label">Residence</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_residence" name="residence">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_programme" class="col-sm-3 control-label">Programme</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_programme" name="programme">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_admission_year" class="col-sm-3 control-label">Admission Year</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_admission_year" name="admission_year">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_level" class="col-sm-3 control-label">Level</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_level" name="level">
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="reference_number"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE STUDENT</p>
	                	<h2 class="bold del_student_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <!-- <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div> -->
</div>    