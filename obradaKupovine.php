<html>

<head>
	<title>Biblioteka</title>
	<link rel="stylesheet" href="/kontrolniZadatak/design.css">
</head>

<body>
	<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kontrolnizadatak";
	if (isset($_SESSION["admin_pristup"])) {
		$clan = $_POST['clan'];
		$knjiga = $_POST['knjiga'];
		$datum = $_POST['datum'];
		$sql = "INSERT INTO prodavnica (id_clana,id_knjige,datum) VALUES ('" . $clan . "','" . $knjiga . "','" . $datum . "')";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->query($sql) === TRUE) {
			echo "<h1>Biblioteka</h1>";
			echo "<h3>Upis nove knjige</h3>";
			echo "<p>Uspešno ste obradili novi račun!</p>";
			echo "<p><a href=\"/kontrolniZadatak/prijava.php\">Vrati se nazad.</a></p>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	} else {
		echo "Nemate ovlascenja da dodate podatke!";
	}
	?>
</body>

</html>