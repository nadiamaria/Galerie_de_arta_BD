<!-- 
        Acest fisier reprezinta pagina corespunzatoare Home-ului. Initial am niste cod de CSS pentru a aranja aspectul paginii. Apoi
    am continuat cu codul HTML in care am descris ceea ce contine pagina aceasta.
-->

<?php
    //Includ fisierul care face legatura dintre pagina si baza de date a galeriei de arta.
    include_once 'includes/dbh.inc.php';
?>

<style>
    body {
        background-image: url("danu3.jpeg");
    }

    .container_1 {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        width:100%;
        height:100%;
        position:absolute;
        align-items:center;
        align-content: center;
    }

    .div_1{
        width:100%;
        height:10%;
    }

    .div_2{
        width:50%;
        height:20%;
        padding-top: 15%;
       
       
        
    }

    .logout_button{
        right:10;
        position:absolute;
    }

    .profile{
        right:90;
        position:absolute;
    }
</style>

<!DOCTYPE html>
<html>
   <head>
        <title>Database</title>
    </head>
    <body>
        <header>
            <!-- Aici am inclus un link care imi permite sa folosesc Bootstrap, care este un set de instrumente open source pentru 
            dezvoltarea cu HTML, CSS și JS, care ma ajuta in creearea unui aspect mai placut al paginii. Prin atribuirea unor clase
            specifice Bootstrap-ului se pun automat niste syluri anumite, corespunzatoare numelor clasei.-->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </header>
        <div class="container_1">
            <div  class = "div_1">
                <!--
                    Aici descriu navbar-ul (bara de navigare). 
                -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">Galerie de arta</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--
                            Incep o lista care contine numele paginilor, iar atunci cand sunt apasate, suntem redirectionati spre paginile respective.
                        -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="home_index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Insert</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete_index.php">Delete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update_index.php">Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="select_index.php">Select</a>
                            </li>
                            <li class="nav-item profile">
                                <a class="nav-link" >Admin</a>
                            </li>
                            <li class="nav-item logout_button">
                                <!--
                                    Avem si butonul de logout care ne trimite pe pagina de login.
                                -->
                                <a class="nav-link" href="login.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class = "div_2 display-1 pl-4">
                <div class = "shadow p-3 mb-5  rounded">
                    Welcome Admin!
                </div>
            </div> 
        </div>
    </body>
</html>