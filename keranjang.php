<?php

if ($total_buku == 0) {
?>
<div class="container mt-3">
  <h1>Opss...</h1>
  <h1>Belum ada belanjaan.</h1>
</div>
<?php
} else {
  $no = 1;
?>
<div class="container-fluid mt-3">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead class="">
        <tr>
          <th>#</th>
          <th>Buku</th>
          <th class="text-center">Qty</th>
          <th>Harga</th>
          <th>Total Harga</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <?php
        $sub_total = 0;
        if (is_array($keranjang) || is_object($keranjang)) :
          foreach ($keranjang as $key => $value) :
            $buku_id   = $key;

            $gambar    = $value['gambar'];
            $nama_buku = $value['nama_buku'];
            $penulis   = $value['penulis'];
            $quantity  = $value['quantity'];
            $harga     = $value['harga'];

            $total = $quantity * $harga;
            $sub_total += $total;
        ?>
      <tr>
        <td><?= $no ?></td>
        <td>
          <div class="row">
            <div class="col-lg-2 col-md-2">
              <img src="<?= BASE_URL ?>assets/img/buku/<?= $gambar ?>" alt="" style="height: 100px">
            </div>
            <div class="col-lg-10 col-md-10 align-self-center">
              <h5 class=""><?= $nama_buku ?></h5>
              <h6 class="text-secondary"><?= $penulis ?></h6>
            </div>
          </div>
        </td>
        <td class="text-center">
          <input type="text" class="form-group text-center update-quantity" name="<?= $buku_id ?>"
            value="<?= $quantity ?>" style="width: 50px" id="">
        </td>
        <td><?= rupiah($harga) ?></td>
        <td><?= rupiah($total) ?></td>
        <td>
          <a href="<?= BASE_URL ?>remove_item.php?buku_id=<?= $buku_id ?>">
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
          <th></th>
          <th></th>
          <th><?= rupiah($sub_total) ?></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class="float-right">
    <a href="<?= BASE_URL ?>index.php" class="btn btn-outline-primary mr-3">
      <i class="fas fa-chevron-left"></i> Kembali Belanja
    </a>
    <a href="<?= BASE_URL ?>index.php?page=data_pemesanan" class="btn btn-primary">
      Pembayaran <i class="fas fa-chevron-right"></i>
    </a>
  </div>
</div>
<?php
}
?>

<script src="<?= BASE_URL . 'assets/js/jquery_3_4_1.min.js' ?>"></script>
<script>
  $(".update-quantity").on("input", function (e) {
    var buku_id = $(this).attr("name");
    var value = $(this).val();

    $.ajax({
        method: "POST",
        url: "update_keranjang.php",
        data: "buku_id=" + buku_id + "&value=" + value
      })
      .done(function (data) {
        var json = $.parseJSON(data);
        if (json.status == true) {
          location.reload();
        } else {
          alert(json.pesan);
        }
      });
  });
</script>