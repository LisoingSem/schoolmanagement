<?php
      include('../config.php');
      include(ROOT_PATH . '/layouts/header.php');
      include(ROOT_PATH . '/layouts/navbar.php');
      include(ROOT_PATH . '/layouts/sidebar.php');
?>
<?php
      // get ID and check 
      $id = $_GET['id'];
      $sql = " SELECT * FROM courses WHERE id = $id";
      $result = $mysql->query($sql);
      $course = $result->fetch_assoc();

?>

<main>
      <div class="container-fluid px-4">
                              
            <h1 class="mt-4">Edit Course</h1>
            <a href="index.php"><button type="button" class="btn mb-3 btn-success">Back </button></a>

            <div class="card mb-4 p-4">
                  <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" >

                        <div class="mb-3">
                              <label for="name" class="form-label">Class Name :</label>
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo $course['name'] ?>" placeholder="Enter First Name" required>
                        </div>

                        <div class="mb-3">
                              <label for="price" class="form-label">Price :</label>
                              <input type="text" class="form-control" id="price" name="price" value="<?php echo $course['price'] ?>" placeholder="Enter First Name" required>
                        </div>

                        <div class="mb-3">
                              <label for="status" class="form-label">Status :</label></span>
                              <select id="status" name="status" class="form-select">
                                    <option selected disabled>-- Choose Status --</option>
                                    <option value="0" <?php if($course['status'] == 0) echo 'selected' ; ?>>Deleted</option>
                                    <option value="1" <?php if($course['status'] == 1) echo 'selected' ; ?>>Active</option>

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