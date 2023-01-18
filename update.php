<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id_peserta
    if (isset($_GET['no_reg'])) {
        $no_reg=input($_GET["no_reg"]);

        $sql="SELECT * from kendaraan where no_reg='$no_reg'";
        $hasil=mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($hasil);
        
        $owner = $data['owner'];
        $brand = $data['brand'];
        $address = $data['address'];
        $year = $data['year'];
        $cylinders = $data['cylinders'];
        $color = $data['color'];
        $fuel = $data['fuel'];
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $no_reg=htmlspecialchars($_POST["no_reg"]);
        $owner=input($_POST["owner"]);
        $brand=input($_POST["brand"]);
        $address=input($_POST["address"]);
        $year=input($_POST["year"]);
        $cylinders=input($_POST["cylinders"]);
        $color=input($_POST["color"]);
        $fuel=input($_POST["fuel"]);

        //Query update data pada tabel kendaraan
        echo $owner;
        $sql="UPDATE kendaraan SET
			owner='$owner',
			brand='$brand',
			address='$address',
			year='$year',
            cylinders='$cylinders',
            color='$color',
            fuel='$fuel'
			WHERE no_reg='$no_reg'";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label>No Registrasi Kendaraan:</label>
                    <input type="text" name="no_reg" class="form-control" value="<?php echo $no_reg?>" readonly />
                </div>
                <div class="form-group">
                    <label>Nama Pemilik:</label>
                    <input type="text" name="owner" class="form-control" required value="<?php echo $owner?>" />
                </div>
                <div class="form-group">
                    <label>Merk Kendaraan:</label>
                    <input type="text" name="brand" class="form-control" placeholder="Masukan Merek Kendaraan" required value="<?php echo $brand?>"/>
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="address" class="form-control" rows="5"placeholder="Masukan Alamat" required><?php echo $address?></textarea>
                </div> 
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-primary">Kembali</a>
                
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>Tahun Pembuatan:</label>
                    <input type="text" name="year" class="form-control" placeholder="Masukan Tahun Pembuatan Kendaraan" required value="<?php echo $year?>"/>
                </div>
                <div class="form-group">
                    <label>Kapasitas Silinder:</label>
                    <input type="text" name="cylinders" class="form-control" placeholder="Masukan Kapasitas Silinder Kendaraan" required value="<?php echo $cylinders?>"/>
                </div>
                <div class="form-group">
                    <label>Warna Kendaraan:</label>
                    <select class="form-control" name ="color" required placeholder="Pilih Warna Kendaraan">
                        <option value="" hidden >Pilih Warna</option>
                        <option value="Merah"<?php if($color=='Merah')echo 'selected="selected"'; ?>>Merah</option>
                        <option value="Hitam"<?php if($color=='Hitam')echo 'selected="selected"'; ?>>Hitam</option>
                        <option value="Biru"<?php if($color=='Biru')echo 'selected="selected"'; ?>>Biru</option>
                        <option value="Abu-Abu"<?php if($color=='Abu-Abu')echo 'selected="selected"'; ?>>Abu-Abu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bahan Bakar:</label>
                    <input type="text" name="fuel" class="form-control" placeholder="Masukan Bahan Bakar Kendaraan" required value="<?php echo $fuel?>"/>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>