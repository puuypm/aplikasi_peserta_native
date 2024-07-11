<?php
session_start();
include 'config/config.php';
// jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama']))
    header("location:index.php?error=acces-failed");


// Jika button disubmit, ambil nilai dari form, nama, email, password
if (isset($_POST['simpan'])) {
    $nama_gelombang = $_POST['nama_gelombang'];
    $aktif = $_POST['aktif'];

    // masukkan ke dalam table gelombang dimana kolom nama di ambil nilainya dari inputan nama
    $insertGelombang = mysqli_query($koneksi, "INSERT INTO gelombang (nama_gelombang, aktif) VALUES('$nama_gelombang','$aktif')");
    header("location:gelombang.php?notif=tambah-success");
}

// Jika parameter delete ada, buat perintah/query delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM gelombang WHERE id='$id'");
    header('location:gelombang.php?notif=delete-success');
}

// Tampilkan semua data dari tabel user dimana id nya diambil dari parameter edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $queryEdit = mysqli_query($koneksi, "SELECT * FROM gelombang WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_POST['edit'])) {
    $nama_gelombang = $_POST['nama_gelombang'];
    $aktif = $_POST['aktif'];

    $id = $_GET['edit'];

    // Ubah data dari table gelombang dimana nilai nama diambil dari inputan nama
    // dan nilai id gelombangnya diambil dari parameter

    $edit = mysqli_query($koneksi, "UPDATE gelombang SET nama_gelombang='$nama_gelombang', aktif = '$aktif' WHERE id='$id'");
    header('location:gelombang.php?notif=edit-success');
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
                        <h1 class="h3 mb-4 text-gray-800">Edit Gelombang</h1>
                    <?php } else { ?>
                        <h1 class="h3 mb-4 text-gray-800">Tambah Gelombang</h1>
                    <?php } ?>

                    <?php if (isset($_GET['edit'])) { ?>
                        <div class="card">
                            <div class="card-header">Edit Gelombang</div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="">Nama Gelombang</label>
                                        <select name="nama_gelombang" id="" class="form-control">
                                            <option value="">-- Pilih Gelombang --</option>
                                            <option <?php echo ($dataEdit['nama_gelombang'] == 1) ? 'selected' : '' ?> value="1">
                                                Angkatan 1
                                            </option>
                                            <option <?php echo ($dataEdit['nama_gelombang'] == 2) ? 'selected' : '' ?> value="2">
                                                Angkatan 2
                                            </option>
                                            <option <?php echo ($dataEdit['nama_gelombang'] == 3) ? 'selected' : '' ?> value="3">
                                                Angkatan 3
                                            </option>
                                            <option <?php echo ($dataEdit['nama_gelombang'] == 0) ? 'selected' : '' ?> value="0">
                                                Angkatan 4
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Aktif</label>
                                        <select name="aktif" id="" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option <?php echo ($dataEdit['aktif'] == 1) ? 'selected' : '' ?> value="1">
                                                Aktif
                                            </option>
                                            <option <?php echo ($dataEdit['aktif'] == 0) ? 'selected' : '' ?> value="0">
                                                Tidak Aktif
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                        <a href="gelombang.php" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } else { ?> <div class="card">
                            <div class="card-header">Tambah Gelombang</div>
                            <div class="card-body">
                                <form action="" method="post">
                                <div class="mb-3">
                                        <label for="">Gelombang</label>
                                        <select name="nama_gelombang" id="" class="form-control">
                                            <option value="">-- Pilih Gelombang --</option>
                                            <option value="1">Angkatan 1</option>
                                            <option value="2">Angkatan 2</option>
                                            <option value="3">Angkatan 3</option>
                                            <option value="0">Angkatan 4</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Aktif</label>
                                        <input type="hidden" name="id" value="<?php echo $dataGelombang['id'] ?>">
                                        <select name="aktif" id="" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                        <a href="gelombang.php" class="btn btn-danger">Kembali</a>
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