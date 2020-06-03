<div class="mt-3">
  <div class="row">
    <div class="col-6">
      <h2><i class="fas fa-city"></i> Kota Pengiriman</h2>
    </div>
    <div class="col-6">
      <a href="<?= BASE_URL . "index.php?page=my_profile&module=kota&action=form" ?>"
        class="btn btn-primary mb-4 float-right">Tambah Data</a>
    </div>
  </div>
</div>

<?php

$query_kota = mysqli_query($con, "SELECT * FROM kota");

if (mysqli_num_rows($query_kota) == 0) {
  echo "<h3>Tidak Ada Data</h3>";
} else {
?>

<div class="card mb-4">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kota</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kota</th>
            <th>Tarif</th>
            <th>Status</th>
            <th class="text-center"><i class="fas fa-cogs"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query_kota)) :
            ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data['kota'] ?></td>
            <td><?= rupiah($data['tarif']) ?></td>
            <td><?= $data['status'] ?></td>
            <td class="text-center">
              <a href="<?= BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$data[kota_id]" ?>"
                class="btn btn-sm btn-warning mr-4"><i class="fas fa-edit"></i></a>
              <a href="<?= BASE_URL . "module/kota/action.php?button=Delete&kota_id=$data[kota_id]" ?>"
                class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php
              $no++;
            endwhile;
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
}
?>