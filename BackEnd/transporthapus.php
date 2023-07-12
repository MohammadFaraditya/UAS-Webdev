<?php
include"includes/config.php";
if(isset($_GET['hapus']))
{
    $kodetransport = $_GET['hapus'];
    $hapustransport = mysqli_query($connection, "select * from transport
    where transportID='$kodetransport'");
    $hapus = mysqli_fetch_array($hapustransport);
    $namafile = $hapus['fotoKendaraan'];

    mysqli_query($connection, "delete from transport
    where transportID='$kodetransport'");
    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='transport.php'</script>";

}
?>