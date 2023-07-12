<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kabupatenID = $_GET["hapus"];
        mysqli_query($connection, "delete from kabupaten where kabupatenID = '$kabupatenID'");

        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='kabupaten.php'</script>";
    }
?>