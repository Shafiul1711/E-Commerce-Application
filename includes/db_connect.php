<?php
$host = 'localhost';
$db   = 'puzzlemania';
$user = 'root';
$pass = 'PokemonPoke123!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
