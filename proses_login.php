<?php

  include_once("function/helper.php");
  include_once("function/koneksi.php");

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on' ");

  $num = mysqli_num_rows($query);
  
  if ($num != 0) {
    session_start();
    $row = mysqli_fetch_assoc($query);

    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['nama']    = $row['nama'];
    $_SESSION['level']   = $row['level'];

    // Jika user melakukan pembayaran tapi belum memasukan akun, setelah login makan akan langsung ke sini 
    if (isset($_SESSION['proses_pemesanan'])) {
      unset($_SESSION['proses_pemesanan']);
      header("Location:". BASE_URL . "index.php?page=data_pemesanan");
    } else { 
      header("Location:". BASE_URL . "index.php?page=my_profile&module=pesanan&action=list");
      // header("Location:". BASE_URL . "index.php");
    }
    
  } else {
    header("Location:" . BASE_URL . "index.php?page=login&notif=require");
  }
