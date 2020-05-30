<?php

  $pesanan_id = $_GET['pesanan_id'];

  $query = mysqli_query($con, 
    "SELECT pesanan.nama_penerima,
            pesanan.nomor_telepon,
            pesanan.alamat,
            pesanan.tanggal_pemesanan,
            user.nama,
            kota.kota,
            kota.tarif
      FROM pesanan JOIN user ON pesanan.user_id=user.user_id 
      JOIN kota ON kota.kota_id=pesanan.kota_id
      WHERE pesanan.pesanan_id='$pesanan_id'");

  $row = mysqli_fetch_assoc($query);

  $nama_penerima     = $row['nama_penerima'];
  $nomor_telepon     = $row['nomor_telepon'];
  $alamat            = $row['alamat'];
  $kota              = $row['kota'];
  $tarif             = $row['tarif'];
  $tanggal_pemesanan = $row['tanggal_pemesanan'];
  $nama             = $row['nama'];

?>

<div class="container pt-4">
  <div class="card card-shadow">
    <div class="card-header">
      <h5>Pesanan</h5>
    </div>
    <div class="card-body">
      <table class="table">
        <tr>
          <th>No Pemesanan</th>
          <th>:</th>
          <td><?= $pesanan_id ?></td>
        </tr>
        <tr>
          <th>Nama Pemesan</th>
          <th>:</th>
          <td><?= ucwords($nama) ?></td>
        </tr>
        <tr>
          <th>Nama Penerima</th>
          <th>:</th>
          <td><?= ucwords($nama_penerima) ?></td>
        </tr>
        <tr>
          <th>No Telepon</th>
          <th>:</th>
          <td><?= $nomor_telepon ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <th>:</th>
          <td><?= $alamat ?></td>
        </tr>
        <tr>
          <th>Tanggal Pemesanan</th>
          <th>:</th>
          <td><?= $tanggal_pemesanan ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>