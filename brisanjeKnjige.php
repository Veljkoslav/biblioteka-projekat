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
        $id = $_POST['id'];
        $sql = "DELETE FROM prodavnica WHERE id_knjige = " . $id;
        $sql2 = "DELETE FROM knjige WHERE id_knjige = " . $id;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->query($sql) && $conn->query($sql2)) {
            echo "<h1>Biblioteka</h1>";
            echo "<h3>Brisanje knjige</h3>";
            echo "<p>Obrisali ste knjigu iz baze.</p>";
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