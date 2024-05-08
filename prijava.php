<html>
	<head>
		<title>Biblioteka</title>
		<link rel="stylesheet" href="/kontrolniZadatak/design.css">
	</head>
	<body>
		<?php
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="kontrolnizadatak";
			$conn=new mysqli($servername,$username,$password,$dbname);
			if($conn->connect_error){
				die("Greška u konekciji: ".$conn->connect_error);
			}

			$sql="SELECT ime,prezime,korisnickoime,lozinka FROM bibliotekari";
			$result=$conn->query($sql);
			$odobrenPristup=false;
			$korisnickoime=$_POST["username"];
			$sifra=$_POST["password"];
			$imeprezime="";
			
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					if(($korisnickoime==$row["korisnickoime"])&&($sifra==$row["lozinka"])){
						$odobrenPristup=true;
						$imeprezime=$row["ime"]." ".$row["prezime"];
					}
				}
				if($odobrenPristup){
					echo "<h1>Biblioteka</h1>";
					echo "<h3>Dobro došli, ".$imeprezime."!</h3>";
					echo "<p>Izaberite neku od sledećih opcija:</p>";
					echo "<p><a href=\"/kontrolniZadatak/novaKnjiga.html\">1. Upis nove knjige</a></p>";
					echo "<p><a href=\"/kontrolniZadatak/noviClan.html\">2. Upis novog člana</a></p>";
				} else {
					echo "<h1>Biblioteka</h1>";
					echo "<h3>Neodobren pristup</h3>";
					echo "<p>Uneli ste nepostojeće podatke.</p>";
					echo "<p><a href=\"/kontrolniZadatak/index.html\">Vrati se na prijavu.</a></p>";
				}
			}
			$conn->close();
		?>
	</body>
</html>