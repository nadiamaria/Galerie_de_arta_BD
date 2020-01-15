<?php
//Acesta este fisierul in care fac setarile pentru legatura dintre interfata si baza de date;

//Atribui unor variabile, datele necesare pentru setarea conexiunii cu baza de date(Galeria de arta);
$dbServername = "localhost";
$dbUsername = "root"; 
$dbPassword = "";
$dbName = "proiectbd";
//Fac coneciunea cu baza de date specificata in functie de datele prezenatte mai sus;
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Testez conexiunea
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>