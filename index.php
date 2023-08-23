<?php
      include('config.php');
?>
<?php
      $sql_teacher = " SELECT * FROM teachers";
      $result_teacher = $mysql->query($sql_teacher);
      $total_teacher = $result_teacher->num_rows;

      $sql_newStudent = " SELECT * FROM students 
                                          WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
                                          AND YEAR(created_at) = YEAR(CURRENT_DATE()) ";
      $result_newStudent = $mysql->query($sql_newStudent);
      $total_newStudent = $result_newStudent->num_rows;

      $sql_allStudent = " SELECT * FROM students";
      $result_allStudent = $mysql->query($sql_allStudent);
      $total_allStudent = $result_allStudent->num_rows;

      $sql_Class = " SELECT * FROM rooms";
      $result_Class = $mysql->query($sql_Class);
      $total_Class = $result_Class->num_rows;

      $sql_activeClass = " SELECT * FROM rooms
                                    WHERE status = 0 ";
      $result_activeClass = $mysql->query($sql_activeClass);
      $total_activeClass = $result_activeClass->num_rows;

      $sql_course = " SELECT * FROM courses
                                    WHERE status = 1 ";
      $result_course = $mysql->query($sql_course);
      $total_course = $result_course->num_rows;

      $sql_total = "SELECT sum(courses.price) as total FROM payments
                              LEFT JOIN courses ON courses.id = payments.course_id
                              WHERE payments.status = 1
                              ORDER BY payments.id";
      $result_total_price = $mysql->query($sql_total);
      $total_price = $result_total_price->fetch_assoc();

      $sql_payment = " SELECT id FROM payments 
                                    WHERE status = 1";
      $result_payment = $mysql->query($sql_payment);
      $total_recipt = $result_payment->num_rows;

?>


<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Dashborad</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <link href="assets/css/styles.css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

      <?php
      include_once('config.php');
      include_once(ROOT_PATH . '/layouts/navbar.php');
      include_once(ROOT_PATH . '/layouts/sidebar.php');
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
                        ?>
                  </div>
                  <h1 class="mt-4 mb-4 ">Dashboard</h1>

                  <h4>All Data</h4>
                  <div class="row">
                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Teachers</div>
                                          <span class="me-3 "><?php echo $total_teacher ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('teachers/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Students</div>
                                          <span class="me-3 "><?php echo $total_allStudent ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('students/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Class</div>
                                          <span class="me-3 "><?php echo $total_Class ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('rooms/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Course</div>
                                          <span class="me-3 "><?php echo $total_course ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('courses/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-success text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Total Recipt</div>
                                          <span class="me-3 "><?php echo $total_recipt ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('payments/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-success text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Total Money</div>
                                          <span class="me-3 "><?php echo $total_price['total'] ?>$</span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('payments/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <h4>This Month</h4>
                  <div class="row">
                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-danger text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">New Student This Month</div>
                                          <span class="me-3 "><?php echo $total_newStudent ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('students/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                    <div class="d-flex align-items-center">
                                          <div class="card-body">Class Free</div>
                                          <span class="me-3 "><?php echo $total_activeClass ?></span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          <a class="small text-white stretched-link" href="<?php echo base_url('rooms/index.php') ?>">View Details</a>
                                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                              </div>
                        </div>


                  </div>
            </div>
      </main>


      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="assets/js/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
      <script src="assets/js/datatables-simple-demo.js"></script>
</body>

</html>