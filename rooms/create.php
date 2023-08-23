<?php

      $sql_teacher = "SELECT * from teachers WHERE status = 1";
      $result_teacher = $mysql->query($sql_teacher);

      $sql_floor = "SELECT * from floors";
      $result_floor = $mysql->query($sql_floor);
      
?>


<div class="modal fade" id="createClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Classroom</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form action="action_save.php" method="post">

                              <div class="mb-3">
                                    <label for="name" class="form-label">Class Name :</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Class Name " required>
                              </div>

                              <div class="mb-3">
                                    <label for="floor" class="form-label">Floor :</label><span class="message text-danger "></span>
                                    <select id="floor" name="floor_id" class="form-select" required>
                                          <option value="" selected disabled>-- Choose Floor --</option>

                                          <?php while ($floor = $result_floor->fetch_object()) {
                                                echo '<option value=" '. $floor->id . ' ">' . $floor->name . '</option>';
                                          }
                                          ?>

                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="teacher" class="form-label">Teacher :</label></span>
                                    <select id="teacher" name="teacher_id" class="form-select" required>
                                          <option selected disabled>-- Choose Teacher --</option>
                                          <option value="0">NONE</option>

                                          <?php while ($teacher = $result_teacher->fetch_object()) {
                                                echo '<option value=" '. $teacher->id . ' ">' . $teacher->first_name.' '.$teacher->last_name  . '</option>';
                                          }
                                          ?>

                                    </select>
                              </div>

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
                              </div>
                              
                        </form>
                  </div>
                  
            </div>
      </div>
</div>