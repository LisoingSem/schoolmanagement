<?php
      include('../config.php');
      include(ROOT_PATH . '/layouts/header.php');
      include(ROOT_PATH . '/layouts/navbar.php');
      include(ROOT_PATH . '/layouts/sidebar.php');
?>
<?php
      // get ID and check 
      $id = $_GET['id'];
      $sql = " SELECT * FROM rooms WHERE id = $id";
      $result = $mysql->query($sql);
      $room = $result->fetch_assoc();

?>

<?php

      $sql_teacher = " SELECT * FROM teachers ";
      $result_teacher = $mysql->query($sql_teacher);


      $sql_floor = " SELECT * FROM floors ";
      $result_floor = $mysql->query($sql_floor);

?>

<main>
      <div class="container-fluid px-4">
                              
            <h1 class="mt-4">Edit Classroom</h1>
            <a href="index.php"><button type="button" class="btn mb-3 btn-success">Back </button></a>

            <div class="card mb-4 p-4">
                  <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >

                        <div class="mb-3">
                                    <label for="name" class="form-label">Class Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $room['name'] ?>" id="name" name="name" placeholder="Enter Class Name " required>
                              </div>

                              <div class="mb-3">
                                    <label for="floor" class="form-label">Floor :</label><span class="message text-danger "></span>
                                    <select id="floor" name="floor_id" class="form-select" required>
                                          <option value="" selected disabled>-- Choose Floor --</option>

                                          <?php while($floor = $result_floor->fetch_object()){ ?>
                                                <option value="<?php echo $floor->id ?>" <?php if($room['floor_id'] == $floor->id){echo 'selected';} ?>><?php echo $floor->name ?></option>
                                          <?php } ?>

                                    </select>
                              </div>

                              <div class="mb-3">
                                    <label for="teacher" class="form-label">Teacher :</label></span>
                                    <select id="teacher" name="teacher_id" class="form-select">
                                          <option disabled>-- Choose Teacher --</option>
                                          <option value="0">NONE</option>
                                          <?php while($teacher = $result_teacher->fetch_object()){ ?>
                                                <option value="<?php echo $teacher->id ?>" <?php if($room['teacher_id'] == $teacher->id){echo 'selected';} ?>><?php echo $teacher->first_name .' '. $teacher->last_name ?></option>
                                          <?php } ?>

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