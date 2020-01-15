<?php
//Acesta este fisierul in care fac setarile pentru legatura dintre interfata si baza de date;

//Atribui unor variabile, datele necesare pentru setarea conexiunii cu baza de date(Baza cu Userii);
$dbServername_2 = "localhost";
$dbUsername_2 = "root";
$dbPassword_2 = "";
$dbName_2 = "test";
//Fac conexiunea cu baza de date specificata in functie de datele prezenatte mai sus;
$link = mysqli_connect($dbServername_2, $dbUsername_2, $dbPassword_2, $dbName_2);

// Testez conexiunea
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>