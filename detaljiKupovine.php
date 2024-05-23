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
	if (isset($_SESSION["clan_pristup"])) {
		$kupovina = $_REQUEST['kupovina'];
		$sql = "SELECT * FROM prodavnica JOIN knjige USING(id_knjige) WHERE id_kupovine=" . $kupovina;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			echo "<h1>Biblioteka</h1>";
			echo "<h3>Detalji kupovine</h3>";
			echo "<center><table>";
			echo "<tr><th>ID knjige</th><th>Naziv</th><th>Autor</th><th>Godina</th><th>Vrsta</th><th>Cena</th><th>Datum</th></tr>";
			echo "<tr>";
			echo "<td>" . $row['id_knjige'] . "</td>";
			echo "<td>\"" . $row['naziv'] . "\"</td>";
			echo "<td>" . $row['autor'] . "</td>";
			echo "<td>" . $row['godina'] . "</td>";
			echo "<td><i>" . $row['vrsta'] . "</i></td>";
			echo "<td>" . $row['cena'] . "</td>";
			echo "<td>" . $row['datum'] . "</td>";
			echo "</tr>";
			echo "</table></center><p>";
		}
		echo "<p><a href=\"/kontrolniZadatak/prijava.php\">Vrati se nazad.</a></p>";
	} else {
		echo "Nemate ovlascenja da gledate podatke!";
	}
	$conn->close();
	?>
</body>

</html>