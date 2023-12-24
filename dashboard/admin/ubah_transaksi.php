<?php
$id = $_GET['ubah_transaksi'];
$query = "SELECT * FROM tb_detail_order WHERE id_dorder='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);

$query_mas = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$data[id_masakan]'");
$nm = mysqli_fetch_array($query_mas)

?>
<div class="container p-3">
    <div class="row flex-c">
        <div class="col-lg-6">
            <div class="shadow p-4 rounded">
                <div class="card-header mb-3 text-center fs-20">
                    <strong>Update Transaction</strong>
                </div>
                <div class="card-body p-3">
                    <form action="fungsi/ubahTransaksi.php?id_user=<?= $data['id_dorder'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="quantity">Name</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $nm['nama_masakan'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $data['jumlah_dorder'] ?>">
                        </div>
                        <div class="card-footer flex-c gx-5">
                            <div class="col flex-r">
                                <button type="submit" class="btn-edit">Submit</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn-delete" onclick="history.back()">Back</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>