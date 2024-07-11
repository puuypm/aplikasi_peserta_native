<?php
session_start();
include 'config/config.php';
// jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama'])) {

    header("location:index.php?error=acces-failed");
}

$queryUser = mysqli_query($koneksi, "SELECT * FROM user LEFT JOIN level ON level.id = user.id_level ORDER BY user.id DESC");
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
                    <h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
                    <div align="right">
                        <a href="tambah-user.php" class="btn btn-primary mb-4">Tambah Pengguna</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" , id="datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($dataUser = mysqli_fetch_assoc($queryUser)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dataUser['nama'] ?></td>
                                        <td><?php echo $dataUser['email'] ?></td>
                                        <td><?php echo $dataUser['nama_level'] ?></td>
                                        <td>
                                            <a href="tambah-user.php?edit=<?php echo $dataUser['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" href="tambah-user.php?delete=<?php echo $dataUser['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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