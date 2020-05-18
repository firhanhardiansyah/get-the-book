<?php

  include_once("function/helper.php");
  include_once("function/koneksi.php");

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on' ");

  $num = mysqli_num_rows($query);
  $row = mysqli_fetch_assoc($query);

  if ($num != 0) {
    session_start();

    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['level'] = $row['level'];

    header("Location:". BASE_URL . "index.php?page=my_profile&module=pesanan&action=list");
    
  } else {
    header("Location:" . BASE_URL . "index.php?page=login&notif=require");
  }
