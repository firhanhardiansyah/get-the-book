<div class="container">
  <div class="mt-3">
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-8">
        <h2><i class="fab fa-adversal"></i> Banner</h2>
      </div>
      <div class="col-lg-6 col-sm-6 col-4">
        <a href="<?= BASE_URL . "index.php?page=my_profile&module=banner&action=form" ?>" class="btn btn-primary mb-4 float-right">Tambah Data</a>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <?php

  $query_banner = mysqli_query($con, "SELECT * FROM banner");

  if (mysqli_num_rows($query_banner) == 0) {
    echo "<h3>Tidak Ada Data</h3>";
  } else {
  ?>
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-table mr-1"></i>Banner</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Banner</th>
                <th>Link</th>
                <th>Status</th>
                <th class="text-center"><i class="fas fa-cogs"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($data = mysqli_fetch_assoc($query_banner)) :
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['banner'] ?></td>
                  <td><?= $data['link'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td class="text-center">
                    <a href="<?= BASE_URL . "index.php?page=my_profile&module=banner&action=form&banner_id=$data[banner_id]" ?>" class="btn btn-sm btn-warning col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mr-3 mt-1 mb-1"><i class="fas fa-edit"></i></a>
                    <a href="<?= BASE_URL . "module/banner/action.php?button=Delete&banner_id=$data[banner_id]" ?>" class="btn btn-sm btn-danger col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"><i class="fas fa-trash-alt"></i></a>
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
</div>

<?php
  }
?>