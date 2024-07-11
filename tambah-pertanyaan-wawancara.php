<?php
session_start();
include 'config/config.php';
// jika session tidak ada, tolong redirect ke login
if (!isset($_SESSION['nama']))
    header("location:index.php?error=acces-failed");


// Jika button disubmit, ambil nilai dari form, nama, email, password
if (isset($_POST['simpan'])) {
    $nama_pertanyaan = $_POST['nama_pertanyaan'];
    $id_jurusan = $_POST['id_jurusan'];

    // masukkan ke dalam table user dimana kolom nama di ambil nilainya dari inputan nama
    $insert = mysqli_query($koneksi, "INSERT INTO pertanyaan_wawancara (nama_pertanyaan, id_jurusan) VALUES('$nama_pertanyaan', '$id_jurusan')");
    header("location:pertanyaan_wawancara.php?notif=tambah-success");
}

// Jika parameter delete ada, buat perintah/query delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM pertanyaan_wawancara WHERE id='$id'");
    header('location:pertanyaan_wawancara.php?notif=delete-success');
}

// Tampilkan semua data dari tabel user dimana id nya diambil dari parameter edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $queryEdit = mysqli_query($koneksi, "SELECT * FROM pertanyaan_wawancara WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_POST['edit'])) {
    $nama_pertanyaan = $_POST['nama_pertanyaan'];
    $id_jurusan = $_POST['id_jurusan'];


    $id = $_GET['edit'];

    // Ubah data dari table user dimana nilai nama diambil dari inputan nama
    // dan nilai id usernya diambil dari parameter

    $edit = mysqli_query($koneksi, "UPDATE pertanyaan_wawancara SET nama_pertanyaan='$nama_pertanyaan', id_jurusan='$id_jurusan'  WHERE id='$id'");
    header('location:pertanyaan_wawancara.php?notif=edit-success');
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Pertanyaan Wawancara</h1>
                    <?php } else { ?>
                    <h1 class="h3 mb-4 text-gray-800">Tambah Pertanyaan Wawancara</h1>
                    <?php } ?>

                    <?php if (isset($_GET['edit'])) { ?>
                    <div class="card">
                        <div class="card-header">Edit Pertanyaan Wawancara</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Nama Pertanyaan</label>
                                    <input value="<?php echo $dataEdit['nama_pertanyaan'] ?>" type="text"
                                        class="form-control" name="nama_pertanyaan"
                                        placeholder="Masukkan Pertanyaan Anda ...">
                                </div>
                                <div class="form-group">
                                    <select name="id_jurusan" id="" class="form-control">
                                        <option value="">Pilih Jurusan</option>
                                        <?php
                                            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                            ?>
                                        <?php while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                        <option
                                            <?php echo ($dataEdit['id_jurusan'] == $dataJurusan['id']) ? 'selected' : '' ?>
                                            value="<?php echo $dataJurusan['id']; ?>">
                                            <?php echo $dataJurusan['nama_jurusan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                    <a href="pertanyaan_wawancara.php" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="card">
                        <div class="card-header">Tambah Pertanyaan Wawancara</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Pertanyaan Wawancara</label>
                                    <input type="text" class="form-control" name="nama_pertanyaan"
                                        placeholder="Masukkan Pertanyaan Anda ...">
                                </div>
                                <div class="form-group">
                                    <select name="id_jurusan" id="" class="form-control">
                                        <option value="">Pilih Jurusan</option>
                                        <?php
                                            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                            ?>
                                        <?php while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                        <option value="<?php echo $dataJurusan['id']; ?>">
                                            <?php echo $dataJurusan['nama_jurusan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                    <a href="pertanyaan_wawancara.php" class="btn btn-danger">Kembali</a>
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