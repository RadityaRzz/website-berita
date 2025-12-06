<?php
session_start();
include "koneksi.php";

// Cek apakah role admin
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Ambil data berita pending
$query = "SELECT * FROM berita ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Validasi Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th {
            background: #222;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        .btn-acc {
            background: #28a745;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
        }
        .btn-tolak {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
        }
        .status-badge {
            padding: 4px 8px;
            border-radius: 5px;
            color: white;
        }
        .pending { background: orange; }
        .approved { background: green; }
        .rejected { background: red; }
    </style>
</head>

<body>

<h2>Dashboard Admin – Validasi Berita</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Penulis</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= substr($row['isi'], 0, 50) ?>...</td>
            <td><?= $row['penulis'] ?></td>

            <td>
                <span class="status-badge <?= $row['status'] ?>">
                    <?= $row['status'] ?>
                </span>
            </td>

            <td>
                <?php if ($row['status'] == 'pending') { ?>
                    <a class="btn-acc" href="validasi.php?id=<?= $row['id'] ?>&aksi=acc">
                        ACC
                    </a>
                    <a class="btn-tolak" href="validasi.php?id=<?= $row['id'] ?>&aksi=tolak">
                        Tolak
                    </a>
                <?php } else { ?>
                    Tidak ada aksi
                <?php } ?>
            </td>

        </tr>
    <?php } ?>

</table>

</body>
</html>
