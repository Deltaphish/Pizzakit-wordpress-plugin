<html>

<head></head>

<body>

<?php

// MAMP Credentials
$servername = "localhost:3307";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
echo "Connected <br><br>";


// Skapa db
$sql = "CREATE DATABASE testDB;";
if ($conn->query($sql) === TRUE) {
    echo "testDB skapad <br><br>";
} else {
    echo "Error: " . $conn->error . "<br><br>";
}

// välj som aktiv
$sql = "USE testDB;";
if ($conn->query($sql) === TRUE) {
    echo "testDB vald<br><br>";
} else {
    echo "Error: " . $conn->error . "<br><br>";
}


// Skapa tabell
$sql = "CREATE TABLE Orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customerFN VARCHAR(15) NOT NULL,
customerLN VARCHAR(30) NOT NULL,
customerTelNR VARCHAR(10) NOT NULL,
email VARCHAR(50),
details JSON NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabell skapad<br><br>";
} else {
    echo "Error: " . $conn->error . "<br><br>";
}

// Kör query -- DENNA KNASAR FÖR TILLFÄLLET, RESTEN FUNGERAR
$sql = "INSERT INTO Orders (
  'customerFN', 'customerLN', 'customerTelNR', 'email', 'details'
) VALUES ('Alfred',
  'Arvidsson',
  '1234567890',
  'alfred@arvidsson.se',
  JSON_OBJECT(
        "baseChoices" ,
        JSON_ARRAY("Picollo", "Picollo", "Grande"),
        "toppings",
        JSON_ARRAY("extraDeg", "SalamiStark", "SalamiStark", "ProsciuttoCotto" )
  )
)";

if ($conn->query($sql) === TRUE) {
    echo "Query kordes OK<br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br><br>";
}


// Droppa Tabell
$sql = "DROP DATABASE testDB;";
if ($conn->query($sql) === TRUE) {
    echo "testDB droppad<br><br>";
} else {
    echo "Error: " . $conn->error . "<br><br>";
}

// Stäng connection
$conn->close();




?>


</body>
</html>
