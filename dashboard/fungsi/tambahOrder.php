<?php
session_start();
require '../../koneksi.php';

$meja = htmlspecialchars($_POST['meja']);
$id_order = htmlspecialchars($_POST['id_order']);
$keterangan = htmlspecialchars($_POST['keterangan']);
$user_id = $_SESSION['id_user'];
$tanggal = time();
$tanggal2 = date('d-m-Y');
if ($meja < 1) {
  $_SESSION['pesan'] = '
  <div class="alert alert-warning mb-2 alert-dismissible text-small " role="alert">
  <b>Maaf!</b> Meja belum dipilih
  <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  </div>
	';
  header('location:../index.php');
  return false;
}

mysqli_query($kon, "UPDATE tb_detail_order set status_dorde = 1 WHERE id_order = '$id_order'");

mysqli_query($kon, "UPDATE tb_meja set status = 1 WHERE meja_id = '$meja'");

$queryTambah = "INSERT INTO tb_order VALUES('$id_order', '$meja', '$tanggal', '$tanggal2', '$user_id', '$keterangan', 0)";
$query = mysqli_query($kon, $queryTambah);

if ($query > 0) {
  $_SESSION['pesan'] = `
  <div class="modal fade out-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
  <div class="modal-body">
  <div class="row">
            <div class="col-md-12">
            <div class="modal-top flex-c">
            <img src="/dashboard/assets/image/checkList.png" alt="cheklist-icon" class="wrap-pic-cir pter" width="60" height="60">
              <h3>Order Succesfully!!</h3>
              </div>
              <table class="table table-responsive-sm" border="0">
              <tfoot>
              <tr class="fs-12">
              <td align="right" colspan="4"><strong>Total : </strong></td>
              <th colspan="2">Rp. <?= rupiah($hatot) ?></th>
              </tr>
                </tfoot>
                </table>
                </div>
                </div>
                </div>
                <div class="wrap flex-c mt-5">
          <div class="col-5 text-center">
            <h4 class="d-block oren text-white rounded p-1">No Table : <?= $meja ?></h4>
            <h5 class="mb-5 mt-2">Pay at cashier</h5>
          </div>
        </div>
        <div class="flex-c">
          <button type="button" class="close p-3" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">OK</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  `;
  header('location:../index.php');
} else {
  $_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Maaf!</b> Pesanan gagal diproses
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
  header('location:../index.php');
}
