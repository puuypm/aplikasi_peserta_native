<?php
session_start();
include 'config/config.php';
// jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama'])) {

    header("location:index.php?error=acces-failed");
}

$queryGelombang = mysqli_query($koneksi, "SELECT * FROM gelombang ORDER BY id DESC");

// 1,2,3,0 (1: Angkatan 1, 2: Angkatan 2, 3: Angkatan 3, 0: Angkatan 4)
// function
// master query

function customPilihan($pilihan)
{
    if ($pilihan == 1) {
        $nama_gelombang = "Angkatan 1";
    } elseif ($pilihan == 2) {
        $nama_gelombang = "Angkatan 2";
    } elseif ($pilihan == 3) {
        $nama_gelombang = "Angkatan 3";
    } else { 
        $nama_gelombang = "Angkatan 4";
    }

    return $nama_gelombang;
}

function customPilihan2($pilihan)
{
    switch ($pilihan) {
        case '1':
            $pilihan = "Angkatan 1";
            break;
        case '2':
            $pilihan = "Angkatan 2";
            break;
        case '3':
            $pilihan = "Angkatan 3";
            break;
        default:
            $pilihan = "Angkatan 4";
            break;
    }
    return $pilihan;
}

function customStatus($status)
{
    switch ($status) {
        case 1:
            $pesan = "Aktif";
            break;

        default:
            $pesan = "Tidak Aktif";
            break;
    }

    return $pesan;
}

function customStatus2($status)
{
    switch ($status) {
        case '1':
            $status = "Aktif";
            break;
        default:
            $status = "Tidak Aktif";
            break;
    }
    return $status;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'inc/head.php'; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'inc/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Gelombang</h1>
                    <div align="right">
                        <a href="tambah-gelombang.php" class="btn btn-primary mb-4">Tambah Gelombang</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gelombang</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($dataGelombang = mysqli_fetch_assoc($queryGelombang)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo customPilihan($dataGelombang['nama_gelombang']) ?></td>
                                    <td><?php echo customStatus($dataGelombang['aktif']) ?></td>
                                    <td>
                                        <a href="tambah-gelombang.php?edit=<?php echo $dataGelombang['id'] ?>"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                            href="tambah-gelombang.php?delete=<?php echo $dataGelombang['id'] ?>"
                                            class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'inc/modal-logout.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php'; ?>

</body>

</html>