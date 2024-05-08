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

			$ime=$_POST['name'];
			$prezime=$_POST['surname'];
			$sql="INSERT INTO clanovi (ime,prezime) VALUES ('".$ime."','".$prezime."')";

            if ($conn->query($sql) === TRUE) {
                echo "<h1>Biblioteka</h1>";
			    echo "<h3>Upis novog člana</h3>";
			    echo "<p>Dodali ste novog člana u bazu:</p>";
			    echo "<p>".$ime." ".$prezime."</p>";
			    echo "<p><a href=\"/kontrolniZadatak/index.html\">Vrati se na prijavu.</a></p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
            $conn->close();
		?>
	</body>
</html>