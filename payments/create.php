<?php

      $sql_student = " SELECT * FROM students WHERE status = 1 ORDER BY id desc";
      $result_student = $mysql->query($sql_student);

      $sql_course = " SELECT * FROM courses WHERE status = 1";
      $result_course = $mysql->query($sql_course);

      $sql_class = " SELECT * FROM rooms WHERE status = 1";
      $result_class = $mysql->query($sql_class);
?>

<div class="modal fade" id="creatPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form action="action_save.php" method="post">

                              <div class="mb-3">
                                    <label for="student" class="form-label">Student :</label>
                                    <select id="student" name="student_id" class="form-select" required>
                                          <option selected disabled>--- Choose Student --</option>
                                          <?php while ($student = $result_student->fetch_object()) {
                                                echo '<option value=" ' . $student->id . ' ">' . $student->first_name .' '.$student->last_name . '</option>';
                                          }
                                          ?>
                                    </select>
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

                              <div class="mb-3">
                                    <label for="room" class="form-label">Room :</label>
                                    <select id="room" name="class_id" class="form-select" required>
                                          <option selected disabled>--- Choose Room --</option>
                                          <?php while ($room = $result_class->fetch_object()) {
                                                echo '<option value=" ' . $room->id . ' ">' . $room->name . '</option>';
                                          }
                                          ?>
                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="status" class="form-label">Payment :</label>
                                    <select id="status" name="status" class="form-select" required>
                                          <option selected disabled>--- Choose Status --</option>
                                          <option value="0">NONE</option>
                                          <option value="1">Payment</option>
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