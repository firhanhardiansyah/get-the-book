<?php if ($total_buku == 0) { ?>
<div class="container mt-3">
  <h1>Opss...</h1>
  <h1>Belum ada belanjaan.</h1>
</div>
<?php
} else {
  $no = 1;
?>
<div class="container mt-4" style="margin-bottom: 100px;">
  <div class="card card-shadow">
    <div class="card-header">
      <h5>Keranjang</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
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
            <td>
              <div class="row">
                <div class="col-lg-2 col-md-2 text-center mb-3">
                  <img src="<?= BASE_URL ?>assets/img/buku/<?= $gambar ?>" alt="" style="height: 100px">
                </div>
                <div class="col-lg-10 col-md-10 mt-2">
                  <h5 class=""><?= $nama_buku ?></h5>
                  <h6 class="text-secondary"><?= $penulis ?></h6>
                </div>
              </div>
            </td>
            <!-- Qty -->
            <td class="text-center">
              <div class="btn btn-secondary btn-sm" onclick="decrement_quantity(<?= $buku_id ?>)"
                style="margin-top: -5px; width: 30px;">-</div>
              <input type="text" class="form-group text-center update-quantity mt-1" name="<?= $buku_id ?>"
                value="<?= $quantity ?>" style="width: 50px" id="input-quantity-<?= $buku_id ?>" disabled>
              <div class="btn btn-secondary btn-sm" onclick="increment_quantity(<?= $buku_id ?>)"
                style="margin-top: -5px; width: 30px;">+</div>
            </td>
            <!-- End Qty -->
            <td class="text-center"><?= rupiah($harga) ?></td>
            <td class="text-center"><?= rupiah($total) ?></td>
            <td class="text-center">
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
              <th>Sub Total</th>
              <th></th>
              <th></th>
              <th><?= rupiah($sub_total) ?></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class="mt-4">
    <div class="row">
      <div class="col col-xl-6 col-lg-6 col-sm-6">
        <a href="<?= BASE_URL ?>index.php" class="btn btn-primary mr-3 card-shadow mb-4 col-xl-4 col-lg-4 col-md-6"
          style="border-radius: 30px; padding: 10px; width: 100%;">
          <i class="fas fa-chevron-left"></i> Kembali Belanja
        </a>
      </div>
      <div class="col col-xl-6 col-lg-6 col-sm-6">
        <a href="<?= BASE_URL ?>index.php?page=data_pemesanan"
          class="btn btn-success float-right card-shadow col-xl-4 col-lg-4 col-md-6"
          style="border-radius: 30px; padding: 10px; width: 100%;">
          Pembayaran <i class="fas fa-chevron-right"></i>
        </a>
      </div>
    </div>
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

  function decrement_quantity(buku_id) {
    var inputQuantityElement = $("#input-quantity-" + buku_id);
    if ($(inputQuantityElement).val() > 1) {
      var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
      save_to_db(buku_id, newQuantity);
    }
  }

  function increment_quantity(buku_id) {
    var inputQuantityElement = $("#input-quantity-" + buku_id);
    var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
    save_to_db(buku_id, newQuantity);
  }

  function save_to_db(buku_id, value) {
    var inputQuantityElement = $("#input-quantity-" + buku_id);
    $.ajax({
        url: "update_keranjang.php",
        data: "buku_id=" + buku_id + "&value=" + value,
        type: 'post',
        success: function (response) {
          $(inputQuantityElement).val(value);
        }
      })
      .done(function (data) {
        var json = $.parseJSON(data);
        if (json.status == true) {
          location.reload();
        } else {
          alert(json.pesan);
        }
      });
  }
</script>