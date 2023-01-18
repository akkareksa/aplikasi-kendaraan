<?php
    include "connection.php";
    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['no_reg'])) {
        $no_reg=htmlspecialchars($_GET["no_reg"]);
        $sql="DELETE FROM kendaraan where no_reg='$no_reg' ";
        $hasil=mysqli_query($con,$sql);
        echo "<script> console.log('TRIGGER!');</script>";
        //Kondisi apakah berhasil atau tidak
        if ($hasil) {
            header("Location:index.php");

        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>
