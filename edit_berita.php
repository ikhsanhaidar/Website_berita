<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include "header.php"; 
    ?>

<div class="container mt-5">
    <?php
    include("koneksi.php"); 

    $id = $_GET['kdberita'];
    $edit = mysqli_query($koneksi, "SELECT * FROM tbberita WHERE nomor='$id'");
    $r = mysqli_fetch_array($edit);

    echo "
    <form action='update_berita.php' method='post' enctype='multipart/form-data'>
        <h1 class='display-5'>Form Edit Berita</h1> <br>

        <input type='hidden' name='id' value='$id'>

        <div class='mb-3'>
            <label for='judul' class='form-label'>Judul Berita</label>
            <input type='text' class='form-control' name='judul' value='$r[judul]'>
        </div>

        <div class='mb-3'>
            <label for='penulis' class='form-label'>Penulis</label>
            <input type='text' class='form-control' name='penulis' value='$r[penulis]'>
        </div>

        <div class='mb-3'>
            <label for='isi' class='form-label'>Isi Berita</label>
            <textarea class='form-control' name='isiberita' rows='5'>$r[isiberita]</textarea>
        </div>

        <div class='mb-3'>
            <label for='gambar' class='form-label'>Gambar Saat Ini</label>
            <div>
                <img src='foto_berita/$r[gambar]' class='img-thumbnail' width='150' height='150'>
            </div>
        </div>

        <div class='mb-3'>
            <label for='gambar' class='form-label'>Ganti Gambar</label>
            <input class='form-control' type='file' name='upload'>
            <small class='form-text text-muted'>*) Apabila gambar tidak diubah, dikosongkan saja.</small>
        </div>

        <button type='submit' class='btn btn-primary'>Update</button>
        <button type='reset' class='btn btn-outline-danger' onclick='self.history.back()'>Batal</button>

        <br><br>
    </form>";
    ?>
</div>

</body>
</html>