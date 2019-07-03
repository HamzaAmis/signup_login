<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $re_password = $_POST['re_password'];

    if ($username != '') {
      // Be sure to username
      if ($email != '') {
        // Be sure to email
        if ($password != '') {
          // Be sure to password
          if ($password == $re_password) {
            // Be sure to password == re_password
            try {

              $host = 'mysql:host=localhost;dbname=db_demo';
              $user = 'root';
              $pass = '';

              $connect = new PDO($host, $user, $pass);
              $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = "INSERT INTO user (username, email, password , re_password) VALUES ('$username', '$email', '$password' , '$re_password')";
              $connect->exec($sql);
              header("location: main_page.php");

              } catch (PDOException $e) {
                  echo "Please, Entre the Fields! " . $e -> getMessage();
              }
          }else {
            echo "there is something wrong is password sir";
          }

        }else {
          echo "Please write Password";
        }

      }else {
        echo "Please write email";
      }

    }else {
      echo "Please write username";
    }

  }
?>
