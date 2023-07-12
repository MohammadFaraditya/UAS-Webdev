<?php
include"includes/config.php";
if(isset($_GET['hapusfoto']))
{
    $fotokode = $_GET['hapusfoto'];
    $hapusfoto = mysqli_query($connection, "select * from fotodestinasi 
    where fotoID='$fotokode'");
    $hapus = mysqli_fetch_array($hapusfoto);
    $namafile = $hapus['fotoFile'];

    mysqli_query($connection, "delete from fotodestinasi
    where fotoID='$fotokode'");
    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='photodestinasi.php'</script>";

}
?>