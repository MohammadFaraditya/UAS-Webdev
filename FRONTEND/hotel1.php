<!doctype html>

<?php
include "includes/config.php";
$query = mysqli_query($connection, "select * from area");
$query2 = mysqli_query($connection, "select * from kategori");
$query3 = mysqli_query($connection, "select * from provinsi");
$query4 = mysqli_query($connection, "select * from hotel");

$datadestinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi
  WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");


?>
<html lang="en">
<?php $kode = $_GET["ubah"]; ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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



      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-Dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- AKHIR MENU -->

  <!-- Foto Hotel -->

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../FRONTEND/images/hotelpapua.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../FRONTEND/images/kamarpapua1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../FRONTEND/images/pemandangan1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <!-- Akhir Foto -->

  <!-- Nama Hotel -->
  

  <!-- Akhir -->

  <!-- Fasilitas -->
  <div class="container">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
      <h1 class="display-4"><?php echo $row_query1["namaHotel"] ?></h1>
      <br>
      Bintang <?php echo $row_query1["bintangHotel"] ?>
      <?php $dataprovinsi = mysqli_query($connection,"select * from provinsi");
       $row_query5 = mysqli_fetch_array($dataprovinsi);
      ?>
      <h5>Alamat : <?php echo $row_query1["alamat"]?>, <?php echo $row_query5["provinsiNama"]?></h5>
      <br>
      <br>
        <h1 class="display-4">Fasilitas.</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <figure class="figure" style="width: 150px; height: 150px;">
          <img src="../FRONTEND/images/ac.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
          <figcaption class="figure-caption text-center"><h1>AC</h1></figcaption>
        </figure>

        <figure class="figure" style="width: 100px; height: 80px; margin-left: 150px;">
          <img src="../FRONTEND/images/wifi.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
          <figcaption class="figure-caption text-center"><h1>WIFI</h1></figcaption>
        </figure>

        <figure class="figure" style="width: 80px; height: 70px; margin-left: 150px;">
          <img src="../FRONTEND/images/parkir.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
          <figcaption class="figure-caption text-center"><h1>Parkir</h1></figcaption>
        </figure>

        <figure class="figure" style="width: 120px; height: 70px; margin-left: 150px;">
          <img src="../FRONTEND/images/resepsionis.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
          <figcaption class="figure-caption text-center"><h1>CS 24 Jam</h1></figcaption>
        </figure>
      </div>
    </div>

  </div>

  <!-- Akhir Fasilitas -->

  <!-- harga -->
  
  <div class="container" style = "margin-top: 70px;">
    <div class="row">
      <div class="col-sm-7">
      <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Harga Permalam</h1>
            <h1 class="display-4">Rp. 800.000</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-5">
      <div class="card">
        <img class="card-img-top" src="../FRONTEND/images/gili2.jpg" alt="Card image cap">
        <div class="card-body">
          <?php $datapaketPKT1 = mysqli_query($connection, "select * from paket where paketID = 'PKT1'");
          $row_query6 = mysqli_fetch_array($datapaketPKT1);
          ?>
          <h5 class="card-title"><?php echo $row_query6['namaPaket'] ?></h5>
          <br>
          <p class="card-text">Rincian: </p>
          <p class="card-text">Tanggal Pergi : <?php echo $row_query6['tanggalAwal'] ?></p>
          <p class="card-text">Tanggal Pulang : <?php echo $row_query6['tanggalAkhir'] ?></p>
          <p class="card-text">Tiket Pesawat : <?php echo $row_query6['tiketPesawat'] ?></p>
          <p class="card-text">Hotel : Ya (<?php echo $row_query6['hotelID'] ?>)</p>
          <p class="card-text">Harga : Rp. <?php echo $row_query6['harga'] ?></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" style="margin-left: 25px;">Booking Sekarang</button>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>

  <!-- akhir Harga -->


</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>