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
  <link rel="stylesheet" href="/auth/css/main.css">
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
                  <a class="nav-link ml-3 fs-15 text-center p-2 <?= $home ?>" href="index.php"><span class="mr-2 ml-2">Home</span></a>
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
                    <a class="dropdown-menu btn-logout text-center btn btn-brown mt-1" href="../auth/logout.php">Logout</a>
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
        <div class="modal-header header-shadow text-white p-4">
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
          <div class="modal-body p-4">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group row shadow-sm rounded p-2">
                  <label class="bgan font-weight-bold">No Order</label>
                  <span name="id_order">ORD000<?= $no_order; ?></span>
                </div>
                <div class="form-group row shadow-sm rounded p-2">
                  <label class="bgan font-weight-bold">No Table</label>
                  <select name="meja" class="form-control" required>
                    <option selected value="0" disabled>Select Table ⇩</option>
                    <?php foreach ($no_meja as $meja) : ?>
                      <option value="<?= $meja['meja_id'] ?>"><?= $meja['meja_id'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group row shadow-sm rounded p-2">
                  <label class="bgan font-weight-bold">Notes</label>
                  <textarea name="keterangan" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-8">
                <table class="table table-responsive-sm">
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
                          <a href="fungsi/hapusOrder.php?id=<?= $pesanan['id_dorder'] ?>" class="btn-delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="mt-3 float-right mr-3">
                  <strong>Total : </strong>
                  <span><strong>Rp. <?= rupiah($hartot['hartot']) ?></strong></span>
                </div>
              </div>
            </div>
          </div>
          <div class="p-3 float-right">
            <button type="button" class="btn-cancel noselect" data-dismiss="modal"><span class="text2">Cancel</span><span class="icon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                </svg></span></button>
            <?php if ($query_masakan > 1) :
              $disbld = 'disabled'; ?>
              <button type="submit" class="btn-process noselect" data-toggle="modal"><span class="text2 <?= $disbld ?>">Pay</span><span class="icon2"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path d="M173.9 439.4l-166.4-166.4c-10-10-10-26.2 0-36.2l36.2-36.2c10-10 26.2-10 36.2 0L192 312.7 432.1 72.6c10-10 26.2-10 36.2 0l36.2 36.2c10 10 10 26.2 0 36.2l-294.4 294.4c-10 10-26.2 10-36.2 0z" />
                  </svg></span></button>
            <?php
            endif; ?>
          </div>
        </form>
      </div>
    </div>
  </div>