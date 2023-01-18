<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Aplikasi Data Kendaraan</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Aplikasi Data Kendaraan</span>
    </nav>
<div class="container">
    <br>
    <h4>Data Kendaraan Dengan No Registrasi: <?php echo $_GET['no_reg']?></h4>

<?php

    include "connection.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['no_reg'])) {
        $no_reg=htmlspecialchars($_GET["no_reg"]);

        $sql="SELECT * FROM kendaraan WHERE no_reg = '$no_reg'";

        $hasil=mysqli_fetch_array(mysqli_query($con,$sql));

        $no_reg= $hasil["no_reg"];
        $owner= $hasil["owner"];
        $address= $hasil["address"];
        $brand= $hasil["brand"];
        $year= $hasil["year"];
        $cylinders= $hasil["cylinders"];
        $color= $hasil["color"];
        $fuel= $hasil["fuel"];
        $created_at= $hasil["created_at"];
        }
?>


<div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>No Registrasi Kendaraan:</label>
                    <div class="form-control"><?php echo $no_reg?></div>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik:</label>
                    <div class="form-control"><?php echo $owner?></div>
                 </div>
                <div class="form-group">
                    <label>Merk Kendaraan:</label>
                    <div class="form-control"><?php echo $brand?></div>
                 </div>
                    </p>

                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea class="form-control" rows="5" readonly><?php echo $address ?></textarea>
                 </div> 
                <a href="index.php" class="btn btn-primary">Kembali</a>
                
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>Tahun Pembuatan:</label>
                    <div class="form-control"><?php echo $year?></div>
                 </div>
                <div class="form-group">
                    <label>Kapasitas Silinder:</label>
                    <div class="form-control"><?php echo $cylinders?></div>
                 </div>
                <div class="form-group">
                    <label>Warna Kendaraan:</label>
                    <div class="form-control"><?php echo $color?></div>
 
                </div>
                <div class="form-group">
                    <label>Bahan Bakar:</label>
                    <div class="form-control"><?php echo $fuel?></div>
                 </div>
                <div class="form-group">
                    <label>Awal Tanggal Data Dimasukkan:</label>
                    <div class="form-control"><?php echo $created_at?></div>
                </div>
            </div>
        </div>

      
</div>
</body>
</html>
