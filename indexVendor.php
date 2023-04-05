<?php
require_once 'dbkoneksi.php';

$sql = "SELECT * FROM vendor";
$stmt = $conn->prepare($sql);
$stmt->execute();

if(isset($_POST['submit'])){
    $_nomor = $_POST['nomor'];
    $_nama = $_POST['nama'];
    $_kontak = $_POST['kontak'];
    $_kota = $_POST['kota'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_email = $_POST['email'];
    $_kartu_id = $_POST['kartu_id'];

    $sql = "INSERT INTO vendor (nomor, nama, kontak, kota)
            VALUES (?, ?, ?, ?)";

    $stmt = $com->prepare($sql);
    $stmt->execute([$_nomor, $_nama, $_kontak, $_kota]);

    header("Location:indexVendor.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
    <a href="formVendor.php" class="btn btn-primary mt-4">Tambah vendor</a>
    <hr>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>N0</th>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Kota</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
           
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $row['nomor']?></td>
                <td><?= $row['nama']?></td>
                <td><?= $row['kontak']?></td>
                <td><?= $row['kota']?></td>
                <td>
                    <!--<a href="" class="btn btn-sm btn-success">read</a>  -->
                    <a href="editVendor.php?id=<?=$row['id']?>" class="btn btn-sm btn-warning">edit</a> <a href="deleteVendor.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">delt</a>
                </td>
            </tr>

            <?php
            $no++;
            }    
            ?>
        </tbody>
    </table>
</div>
</body>
</html>