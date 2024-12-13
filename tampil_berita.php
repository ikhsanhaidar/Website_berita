<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            object-fit: cover;
            height: 200px;
        }
        .btn-custom {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
        include "header.php";
        include "koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT * FROM tbberita ORDER BY nomor ASC");
    ?>

    <div class="container py-5">
        <h1 class="display-5 text-center">Daftar Berita</h1>
        <p class="text-center">Berikut ini adalah daftar berita yang paling populer.</p>
        <div class="text-center mb-4">
            <button class="btn btn-primary" onClick="document.location='tambah_berita.php'">Tambah Berita</button>
        </div>

        <div class="row g-4">
            <?php
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="foto_berita/<?php echo $data['gambar']; ?>" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                            <p class="card-text text-truncate"><?php echo $data['isiberita']; ?></p>
                            <p class="card-text text-muted"><small>Penulis: <?php echo $data['penulis']; ?></small></p>
                            <div class="d-flex justify-content-between">
                                <a href="edit_berita.php?kdberita=<?php echo $data['nomor']; ?>" class="btn btn-outline-warning btn-sm btn-custom">Edit</a>
                                <a href="hapus.php?kdhapus=<?php echo $data['nomor']; ?>" class="btn btn-outline-danger btn-sm btn-custom">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12QKeGr6UUqzNJhrPheMzI78GoZmofpHScye4YxjKfMNACk7" crossorigin="anonymous"></script>
</body>
</html>
