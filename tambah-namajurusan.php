<?php
    session_start();
    include 'config/config.php';
    // jika session tidak ada, tolong redirect ke login
    if (!isset($_SESSION['nama'])) 
        header("location:index.php?error=acces-failed");
    

    // Jika button disubmit, ambil nilai dari form, nama, email, password
    if (isset($_POST['simpan'])) {
        $nama_jurusan = $_POST['nama_jurusan'];

        // masukkan ke dalam table user dimana kolom nama di ambil nilainya dari inputan nama
        $insertUser = mysqli_query($koneksi,"INSERT INTO jurusan (nama_jurusan) VALUES('$nama_jurusan')");
        header("location:nama_jurusan.php?notif=tambah-success");
    }

    // Jika parameter delete ada, buat perintah/query delete
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $delete = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id='$id'");
        header('location:nama_jurusan.php?notif=delete-success');
    }

    // Tampilkan semua data dari tabel user dimana id nya diambil dari parameter edit
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $queryEdit = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id='$id'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    if (isset($_POST['edit'])) {
        $nama_jurusan = $_POST['nama_jurusan'];


        $id = $_GET['edit'];
        
        // Ubah data dari table user dimana nilai nama diambil dari inputan nama
        // dan nilai id usernya diambil dari parameter

        $edit = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id='$id'");
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
                    <?php if (isset($_GET['edit'])) { ?>
                        <h1 class="h3 mb-4 text-gray-800">Edit Nama Jurusan</h1>
                    <?php }else{ ?>
                        <h1 class="h3 mb-4 text-gray-800">Tambah Nama Jurusan</h1>
                    <?php } ?>

                    <?php if (isset($_GET['edit'])) { ?>
                        <div class="card">
                        <div class="card-header">Edit Nama Jurusan</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Nama Jurusan</label>
                                    <input value="<?php echo $dataEdit['nama_jurusan']?>" type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan Nama Jurusan Anda ...">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                    <a href="nama_jurusan.php" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                        </div>
                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-header">Tambah Nama Jurusan</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan Nama Jurusan Anda ...">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                    <a href="nama_jurusan.php" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>

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