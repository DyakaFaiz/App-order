<link rel="stylesheet" href="/dashboard/assets/css/custom.css">
<link rel="stylesheet" href="/auth/css/util.css">
<div class="container mt-3">
    <div class="col">
        <div class="row text-center align-items-center">
            <div class="col-sm-4 mb-3 flex-r">
                <a href="index.php?coffee" class="w-50 p-2 abu pter text-decoration-none text-black bo-sisi">COFFEE</a>
            </div>
            <div class="col-sm-4 mb-3 flex-c">
                <a href="#" class="w-50 border p-2 abu pter text-decoration-none text-black bo-sisi shadow">NO COFFEE</a>
            </div>
            <div class="col-sm-4 mb-3 flex-l">
                <a href="index.php?dessert" class="w-50 border p-2 abu pter text-decoration-none text-black bo-sisi">Dessert</a>
            </div>
        </div>
    </div>
</div>

<div class="container shadow b-r-navbar">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']);
    endif; ?>
    <div class="row p-3">
        <div class="container-title text-center">
            <h4 class="mb-2 fs-20">No Coffee</h4>
        </div>
        <div class="col-md-12">
            <div class="row p-1 flex-c">
                <!-- mengambil data dari database -->
                <?php
                $query = "SELECT * FROM tb_masakan WHERE kategori_masakan='NoCoffee' ORDER BY id_masakan LIMIT 5";
                $sql = mysqli_query($kon, $query);
                while ($data = mysqli_fetch_array($sql)) :
                ?>
                    <div class="col-lg-2 mb-1">
                        <div class="shadow p-3 mb-2 bg-white rounded">
                            <img class="card-img-top shadow mb-4 bg-white rounded" height="140" src="assets/image/NoCoffee/<?= $data['foto'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <div class="mb-1">

                                    <?php if ($data['status_masakan'] == 1) : ?>
                                        <span class="badge badge-success">Tersedia</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Tidak Tersedia</span>
                                    <?php endif; ?>

                                </div>
                                <h4 class="card-title fs-16 p-2" style="text-transform: capitalize;"><?= $data['nama_masakan'] ?></h4>
                                <?php
                                $harga = $data['harga_masakan'];
                                if ($_SESSION['level'] == "") {
                                    $harga = $data['harga_masakan'] + 5000;
                                }

                                ?>
                                <p class="card-text p-2 fs-14"><strong>Rp. <?= rupiah($harga) ?></strong></p>
                            </div>
                            <?php if ($data['status_masakan'] == 1) : ?>
                                <button type="button" class="btn btn-sm btn-block text-white" style="background-color: #b94d05;" data-toggle="modal" data-target="#masakan_<?= $data['id_masakan']; ?>">
                                    Beli
                                </button>
                            <?php else : ?>
                                <a href="index.php?tambah=<?= $data['id_masakan'] ?>" class="btn btn-grey btn-sm btn-block disabled">Beli</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="masakan_<?= $data['id_masakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xs" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="fungsi/orderMakanan.php" method="POST">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-7 flex-c">
                                                <img src="assets/image/NoCoffee/<?= $data['foto'] ?>" alt="" style="" class="card-img-top shadow p-2 img-thumbnail">
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="hidden" name="id_masakan" value="<?= $data['id_masakan'] ?>">
                                                <div class="form-group">
                                                    <label>Menu</label>
                                                    <input type="text" readonly class="form-control" value="<?= $data['nama_masakan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <input type="text" readonly class="form-control" value="<?= $data['harga_masakan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Pesanan</label>
                                                    <input type="number" class="form-control" name="jumlah" value="1" min="1" max="20">
                                                </div>
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>