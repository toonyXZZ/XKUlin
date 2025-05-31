<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            color: #000;
        }

        .card {
            background-color: #ffffffcc; /* putih transparan */
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }

        .btn-custom {
            background-image: linear-gradient(45deg, #a4508b, #5f0a87);
            color: white;
            border: none;
        }

        .btn-custom:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h2 class="text-center mb-4">Tambah Siswa</h2>

                <?php
                $err = "";
                if (isset($_POST['submit'])) {
                    $nama = trim($_POST['nama']);
                    $kelas = trim($_POST['kelas']);
                    $ekskul = $_POST['ekskul'];

                    if (empty($nama) || empty($kelas)) {
                        $err = "Nama dan Kelas harus diisi!";
                    } else {
                        mysqli_query($conn, "INSERT INTO siswa (nama, kelas, ekskul) VALUES ('$nama', '$kelas', '$ekskul')");
                        header("Location: index.php");
                        exit;
                    }
                }

                if ($err) {
                    echo "<div class='alert alert-danger'>$err</div>";
                }
                ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>

                    <div class="mb-4">
                        <label for="ekskul" class="form-label">Ekstrakurikuler</label>
                        <select class="form-select" id="ekskul" name="ekskul" required>
                            <option value="Pramuka">Pramuka</option>
                            <option value="Paskibra">Paskibra</option>
                            <option value="Basket">Basket</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Musik">Musik</option>
                            <option value="Tari">Tari</option>
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="submit" class="btn btn-custom">Simpan</button>
                    </div>
                </form>

                <div class="mt-3 text-center">
                    <a href="index.php" class="text-decoration-none text-dark">← Kembali ke Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
