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

if (isset($_POST['Edit'])) {

    if (isset($_REQUEST['inputID'])) {
        $kabupatenID = $_REQUEST['inputID'];
    }
    if (!empty($kabupatenID)) {
        $kabupatenID = $_POST['inputID'];
    } else {
        die("Anda harus memasukan datanya");
    }

    $provinsiid = $_POST['provinsiid'];
    $kabupatennama  = $_POST['inputnama'];
    $kabupatentgl = $_POST['kbtTgl'];


    mysqli_query($connection, "update kabupaten set provinsiID = '$provinsiid', kabupatenNama = '$kabupatennama', tanggalBerdiri = '$kabupatentgl' where kabupatenID = '$kabupatenID'");

    header("location:kabupaten.php");
}
$dataprovinsiid = mysqli_query($connection, "select * from provinsi");

$kodekabupaten = $_GET["ubah"];
$editkabupaten = mysqli_query($connection, "select * from kabupaten where kabupatenID = '$kodekabupaten'");

$rowedit = mysqli_fetch_array($editkabupaten);

$editprovinsi = mysqli_query($connection, "select * from kabupaten, provinsi where kabupatenID = '$kodekabupaten'
                and kabupaten.provinsiID = provinsi.provinsiID");

$rowedit2 = mysqli_fetch_array($editprovinsi);

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



<div class="row">
    <div class="col-sm-1"></div>

    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Input Kabupaten</h1>
            </div>
        </div>
        <form method="POST">
            <div class="form-group row">
                <label for="kodedestinasi" class="col-sm-2 col-form-label">Kabupaten ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodedestinasi" name="inputID" value="<?php echo $rowedit['kabupatenID'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="refkategori" class="col-sm-2 col-form-label">Provinsi ID</label>
                <div class="col-sm-10">
                    <select name="provinsiid" class="form-control" id="provinsiid">
                        <option value="<?php echo $rowedit["provinsiID"] ?>"><?php echo $rowedit['provinsiID'] ?><?php echo $rowedit2['provinsiNama'] ?></option>
                        <?php while ($row = mysqli_fetch_array($dataprovinsiid)) { ?>
                            <option value="<?php echo $row["provinsiID"] ?>">
                                <?php echo $row["provinsiID"] ?>
                                <?php echo $row["provinsiNama"] ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namadestinasi" name="inputnama" value="<?php echo $rowedit['kabupatenNama'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kbtTgl" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input class="form-control" id="kbtTgl" name="kbtTgl" value="<?php echo $rowedit['tanggalBerdiri'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-success" value="Edit" name="Edit">
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
                <h1 class="display-4">Daftar Kabupaten</h1>
                <h2>Hasil Entry data pada tabel Kabupaten</h2>
            </div>
        </div>

        <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Destinasi</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                    echo $_POST['search'];
                                                                                                } ?>" placeholder="Cari Kabupaten">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn btn-dark" value="Search">
            </div>


        </form>


        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kabupaten ID</th>
                    <th>Provinsi ID</th>
                    <th>Nama Provinsi</th>
                    <th>Nama Kabupaten</th>
                    <th>Tangal Berdirinya</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (isset($_POST['kirim'])) {
                    $search = $_POST['search'];
                    $query = mysqli_query(
                        $connection,
                        "select kabupaten.*, provinsi.provinsiID, provinsiNama from kabupaten, provinsi where kabupatenNama like '%" . $search . "%' and provinsi.provinsiID = kabupaten.provinsiID"
                    );
                } else {
                    $query = mysqli_query($connection,  "select kabupaten.*, provinsi.provinsiID, provinsiNama
                        from kabupaten, provinsi where provinsi.provinsiID = kabupaten.provinsiID");
                }
                $nomor = 1;

                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $row['kabupatenID']; ?></td>
                        <td><?php echo $row['provinsiID']; ?></td>
                        <td><?php echo $row['provinsiNama']; ?></td>
                        <td><?php echo $row['kabupatenNama']; ?></td>
                        <td><?php echo $row['tanggalBerdiri']; ?></td>

                        <td>
                            <a href="kabupatenedit.php?ubah=<?php echo $row['kabupatenID'] ?>" class="btn btn-success btn-sm" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>

                        <td>
                            <a href="kabupatenhapus.php?hapus=<?php echo $row['kabupatenID'] ?>" class="btn btn-danger btn-sm" title="Delete">
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
        $(function() {
            $("#kbtTgl").datepicker({
                dateFormat: "yy-mm-dd",
                showAnim: "slideDown",
                changeMonth: true,
                changeYear: true,
                yearRange: "c-80:c+0″,"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#provinsiid').select2({
                allowClear: true,
                placeholder: "Pilih Provinsi ID"
            });
        });
    </script>



</div>

<?php
mysqli_close($connection);
ob_end_flush();
?>
</div>
</div>
    <?php include "footer.php";?>
</html>