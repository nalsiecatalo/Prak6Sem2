<?php
    require_once('dbkoneksi.php');
    
    $sqljenis = "SELECT * FROM vendor";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Input Vendor</title>
</head>
<body>
	<a href="index.php">
        <h2>HOME</h2>
    </a>
	<form method="post" action="indexVendor.php">
		<label for="nomor">nomor:</label>
		<input type="text" id="nomor" name="nomor"><br><br>
		
		<label for="nama">Nama:</label>
		<input type="text" id="nama" name="nama"><br><br>

        <label for="kontak">Kontak:</label>
		<input type="text" id="kontak" name="kontak"><br><br>
	

        <label for="kota">kota:</label>
		<input type="text" id="kota" name="kota"><br><br>
	
	
		<input type="submit" value="Simpan" name="submit">
	</form>
</body>
</html>