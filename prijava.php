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
	if ($conn->connect_error) {
		die("Greška u konekciji: " . $conn->connect_error);
	}
	
	//login i sesije
	if ((!isset($_SESSION["admin_pristup"])) || (!isset($_SESSION["clan_pristup"]))) {
		$sql = "SELECT id_clana,ime,prezime,korisnickoime,lozinka,tipnaloga FROM clanovi";
		$result = $conn->query($sql);
		$_SESSION["korisnickoime"] = $_POST["korisnickoime"];
		$_SESSION["lozinka"] = $_POST["lozinka"];
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if (($_SESSION["korisnickoime"] == $row["korisnickoime"]) && ($_SESSION["lozinka"] == $row["lozinka"])) {
					$_SESSION["imeprezime"] = $row["ime"] . " " . $row["prezime"];
					$_SESSION["clan"] = $row["id_clana"];
					if ($row["tipnaloga"] == 1) {
						$_SESSION["admin_pristup"] = true;
					} else {
						$_SESSION["clan_pristup"] = true;
					}
				}
			}
		}
	}

	//administratorski nalog
	if ($_SESSION["admin_pristup"]) {
		echo "<h1>Biblioteka</h1>";
		echo "<h3>Dobro došli, " . $_SESSION["imeprezime"] . "! <a href=\"logout.php\">(odjava)</a></h3>";
		echo "<p>Dostupne knjige u biblioteci:</p>";
		$sql = "SELECT id_knjige, naziv, autor, godina, vrsta, cena FROM knjige";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<center><table>";
			echo "<tr><th>ID</th><th>Naziv</th><th>Autor</th><th>Godina</th><th>Vrsta</th><th>Cena</th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['id_knjige'] . "</td>";
				echo "<td>\"" . $row['naziv'] . "\"</td>";
				echo "<td>" . $row['autor'] . "</td>";
				echo "<td>" . $row['godina'] . "</td>";
				echo "<td><i>" . $row['vrsta'] . "</i></td>";
				echo "<td>" . $row['cena'] . "</td>";
				echo "</tr>";
			}
			echo "</table></center><p>";
		}
		echo "<p>Registrovani članovi u biblioteci:</p>";
		$sql = "SELECT id_clana, ime, prezime, korisnickoime FROM clanovi WHERE tipnaloga=2";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<center><table>";
			echo "<tr><th>ID</th><th>Ime</th><th>Prezime</th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['id_clana'] . "</td>";
				echo "<td>" . $row['ime'] . "</td>";
				echo "<td>" . $row['prezime'] . "</td>";
				echo "<td><a href=\"/kontrolniZadatak/detaljiClana.php?clan=" . $row['id_clana'] . "\">(detalji)</a></td>";
				echo "</tr>";
			}
			echo "</table></center><p>";
		}
		echo "<a href=\"/kontrolniZadatak/novaKnjiga.html\">Dodaj knjigu</a> | <a href=\"/kontrolniZadatak/noviClan.html\">Dodaj člana</a> | <a href=\"/kontrolniZadatak/novaKupovina.html\">Dodaj kupovinu</a>";
		echo "<br><a href=\"/kontrolniZadatak/brisanjeKnjige.html\">Ukloni knjigu</a> | <a href=\"/kontrolniZadatak/brisanjeClana.html\">Ukloni člana</a>";

	} 
	
	//clanski nalog
	else if ($_SESSION["clan_pristup"]) {
		echo "<h1>Biblioteka</h1>";
		echo "<h3>Dobro došli, " . $_SESSION["imeprezime"] . "! <a href=\"logout.php\">(odjava)</a></h3>";
		echo "<p>Na svojoj polici imate sledeće knjige:</p>";
		$sql = "SELECT * FROM prodavnica JOIN clanovi ON prodavnica.id_clana = clanovi.id_clana JOIN knjige ON prodavnica.id_knjige = knjige.id_knjige WHERE clanovi.id_clana=" . $_SESSION["clan"] . "";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<center><table>";
			echo "<tr><th>ID kupovine</th><th>Naziv</th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['id_kupovine'] . "</td>";
				echo "<td>\"" . $row['naziv'] . "\"</td>";
				echo "<td><a href=\"/kontrolniZadatak/detaljiKupovine.php?kupovina=" . $row['id_kupovine'] . "\">(detalji)</a></td>";
				echo "</tr>";
			}
			echo "</table></center><p>";
		}
	} else {
		echo "<h1>Biblioteka</h1>";
		echo "<h3>Neodobren pristup</h3>";
		echo "<p>Uneli ste nepostojeće podatke.</p>";
		echo "<p><a href=\"/kontrolniZadatak/index.html\">Vrati se na prijavu.</a></p>";
		session_unset();
		session_destroy();
	}
	$conn->close();
	?>
</body>

</html>