<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kodearea = $_GET["hapus"];
        mysqli_query($connection, "delete from area where areaID = '$kodearea'");

        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='area.php'</script>";
    }
?>