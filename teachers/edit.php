<?php
      include('../config.php');
      include(ROOT_PATH . '/layouts/header.php');
      include(ROOT_PATH . '/layouts/navbar.php');
      include(ROOT_PATH . '/layouts/sidebar.php');
?>
<?php
      // get ID and check 
      $id = $_GET['id'];
      $sql = " SELECT * FROM teachers WHERE id = $id";
      $result = $mysql->query($sql);
      $teacher = $result->fetch_assoc();

?>

<?php

      $sql_subject = " SELECT * FROM courses ";
      $result_subejct = $mysql->query($sql_subject);

?>

<main>
      <div class="container-fluid px-4">
                              
            <h1 class="mt-4">Edit Teacher</h1>
            <a href="index.php"><button type="button" class="btn mb-3 btn-success">Back </button></a>

            <div class="card mb-4 p-4">
                  <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >

                        <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name :</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $teacher['first_name'] ?>" placeholder="Enter First Name " required>
                              </div>

                              <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name :</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $teacher['last_name'] ?>" placeholder="Enter First Name " required>
                              </div>

                              <div class="mb-3">
                                    <label for="gender" class="form-label">Gender :</label></span>
                                    <select id="gender" name="gender" class="form-select">
                                          <option selected disabled>-- Choose Gender --</option>
                                          <option value="0" <?php if($teacher['gender'] == 1) echo 'selected' ; ?>>Male</option>
                                          <option value="1" <?php if($teacher['gender'] == 2) echo 'selected' ; ?>>Female</option>

                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="number_phone" class="form-label">Number Phone :</label>
                                    <input type="number" class="form-control" value="<?php echo $teacher['phone_number'] ?>" id="number_phone" name="number_phone" placeholder="Enter Number Phone" required>
                              </div>


                              <div class="mb-3">
                                    <label for="email" class="form-label">Gmail :</label>
                                    <input type="email" class="form-control" value="<?php echo $teacher['gmail'] ?>" id="email" name="email" placeholder="Enter Gamil" required>
                              </div>

                              <div class="mb-3">
                                    <label for="course" class="form-label">Course :</label>
                                    <select id="course" name="course_id" class="form-select" required>
                                          <option value="" selected disabled>-- Choose Course --</option>

                                          <?php while($course = $result_subejct->fetch_object()){ ?>
                                                <option value="<?php echo $course->id ?>" <?php if($teacher['course_id'] == $course->id){echo 'selected';} ?>><?php echo $course->name ?></option>
                                          <?php } ?>

                                    </select>
                              </div>


                        <div class="mb-3">
                              <label for="status" class="form-label">Status :</label></span>
                              <select id="status" name="status" class="form-select">
                                    <option selected disabled>-- Choose Status --</option>
                                    <option value="0" <?php if($teacher['status'] == 0) echo 'selected' ; ?>>Deleted</option>
                                    <option value="1" <?php if($teacher['status'] == 1) echo 'selected' ; ?>>Active</option>

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