<div class="mt-3">
  <div class="row">
    <div class="col-lg-6 col-sm-6">
      <h2><i class="fas fa-box"></i> Data Buku</h2>
    </div>
    <div class="col-lg-6 col-sm-6">
      <a href="<?= BASE_URL . "index.php?page=my_profile&module=buku&action=form" ?>"
        class="btn btn-primary mb-4 float-right">Tambah Data Buku</a>
    </div>
  </div>
</div>

<?php
# JOIN
$query_buku = mysqli_query($con, "SELECT buku.*, kategori.kategori FROM buku JOIN kategori ON buku.kategori_id=kategori.kategori_id ORDER BY nama_buku ASC");

if (mysqli_num_rows($query_buku) == 0) {
  echo "<h3>Tidak Ada Data</h3>";
} else {
?>

<div class="card mb-4">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data Buku</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th class="text-center"><i class="fas fa-cogs"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query_buku)) :
            ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data['kategori'] ?></td>
            <td><?= $data['nama_buku'] ?></td>
            <td><?= $data['penulis'] ?></td>
            <td><?= rupiah($data['harga']) ?></td>
            <td><?= $data['stok'] ?></td>
            <td><?= $data['status'] ?></td>
            <td class="text-center">
              <a href="<?= BASE_URL . "index.php?page=my_profile&module=buku&action=form&buku_id=$data[buku_id]" ?>"
                class="btn btn-sm btn-warning mb-3 col"><i class="fas fa-edit"></i></a>
              <a href="<?= BASE_URL . "module/buku/action.php?button=Delete&buku_id=$data[buku_id]" ?>"
                class="btn btn-sm btn-danger col"><i class="fas fa-trash-alt"></i></a>
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