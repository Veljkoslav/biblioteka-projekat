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
		$clan = $_REQUEST['clan'];
		$sql = "SELECT * FROM clanovi WHERE clanovi.id_clana=" . $clan;
		//$sql="SELECT * FROM prodavnica JOIN clanovi ON prodavnica.id_clana = clanovi.id_clana JOIN knjige ON prodavnica.id_knjige = knjige.id_knjige WHERE clanovi.id_clana=".$clan.""; 
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			echo "<h1>Biblioteka</h1>";
			echo "<h3>Detalji člana</h3>";
			echo "<p>Ime i prezime: " . $row['ime'] . " " . $row['prezime'];
			echo "<br>Korisničko ime: " . $row['korisnickoime'] . "";
			echo "<br>Ovaj nalog nema administratorske dozvole.";

			$sql = "SELECT count(cena) FROM prodavnica JOIN knjige USING(id_knjige) WHERE id_clana=" . $clan;
			$result = $conn->query($sql);
			$broj_knjiga = $result->fetch_array()[0];
			if ($broj_knjiga > 0) {
				echo "<p>Lista knjiga koje član poseduje:";
				echo "<center><table>";
				echo "<tr><th>ID</th><th>Naziv</th><th>Autor</th><th>Godina</th><th>Vrsta</th><th>Cena</th></tr>";

				$sql = "SELECT * FROM prodavnica JOIN knjige USING(id_knjige) WHERE id_clana=" . $clan;
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id_knjige'] . "</td>";
					echo "<td>\"" . $row['naziv'] . "\"</td>";
					echo "<td>" . $row['autor'] . "</td>";
					echo "<td>" . $row['godina'] . "</td>";
					echo "<td>" . $row['vrsta'] . "</i></td>";
					echo "<td>" . $row['cena'] . "</td>";
					echo "</tr>";
				}
				echo "</table></center><p>";
				echo "<p>Ukupno knjiga: " . $broj_knjiga;
				echo "<br>Ukupna vrednost knjiga: ";
				$sql = "SELECT sum(cena) FROM prodavnica JOIN knjige USING(id_knjige) WHERE id_clana=" . $clan;
				$result = $conn->query($sql);
				echo $result->fetch_array()[0];
			} else {
				echo "<br>Ovaj član nema kupljenih knjiga.";
			}
		}
		echo "<p><a href=\"/kontrolniZadatak/prijava.php\">Vrati se nazad.</a></p>";
	} else {
		echo "Nemate ovlascenja da gledate podatke!";
	}
	$conn->close();
	?>
</body>

</html>