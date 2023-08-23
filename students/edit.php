<?php
      include('../config.php');
      include(ROOT_PATH . '/layouts/header.php');
      include(ROOT_PATH . '/layouts/navbar.php');
      include(ROOT_PATH . '/layouts/sidebar.php');
?>
<?php
      // get ID and check 
      $id = $_GET['id'];
      $sql = " SELECT * FROM students WHERE id = $id";
      $result = $mysql->query($sql);
      $student = $result->fetch_assoc();

?>

<?php
       $sql_course = " SELECT * FROM courses WHERE status = 1";
       $result_course = $mysql->query($sql_course);
?>


<main>
      <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Student</h1>
            <a href="index.php"><button type="button" class="btn mb-3 btn-success">Back </button></a>
            <div class="card mb-4 p-4">
                  <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >

                        <div class="mb-3">
                              <label for="first_name" class="form-label">First Name :</label>
                              <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $student['first_name'] ?>" placeholder="Enter First Name" required>
                        </div>

                        <div class="mb-3">
                              <label for="last_name" class="form-label">Last Name :</label>
                              <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $student['last_name'] ?>" placeholder="Enter Last Name" required>
                        </div>

                        <div class="mb-3">
                              <label for="gender" class="form-label">Gender :</label></span>
                              <select id="gender" name="gender" class="form-select">
                                    <option selected disabled>-- Choose Gender --</option>
                                    <option value="1" <?php if($student['gender'] == 1) echo 'selected' ; ?>>Male</option>
                                    <option value="2" <?php if($student['gender'] == 2) echo 'selected' ; ?>>Female</option>
                              </select>
                        </div>

                        <div class="mb-3">
                              <label for="phone_number" class="form-label">Phone Number :</label>
                              <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $student['phone_number'] ?>" placeholder="Enter Phone Number" required>
                        </div>

                        <div class="mb-3">
                                    <label for="course" class="form-label">Course :</label></span>
                                    <select id="course" name="course_id" class="form-select">
                                          <option disabled selected>-- Choose Course --</option>

                                          <?php while($course = $result_course->fetch_object()){ ?>
                                                <option value="<?php echo $course->id ?>" <?php if($student['course_id'] == $course->id){echo 'selected';} ?>><?php echo $course->name?></option>
                                          <?php } ?>

                                    </select>
                              </div>

                        <div class="mb-3">
                              <label for="status" class="form-label">Status :</label></span>
                              <select id="status" name="status" class="form-select">
                                    <option selected disabled>-- Choose Status --</option>
                                    <option value="0" <?php if($student['status'] == 0) echo 'selected' ; ?>>Deleted</option>
                                    <option value="1" <?php if($student['status'] == 1) echo 'selected' ; ?>>Active</option>

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