<?php 
      $url = $_SERVER['REQUEST_URI'];    
      $array = explode('/',$url);
      $count = count($array);
?>
<div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                  <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link <?php echo ($array[$count-3] == '') ? 'active bg-primary' : ' '; ?>" href="<?php echo base_url('index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Table Datas</div>

                        <a class="nav-link <?php echo ($array[$count-2] == 'payments') ? 'active bg-success' : ' '; ?>" href="<?php echo base_url('payments/index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Payments
                        </a>

                        <a class="nav-link <?php echo ($array[$count-2] == 'rooms') ? 'active bg-primary' : ' '; ?>" href="<?php echo base_url('rooms/index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Rooms
                        </a>

                        <a class="nav-link <?php echo ($array[$count-2] == 'students') ? 'active bg-warning' : ' '; ?>" href="<?php echo base_url('students/index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Students
                        </a>
                        
                        <a class="nav-link <?php echo ($array[$count-2] == 'teachers') ? 'active bg-info' : ' '; ?>" href="<?php echo base_url('teachers/index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Teachers
                        </a>

                        <a class="nav-link <?php echo ($array[$count-2] == 'courses') ? 'active bg-black ' : ' '; ?>" href="<?php echo base_url('courses/index.php') ?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Course
                        </a>



                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              Students
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="">All Students</a>
                                    <a class="nav-link" href="">Create New</a>
                              </nav>
                        </div> -->

                        
                  </div>
            </div>
            
      </nav>
</div>
<div id="layoutSidenav_content">