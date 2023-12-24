<div class="container p-3">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']);
    endif; ?>
    <div class="row flex-c">
        <div class="col-md-11 p-3">
            <div class="p-4 font-weight-bold shadow-sm rounded">
                REPORT
            </div>
            <div class="shadow p-4 shadow-sm rounded mt-1">
                <div class="mb-4">
                    <a href="admin/semua_laporan.php" target="_blank" class="tombol p-3 fs-14">Print All Reports <i class="fa fa-print"></i></a>
                </div>
                <table class="table table-hover table-striped table-responsive-lg fs-12" id="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Order</th>
                            <th>No Table</th>
                            <th>Costumer</th>
                            <th>Cashier</th>
                            <th>Transaction Date</th>
                            <th>Total Payment</th>
                            <th>Discount</th>
                            <th>Total Payment (Discount)</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    $transaksi = mysqli_query($kon, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
                    foreach ($transaksi as $row) :
                        $user_query =  mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$row[id_user]'");
                        $user = mysqli_fetch_assoc($user_query);
                        $order_query =  mysqli_query($kon, "SELECT * FROM tb_order WHERE id_order = '$row[id_order]'");
                        $oq = mysqli_fetch_assoc($order_query);
                        $kasir = mysqli_query($kon, "SELECT * FROM tb_transaksi WHERE nama_kasir = '$row[nama_kasir]'");
                        $k = mysqli_fetch_assoc($kasir);
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['id_order'] ?></td>
                                <td><?= $oq['meja_order'] ?></td>
                                <td><?= $user['nama_user'] ?></td>
                                <td><?= $k['nama_kasir'] ?></td>
                                <td><?= date('d-m-Y H:i', $oq['tanggal_order']) ?></td>
                                <td>Rp. <?= rupiah($row['hartot_transaksi']) ?></td>
                                <td><?= $row['diskon_transaksi'] ?>%</td>
                                <td>Rp. <?= rupiah($row['totbar_transaksi']) ?></td>
                                <td>
                                    <a href="admin/print_struk.php?id_order=<?= $row['id_order'] ?>" target="_blank" class="btn btn-primary text-white btn-sm text-small"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>