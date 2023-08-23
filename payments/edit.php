<?php
      include('../config.php');
      include(ROOT_PATH . '/layouts/header.php');
      include(ROOT_PATH . '/layouts/navbar.php');
      include(ROOT_PATH . '/layouts/sidebar.php');
?>
<?php
      // get ID and check 
      $id = $_GET['id'];
      $sql = " SELECT * FROM payments WHERE id = $id";
      $result = $mysql->query($sql);
      $payment = $result->fetch_assoc();

?>

<?php

       $sql_student = " SELECT * FROM students WHERE status = 1 ORDER BY id desc";
       $result_student = $mysql->query($sql_student);
 
       $sql_course = " SELECT * FROM courses WHERE status = 1";
       $result_course = $mysql->query($sql_course);
 
       $sql_class = " SELECT * FROM rooms WHERE status = 1";
       $result_class = $mysql->query($sql_class);
?>

<main>
      <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Payment</h1>
            <a href="index.php"><button type="button" class="btn mb-3 btn-success">Back </button></a>
            <div class="card mb-4 p-4">
                  <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >

                              <div class="mb-3">
                                    <label for="student" class="form-label">Student :</label></span>
                                    <select id="student" name="student_id" class="form-select">
                                          <option disabled selected>-- Choose Student --</option>

                                          <?php while($student = $result_student->fetch_object()){ ?>
                                                <option value="<?php echo $student->id ?>" <?php if($payment['student_id'] == $student->id){echo 'selected';} ?>><?php echo $student->first_name .' '. $student->last_name ?></option>
                                          <?php } ?>

                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="course" class="form-label">Course :</label></span>
                                    <select id="course" name="course_id" class="form-select">
                                          <option disabled selected>-- Choose Course --</option>

                                          <?php while($course = $result_course->fetch_object()){ ?>
                                                <option value="<?php echo $course->id ?>" <?php if($payment['course_id'] == $course->id){echo 'selected';} ?>><?php echo $course->name?></option>
                                          <?php } ?>

                                    </select>
                              </div>


                              <div class="mb-3">
                                    <label for="class" class="form-label">Room :</label></span>
                                    <select id="class" name="class_id" class="form-select">
                                          <option disabled selected>-- Choose Room --</option>

                                          <?php while($class = $result_class->fetch_object()){ ?>
                                                <option value="<?php echo $class->id ?>" <?php if($payment['class_id'] == $class->id){echo 'selected';} ?>><?php echo $class->name?></option>
                                          <?php } ?>

                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="status" class="form-label">Payment :</label>
                                    <select id="status" name="status" class="form-select" required>
                                          <option selected disabled>--- Choose Status --</option>
                                          <option value="0" <?php if($payment['status'] == 0) echo 'selected' ; ?>>None</option>
                                          <option value="1" <?php if($payment['status'] == 1) echo 'selected' ; ?>>Payment</option>
                                    </select>
                              </div>

                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="btn_save">Save and Change</button>
                        </div>

                  </form>
            </div>
      </div>
</main>

<?php
include(ROOT_PATH . '/layouts/footer.php');
?>