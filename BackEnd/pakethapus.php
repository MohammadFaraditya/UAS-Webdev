<?php
include"includes/config.php";
if(isset($_GET['hapus']))
{
    $kodepaket = $_GET['hapus'];
    $hapuspaket = mysqli_query($connection, "select * from paket
    where paketID='$kodepaket'");
    $hapus = mysqli_fetch_array($hapuspaket);
    $namafile = $hapus['fotoTujuan'];

    mysqli_query($connection, "delete from paket
    where paketID='$kodepaket'");
    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='paket.php'</script>";

}
?>