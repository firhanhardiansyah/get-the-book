<?php

define("BASE_URL", "http://localhost/ebook-store/");

function rupiah($nilai = 0)
{
  $string = "Rp. " . number_format($nilai);
  return $string;
}

function kategori($kategori_id = false)
{
  global $con;
  $string = "";

  $query = mysqli_query($con, "SELECT * FROM kategori WHERE status='on' ");

  $string .= 
  '<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Kategori</div>';
            while ($row = mysqli_fetch_assoc($query)) {
              $string .= "<a class='nav-link' href='".BASE_URL."index.php?kategori_id=$row[kategori_id]''> $row[kategori]</a>";
            }
  $string .= 
        '</div>
      </div>
    </nav>
  </div>';

  return  $string;
}
