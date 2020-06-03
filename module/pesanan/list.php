<?php

# Jika menggunakan akun superadmin maka tampilan pemesanannya akan terlihat semua
if ($level == "superadmin") {
  $query_pesanan = mysqli_query($con, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan ASC");
} else {
  $query_pesanan = mysqli_query($con, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan ASC");
}


if (mysqli_num_rows($query_pesanan) == 0) {
?>
<div class="container pt-4">
  <h4>Belom ada pesanan yang tesedia</h4>
</div>
<?php
} else {
?>
<div class="container pt-4">
  <div class="card card-shadow mb-4">
    <div class="card-header">
      <h4><i class="fas fa-box-open"></i> Data Pemesanan</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
          <thead>
            <th>#</th>
            <th>Nomer Pesanan</th>
            <th>Nama</th>
            <th>Status</th>
            <th class="text-center"><i class="fas fa-cogs"></i></th>
          </thead>
          <tbody>
            <?php
          $no = 1;
          while ($row = mysqli_fetch_assoc($query_pesanan)) : 
            $status = $row['status']
          ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row['pesanan_id'] ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $array_status_pesanan[$status] ?></td>
              <td class="text-center">
                <a class="btn btn-primary btn-sm col-12 col-md-4 col-lg-4 col-xl-4 mr-3 mt-1 mb-1"
                  href="<?= BASE_URL ?>index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=<?= $row['pesanan_id']?>"><i class="fas fa-id-card"></i></a>
                <!-- Button untuk superadmin -->
                <?php if ($level == "superadmin") : ?>
                <a class="btn btn-warning btn-sm col-12 col-md-4 col-lg-4 col-xl-4"
                  href="<?= BASE_URL ?>index.php?page=my_profile&module=pesanan&action=status&pesanan_id=<?= $row['pesanan_id']?>"><i class="fas fa-edit"></i>
                </a>
                <?php endif ?>
                <!-- End Button -->
              </td>
            </tr>
            <?php $no++;
          endwhile ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
}
?>