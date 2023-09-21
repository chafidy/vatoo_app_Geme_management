<?php
include("config.php");
session_start();
if(!isset($_SESSION["email"])){
  header("Location: index.html");
  exit();
}

$sess_email = $_SESSION["email"];
$sql = "SELECT user_id, firstname, lastname, email, profile_path FROM users WHERE email = :email";
$statement = oci_parse($con, $sql);
oci_bind_by_name($statement, ":email", $sess_email);
oci_execute($statement);

if (oci_fetch($statement)) {
  // Récupérer les valeurs des colonnes
  $userid = oci_result($statement, "USER_ID");
  $firstname = oci_result($statement, "FIRSTNAME");
  $lastname = oci_result($statement, "LASTNAME");
  $username = $firstname . " " . $lastname;
  $useremail = oci_result($statement, "EMAIL");
  $userprofile = "uploads/" . oci_result($statement, "PROFILE_PATH");
} else {
  $userid = "GHX1Y2";
  $username = "John Doe";
  $useremail = "mailid@domain.com";
  $userprofile = "Uploads/default_profile.png";
}
?>