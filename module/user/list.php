<div class="mt-3 mb-3">
  <h2><i class="fas fa-user"></i> User</h2>
</div>

<?php

$query_admin = mysqli_query($con, "SELECT * FROM user");

if (mysqli_num_rows($query_admin) == 0) {
  echo "<h3>Tidak Ada Data</h3>";
} else {
?>
<div class="card mb-4">
  <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Level</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query_admin)) :
            ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['phone'] ?></td>
            <td><?= $data['level'] ?></td>
            <td><?= $data['status'] ?></td>
            <td>
              <a href="<?= BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$data[user_id]" ?>"
                class="btn btn-sm btn-warning">Edit</a>
              <a href="<?= BASE_URL . "module/user/action.php?button=Delete&user_id=$data[user_id]" ?>"
                class="btn btn-sm btn-danger">Delete</a>
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