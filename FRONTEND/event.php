<!doctype html>

<?php
include "includes/config.php";
$query = mysqli_query($connection, "select * from area");
$query2 = mysqli_query($connection, "select * from kategori");
$query3 = mysqli_query($connection, "select * from provinsi");
$query4 = mysqli_query($connection, "select * from hotel");
$query5 = mysqli_query($connection, "select * from kecamatan");
$query6 = mysqli_query($connection, "select * from kabupaten");
$query7 = mysqli_query($connection, "select * from provinsi");

$query10 = mysqli_query($connection, "select kegiatan.*,kabupatenNama from kegiatan, kabupaten where kegiatan.kabupatenID = kabupaten.kabupatenID");



?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Events</title>



</head>

<body>

    <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image:linear-gradient(black,white)">
        <p style="font-size:30px">&#9969; </p>
        <a class="navbar-brand" href="index.php" style="margin-left: 20px">Wisata Indonesia Timur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Area
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) { ?>
                                <a class="dropdown-item" href="baru.php?ubah=<?php echo $row['areaID'] ?>"><?php echo $row["areaNama"] ?></a>
                        <?php }
                        } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($query2) > 0) {
                            while ($row = mysqli_fetch_array($query2)) { ?>
                                <a class="dropdown-item" href="#"><?php echo $row["kategoriNama"] ?></a>
                        <?php }
                        } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Provinsi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($query3) > 0) {
                            while ($row = mysqli_fetch_array($query3)) { ?>
                                <a class="dropdown-item" href="#"><?php echo $row["provinsiNama"] ?></a>
                        <?php }
                        } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hotel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $datahotel1 = mysqli_query($connection, "select * from hotel where hotelID = 'H01'");
                        $row_query1 = mysqli_fetch_array($datahotel1);
                        ?>

                        <?php $datahotel2 = mysqli_query($connection, "select * from hotel where hotelID = 'H02'");
                        $row_query2 = mysqli_fetch_array($datahotel2);
                        ?>

                        <?php $datahotel3 = mysqli_query($connection, "select * from hotel where hotelID = 'H03'");
                        $row_query3 = mysqli_fetch_array($datahotel3);
                        ?>

                        <?php $datahotel4 = mysqli_query($connection, "select * from hotel where hotelID = 'H04'");
                        $row_query4 = mysqli_fetch_array($datahotel4);
                        ?>

                        <a class="dropdown-item" href="hotel1.php?ubah=<?php echo $row_query1['hotelID'] ?>"><?php echo $row_query1["namaHotel"] ?></a>
                        <a class="dropdown-item" href="hotel2.php?ubah=<?php echo $row_query2['hotelID'] ?>"><?php echo $row_query2["namaHotel"] ?></a>
                        <a class="dropdown-item" href="hotel3.php?ubah=<?php echo $row_query3['hotelID'] ?>"><?php echo $row_query3["namaHotel"] ?></a>
                        <a class="dropdown-item" href="hotel4.php?ubah=<?php echo $row_query4['hotelID'] ?>"><?php echo $row_query4["namaHotel"] ?></a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Event
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Calender Event</a>
                    </div>
                </li>



            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-Dark my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- AKHIR MENU -->

    <!-- ISI -->

    <div class="container" style = "margin-top: 100px;">
            <?php if (mysqli_num_rows($query10) > 0) {
                while ($row_query10 = mysqli_fetch_array($query10)) { ?>
                    <div class="media" style = "margin-top: 100px;">
                        <img class="mr-3" src="images/<?php echo $row_query10["eventPoster"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="height: 200px; width:300px">
                        <div class="media-body" style = "padding-left: 10px;">
                            <h6 style = "border-bottom : 1px solid black; padding-bottom: 5px;">Kabupaten <?php echo $row_query10["kabupatenNama"] ?></h6>
                            <h4 class="mt-0"><?php echo $row_query10["eventNama"] ?></h4>
                            <p style = "margin-top: 20px;"><?php echo $row_query10["eventKet"] ?></p>
                            <h6 style = "border-bottom : 2px solid black; padding-bottom: 5px;">Event On <?php echo $row_query10["eventMulai"] ?> - <?php echo $row_query10["eventSelesai"] ?></h6>
                            <p style>Sumber: <?php echo $row_query10["eventSumber"] ?></p>
                        </div>   
                    </div>
                    
            <?php }
            } ?>
    </div>

    <!-- Akhir isi -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>