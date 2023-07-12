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
if(!isset($_SESSION['emailuser']))
header("location:login.php");
?>

    <?php include "header.php";?>

    <div class="container-fluid">
    <div class="card shadow mb-4">

<?php
include "includes/config.php";

if (isset($_POST['simpan'])) {

    if (isset($_REQUEST['provID'])) {
        $provID = $_REQUEST['provID'];
    }
    if (!empty($provID)) {
        $provIDe = $_POST['provID'];
    } else {
        die("Anda harus memasukan datanya");
    }

    $provnama = $_POST['provNama'];
    $provtgl = $_POST['provTgl'];

    mysqli_query($connection, "insert into provinsi values ('$provID','$provnama','$provtgl')");

    header("location:Provinsi.php");
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
   
</head>


    <div class="row">
        <div class="col-sm-1">
        </div>

        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Provinsi</h1>
                </div>
            </div>
            <form method="POST">

                <div class="form-group row">
                    <label for="provID" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="provID" name="provID" placeholder="ID Provinsi">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="provNama" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="provNama" name="provNama" placeholder="Nama Provinsi">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="provTgl" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="provTgl" name="provTgl" placeholder="Tanggal Berdirinya Provinsi" autocomplete="off">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
                        <input type="reset" class="btn btn-dark" value="Batal" name="batal">
                    </div>
                </div>

            </form>

            <div class="col-sm-1">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9"></div>
        
        <?php
            date_default_timezone_set("asia/jakarta");
            echo "" . date("l");
            echo " " . date("Y/m/d") . "<br>";
            echo "Time " . date("h:i:sa");
            echo "<br>";

        ?>
        
        <div class="col-md-1">
            <figure class="figure">
                <img src="../BackEnd/images/a787199285eb0b403d7609832561f580.gif" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption"></figcaption>
            </figure>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Provinsi</h1>
                    <h2>Hasil Entry data pada tabel provinsi</h2>
                </div>
            </div>

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Provinsi</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if (isset($_POST['search'])) {echo $_POST['search'];} ?>" placeholder="Cari Nama Provinsi">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-dark" value="Search">
                </div>


            </form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Provinsi</th>
                        <th>Nama Provinsi</th>
                        <th>Tanggal Berdirinya Provinsi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_POST['kirim'])) {
                        $search = $_POST['search'];
                        $query = mysqli_query(
                            $connection,
                            "select * from provinsi where provinsiNama like '%" . $search . "%'"
                        );
                    } else {
                        $query = mysqli_query($connection,  "select * from provinsi");
                    }
                    $nomor = 1;

                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                        
                            <td><?php echo $row['provinsiID']; ?></td>
                            <td><?php echo $row['provinsiNama']; ?></td>
                            <td><?php echo $row['provinsiTglBerdiri']; ?></td>

                            <td>
                                <a href="provinsiedit.php?ubah=<?php echo $row['provinsiID'] ?>" class="btn btn-success btn-sm" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </td>

                            <td>
                                <a href="provinsihapus.php?hapus=<?php echo $row['provinsiID'] ?>" class="btn btn-danger btn-sm" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                        <?php $nomor = $nomor + 1; ?>
                    <?php }
                    ?>
                </tbody>

            </table>

        </div>
        <div class="col-sm-1"></div>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
            $( "#provTgl" ).datepicker({
                dateFormat: "yy-mm-dd",
                showAnim: "slideDown",
                changeMonth: true,
                changeYear: true,
                yearRange : "c-80:c+0″,"
                });
            } );
        </script>
        
        <div class="col-sm-1"></div>
    </div>
    
    </div>
    </div>
    <?php include "footer.php";?>

</html>