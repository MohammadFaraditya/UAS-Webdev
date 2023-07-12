<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $idprovinsi = $_GET["hapus"];
        mysqli_query($connection, "delete from provinsi where provinsiID = '$idprovinsi'");

        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='Provinsi.php'</script>";
    }
?>