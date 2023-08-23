<?php
include('../config.php');
include(ROOT_PATH . '/layouts/header.php');
include(ROOT_PATH . '/layouts/navbar.php');
include(ROOT_PATH . '/layouts/sidebar.php');
?>

<?php

      $sql = "SELECT students.*, courses.name as course_name FROM students
                  INNER JOIN courses ON courses.id = students.course_id 
                  ORDER BY id DESC";
      $result = $mysql->query($sql);
      $i = 1;

?>

<main>
      <div class="container-fluid px-4">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </symbol>
                  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                  </symbol>
                  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  </symbol>
            </svg>
           <div class="mt-3">
           <?php
                  if (isset($_SESSION['success_sms'])) {
                        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>' . $_SESSION['success_sms'] . '</div>
                                    </div>';
                  }
                  unset($_SESSION['success_sms']);

                  if (isset($_SESSION['error_sms'])) {
                        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>' . $_SESSION['error_sms'] . '</div>
                                    </div>';
                  }
                  unset($_SESSION['error_sms']);
            ?>
           </div>
            <h1 class="mt-4">Tables</h1>
            <div class="card mb-4">
                  <div class="card-header justify-content-between d-flex align-items-center ">
                        <div>
                              <i class="fas fa-table me-1"></i>
                              Student Tables
                        </div>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStudent">
                              + Add New
                        </button>

                  </div>
                  <div class="card-body">
                        <table id="datatablesSimple">
                              <thead>
                                    <tr>
                                          <th class="col-1">ID</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Gender</th>
                                          <th>Phone Number</th>
                                          <th>Course</th>
                                          <th>Status</th>
                                          <th>Option</th>
                                    </tr>
                              </thead>
                              <tfoot>
                                    <tr>
                                          <th>ID</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Gender</th>
                                          <th>Phone Number</th>
                                          <th>Course</th>
                                          <th>Status</th>
                                          <th>Option</th>
                                    </tr>
                              </tfoot>
                              <tbody id="table_data">
                                    <?php while ($student = $result->fetch_object()) { ?>
                                          <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $student->first_name ?></td>
                                                <td><?php echo $student->last_name ?></td>
                                                <td><?php echo ($student->gender == 1) ? 'Male' : 'Female' ?></td>
                                                <td><?php echo $student->phone_number ?></td>
                                                <td><?php echo $student->course_name ?></td>
                                                <td><?php echo ($student->status == 0) ? ' <i class="fa-solid fa-circle-xmark fa-xl" style="color: #f50000;"></i>'  :  '<i class="fa-solid fa-circle-check fa-xl" style="color: #006af5;"></i> ' ?></td>
                                                <td> 
                                                      <a href="edit.php ? id=<?php echo $student ->id?>"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button></a>
                                                </td>
                                          </tr>
                                    <?php } ?>
                              </tbody>
                        </table>
                  </div>
            </div>
      </div>
</main>

<?php
      include(ROOT_PATH . '/students/create.php');
      include(ROOT_PATH . '/layouts/footer.php');
?>