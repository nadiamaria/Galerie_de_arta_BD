<?php
     //Includ fisierul care face legatura dintre pagina si baza de date a galeriei de arta.
    include_once 'includes/dbh.inc.php';
?>

<!-- 
        Acest fisier reprezinta pagina corespunzatoare pagini cu Select-uri. Initial am niste cod de CSS pentru a aranja aspectul paginii. Apoi
    am continuat cu codul HTML in care am descris ceea ce contine pagina aceasta.
-->

<style>
    body {
        background-image: url("danu3.jpeg");
    }

    .container_1 {
        display: flex;
        flex-direction: row-reverse;
        flex-wrap: wrap;
        width:100%;
        height:100%;
        position:absolute;
    }

    .container_2{
        display: flex;
        flex-direction: column;
        width:100%;
        height:100%;
    }

    .div_1{
        width:100%;
        height:10%;
    }

    .div_2{
        width:50%;
        height:90%;
        
    }

    .div_3{
        width:50%;
        height:90%;
    }

    .div_4{
        width:100%;
        height:50%;
    }

    .div_5{
        width:100%;
        height:50%;
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
                            <li class="nav-item">
                                <a class="nav-link" href="home_index.php">Home</a>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Select<span class="sr-only">(current)</span></a>
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
            <div class = "div_2 pr-2">
                <br><br>
                <h3>Afisare Tabele</h3>
                <form action="#" method="POST" class="form-inline">
                    <select  name="tabele" class="form-control">
                        <option value="select">Selectare tabelă</option>
                        <option value="expozitii">Expozitii</option>
                        <option value="artisti">Artisti</option>
                        <option value="clienti">Clienti</option>
                        <option value="curenti">Curenti</option>
                        <option value="ghizi">Ghizi</option>
                        <option value="facturi">Facturi</option>
                        <option value="metode_de_plata">Metode de plata</option>
                        <option value="obiecte_de_arta">Obiecte de arta</option>    
                    </select>
                    <div class="p-1">
                        <input type="submit"  name="submit" value="Trimite" class="btn btn-pill btn-dark "/> 
                    </div>
                </form> 
                
                <?php
                    //Daca am ales o optiune si am apasat butonul, se va accesa acesta bucata de cod.
                    if (isset($_POST['submit'])){
                        //Pun intr-o variabila optiunea(tabelul ales).
                        $selected = $_POST['tabele'];
                        //Fac un switch in care se apeleaza un anumit query de select in functie de optiunea aleasa.
                        switch ($selected)
                        {
                            case "expozitii":
                                //Pun intr-o variabila queriul de select pentru tabelul specificat.
                                $sql = "SELECT * FROM $selected;";
                                //Ma conectez la baza de date si trimit acest query, prelund datele returnate.
                                $result = mysqli_query($conn, $sql);
                                //Fac un Check care numara nr de randuri din variabila resultat intoarsa.
                                $resultCheck = mysqli_num_rows($result);
                                //Daca s-au gasit mai muly de 1 rand minim, se poate aplea urmatorul bloc de cod
                                if($resultCheck > 0){
                                    //Fac un tabel in interfata in care introduc initial capul tabelului care contine numele coloanelor afisate.
                                    echo "
                                    <div style='overflow-x:auto; overflow-y:auto;'>
                                    <table class = 'table table-striped table-dark table-fixed' >
                                    <thead class='thead-dark'>
                                    <tr>
                                    <th scope='col'>Denumire</td>
                                    <th scope='col'>Telefon</td>
                                    <th scope='col'>Adresa</td>
                                    <th scope='col'>Program</td>
                                    </tr>
                                    </thead> 
                                    <tbody>";
                                    //De fiecare data cand gaseste o intrare in baza de date, intra din nou in acest while , iar in aces while
                                    //introduce in tabel datele specifice fiecarei intrari.
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<td>";
                                        echo $row['Denumire_expozitie'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['Telefon'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['Adresa'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['Program'] ;
                                        echo "</td>";
                                        echo"</tr>";
                                    }
                                    echo"</tbody></table></div>";}
                                break;

                                    //La fel cum am procedat pentru optiunea de mai sus, voi proceda si pentru restul optiunilor.

                                    case "artisti":
                                        $sql = "SELECT * FROM artisti;";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0){
                                        echo "
                                        <div style='overflow-x:auto;'>
                                        <table class = 'table table-striped table-dark table-fixed' >
                                        <thead class='thead-dark'>
                                        <tr>
                                        <th scope='col'>Nume</td>
                                        <th scope='col'>Prenume</td>
                                        <th scope='col'>CNP</td>
                                        <th scope='col'>Nationalitate</td>
                                        <th scope='col'>Sex</td>
                                        <th scope='col'>Data de Nastere</td>
                                        </tr>
                                        </thead> 
                                        <tbody>";
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<td>";
                                            echo $row['Nume'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['Prenume'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['CNP'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['Nationalitate'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['Sex'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['Data_Nastere'] ;
                                            echo "</td>";
                                            echo"</tr>";
                                        }
                                        echo"</tbody></table></div>";}
                                    break;

                                    case "clienti":
                                        $sql = "SELECT clienti.Nume, clienti.Prenume, clienti.CNP, clienti.Sex, clienti.Adresa_livrare, ghizi.Nume_ghid FROM $selected , ghizi WHERE clienti.ID_ghid_fk=ghizi.ID_ghid;";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0){
                                            echo "
                                            <div style='overflow-x:auto;'>
                                            <table class = 'table table-striped table-dark table-fixed' >
                                            <thead class='thead-dark'>
                                            <tr>
                                            <th scope='col'>Nume</td>
                                            <th scope='col'>Prenume</td>
                                            <th scope='col'>CNP</td>
                                            <th scope='col'>Sex</td>
                                            <th scope='col'>Adresa livrare</td>
                                            <th scope='col'>Nume Ghid</td>
                                            </tr>
                                            </thead> 
                                            <tbody>";
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo "<td>";
                                                echo $row['Nume'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Prenume'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['CNP'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Sex'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Adresa_livrare'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Nume_ghid'] ;
                                                echo "</td>";
                                                echo"</tr>";
                                            }
                                            echo"</tbody></table></div>";}
                                        break;

                                        case "curenti":
                                            $sql = "SELECT * FROM curenti;";
                                            $result = mysqli_query($conn, $sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if($resultCheck > 0){
                                            echo "
                                            <div style='overflow-x:auto;'>
                                            <table class = 'table table-striped table-dark table-fixed' >
                                            <thead class='thead-dark'>
                                            <tr>
                                            <th scope='col'>Denumire</td>
                                            <th scope='col'>Perioada</td>
                                            <th scope='col'>Descriere</td>
                                            <th scope='col'>Culori predominante</td>
                                            </tr>
                                            </thead> 
                                            <tbody>";
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo "<td>";
                                                echo $row['Denumire'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Perioada'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Descriere'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Culori_predominante'] ;
                                                echo "</td>";
                                                echo"</tr>";
                                            }
                                            echo"</tbody></table></div>";}
                                        break;

                                        case "ghizi":
                                            $sql = "SELECT ghizi.Nume_ghid, ghizi.Prenume, ghizi.Descriere, ghizi.Pret_h_prezentare, expozitii.Denumire_expozitie FROM $selected , expozitii WHERE ghizi.ID_expozitie_fk = expozitii.ID_expozitie;";
                                            $result = mysqli_query($conn, $sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if($resultCheck > 0){
                                                echo "
                                                <div style='overflow-x:auto;'>
                                                <table class = 'table table-striped table-dark table-fixed' >
                                                <thead class='thead-dark'>
                                                <tr>
                                                <th scope='col'>Nume</td>
                                                <th scope='col'>Prenume</td>
                                                <th scope='col'>Descriere</td>
                                                <th scope='col'>Pret/h prezentare</td>
                                                <th scope='col'>Denumire Expozitie</td>
                                                </tr>
                                                </thead> 
                                                <tbody>";
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    echo "<td>";
                                                    echo $row['Nume_ghid'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Prenume'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Descriere'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Pret_h_prezentare'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Denumire_expozitie'] ;
                                                    echo "</td>";
                                                    echo"</tr>";
                                                }
                                                echo"</tbody></table></div>";}
                                            break;
                                            case "facturi":
                                                $sql = "SELECT clienti.Nume, obiecte_de_arta.Denumire_obiect, facturi.taxa_transport, facturi.cost_total, facturi.data_facturarii, facturi.cod_factura
                                                FROM $selected , clienti, obiecte_de_arta WHERE facturi.ID_client_fk = clienti.ID_client AND facturi.ID_obiect_fk = obiecte_de_arta.ID_obiect";
                                                $result = mysqli_query($conn, $sql);
                                                $resultCheck = mysqli_num_rows($result);
                                                if($resultCheck > 0){
                                                    echo "
                                                    <div style='overflow-x:auto;'>
                                                    <table class = 'table table-striped table-dark table-fixed' >
                                                    <thead class='thead-dark'>
                                                    <tr>
                                                    <th scope='col'>Nume Client</td>
                                                    <th scope='col'>Obiectul cumparat</td>
                                                    <th scope='col'>Taxa transport</td>
                                                    <th scope='col'>Cost total</td>
                                                    <th scope='col'>Data facturarii</td>
                                                    <th scope='col'>Cod factura</td>
                                                    </tr>
                                                    </thead> 
                                                    <tbody>";
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo "<td>";
                                                        echo $row['Nume'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['Denumire_obiect'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['taxa_transport'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['cost_total'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['data_facturarii'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['cod_factura'] ;
                                                        echo "</td>";
                                                        echo"</tr>";
                                                    }
                                                    echo"</tbody></table></div>";}
                                                break;

                                                
                                                case "metode_de_plata":
                                                    $sql = "SELECT metode_de_plata.metoda, metode_de_plata.descriere
                                                    FROM $selected;";
                                                    $result = mysqli_query($conn, $sql);
                                                    $resultCheck = mysqli_num_rows($result);
                                                    if($resultCheck > 0){
                                                        echo "
                                                        <div style='overflow-x:auto;'>
                                                        <table class = 'table table-striped table-dark table-fixed' >
                                                        <thead class='thead-dark'>
                                                        <tr>
                                                        <th scope='col'>Metoda</td>
                                                        <th scope='col'>Descriere</td>
                                                        </tr>
                                                        </thead> 
                                                        <tbody>";
                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            echo "<td>";
                                                            echo $row['metoda'] ;
                                                            echo "</td>";
                                                            echo "<td>";
                                                            echo $row['descriere'] ;
                                                            echo "</td>";
                                                            echo"</tr>";
                                                        }
                                                        echo"</tbody></table></div>";}
                                                    break;

                                                    case "obiecte_de_arta":
                                                        $sql = "
                                                        SELECT expozitii.Denumire_expozitie, curenti.Denumire, artisti.Nume, obiecte_de_arta.Denumire_obiect, obiecte_de_arta.Tip, obiecte_de_arta.Data_finisare, obiecte_de_arta.Pret, obiecte_de_arta.De_vanzare, obiecte_de_arta.Descriere
                                                            FROM obiecte_de_arta , expozitii, curenti , artisti
                                                            WHERE obiecte_de_arta.ID_expozitie_fk = expozitii.ID_expozitie
                                                            AND obiecte_de_arta.ID_curent_fk = curenti.ID_curent
                                                            AND obiecte_de_arta.ID_artist_fk = artisti.ID_artist
                                                        ";
                                                        $result = mysqli_query($conn, $sql);
                                                        $resultCheck = mysqli_num_rows($result);
                                                        if($resultCheck > 0){
                                                            echo "
                                                            <div style='overflow-x:auto; overflow-y:auto;'>
                                                            <table class = 'table table-striped table-dark table-fixed' >
                                                            <thead class='thead-dark'>
                                                            <tr>
                                                            <th scope='col'>Denumire expozitie</td>
                                                            <th scope='col'>Denumire curent</td>
                                                            <th scope='col'>Nume artist</td>
                                                            <th scope='col'>Denumire obiect</td>
                                                            <th scope='col'>Tip obiect</td>
                                                            <th scope='col'>Data finisare</td>
                                                            <th scope='col'>Pret obiect</td>
                                                            <th scope='col'>Disponibilitate</td>
                                                            <th scope='col'>Descriere</td>
                                                            </tr>
                                                            </thead> 
                                                            <tbody>";
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {
                                                                echo "<td>";
                                                                echo $row['Denumire_expozitie'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Denumire'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Nume'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Denumire_obiect'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Tip'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Data_finisare'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Pret'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['De_vanzare'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Descriere'] ;
                                                                echo "</td>";
                                                                echo"</tr>";
                                                            }
                                                            echo"</tbody></table></div>";}
                                                        break;
                            
                        }
                    }    
                ?>
            </div>
            <div class = "div_3 pl-4">
            <br><br>
                    <!--
                        Partea aceasta de cod reprezinta partea in care dam select la datele din baza de date.
                    -->
                <h3>Afisare Tabele Select</h3>
                <form action="#" method="POST" class="form-inline">
                    <select  name="tabele" class="form-control">
                    <!-- Aici pot selecta query-ul pe care il doresc sa il trimit spre baza de date -->
                        <option value="select_0">Selectare queri</option>
                        <option value="select_1">Selectare simpla 1</option>
                        <option value="select_2">Selectare simpla 2</option>
                        <option value="select_3">Selectare simpla 3</option>
                        <option value="select_4">Selectare simpla 4</option>
                        <option value="select_5">Selectare simpla 5</option>
                        <option value="select_6">Selectare simpla 6</option>
                        <option value="select_7">Selectare complexa 1</option>
                        <option value="select_8">Selectare complexa 2</option>   
                        <option value="select_9">Selectare complexa 3</option>
                        <option value="select_10">Selectare complexa 4</option>
                    </select>
                    <div class="p-1">
                    <!-- Butonul care trimite alegerea mea -->
                        <input type="submit"  name="submit" value="Trimite" class="btn btn-pill btn-dark "/> 
                    </div>
                </form> 
                
                <?php
                    //Daca butonul cu numele de submit este apasat, se va executa secventa de cod din interiorul if-ului urmtor.
                    if (isset($_POST['submit'])){
                        //Atribui valoarea aleasa din form-ul anterior unei variabile.
                        $selected = $_POST['tabele'];
                        //In functie de variabila anterioara, aleg ce select indeplinesc.
                        switch ($selected)
                        {
                            case "select_1":
                                echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                    Prin acest select putem vedea clientii(nume, prenume) care au cumparat un obiect(prin facturare) si avem si date despre achizitie(cod factura, cost total, data factura).
                                </div><br>
                                ";
                                //In variabila sql pun codul specific query-ului  care face select pe tabelul specific.
                                $sql = "SELECT clienti.Nume, clienti.Prenume, facturi.cod_factura, facturi.cost_total, facturi.data_facturarii
                                        FROM clienti
                                        INNER JOIN facturi ON clienti.ID_client=facturi.ID_client_fk;";  
                                //Face coneciunea cu baza de date si executa query-ul.              
                                $result = mysqli_query($conn, $sql);
                                //Retin nr de valori din tabelul substars
                                $resultCheck = mysqli_num_rows($result);
                                //Verific daca am cel putin o intrare in tabelul substars
                                if($resultCheck > 0){
                                    //Afisez Datele specifice
                                    echo "
                                    <div style='overflow-x:auto; overflow-y:auto;'>
                                    <table class = 'table table-striped table-dark table-fixed' >
                                    <thead class='thead-dark'>
                                    <tr>
                                    <th scope='col'>Nume Client</td>
                                    <th scope='col'>Prenume Client</td>
                                    <th scope='col'>Cod factura</td>
                                    <th scope='col'>Cost Total</td>
                                    <th scope='col'>Data Facturarii</td>
                                    </tr>
                                    </thead> 
                                    <tbody>";
                                    //De fiecare data cand gaseste o intrare in baza de date, intra din nou in acest while , iar in aces while
                                    //introduce in tabel datele specifice fiecarei intrari.
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<td>";
                                        echo $row['Nume'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['Prenume'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['cod_factura'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['cost_total'] ;
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row['data_facturarii'] ;
                                        echo "</td>";
                                        echo"</tr>";
                                    }
                                    echo"</tbody></table></div>";}
                                break;
                                //La fel cum am procedat pentru optiunea de mai sus, voi proceda si pentru restul optiunilor...
                                case "select_2":
                                    echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                        Prin acest select putem vedea obiectele(denumire, tip) care au fost cumparate(prin facturare) si avem si date despre achizitie(cod factura, cost total, data factura).
                                    </div><br>
                                    ";
    
                                    $sql = "SELECT obiecte_de_arta.Denumire_obiect, obiecte_de_arta.Tip, facturi.cod_factura, facturi.cost_total, facturi.data_facturarii
                                            FROM obiecte_de_arta
                                            INNER JOIN facturi ON obiecte_de_arta.ID_obiect=facturi.ID_factura;";        
                                    $result = mysqli_query($conn, $sql);
                                    $resultCheck = mysqli_num_rows($result);
                                    if($resultCheck > 0){
                                        echo "
                                        <div style='overflow-x:auto; overflow-y:auto;'>
                                        <table class = 'table table-striped table-dark table-fixed' >
                                        <thead class='thead-dark'>
                                        <tr>
                                        <th scope='col'>Denumire obiect</td>
                                        <th scope='col'>Tip obiect</td>
                                        <th scope='col'>Cod factura</td>
                                        <th scope='col'>Cost Total</td>
                                        <th scope='col'>Data Facturarii</td>
                                        </tr>
                                        </thead> 
                                        <tbody>";
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo"<tr>";
                                            echo "<td>";
                                            echo $row['Denumire_obiect'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['Tip'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['cod_factura'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['cost_total'] ;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row['data_facturarii'] ;
                                            echo "</td>";
                                            echo"</tr>";
                                        }
                                        echo"</tbody></table></div>";}
                                    break;

                                    case "select_3":
                                        echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                            Prin acest select putem vedea clienti(nume, prenume) de care se ocupa ghidul cu numele de 'Deloris'.
                                        </div><br>
                                        ";
        
                                        $sql = "SELECT ghizi.Nume_ghid , clienti.Nume, clienti.Prenume
                                                FROM ghizi
                                                INNER JOIN clienti ON ghizi.ID_ghid=clienti.ID_ghid_fk
                                                Where ghizi.Nume_ghid = 'Deloris';";       
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0){
                                            echo "
                                            <div style='overflow-x:auto; overflow-y:auto;'>
                                            <table class = 'table table-striped table-dark table-fixed' >
                                            <thead class='thead-dark'>
                                            <tr>
                                            <th scope='col'>Nume Ghid</td>
                                            <th scope='col'>Nume Client</td>
                                            <th scope='col'>Prenume Client</td>
                                            </tr>
                                            </thead> 
                                            <tbody>";
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo "<td>";
                                                echo $row['Nume_ghid'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Nume'] ;
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['Prenume'] ;
                                                echo "</td>";
                                                echo"</tr>";
                                            }
                                            echo"</tbody></table></div>";}
                                        break;
                                        
                                        case "select_4":
                                            echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                Prin acest select putem vedea ghizii(nume, prenume) care lucreaza la expozitia cu numele 'Little Sister'.
                                            </div><br>
                                            ";
            
                                            $sql = "SELECT ghizi.Nume_ghid, ghizi.Prenume, expozitii.Denumire_expozitie
                                                    FROM expozitii
                                                    INNER JOIN ghizi ON ghizi.ID_expozitie_fk=expozitii.ID_expozitie
                                                    Where expozitii.Denumire_expozitie = 'Little Sister';";       
                                            $result = mysqli_query($conn, $sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if($resultCheck > 0){
                                                echo "
                                                <div style='overflow-x:auto; overflow-y:auto;'>
                                                <table class = 'table table-striped table-dark table-fixed' >
                                                <thead class='thead-dark'>
                                                <tr>
                                                <th scope='col'>Nume ghid</td>
                                                <th scope='col'>Prenume ghid</td>
                                                <th scope='col'>Denumire expozitie</td>
                                                </tr>
                                                </thead> 
                                                <tbody>";
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    echo "<td>";
                                                    echo $row['Nume_ghid'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Prenume'] ;
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $row['Denumire_expozitie'] ;
                                                    echo "</td>";
                                                    echo"</tr>";
                                                }
                                                echo"</tbody></table></div>";}
                                            break;

                                            case "select_5":
                                                echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                    Prin acest select putem vedea obiectele(denumire, tip) care apartin curentului 'Body Art'.
                                                </div><br>
                                                ";
                
                                                $sql = "SELECT curenti.Denumire, obiecte_de_arta.Denumire_obiect, obiecte_de_arta.Tip
                                                        FROM curenti
                                                        INNER JOIN obiecte_de_arta ON curenti.ID_curent=obiecte_de_arta.ID_curent_fk
                                                        Where curenti.Denumire = 'Body Art';";       
                                                $result = mysqli_query($conn, $sql);
                                                $resultCheck = mysqli_num_rows($result);
                                                if($resultCheck > 0){
                                                    echo "
                                                    <div style='overflow-x:auto; overflow-y:auto;'>
                                                    <table class = 'table table-striped table-dark table-fixed' >
                                                    <thead class='thead-dark'>
                                                    <tr>
                                                    <th scope='col'>Denumire curent</td>
                                                    <th scope='col'>Denumire obiect</td>
                                                    <th scope='col'>Tip obiect</td>
                                                    </tr>
                                                    </thead> 
                                                    <tbody>";
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        echo "<td>";
                                                        echo $row['Denumire'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['Denumire_obiect'] ;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $row['Tip'] ;
                                                        echo "</td>";
                                                        echo"</tr>";
                                                    }
                                                    echo"</tbody></table></div>";}
                                                break;

                                                case "select_6":
                                                    echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                        Prin acest select putem vedea obiectele(denumire, tip) care apartin artistului 'Valeria' 'Ibbs'.
                                                    </div><br>
                                                    ";
                    
                                                    $sql = "SELECT artisti.Nume, artisti.Prenume, obiecte_de_arta.Denumire_obiect, obiecte_de_arta.Tip
                                                            FROM artisti
                                                            INNER JOIN obiecte_de_arta ON artisti.ID_artist=obiecte_de_arta.ID_artist_fk
                                                            Where artisti.Nume = 'Valeria' 
                                                            AND artisti.Prenume = 'Ibbs';";       
                                                    $result = mysqli_query($conn, $sql);
                                                    $resultCheck = mysqli_num_rows($result);
                                                    if($resultCheck > 0){
                                                        echo "
                                                        <div style='overflow-x:auto; overflow-y:auto;'>
                                                        <table class = 'table table-striped table-dark table-fixed' >
                                                        <thead class='thead-dark'>
                                                        <tr>
                                                        <th scope='col'>Nume artist</td>
                                                        <th scope='col'>Prenume artist</td>
                                                        <th scope='col'>Denumire obiect</td>
                                                        <th scope='col'>Tip obiect</td>
                                                        </tr>
                                                        </thead> 
                                                        <tbody>";
                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            echo "<td>";
                                                            echo $row['Nume'] ;
                                                            echo "</td>";
                                                            echo "<td>";
                                                            echo $row['Prenume'] ;
                                                            echo "</td>";
                                                            echo "<td>";
                                                            echo $row['Denumire_obiect'] ;
                                                            echo "</td>";
                                                            echo "<td>";
                                                            echo $row['Tip'] ;
                                                            echo "</td>";
                                                            echo"</tr>";
                                                        }
                                                        echo"</tbody></table></div>";}
                                                    break;

                                                    case "select_7":
                                                        echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                            Prin acest select putem vedea Curentii si nr de obiecte din fiecare, unde obiectele sunt de tip pictura si 
                                                            au fost vandute, factura fiind emisa intre 2017-06-19 si 2018-12-30.
                                                        </div><br>
                                                        ";
                        
                                                        $sql = "SELECT curenti.Denumire, curenti.Perioada, count(obiecte_de_arta.ID_obiect) AS NrObiecte
                                                            FROM obiecte_de_arta 
                                                            INNER JOIN facturi ON facturi.ID_obiect_fk = obiecte_de_arta.ID_obiect
                                                            INNER JOIN curenti ON obiecte_de_arta.ID_curent_fk = curenti.ID_curent
                                                        WHERE obiecte_de_arta.Tip = 'pictura' AND ID_obiect IN 
                                                            (SELECT obiecte_de_arta.ID_obiect
                                                            FROM obiecte_de_arta
                                                            INNER JOIN facturi ON obiecte_de_arta.ID_obiect=facturi.ID_obiect_fk
                                                            WHERE facturi.data_facturarii BETWEEN '2017-06-19' AND '2018-12-30')
                                                        GROUP BY ID_curent_fk;";

                                                        $result = mysqli_query($conn, $sql);
                                                        $resultCheck = mysqli_num_rows($result);
                                                        if($resultCheck > 0){
                                                            echo "
                                                            <div style='overflow-x:auto; overflow-y:auto;'>
                                                            <table class = 'table table-striped table-dark table-fixed' >
                                                            <thead class='thead-dark'>
                                                            <tr>
                                                            <th scope='col'>Denumire curent</td>
                                                            <th scope='col'>Perioada curent</td>
                                                            <th scope='col'>NrObiecte</td>
                                                            </tr>
                                                            </thead> 
                                                            <tbody>
                                                            <tr>";
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {                                                                
                                                                echo "<tr>";
                                                                echo "<td>";
                                                                echo $row['Denumire'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['Perioada'] ;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo $row['NrObiecte'] ;
                                                                echo "</td>";
                                                                echo "</tr>";
                                                                
                                                            }
                                                            echo"</tr></tbody></table></div>";}
                                                        break;

                                                        case "select_8":
                                                            echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                                Prin acest select putem vedea artistul cu numele de 'Bentley', expozitiile in care are obiecte si nr de obiect de tip 
                                                                'sculptura' sau  'pictura' care se afla in curentii 'Body Art', 'Realism Clasic', 'Cubism'.
                                                            </div><br>
                                                            ";
                            
                                                            $sql = "SELECT artisti.Nume, artisti.Prenume, expozitii.Denumire_expozitie, count(obiecte_de_arta.ID_obiect) AS NrObiecte
                                                            FROM obiecte_de_arta
                                                                INNER JOIN artisti ON  artisti.ID_artist= obiecte_de_arta.ID_artist_fk
                                                                INNER JOIN expozitii ON obiecte_de_arta.ID_expozitie_fk = expozitii.ID_expozitie
                                                            WHERE (obiecte_de_arta.Tip = 'sculptura' OR obiecte_de_arta.Tip = 'pictura') AND ID_obiect IN 
                                                                (SELECT obiecte_de_arta.ID_obiect
                                                                FROM obiecte_de_arta
                                                                INNER JOIN curenti ON obiecte_de_arta.ID_curent_fk=curenti.ID_curent
                                                                WHERE curenti.Denumire IN ('Body Art','Realism Clasic','Cubism'))
                                                            AND artisti.Nume = 'Bentley'
                                                            GROUP BY ID_expozitie_fk;";
    
                                                            $result = mysqli_query($conn, $sql);
                                                            $resultCheck = mysqli_num_rows($result);
                                                            if($resultCheck > 0){
                                                                echo "
                                                                <div style='overflow-x:auto; overflow-y:auto;'>
                                                                <table class = 'table table-striped table-dark table-fixed' >
                                                                <thead class='thead-dark'>
                                                                <tr>
                                                                <th scope='col'>Nume artist</td>
                                                                <th scope='col'>Pronume artist</td>
                                                                <th scope='col'>Denumire expozitie</td>
                                                                <th scope='col'>NrObiecte</td>
                                                                </tr>
                                                                </thead> 
                                                                <tbody>
                                                                <tr>";
                                                                while($row = mysqli_fetch_assoc($result))
                                                                {                                                                
                                                                    echo "<tr>";
                                                                    echo "<td>";
                                                                    echo $row['Nume'] ;
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                    echo $row['Prenume'] ;
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                    echo $row['Denumire_expozitie'] ;
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                    echo $row['NrObiecte'] ;
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                    
                                                                }
                                                                echo"</tr></tbody></table></div>";}
                                                            break;

                                                            case "select_9":
                                                                echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                                    Prin acest select putem vedea pe fiecare expozitie, suma totala, mai mare de 4000 euro, al obiectelor de arta vandute si care apartin curentilor 
                                                                    'Body Art' 'Realism Clasic'.
                                                                </div><br>
                                                                ";
                                
                                                                $sql = "SELECT expozitii.Denumire_expozitie, SUM(facturi.cost_total) AS Suma_total
                                                                FROM expozitii
                                                                    INNER JOIN ghizi ON  ghizi.ID_expozitie_fk=expozitii.ID_expozitie
                                                                    INNER JOIN clienti ON clienti.ID_ghid_fk=ghizi.ID_ghid
                                                                    INNER JOIN facturi ON facturi.ID_client_fk=clienti.ID_client
                                                                    INNER JOIN obiecte_de_arta ON obiecte_de_arta.ID_obiect = facturi.ID_obiect_fk
                                                                WHERE ID_obiect IN
                                                                (SELECT obiecte_de_arta.ID_obiect
                                                                FROM obiecte_de_arta
                                                                INNER JOIN curenti ON obiecte_de_arta.ID_curent_fk=curenti.ID_curent
                                                                WHERE curenti.Denumire IN ('Body Art','Realism Clasic'))
                                                                GROUP BY ID_expozitie
                                                                HAVING Suma_total > 4000;";
        
                                                                $result = mysqli_query($conn, $sql);
                                                                $resultCheck = mysqli_num_rows($result);
                                                                if($resultCheck > 0){
                                                                    echo "
                                                                    <div style='overflow-x:auto; overflow-y:auto;'>
                                                                    <table class = 'table table-striped table-dark table-fixed' >
                                                                    <thead class='thead-dark'>
                                                                    <tr>
                                                                    <th scope='col'>Denumire expozitie</td>
                                                                    <th scope='col'>Suma total</td>
                                                                    </tr>
                                                                    </thead> 
                                                                    <tbody>
                                                                    <tr>";
                                                                    while($row = mysqli_fetch_assoc($result))
                                                                    {                                                                
                                                                        echo "<tr>";
                                                                        echo "<td>";
                                                                        echo $row['Denumire_expozitie'] ;
                                                                        echo "</td>";
                                                                        echo "<td>";
                                                                        echo $row['Suma_total'] ;
                                                                        echo "</td>";
                                                                        echo "</tr>";
                                                                        
                                                                    }
                                                                    echo"</tr></tbody></table></div>";}
                                                                break;

                                                                case "select_10":
                                                                    echo " <div style='background: rgb(204, 204, 204, 0.4); text-indent: 20px;'>
                                                                        Prin acest select putem vedea nr de clienti care au utiliat o anumita metoda de plata si care au obiectul
                                                                        de arta cumparat de tip 'pictura'.
                                                                    </div><br>
                                                                    ";
                                    
                                                                    $sql = "SELECT COUNT(clienti.ID_client) AS NrClienti, metode_de_plata.metoda
                                                                    FROM clienti
                                                                    INNER JOIN facturi ON facturi.ID_client_fk = clienti.ID_client
                                                                    INNER JOIN metode_de_plata ON facturi.ID_metoda_de_plata_fk = metode_de_plata.ID_metoda
                                                                    WHERE ID_client IN
                                                                    (SELECT facturi.ID_client_fk
                                                                    FROM facturi
                                                                    INNER JOIN obiecte_de_arta ON obiecte_de_arta.ID_obiect = facturi.ID_obiect_fk
                                                                    WHERE obiecte_de_arta.tip = 'pictura')
                                                                    GROUP BY metode_de_plata.metoda";
            
                                                                    $result = mysqli_query($conn, $sql);
                                                                    $resultCheck = mysqli_num_rows($result);
                                                                    if($resultCheck > 0){
                                                                        echo "
                                                                        <div style='overflow-x:auto; overflow-y:auto;'>
                                                                        <table class = 'table table-striped table-dark table-fixed' >
                                                                        <thead class='thead-dark'>
                                                                        <tr>
                                                                        <th scope='col'>Numar Clienti</td>
                                                                        <th scope='col'>Metoda de plata</td>
                                                                        </tr>
                                                                        </thead> 
                                                                        <tbody>
                                                                        <tr>";
                                                                        while($row = mysqli_fetch_assoc($result))
                                                                        {                                                                
                                                                            echo "<tr>";
                                                                            echo "<td>";
                                                                            echo $row['NrClienti'] ;
                                                                            echo "</td>";
                                                                            echo "<td>";
                                                                            echo $row['metoda'] ;
                                                                            echo "</td>";
                                                                            echo "</tr>";
                                                                            
                                                                        }
                                                                        echo"</tr></tbody></table></div>";}
                                                                    break;
                            
                        }
                    }    
                ?>
            </div>
        </div>

        </script>
    </body>
</html>