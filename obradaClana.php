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
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$korisnickoime = $_POST['korisnickoime'];
		$lozinka = $_POST['lozinka'];
		$sql = "INSERT INTO clanovi (ime,prezime,korisnickoime,lozinka,tipnaloga) VALUES ('" . $ime . "','" . $prezime . "','" . $korisnickoime . "','" . $lozinka . "','2')";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->query($sql) === TRUE) {
			echo "<h1>Biblioteka</h1>";
			echo "<h3>Upis novog člana</h3>";
			echo "<p>Dodali ste novog člana u bazu:</p>";
			echo "<p>" . $ime . " " . $prezime . "</p>";
			echo "<p><a href=\"/kontrolniZadatak/prijava.php\">Vrati se na nazad.</a></p>";
		} else {
			echo "Greska: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	} else {
		echo "Nemate ovlascenja da dodate podatke!";
	}
	?>
</body>

</html>