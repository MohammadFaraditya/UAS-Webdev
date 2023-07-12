<?php
include"includes/config.php";
if(isset($_GET['hapus']))
{
    $kodehotel = $_GET['hapus'];
    $hapushotel = mysqli_query($connection, "select * from hotel 
    where hotelID='$kodehotel'");
    $hapus = mysqli_fetch_array($hapushotel);
    $namafile = $hapus['fotoHotel'];

    mysqli_query($connection, "delete from hotel
    where hotelID='$kodehotel'");
    unlink('images/'.$namafile);

    echo "<script>alert('DATA TELAH DIHAPUS');
    document.location='hotel.php'</script>";

}
?>