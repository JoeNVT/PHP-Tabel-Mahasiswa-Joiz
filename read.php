<?php
session_start();
?>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            background-color: #003366;
            height: 100vh;
            color: white;
            position: fixed;
            width: 220px;
            top: 0;
            left: 0;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            font-size: 16px;
        }
        .sidebar a:hover {
            background-color: #00509e;
        }
        .main-content {
            margin-left: 220px;
            padding: 30px;
        }
        .table th, .table td {
            text-align: center;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e3f2fd;
        }
        .table-hover tbody tr:hover {
            background-color: #d1e7ff;
        }
        .btn-custom {
            background-color: #003366;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #00509e;
        }
        .navbar {
            background-color: #003366;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }
        .navbar-nav .nav-link:hover {
            color: #00509e;
        }
        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar p-3">
        <h3 class="text-center">Dashboard</h3>
        <a href="read.php">Data Mahasiswa</a>
        <a href="form.php">Tambah Mahasiswa</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mahasiswa Dashboard</a>
            </div>
        </nav>

        <div class="container mt-4">
            <?php
            if (isset($_SESSION['username'])) {
                echo "<h2>Halo, " . $_SESSION['username'] . "</h2>";
            } else {
                echo "<h2>Halo, Pengguna</h2>";
            }
            ?>
            <h3>Data Mahasiswa</h3>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Ponsel</th>
                        <th>Foto</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("koneksi.php");
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM mahasiswa WHERE username = '$username'";
                    $result = $conn->query($sql);
                    while ($data = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['gender']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['ponsel']; ?></td>
                        <td><img src="foto/<?=$data['foto'];?>" width="100" height="100" class="img-fluid rounded"></td>
                        <td>
                            <a href="edit.php?nim=<?=$data['nim']?>" class="btn btn-warning btn-sm btn-custom">Edit</a>
                            <a href="delete.php?nim=<?=$data['nim']?>" onclick="return confirm('Yakin Dihapus?')" class="btn btn-danger btn-sm btn-custom">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <footer>
            <p>&copy; 2025 Mahasiswa Dashboard</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
