<?php
  session_start();

  if (isset($_POST['login_btn'])) {
    $username    = $_POST['username'];
    $password    = $_POST['password'];
    $_SESSION["username"] = $username;

      $contact  = new mysqli("localhost","root","","db_demo");
      $statment = $contact->prepare("SELECT * FROM user WHERE username=? AND password=?");
      $statment->bind_param("ss", $username, $password);
      $statment->execute();
      $result   = $statment -> get_result();

      if ($result->num_rows>0) {
        echo "Welcome " .$_SESSION["username"];
        header("location: main_page.php");
      }else {
        echo "Wrong password or username";
      }

  }

?>
