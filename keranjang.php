<?php

if ($total_ebook == 0) {
?>
  <div class="container mt-3">
    <h1>Opss...</h1>
    <h1>Belum ada belanjaan.</h1>
  </div>
<?php
} else {
  $no = 1;
?>
  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="">
          <tr>
            <th>No</th>
            <th>E - Book</th>
            <th>Harga</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <?php
        $sub_total = 0;
        if (is_array($keranjang) || is_object($keranjang)) :
          foreach ($keranjang as $key => $value) :
            $ebook_id = $key;

            $nama_ebook = $value['nama_ebook'];
            $gambar = $value['gambar'];
            $harga = $value['harga'];
            $sub_total += $harga;
        ?>
            <tr>
              <td><?= $no ?></td>
              <td>
                <div class="row">
                  <div class="col-lg-2 col-md-2">
                    <img src="<?= BASE_URL ?>assets/img/ebook/<?= $gambar ?>" alt="" style="height: 100px">
                  </div>
                  <div class="col-lg-10 col-md-10 align-self-center">
                    <h5 class=""><?= $nama_ebook ?></h5>
                  </div>
                </div>
              </td>
              <td><?= rupiah($harga) ?></td>
              <td>
                <a href="<?= BASE_URL ?>remove_item.php?ebook_id=<?= $ebook_id ?>">
                  <div class="badge badge-danger">X</div>
                </a>
              </td>
            </tr>
        <?php
            $no++;
          endforeach;
        endif;
        ?>
        <tfoot>
          <tr>
            <th></th>
            <th>Sub Total</th>
            <th><?= rupiah($sub_total) ?></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="float-right">
      <a href="<?= BASE_URL ?>index.php" class="btn btn-primary mr-4">Lanjutkan Belanja</a>
      <a href="" class="btn btn-primary">Pembayaran</a>
    </div>
  </div>
<?php
}
?>