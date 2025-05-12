<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data Mahasiswa</h2>
        <?php
        include('koneksi.php');
        $x = $_GET['nim'];
        $sql = "SELECT * FROM mahasiswa WHERE nim = '$x'";
        $exe = $conn -> query($sql);
        $data = $exe -> fetch_assoc();
        ?>
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="<?= $data['nim']?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama']?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option value="<?= $data['gender']?>"><?= $data['gender']?></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $data['email']?>">
            </div>
            <div class="mb-3">
                <label for="ponsel" class="form-label">Ponsel</label>
                <input type="text" class="form-control" name="ponsel" id="ponsel" value="<?= $data['ponsel']?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" value="<?= $data['foto']?>">
            </div>
            <button type="submit" class="btn btn-primary w-100">Ubah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
