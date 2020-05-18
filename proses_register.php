<?php

  include_once("function/helper.php");
  include_once("function/koneksi.php");

  $level  = "customer";
  $status = "on";

  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $alamat = $_POST['alamat'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];

  unset($_POST['password']);
  unset($_POST['re_password']);
  $data_form = http_build_query($_POST);

  $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");

  if (empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)) {
    header("Location:" . BASE_URL . "index.php?page=register&notif=require&$data_form");
  } else if ($password != $re_password) {
    header("Location:" . BASE_URL . "index.php?page=register&notif=password&$data_form");
  } else if (mysqli_num_rows($query) == 1) {
    header("Location:" . BASE_URL . "index.php?page=register&notif=email&$data_form");
  } else {
    $password = md5($password);
    mysqli_query($con, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                  VALUES ('$level', '$nama_lengkap', '$email', '$alamat','$phone', '$password', '$status')") or die(mysqli_error($con));
    header("Location:" . BASE_URL . "index.php?page=login&notif=berhasil_buat_akun");
  }
