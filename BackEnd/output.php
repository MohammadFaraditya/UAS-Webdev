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

    if(isset($_REQUEST['inputkode']))
        {
            $kategorikode = $_REQUEST['inputkode'];
        }
    if(!empty($kategorikode))
        {
            $kategorikode = $_POST['inputkode'];
        }
    else
        {
        ?> <h1>Anda harus menginput data</h1> <?php 
            die("Anda harus memasukan datanya");
        }


    $kategorinama = $_POST['inputnama'];
    $kategoriket  = $_POST['inputket'];
    $kategoriref  = $_POST['inputref'];

    mysqli_query($connection, "insert into kategori values ('$kategorikode','$kategorinama','$kategoriket','$kategoriref')");

    header("location:output.php");
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Kategori Wisata</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>


    <div class="row">
        <div class="col-sm-1">
        </div>

        <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Kategori Wisata</h1>
                </div>
            </div>
            <form method="POST">
                <div class="form-group row">
                    <label for="kodekategori" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodekategori" name="inputkode" placeholder="Kode Kategori" maxlength="4">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="namakategori" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namakategori" name="inputnama" placeholder="Nama Kategori">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ketkategori" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ketkategori" name="inputket" placeholder="Keterangan Kategori">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="refkategori" class="col-sm-2 col-form-label">Referensi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="refkategori" name="inputref" placeholder="Referensi Kategori">
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
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Kategori Wisata</h1>
                    <h2>Hasil Entry data pada tabel kategori</h2>
                </div>
            </div>

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Kategori</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {
                                                                                                        echo $_POST['search'];
                                                                                                    } ?>" placeholder="Cari Nama Kategori">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-dark" value="Search">
                </div>


            </form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Referensi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_POST['kirim'])) {
                        $search = $_POST['search'];
                        $query = mysqli_query(
                            $connection,
                            "select * from kategori where kategoriNama like '%" . $search . "%'
                            or kategoriKeterangan like '%" . $search . "%'
                            or katergoriReferensi like '%" . $search . "%'
                            "
                        );
                    } else {
                        $query = mysqli_query($connection, "select * from kategori");
                    }
                    $nomor = 1;

                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $row['kategoriID']; ?></td>
                            <td><?php echo $row['kategoriNama']; ?></td>
                            <td><?php echo $row['kategoriKeterangan']; ?></td>
                            <td><?php echo $row['katergoriReferensi']; ?></td>
                        </tr>
                        <?php $nomor = $nomor + 1; ?>
                    <?php }
                    ?>
                </tbody>

            </table>

        </div>
        <div class="col-sm-1"></div>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </div>
</div>
</div> 

<?php include "footer.php";?>

</html>