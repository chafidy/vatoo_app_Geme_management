<?php
require('config.php');
if (isset($_REQUEST['firstname'])) {
  if ($_REQUEST['password'] == $_REQUEST['confirm_password']) {
    $firstname = $_REQUEST['firstname'];
    //$firstname = oci_parse($con, $firstname);
    $lastname = $_REQUEST['lastname'];
    //$lastname = oci_parse($con, $lastname);

    $email = $_REQUEST['email'];
   // $email = oci_parse($con, $email);

    $password = $_REQUEST['password'];
    //$password = oci_parse($con, $password);

    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into users (firstname, lastname, password, email, trn_date) VALUES (:firstname, :lastname, :password, :email, TO_DATE(:trn_date, 'YYYY-MM-DD HH24:MI:SS'))";
    $statement = oci_parse($con, $query);
    oci_bind_by_name($statement, ":firstname", $firstname);
    oci_bind_by_name($statement, ":lastname", $lastname);
    oci_bind_by_name($statement, ":password", md5($password));
    oci_bind_by_name($statement, ":email", $email);
    oci_bind_by_name($statement, ":trn_date", $trn_date);
    oci_execute($statement);

    $rowsAffected = oci_num_rows($statement);
    if ($rowsAffected > 0) {
      header("Location: login.php");
    }
  } else {
    echo ("ERROR: Please Check Your Password & Confirmation password");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vatoo | Register</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      color: #000;
      background: #fff;
      font-family: 'Roboto', sans-serif;
    }

    .form-control {
      height: 40px;
      box-shadow: none;
      color: #969fa4;
    }

    .form-control:focus {
      border-color: #5cb85c;
    }

    .form-control,
    .btn {
      border-radius: 3px;
    }

    .signup-form {
      width: 450px;
      margin: 0 auto;
      padding: 30px 0;
      font-size: 15px;
    }

    .signup-form h2 {
      color: #636363;
      margin: 0 0 15px;
      position: relative;
      text-align: center;
    }

    .signup-form h2:before,
    .signup-form h2:after {
      content: "";
      height: 2px;
      width: 30%;
      background: #d4d4d4;
      position: absolute;
      top: 50%;
      z-index: 2;
    }

    .signup-form h2:before {
      left: 0;
    }

    .signup-form h2:after {
      right: 0;
    }

    .signup-form .hint-text {
      color: #999;
      margin-bottom: 30px;
      text-align: center;
    }

    .signup-form form {
      color: #999;
      border-radius: 3px;
      margin-bottom: 15px;
      background: #fff;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 1px solid #ddd;
    }

    .signup-form .form-group {
      margin-bottom: 20px;
    }

    .signup-form input[type="checkbox"] {
      margin-top: 3px;
    }

    .signup-form .btn {
      font-size: 16px;
      font-weight: bold;
      min-width: 140px;
      outline: none !important;
    }

    .signup-form .row div:first-child {
      padding-right: 10px;
    }

    .signup-form .row div:last-child {
      padding-left: 10px;
    }

    .signup-form a:hover {
      text-decoration: none;
    }

    .signup-form form a {
      color: #5cb85c;
      text-decoration: none;
    }

    .signup-form form a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="signup-form">
    <form action="" method="POST" autocomplete="off">
      <h2>Register</h2>
      <div class="form-group">
        <div class="row">
          <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
          <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
        </div>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
      </div> 
      <!--<div class="input-group col-md mb-3 mt-3">
                                <div class="custom-file">
                                    <input type="file" name='file' class="custom-file-input" id="profilepic" aria-describedby="profilepicinput">
                                    <label class="custom-file-label" for="profilepic">Change Photo</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" name='but_upload' id="profilepicinput">Upload Picture</button>
                                </div>
                            </div>-->
      <div class="form-group">
        <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" style="border-radius:0%;">Register</button>
      </div>
    </form>
    <div class="text-center">Already have an account? <a class="text-success" href="login.php">Login Here</a></div>
  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Croppie -->
<script src="js/profile-picture.js"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script>
  feather.replace()
</script>

</html>