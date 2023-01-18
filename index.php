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

    <?php
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include "connection.php";
    $query = "WHERE ";
    $query_string = "";

    if(isset($_GET["no_reg_filter"]) AND isset($_GET["owner_filter"])){
        $no_reg_filter = $_GET["no_reg_filter"];
        $owner_filter = $_GET["owner_filter"];
    } else {
        $no_reg_filter = "";
        $owner_filter = "";
    }

    if (isset($no_reg_filter)) {
        $query_string = "no_reg LIKE"."'%$no_reg_filter%'";
        $query = $query.$query_string;
        }
    if ($owner_filter!="") {
        $owner_filter=input($_GET["owner_filter"]);
        if($query_string!=""){
            $query_string = "AND owner LIKE '%$owner_filter%'";
        }
        else{
            $query_string="owner LIKE '%$owner_filter%'";
        }
        $query = $query.$query_string;
    }

    if(isset($_GET['page'])){
        $halaman_aktif = $_GET['page'];
    }
    else{
        $halaman_aktif = 1;
    }

    ?>

<div class="container">
    <br>
    <h4><center>Data Kendaraan</center></h4>
    <h5>Filter Berdasarkan</h5>
    <div>
        <form class="form-inline" action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
            <div class="form-group">
                <label class="mr-2">No Registrasi:</label>
                <input type="text" name="no_reg_filter" class="form-control w-50 p-3" value="<?php echo $no_reg_filter?>"/>
            </div>
            <div class="form-group">
                <label class="mr-2">Nama Pemilik:</label>
                <input type="text" name="owner_filter" class="form-control w-50 p-3" value="<?php echo $owner_filter?>"/>
            </div>
            <button type="submit" name="submit" class="btn btn-dark mr-2">Filter</button>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
        </form>
    </div>

    <tr class="table-danger">
    <br>
    <thead>
    <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
                <th>No</th>
                <th>No Registrasi</th>
                <th>Nama Pemilik</th>
                <th>Merk Kendaraan</th>
                <th>Tahun Pembuatan</th>
                <th>Kapasitas</th>
                <th>Warna</th>
                <th>Bahan Bakar</th>
                <th>Action</th>
            </tr>
    </thead>

    <?php
        $sql="";
        include "connection.php";
    
        if($query=="WHERE "){
            $sql="SELECT * FROM kendaraan ORDER BY created_at DESC";
        }
        else{
            $sql="SELECT * FROM kendaraan $query ORDER BY created_at DESC";
        }
        $hasil=mysqli_query($con,$sql);
        $jumlah_data = $hasil->num_rows;
        $ambil_perhalaman = 5;
        $no=($halaman_aktif-1)*$ambil_perhalaman;
        $jumlah_pagination = ceil($jumlah_data/$ambil_perhalaman);
        $data_awal = ($halaman_aktif-1)*$ambil_perhalaman;

        $sql_new = $sql." LIMIT $data_awal,$ambil_perhalaman";
        $hasil_new=mysqli_query($con,$sql_new);

        while ($data = mysqli_fetch_array($hasil_new)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["no_reg"]; ?></td>
                <td><?php echo $data["owner"];   ?></td>
                <td><?php echo $data["brand"];   ?></td>
                <td><?php echo $data["year"];   ?></td>
                <td><?php echo $data["cylinders"];   ?></td>
                <td><?php echo $data["color"];   ?></td>
                <td><?php echo $data["fuel"];   ?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="detail_kendaraan.php?no_reg=<?php echo htmlspecialchars($data['no_reg']);?>" class="btn btn-primary" role="button">Detail</a>
                    <a href="update.php?no_reg=<?php echo htmlspecialchars($data['no_reg']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a onClick="return confirm('Anda yakin menghapus data ini?')" href="delete.php?no_reg=<?php echo $data['no_reg']; ?>" class="btn btn-danger" role="button" >Delete</a>
                </div>
                </td>
            </tr>
            </tbody>
            <?php
        }
        if($hasil->num_rows==0){
            echo "<td colspan='9' class='font-weight-light text-center'>Tidak Ada Data Yang Ditemukan</td>";
        }
        ?>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php
                for($i=1;$i<=$jumlah_pagination;$i++) {
                    if($halaman_aktif==$i) {
                        echo '<li class="page-item"><a class="page-link bg-primary text-white" href="index.php?no_reg_filter='.$no_reg_filter.'&owner_filter='.$owner_filter.'&page='.$i.'">'.$i.'</a></li>';
                    }
                    else{
                        echo '<li class="page-item"><a class="page-link" href="index.php?no_reg_filter='.$no_reg_filter.'&owner_filter='.$owner_filter.'&page='.$i.'">'.$i.'</a></li>';
                    }
                    
                }
            ?>
        </ul>
    </nav>
    
</div>
</body>
</html>
