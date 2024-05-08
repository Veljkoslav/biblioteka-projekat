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
			if ($conn->connect_error) {
				die("Greška u konekciji: " . $conn->connect_error);
			}

			$naziv=$_POST['title'];
			$autor=$_POST['author'];
			$godina=$_POST['year'];
			$vrsta=$_POST['genre'];
			$sql="INSERT INTO knjige (naziv,autor,godina,vrsta) VALUES ('".$naziv."','".$autor."','".$godina."','".$vrsta."')";

            if ($conn->query($sql) === TRUE) {
                echo "<h1>Biblioteka</h1>";
			    echo "<h3>Upis nove knjige</h3>";
			    echo "<p>Dodali ste novu knjigu u bazu:</p>";
			    echo "<p>".$autor." — \"".$naziv."\", ".$vrsta." (".$godina.")</p>";
			    echo "<p><a href=\"/kontrolniZadatak/index.html\">Vrati se na prijavu.</a></p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
            $conn->close();
		?>
	</body>
</html>