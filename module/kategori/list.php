<div class="mt-3">
  <div class="row">
    <div class="col-lg-6 col-sm-6">
      <h2><i class="fas fa-th"></i> Data Kategori</h2>
    </div>
    <div class="col-lg-6 col-sm-6">
      <a href="<?= BASE_URL . "index.php?page=my_profile&module=kategori&action=form" ?>" class="btn btn-primary mb-4 float-right">Tambah Data</a>
    </div>
  </div>
</div>

<?php

$query_kategori = mysqli_query($con, "SELECT * FROM kategori");

if (mysqli_num_rows($query_kategori) == 0) {
  echo "<h3>Tidak Ada Data</h3>";
} else {
?>

  <div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Kategori Barang</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query_kategori)) :
            ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['status'] ?></td>
                <td>
                  <a href="<?= BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$data[kategori_id]" ?>" class="btn btn-sm btn-warning">Edit</a>
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