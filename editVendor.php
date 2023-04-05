<?php
    require_once 'dbkoneksi.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM vendor WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nomor = $_POST['nomor'];
        $nama = $_POST['nama'];
        $kontak = $_POST['kontak'];
        $kota = $_POST['kota'];

        $sql = "UPDATE vendor SET nomor = :nomor, nama = :nama, kontak = :kontak, kota = :kota WHERE id = :id";

        $stmt = $com->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kontak', $kontak);
        $stmt->bindParam(':kota', $kota);
        $stmt->execute();

        header('Location: indexVendor.php');


    }



    $sqljenis = "SELECT * FROM vendor";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();

  
?>


<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>nomor</label>
    <input type="text" name="nomor" value="<?php echo $row['nomor']; ?>">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
    <br>
    <label for="kontak">Kontak:</label>
	<input type="text" id="kontak" name="kontak" value="<?php echo $row['kontak']; ?>"><br>
	
    <label for="kota">kota:</label>
	<input type="text" id="kota" name="kota" value="<?php echo $row['kota']; ?>"><br>

    <button type="submit" name="submit">Save</button>
</form>