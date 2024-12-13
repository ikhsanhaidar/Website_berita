<?php
include "koneksi.php";

$vfoto=$_FILES['upload']['name'];
$tfoto=$_FILES['upload']['tmp_name'];

//apabila gambar tidak diganti
if(empty($vfoto))
{
    mysqli_query($koneksi,"UPDATE tbberita SET judul='$_POST[judul]',
                                             penulis='$_POST[penulis]',
                                             isiberita='$_POST[isiberita]'
                                             where nomor='$_POST[id]'");
}
//apabila gambar diganti
else
{
    move_uploaded_file($tfoto,"foto_berita/$vfoto");
    mysqli_query($koneksi,"UPDATE tbberita SET judul='$_POST[judul]',
                                             penulis='$_POST[penulis]',
                                             isiberita='$_POST[isiberita]',
                                             gambar='$vfoto'
                                             where nomor='$_POST[id]'");
}

?>
<script>document.location='tampil_berita.php'</script>