<?php

  $pesanan_id = $_GET['pesanan_id'];

  $query = mysqli_query($con, 
    "SELECT pesanan.nama_penerima,
            pesanan.nomor_telepon,
            pesanan.alamat,
            pesanan.tanggal_pemesanan,
            user.nama,
            kota.kota,
            kota.tarif,
            pesanan.status
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
  $nama              = $row['nama'];
  $status            = $row['status'];

?>

<div class="container pt-4">
  <div class="row">
    <div class="col-xl-8 mb-4">
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
            <tr>
              <th>Status Pembayaran</th>
              <th>:</th>
              <td><?= $array_status_pesanan[$status] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <?php 
      if ($status == 0 ) :
    ?>
    <div class="col-xl-4">
      <div class="card card-shadow">
        <div class="card-header">
          <h5>Keterangan Pembayaran</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Silahkan lakukan pembayaran ke Bank Toyib</p>
          <p class="card-text">No Rekening : 0000-1234-8899 <br> (A/N Deadliners)</p>
          <p class="card-text">Setelah melakukan pembayaran <br> Silahkan lakukan konfirmasi</p>
          <a href="<?= BASE_URL ?>index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=<?= $pesanan_id ?>"
            class="btn btn-success card-shadow" style="border-radius: 30px; padding: 10px; width: 100%;">Konfirmasi</a>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>


  <div class="mt-4 card card-shadow">
    <div class="card-header">
      <h5>Detail Pemesanan</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Nama Buku</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
          </thead>
          <tbody>
            <?php 
          $query_detail_pemesanan = mysqli_query($con, "SELECT pesanan_detail.*, buku.nama_buku FROM pesanan_detail JOIN buku ON pesanan_detail.buku_id=buku.buku_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
          
          $no = 1;
          $sub_total = 0;

          while ($row_detail_pemesanan = mysqli_fetch_assoc($query_detail_pemesanan)) :
            $total = $row_detail_pemesanan['quantity'] * $row_detail_pemesanan['harga'];
            $sub_total += $total;
        ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row_detail_pemesanan['nama_buku'] ?></td>
              <td><?= $row_detail_pemesanan['quantity'] ?></td>
              <td><?= rupiah($row_detail_pemesanan['harga']) ?></td>
              <td><?= rupiah($total) ?></td>
            </tr>
            <?php
          $no++;
          endwhile;

          $sub_total += $tarif;
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Biaya Pengiriman</th>
              <th></th>
              <th></th>
              <th><?= rupiah($tarif) ?></th>
            </tr>
            <tr>
              <th></th>
              <th>Sub Total</th>
              <th></th>
              <th></th>
              <th><?= rupiah($sub_total) ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>