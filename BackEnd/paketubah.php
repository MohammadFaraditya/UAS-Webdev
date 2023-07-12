<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata</title>
</head>

<?php
ob_start();
session_start();
if (!isset($_SESSION['emailuser']))
    header("location:login.php");
?>

<?php include "header.php"; ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <?php

        include "includes/config.php";
        if (isset($_POST['Edit'])) {
            $paketid = $_POST['inputid'];
            $namapaket = $_POST['inputnama'];
            $tglmulai = $_POST['tglmulai'];
            $tglakhir = $_POST['tglakhir'];
            $hotel = $_POST['hotelid'];
            $tiketpesawat = $_POST['tiket'];
            $transport = $_POST['transportid'];
            $harga = $_POST['harga'];


            $name = $_FILES['filetujuan']['name'];
            $file_tmp = $_FILES["filetujuan"]["tmp_name"];



            $ekstensifile = pathinfo($name, PATHINFO_EXTENSION);
            if (($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
                move_uploaded_file($name, 'images/' . $file_tmp);
                mysqli_query($connection, "update paket set namaPaket = '$namapaket', fotoTujuan = '$name', tanggalAwal = '$tglmulai', tanggalAkhir = '$tglakhir', hotelID = '$hotel', 
                tiketPesawat = '$tiketpesawat', transportID = '$transport', harga = '$harga' where paketID = '$paketid'");
                header("location: paket.php");
            }
        }

        $datahotel = mysqli_query($connection, "select * from hotel");
        $datatransport = mysqli_query($connection, "select * from transport");

        $kodepaket = $_GET["ubah"];
        $editpaket = mysqli_query($connection, "select * from paket where paketID = '$kodepaket'");

        $rowedit = mysqli_fetch_array($editpaket);

        $edithotel = mysqli_query($connection, "select * from paket, hotel where paketID = '$kodepaket'
                and paket.hotelID = hotel.hotelID");

        $rowedit2 = mysqli_fetch_array($edithotel);

        $edittransport = mysqli_query($connection, "select * from paket, transport where paketID = '$kodepaket'
                and paket.transportID = transport.transportID");

        $rowedit3 = mysqli_fetch_array($edittransport);

        ?>


        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Destinasi Wisata</title>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
        </head>

        -
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Input Paket</h1>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="kodefoto" class="col-sm-2 col-form-label">Paket ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodefoto" name="inputid" value="<?php echo $rowedit['paketID'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="namafoto" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namafoto" name="inputnama" value="<?php echo $rowedit['namaPaket'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Photo Tujuan</label>
                        <div class="col-sm-10">
                            <input type="file" id="filetujuan" name="filetujuan">
                            <img src="images/<?php echo $rowedit['fotoTujuan']?>" style="width: 200px; height: 100px;">
                            <p class="help-block">Field ini digunakan untuk diunggah</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tglmulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="tglmulai" name="tglmulai" value="<?php echo $rowedit['tanggalAwal'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tglakhir" class="col-sm-2 col-form-label">Tanggal akhir</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="tglakhir" name="tglakhir" value="<?php echo $rowedit['tanggalAkhir'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="refkategori" class="col-sm-2 col-form-label">ID Hotel</label>
                        <div class="col-sm-10">
                            <select name="hotelid" class="form-control" id="hotelid">
                            <option value="<?php echo $rowedit["hotelID"] ?>"><?php echo $rowedit['hotelID'] ?><?php echo $rowedit2['namaHotel'] ?></option>
                                <?php while ($row = mysqli_fetch_array($datahotel)) { ?>
                                    <option value="<?php echo $row["hotelID"] ?>">
                                        <?php echo $row["hotelID"] ?>
                                        <?php echo $row["namaHotel"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tiket" class="col-sm-2 col-form-label">Tiket Pesawat</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="tiket" name="tiket" value="<?php echo $rowedit['tiketPesawat'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="refkategori" class="col-sm-2 col-form-label">ID Transport</label>
                        <div class="col-sm-10">
                            <select name="transportid" class="form-control" id="transportid">
                            <option value="<?php echo $rowedit["transportID"] ?>"><?php echo $rowedit['transportID'] ?><?php echo $rowedit3['namaKendaraan'] ?></option>
                                <?php while ($row = mysqli_fetch_array($datatransport)) { ?>
                                    <option value="<?php echo $row["transportID"] ?>">
                                        <?php echo $row["transportID"] ?>
                                        <?php echo $row["namaKendaraan"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="harga" name="harga" value="<?php echo $rowedit['harga'] ?>">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" name="Edit" class="btn btn-primary" value="Edit">
                            <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>


        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Daftar Hotel</h1>
                    </div>
                </div>

                <table class="table table-hover table-danger">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Paket ID</th>
                            <th>Nama Paket</th>
                            <th>Foto Tujuan</th>
                            <th>Tanggal Pergi</th>
                            <th>Tanggal Pulang</th>
                            <th>Hotel ID</th>
                            <th>Tiket Pesawat</th>
                            <th>Transport ID</th>
                            <th>Harga</th>
                            <th colspan="2" style="text-align: center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $query = mysqli_query($connection, "select * from paket");
                        $nomor = 1;
                        while ($row = mysqli_fetch_array($query)) {  ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['paketID']; ?></td>
                                <td><?php echo $row['namaPaket']; ?></td>
                                <td>
                                    <?php if (is_file("images/" . $row['fotoTujuan'])) { ?>
                                        <img src="images/<?php echo $row['fotoTujuan'] ?>" width="80">

                                    <?php } else
                                        echo  "<img src = 'images/noimagee.jpg' width = '80'>"
                                    ?>
                                </td>
                                <td><?php echo $row['tanggalAwal']; ?></td>
                                <td><?php echo $row['tanggalAkhir']; ?></td>
                                <td><?php echo $row['hotelID']; ?></td>
                                <td><?php echo $row['tiketPesawat']; ?></td>
                                <td><?php echo $row['transportID']; ?></td>
                                <td><?php echo $row['harga']; ?></td>

                                <td>
                                    <a href="paketubah.php?ubah=<?php echo $row['paketID'] ?>" class="btn btn-success btn-sm" title="EDIT">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 
                                                .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 
                                                .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 
                                                0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                </td>

                                <td>
                                    <a href="pakethapus.php?hapus=<?php echo $row['paketID'] ?>" class="btn btn-danger btn-sm" title="HAPUS">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 
                                                .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 
                                                2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 
                                                1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                            <?php $nomor = $nomor + 1; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
        $("#tglmulai").datepicker({
            dateFormat: "yy-mm-dd",
            showAnim: "slideDown",
            changeMonth: true,
            changeYear: true,
            yearRange: "c-80:c+0″,"
        });
    });
</script>

<script>
    $(function() {
        $("#tglakhir").datepicker({
            dateFormat: "yy-mm-dd",
            showAnim: "slideDown",
            changeMonth: true,
            changeYear: true,
            yearRange: "c-80:c+0″,"
        });
    });
</script>
<?php include "footer.php"; ?>

</html>