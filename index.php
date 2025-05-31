<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa Ekstrakurikuler XKulin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            color: #000;
            animation: fadeIn 1s ease-in;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(160, 56, 56, 0.2);
            animation: slideUp 0.7s ease;
        }

        .table thead {
            background-color: rgba(255, 255, 255, 0.2);
            color: #000;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .table tbody tr td {
            color: #000;
        }

        .btn-custom {
            background-image: linear-gradient(45deg, #a4508b, #5f0a87);
            color: #000;
            border: none;
            transition: transform 0.2s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .btn-warning,
        .btn-danger {
            color: #000;
            transition: transform 0.2s ease;
        }

        .btn-warning:hover,
        .btn-danger:hover {
            transform: scale(1.05);
        }

        /* Animasi Fade dan Slide */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes slideUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Siswa Ekstrakurikuler XKulin</h2>
        <a href="tambah.php" class="btn btn-custom">+ Tambah Siswa</a>
    </div>

    <div class="card p-4">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ekstrakurikuler</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM siswa");
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['kelas']}</td>
                            <td>{$row['ekskul']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Hapus siswa ini?\");'>Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
