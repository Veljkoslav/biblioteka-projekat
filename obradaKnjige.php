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
	$conn = new mysqli($servername, $username, $password, $dbname);

	if (isset($_SESSION["admin_pristup"])) {
		$naziv = $_POST['naziv'];
		$autor = $_POST['autor'];
		$godina = $_POST['godina'];
		$vrsta = $_POST['zanr'];
		$cena = $_POST['cena'];
		$sql = "INSERT INTO knjige (naziv,autor,godina,vrsta,cena) VALUES ('$naziv','$autor','$godina','$vrsta','$cena')";
		if ($conn->query($sql) === TRUE) {
			echo "<h1>Biblioteka</h1>";
			echo "<h3>Upis nove knjige</h3>";
			echo "<p>Dodali ste novu knjigu u bazu:</p>";
			echo "<br>" . $autor . " — \"" . $naziv . "\", " . $vrsta . " (" . $godina . ")</p>";
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