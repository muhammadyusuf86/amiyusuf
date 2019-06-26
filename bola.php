<?php
    $koneksi = mysqli_connect("localhost", "root", "", "pemain_bola");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>
<div style="background-color:green; border: 1px solid black; padding: 200px; width: auto; "><font color="red">

<h1>Input Data karyawan</h1>

<form action="" method="post">
<table border="2">
    <tr>
        <td>Nama </td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>Umur </td>
        <td><input type="text" name="Umur"></td>
    </tr>
    <tr>
        <td>Posisi </td>
        <td><input type="text" name="Posisi"></td>
    </tr>
    <tr>
        <td>Club </td>
        <td><input type="text" name="Club"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<h1>Hasil input data pemain bola</h1>
<table border="2">
    <thead>
        <th>no</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Posisi</th>
        <th>Club</th>
        <th>aksi</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `pemain_bola`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td>
                <a href="bola.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `pemain_bola` (`Nama`,`Umur`,`Posisi`,`Club`)
                VALUES ('$_POST[Nama]', '$_POST[Umur]', '$_POST[Posisi]', '$_POST[Club]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'bola.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `pemain_bola` WHERE
        `pemain_bola`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'bola.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>