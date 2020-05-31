<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "db_book_store";

  // $host = "ftp.deadliners.my.id";
  // $user = "deadline";
  // $pass = "28desember1969";
  // $db   = "deadline_get_the_book";

  $con = mysqli_connect($host, $user, $pass, $db) or die("Koneksi Gagal");