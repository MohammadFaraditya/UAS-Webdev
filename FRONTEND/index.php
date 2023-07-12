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


$sql = mysqli_query($connection, "select * from destinasi");
$jumlah = mysqli_num_rows($sql);

$sql2 = mysqli_query($connection, "select * from kecamatan");
$jumlah2 = mysqli_num_rows($sql2);

$sql3 = mysqli_query($connection, "select * from kabupaten");
$jumlah3 = mysqli_num_rows($sql3);

$datadestinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi
  WHERE kategori.kategoriID = destinasi.kategoriID AND destinasi.destinasiID = fotodestinasi.destinasiID");


?>


<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Wisata Indonesia Timur</title>



</head>

<body>

  <!-- MENU -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image:linear-gradient(black,white)">
    <p style="font-size:30px">&#9969; </p>
    <a class="navbar-brand" href="#" style="margin-left: 20px">Wisata Indonesia Timur</a>
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
                <a class="dropdown-item" href="event.php">Calender Event</a>
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

  <!-- SLIDER -->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../FRONTEND/images/cendrawasih2.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Taman Nasional Cendrawasih</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../FRONTEND/images/labuanbajo2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Labuan Bajo</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../FRONTEND/images/rajaampat2.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Raja Ampat</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../FRONTEND/images/gili2.jpg" alt="fourth slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Gili Trawangan</h1>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- AKHIR SLIDER -->

  <!-- memilih -->
  <div class="col-sm-12" style="margin-left: 25px;; margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <p style="font-size: 20px;">Kenapa Harus Memilih kami..</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12" style="margin-left: 25px;">
    <div class="container" style="margin-top: 40px;">
      <div class="row">
        <div class="col-sm">
          <p style="font-size: 30px;">&#9627;</p>
          <p style="font-size: 20px">Destinasi Menarik</p>
          <p>menawarkan berbagai destinasi wisata menarik di Indonesia yang wajib untuk dikunjungi</p>
        </div>

        <div class="col-sm">
          <p style="font-size: 30px; margin-left: 130px;">&#9605;</p>
          <p style="font-size: 20px;">Harga Terjangkau</p>
          <p>memberikan pelayanan prima dengan harga murah yang proporsional dan rasional</p>
        </div>

        <div class="col-sm">
          <p style="font-size: 30px; margin-left: 300px;"> &#9628;</p>
          <p style="font-size: 20px;">Tim Profesional</p>
          <p>memiliki tim profesional yang kompak dan solid dalam memandu perjalanan wisata Anda</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12" style="margin-left: 25px;; margin-top: 100px;">
    <div class="container" style="margin-top: 40px;">
      <div class="row">
        <div class="col-sm">
          <p style="font-size: 20px">Pemesanan Mudah</p>
          <p>memiliki sistem reservasi online terintegrasi yang mudah digunakan dan user friendly</p>
          <p style="font-size: 30px; ">&#9625;</p>
        </div>

        <div class="col-sm">
          <p style="font-size: 20px;">Pelayanan Terbaik</p>
          <p>berkomitmen memberikan pelayanan terbaik dan menjamin kepuasan pelanggan</p>
          <p style="font-size: 30px; margin-left: 130px;">&#9605;</p>
        </div>

        <div class="col-sm">
          <p style="font-size: 20px;">CS 24 jam</p>
          <p>berkomitmen memberikan pelayanan Terbaik dan Customer Service Ready 24 jam</p>
          <p style="font-size: 30px; margin-left: 300px;"> &#9631;</p>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir memilih -->

  <!-- tampilan paket -->
  <div class="container" style="margin-top: 150px;">
    <div class="card-deck">

      <div class="card">
        <img class="card-img-top" src="../FRONTEND/images/gili2.jpg" alt="Card image cap">
        <div class="card-body">
          <?php $datapaketPKT1 = mysqli_query($connection, "select * from paket where paketID = 'PKT1'");
          $row_query1 = mysqli_fetch_array($datapaketPKT1);
          ?>
          <h5 class="card-title"><?php echo $row_query1['namaPaket'] ?></h5>
          <br>
          <p class="card-text">Rincian: </p>
          <p class="card-text">Tanggal Pergi : <?php echo $row_query1['tanggalAwal'] ?></p>
          <p class="card-text">Tanggal Pulang : <?php echo $row_query1['tanggalAkhir'] ?></p>
          <p class="card-text">Tiket Pesawat : <?php echo $row_query1['tiketPesawat'] ?></p>
          <p class="card-text">Hotel : Ya (<?php echo $row_query1['hotelID'] ?>)</p>
          <p class="card-text">Harga : Rp. <?php echo $row_query1['harga'] ?></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" style="margin-left: 25px;">Booking Sekarang</button>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="../FRONTEND/images/danaukelimutu.jpg" alt="Card image cap">
        <div class="card-body">
          <?php $datapaketPKT2 = mysqli_query($connection, "select * from paket where paketID = 'PKT2'");
          $row_query2 = mysqli_fetch_array($datapaketPKT2);
          ?>
          <h5 class="card-title"><?php echo $row_query2['namaPaket'] ?></h5>
          <br>
          <p class="card-text">Rincian: </p>
          <p class="card-text">Tanggal Pergi : <?php echo $row_query2['tanggalAwal'] ?></p>
          <p class="card-text">Tanggal Pulang : <?php echo $row_query2['tanggalAkhir'] ?></p>
          <p class="card-text">Tiket Pesawat : <?php echo $row_query2['tiketPesawat'] ?></p>
          <p class="card-text">Hotel : Ya (<?php echo $row_query2['hotelID'] ?>)</p>
          <p class="card-text">Harga : Rp. <?php echo $row_query2['harga'] ?></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" style="margin-left: 25px;">Booking Sekarang</button>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="../FRONTEND/images/cendrawasih.jpg" alt="Card image cap">
        <div class="card-body">
          <?php $datapaketPKT3 = mysqli_query($connection, "select * from paket where paketID = 'PKT3'");
          $row_query3 = mysqli_fetch_array($datapaketPKT3);
          ?>
          <h5 class="card-title"><?php echo $row_query3['namaPaket'] ?></h5>
          <br>
          <p class="card-text">Rincian: </p>
          <p class="card-text">Tanggal Pergi : <?php echo $row_query3['tanggalAwal'] ?></p>
          <p class="card-text">Tanggal Pulang : <?php echo $row_query3['tanggalAkhir'] ?></p>
          <p class="card-text">Tiket Pesawat : <?php echo $row_query3['tiketPesawat'] ?></p>
          <p class="card-text">Hotel : Ya (<?php echo $row_query3['hotelID'] ?>)</p>
          <p class="card-text">Harga : Rp. <?php echo $row_query3['harga'] ?></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" style="margin-left: 25px;">Booking Sekarang</button>
        </div>
      </div>

      <div class="card">
        <img class="card-img-top" src="../FRONTEND/images/pantaikuta2.jpg" alt="Card image cap">
        <div class="card-body">
          <?php $datapaketPKT4 = mysqli_query($connection, "select * from paket where paketID = 'PKT4'");
          $row_query4 = mysqli_fetch_array($datapaketPKT4);
          ?>
          <h5 class="card-title"><?php echo $row_query4['namaPaket'] ?></h5>
          <br>
          <p class="card-text">Rincian: </p>
          <p class="card-text">Tanggal Pergi : <?php echo $row_query4['tanggalAwal'] ?></p>
          <p class="card-text">Tanggal Pulang : <?php echo $row_query4['tanggalAkhir'] ?></p>
          <p class="card-text">Tiket Pesawat : <?php echo $row_query4['tiketPesawat'] ?></p>
          <p class="card-text">Hotel : Ya (<?php echo $row_query4['hotelID'] ?>)</p>
          <p class="card-text">Harga : Rp. <?php echo $row_query4['harga'] ?></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" style="margin-left: 25px;">Booking Sekarang</button>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir paket -->

  <!-- daftar destinasi -->

  <div class="container" style="margin-top:50px;">
    <div class="row">
      <div class="col-sm-8">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Destinasi</h1>
          </div>
        </div>
        <div class="container" style="margin-left : -15px;">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="width : 730px; height: 500px;">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../FRONTEND/images/cendrawasih.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/rajaempat.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/danausentani.jpg" alt="Third slide">
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

          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px;">Taman Nasional Cendrawasih</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 300px;">Raja Ampat</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 450px;">Danau Sentani</a>

          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" style="margin-top: 40px;">
            <div class="carousel-inner" style="width : 730px; height: 500px;">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../FRONTEND/images/pantaikuta2.jpg" alt="First slide" style="height: 420px;">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/purauluwatu.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/pantaipandawa.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -134px;">Pantai Kuta</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -134px; margin-left: 150px;">Pura Uluwatu</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -134px; margin-left: 320px;">Pantai Pandawa</a>

          <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel" style="margin-top: -20px;">
            <div class="carousel-inner" style="width : 730px; height: 500px;">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../FRONTEND/images/danaukelimutu.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/labuanbajo.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/pulaukomodo.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px;">Danau Kelimutu</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 200px;">Labuan Bajo</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 370px;">Pulau Komodo</a>

          <div id="carouselExampleControls4" class="carousel slide" data-ride="carousel" style="margin-top: 50px;">
            <div class="carousel-inner" style="width : 730px; height: 500px;">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../FRONTEND/images/gili2.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/gunungrinjani.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../FRONTEND/images/pantaipink.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px;">Gili trawangan</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 175px;">Gunung Rinjani</a>
          <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" target="_blank" style="position: absolute; margin-top: -64px; margin-left: 360px;">Pantai Pink</a>


        </div>
      </div>

      <div class="col-sm-4">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Pemandangan Indonesia Timur</h1>
          </div>
        </div>
        <iframe width="350" height="215" src="https://www.youtube.com/embed/g_m_8cnAonM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="350" height="215" src="https://www.youtube.com/embed/fqQQluBHi28" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 30px;"></iframe>
        <iframe width="350" height="215" src="https://www.youtube.com/embed/mcv9Cankrmk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 30px;"></iframe>
        <iframe width="350" height="215" src="https://www.youtube.com/embed/4JxEhPaDbWM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 30px;"></iframe>
        <iframe width="350" height="215" src="https://www.youtube.com/embed/NJ9QgZ3ZzmA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 30px; margin-bottom: 30px;"></iframe>
        <img src="../FRONTEND/images/indonesia.gif" width="350" height="215">


      </div>
    </div>
  </div>

  <!-- akhir destinasi -->

  <!-- data -->

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Kecamatan</h1>
          </div>
        </div>

        <?php if (mysqli_num_rows($query5) > 0) {
          while ($row = mysqli_fetch_array($query5)) { ?>
            <p style="background-color : #48dbfb; border-radius: 7px; border: 2px solid black;">&#10033;<?php echo $row["kecamatanNama"] ?></p>
        <?php }
        } ?>
      </div>

      <div class="col-sm-4">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Kabupaten</h1>
          </div>
        </div>

        <?php if (mysqli_num_rows($query6) > 0) {
          while ($row = mysqli_fetch_array($query6)) { ?>
            <p style="background-color : #fed330; border-radius: 7px; border: 2px solid black;">&#10033;<?php echo $row["kabupatenNama"] ?></p>
        <?php }
        } ?>
      </div>

      <div class="col-sm-4">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Provinsi</h1>
          </div>
        </div>

        <?php if (mysqli_num_rows($query7) > 0) {
          while ($row = mysqli_fetch_array($query7)) { ?>
            <p style="background-color : #e74c3c; border-radius: 7px; border: 2px solid black;">&#10033;<?php echo $row["provinsiNama"] ?></p>
        <?php }
        } ?>

        <ul class="list-group" style="margin-top: 50px;">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Object Wisata
            <span class="badge badge-primary badge-pill"><?php echo $jumlah ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Kecamatan
            <span class="badge badge-primary badge-pill"><?php echo $jumlah2 ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Kabupaten
            <span class="badge badge-primary badge-pill"><?php echo $jumlah3 ?></span>
          </li>
        </ul>
      </div>

    </div>
  </div>

  <!-- akhir -->

  <!-- kendaraan -->

  <div class="container">

  <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Daftar Kendaraan</h1>
          </div>
        </div>
    
      <figure class="figure">
        <?php $query8 = mysqli_query($connection, "select * from transport");?>
        <?php if (mysqli_num_rows($query8) > 0) {
          while ($row8 = mysqli_fetch_array($query8)) { ?>
            <img src="../BackEnd/images/<?php echo $row8["fotoKendaraan"] ?>" class="figure-img img-fluid rounded" width = "250px;" height= "250px">
        <?php }
        } ?>
      </figure>

  </div>

  <!-- akhir -->

  <!-- Galery -->
  <div class="container">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Daftar Foto</h1>
      </div>
    </div>
    <div class="row">
      <?php
      $foto = mysqli_query($connection, "select fotoFile from fotodestinasi");
      $batas = 3;
      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
      $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

      $previous = $halaman - 1;
      $next = $halaman + 1;

      $jumlah_data = mysqli_num_rows($foto);
      $total_halaman = ceil($jumlah_data / $batas);

      $data_foto = mysqli_query($connection, "SELECT * from fotodestinasi limit $halaman_awal, $batas");

      while ($row3 = mysqli_fetch_array($data_foto)) { ?>

        <div class="col-sm-4" style="margin-top: 20px;">
          <div class="figure">
            <img src="../BackEnd/images/<?php echo $row3["fotoFile"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="height: 200px; width:350px">
            <figcaption class="figure-caption text-right"><?php echo $row3["fotoNama"] ?></figcaption>

          </div>


        </div>

      <?php } ?>
      <nav style="margin-left:450px; margin-top:20px;">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='?halaman=$previous'";
                                  } ?>>Previous</a>
          </li>
          <?php
          for ($x = 1; $x <= $total_halaman; $x++) {
          ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                    echo "href='?halaman=$next'";
                                  } ?>>Next</a>
          </li>
        </ul>
      </nav>

    </div>
  </div>

  <!-- Akhir Galery -->

  <!-- profil -->

  <div class="container" style="margin-top: 40px;">
    <div class="row">
      <div class="col-sm-5">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">The Author Profile.</h1>
            <a class="button" href="UAS/BackEnd/login.php" style="margin-left: 20px">admin</a>
          </div>
        </div>

        <div class="sosmed" style="background-color: #ff9f1a; color: white;">
          <h5 style="padding: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</h5>
        </div>
      </div>

      <div class="col-sm-7">
        <div class="media" style="background-color: #0984e3; color: white;">
          <img class="mr-3" src="../FRONTEND/images/profile2.jpg" alt="Generic placeholder image" style="width: 150px; height: 150px; margin-top: 40px; margin-left: 20px; ">
          <div class="media-body" style="margin-top: 20px; margin-left: 20px; padding: 15px;">
            <h1 class="mt-0">Mohamamad Faraditya Eka Putra</h1>
            <br>
            <h4 style="font-family: arial; padding: 10px;">Ini adalah Website Untuk project UAS, Iudicium hoc in loco positum est, si librariae ex quodam loco posito, me paenitet de quantitate</h4>
          </div>
        </div>

        <div class="sosmed2" style="background-color: #20bf6b; color: white; margin-top: 30px; padding: 20px;">
          <h5>Email : aditya@gmail.com</h5>
          <h5>No Hp : 021-9745612</h5>
          <h5>Alamat : JL Daan Mogot KM 21</h5>

        </div>
      </div>

    </div>


    <!-- akhir -->
    <div class="col-sm-14">
      <footer class="sticky-footer bg-white" style="margin-top: 30px; ">
        <div class="container my-auto" style="background-color: #d1d8e0;">
          <div class="copyright text-center my-auto">
            <span>Free Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<!-- 3lg2aYP2L]zg<}dx -->