<?php
      $sql = " SELECT id FROM students ";
      $result = $mysql->query($sql);
      $id = $result->num_rows;


      $sql_course = " SELECT * FROM courses WHERE status = 1";
      $result_course = $mysql->query($sql_course);
?>


<div class="modal fade" id="createStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form action="action_save.php" method="post">
                              <input type="hidden" name="id" value="<?php echo $id+1 ?>">

                              <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name :</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
                              </div>

                              <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name :</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                              </div>

                              <div class="mb-3">
                                    <label for="gender" class="form-label">Gender :</label></span>
                                    <select id="gender" name="gender" class="form-select">
                                          <option selected disabled>-- Choose Gender --</option>
                                          <option value="1">Male</option>
                                          <option value="2">Female</option>
                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="number_phone" class="form-label">Number Phone :</label>
                                    <input type="number" class="form-control" id="number_phone" name="number_phone" placeholder="Enter Number Phone" required>
                              </div>

                              <div class="mb-3">
                                    <label for="course" class="form-label">Course :</label>
                                    <select id="course" name="course_id" class="form-select" required>
                                          <option selected disabled>--- Choose Course --</option>
                                          <?php while ($course = $result_course->fetch_object()) {
                                                echo '<option value=" ' . $course->id . ' ">' . $course->name . '</option>';
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