<?php
      include('connection.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
            .border-danger {
                  border: 1px solid red;
            }
      </style>

</head>

<body>
      <div class="container">
            <div class="row justify-content-center d-flex align-content-center mt-4 ">

                  <div class="col-7">
                        <?php
                        if (isset($_SESSION['sms_error'])) {
                              echo '
                                    <div class="alert alert-danger d-flex align-items-center " role="alert">
                                    ' . $_SESSION['sms_error'] . '
                                    </div>';
                        }
                        unset($_SESSION['sms_error']);
                        ?>

                        <div class="card-header text-center ">
                              Register
                        </div>

                        <div class="card-body">
                              <form id="formSubmit" action="action_register.php" method="post">

                                    <div class="mb-3">
                                          <label for="username" class="form-label">Username :</label>
                                          <input type="text" class="form-control" id="username" name="name" placeholder="Enter username" required>
                                    </div>

                                    <div class="mb-3">
                                          <label for="email" class="form-label">Email :</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                                    </div>

                                    <div class="mb-3">
                                          <label for="password" class="form-label">Password :</label><span class="message text-danger "></span>
                                          <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                          
                                    </div>

                                    <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                          <button class="btn btn-primary me-md-2" type="submit" id="btn_login" name="btn_save">Register</button>
                                    </div>

                              </form>
                        </div>

                        <div class="d-md-flex justify-content-md-end me-3">
                              <span>Have account already . </span> <a href="login.php"> Login</a>
                        </div>
                  </div>
            </div>
      </div>


      <script>
            $(document).ready(function() {
                  let username = $('input[name=name]')
                  let email = $('input[name=email]')
                  let password = $('input[name=password]')
                  let message = $('.message');

                  $('input').keyup(function() {
                        let value = $(this).val();
                        if (value !== '') {
                              $(this).removeClass('border-danger');
                        } else {
                              $(this).addClass('border-danger');
                        }
                  })

                  $('#btn_login').click(function() {
                        if (username.val() == '') {
                              username.addClass('border-danger');
                        }
                        if (email.val() == '') {
                              email.addClass('border-danger');
                        }
                        if (password.val() == '') {
                              password.addClass('border-danger');
                        }

                        if (username.val() !== '' && email.val() !== '' && password.val() !== '') {
                                    

                                    var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

                                    if (password.val().match(decimal)) {
                                          $('#formSubmit').submit();
                                          return true;
                                    } else {
                                          $('span').html(" Please use strong passsword , Try another")
                                          return false;
                                    }
                        }
                  })
            });
      </script>
</body>

</html>