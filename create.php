<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kendaraan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Aplikasi Data Kendaraan</span>
</nav>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "connection.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $no_reg=input($_POST["no_reg"]);
        $owner=input($_POST["owner"]);
        $address=input($_POST["address"]);
        $brand=input($_POST["brand"]);
        $year=input($_POST["year"]);
        $cylinders=input($_POST["cylinders"]);
        $color=input($_POST["color"]);
        $fuel=input($_POST["fuel"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into kendaraan (no_reg,owner,address,brand,year, cylinders, color, fuel) values
		('$no_reg','$owner','$address','$brand','$year','$cylinders','$color','$fuel')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <br>
    <h4>Tambah Data Kendaraan</h4>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>No Registrasi Kendaraan:</label>
                    <input type="text" name="no_reg" class="form-control" placeholder="Masukan Nomor Registrasi Kendaraan" required />

                </div>
                <div class="form-group">
                    <label>Nama Pemilik:</label>
                    <input type="text" name="owner" class="form-control" placeholder="Masukan Nama Pemilik" required/>
                </div>
                <div class="form-group">
                    <label>Merk Kendaraan:</label>
                    <input type="text" name="brand" class="form-control" placeholder="Masukan Merek Kendaraan" required/>
                </div>
                    </p>

                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="address" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
                </div> 
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-primary">Kembali</a>
                
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>Tahun Pembuatan:</label>
                    <input type="text" name="year" class="form-control" placeholder="Masukan Tahun Pembuatan Kendaraan" required/>
                </div>
                <div class="form-group">
                    <label>Kapasitas Silinder:</label>
                    <input type="text" name="cylinders" class="form-control" placeholder="Masukan Kapasitas Silinder Kendaraan" required/>
                </div>
                <div class="form-group">
                    <label>Warna Kendaraan:</label>
                    <select class="form-control" name ="color" required/ placeholder="Pilih Warna Kendaraan">
                        <option value="" hidden >Pilih Warna</option>
                        <option value="Merah">Merah</option>
                        <option value="Hitam">Hitam</option>
                        <option value="Biru">Biru</option>
                        <option value="Abu-Abu">Abu-Abu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bahan Bakar:</label>
                    <input type="text" name="fuel" class="form-control" placeholder="Masukan Bahan Bakar Kendaraan" required/>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>