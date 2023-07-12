<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kodekecamatan = $_GET["hapus"];
        mysqli_query($connection, "delete from kecamatan where kecamatanID = '$kodekecamatan'");

        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='kecamatan.php'</script>";
    }
?>