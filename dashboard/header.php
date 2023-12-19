<?php
session_start();
include '../koneksi.php';
include 'fungsi/rupiah.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700&display=swap" rel="stylesheet">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dashboard/assets/css/custom.css">
  <link rel="stylesheet" href="assets/fontawesome-pro/css/all.min.css">
  <link rel="stylesheet" href="../auth/css/util.css">
  <link rel="icon" type="image/jpg" href="/dashboard/assets/image/logoIcon.jpg" style="border-radius: 50%;" />
  <!-- <script src="https://kit.fontawesome.com/7ff23e7e04.js" crossorigin="anonymus"></script> -->
  <title>Take It!</title>

</head>

<body>
  <?php
  $color = "#D9D9D9CC";
  $level = $_SESSION['level'];
  $htm = 'text-dark';
  ?>
  <div class="container">
    <nav class="navbar navbar-expand-md b-r-navbar p-2" style="background-color: <?= $color ?>;">
      <img src="assets/image/logo.jpg" class="wrap-pic-cir pter" alt="" width="60" height="60" class="mb-1">
      <div class="col text-right">
        <div class="row flex-r">
          <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto ml-3">
                <?php
                if (isset($_GET['home'])) {
                  $home = "active";
                } elseif (isset($_GET['dashboard'])) {
                  $dash = "active";
                } elseif (isset($_GET['laporan'])) {
                  $lap = "active";
                } elseif (isset($_GET['order'])) {
                  $or = "active";
                } elseif (isset($_GET['user'])) {
                  $us = "active";
                } elseif (isset($_GET['makanan'])) {
                  $m = "active";
                } elseif (isset($_GET['minuman'])) {
                  $m = "active";
                } elseif (isset($_GET['transaksi'])) {
                  $tran = "active";
                } else {
                  $home = "active";
                }
                ?>

                <?php if ($level == "Admin") : ?>

                  <a class="nav-link nav-item p-2 <?= $dash, $htm ?>" href="index.php?dashboard">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-link nav-item p-2 <?= $m, $htm ?>" href="index.php?dtCoffee">Menu</a>
                  <a class="nav-link nav-item p-2 <?= $us, $htm ?>" href="index.php?user">User Data</a>
                  <a class="nav-link nav-item p-2 <?= $lap, $htm ?>" href="index.php?laporan">Report <span class="sr-only">(current)</span></a>

                <?php elseif ($level == "Cashier") : ?>
                  <a class="nav-link nav-item p-2 <?= $home, $htm ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-link nav-item p-2 <?= $us, $htm ?>" href="index.php?user">User Data</a>
                  <a class="nav-link nav-item p-2 <?= $tran, $htm ?>" href="index.php?transaksi">Input Transaction <span class="sr-only">(current)</span></a>
                  <a class="nav-link nav-item p-2 <?= $lap, $htm ?>" href="index.php?laporan">Report <span class="sr-only">(current)</span></a>

                <?php elseif ($level == "Owner") : ?>
                  <a class="nav-link nav-item p-2 <?= $dash, $htm ?>" href="index.php?dashboard">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-link nav-item p-2 <?= $lap, $htm ?>" href="index.php?laporan">Report <span class="sr-only">(current)</span></a>

                <?php elseif ($level == "Customer" || $level == "") : ?>
                  <a class="nav-link ml-3 fs-15 text-center p-2 <?= $home ?>" href="index.php">Home</a>
                <?php endif; ?>

              </ul>
              <ul class="navbar-nav">
                <?php if ($_SESSION['level'] == "") : ?>
                  <li class="nav-item dropdown align-items-center flex-c">
                    <a href="../auth/index.php" class="btn-lgn mr-2">
                      Log In
                      <div class="arrow-wrapper">
                        <div class="arrow"></div>
                      </div>
                    </a>
                  <?php else : ?>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?= $htm ?>" data-toggle="dropdown" role="button"><i class="fa fa-user mr-2"></i><?= $_SESSION['level'], " - ", $_SESSION['nama_user'] ?><span class="mr-1"></span></a>
                    <a class="dropdown-menu text-center btn btn-brown mt-1" href="../auth/logout.php">Logout</a>
                  </li>
                <?php endif; ?>

                <?php if ($level !== "Owner" && $level !== "Admin") : ?>
                  <a class="nav-link mr-3 hov-pointer" data-toggle="modal" data-target=".bd-example-modal-xl">
                    <i class="fa fa-shopping-cart p-2"></i>
                  </a>
                <?php endif; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>


  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header oren text-white p-4">
          <h5 class="modal-title">Cart</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        $query_order = mysqli_query($kon, "SELECT count(id_order) as no_order FROM tb_order");
        $order = mysqli_fetch_assoc($query_order);
        $no_order = $order['no_order'] + 1;
        $no_meja = mysqli_query($kon, "SELECT * FROM tb_meja WHERE status != 1");
        $list_pesanan = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order = 'ORD000$no_order' AND id_user = '$_SESSION[id_user]'");
        $nono = 'ORD000' . $no_order;
        $query_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$nono'");
        $hartot = mysqli_fetch_assoc($query_hartot);
        ?>
        <form action="fungsi/tambahOrder.php" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>No Order</label>
                  <input type="text" readonly name="id_order" class="form-control" value="ORD000<?= $no_order; ?>">
                </div>
                <div class="form-group">
                  <label for="">No Table</label>
                  <select name="meja" class="form-control" required>
                    <option selected value="0">-- Select Table --</option>
                    <?php foreach ($no_meja as $meja) : ?>
                      <option value="<?= $meja['meja_id'] ?>"><?= $meja['meja_id'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Notes</label>
                  <textarea name="keterangan" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-8">
                <table class="table table-striped table-responsive-sm">
                  <thead>
                    <tr class="fs-12">
                      <th>No</th>
                      <th>Name</th>
                      <th>Notes</th>
                      <th>Price</th>
                      <th>Amount</th>
                      <th>Total</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($list_pesanan as $pesanan) :
                      $masakan = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$pesanan[id_masakan]' ");
                      $query_masakan = mysqli_fetch_assoc($masakan);
                    ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $query_masakan['nama_masakan'] ?></td>
                        <td><?= $pesanan['keterangan_dorder'] ?></td>
                        <td>Rp. <?= rupiah($query_masakan['harga_masakan']) ?></td>
                        <td align="center"><?= $pesanan['jumlah_dorder'] ?></td>
                        <td>Rp. <?= rupiah($query_masakan['harga_masakan'] * $pesanan['jumlah_dorder']) ?></td>
                        <td>
                          <a href="fungsi/hapusOrder.php?id=<?= $pesanan['id_dorder'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="fs-12">
                      <td align="right" colspan="5"><strong>Total : </strong></td>
                      <th colspan="2">Rp. <?= rupiah($hartot['hartot']) ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-brown border fs-14" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-brown border fs-14" data-toggle="modal">Process</button>
          </div>
        </form>
      </div>
    </div>
  </div>