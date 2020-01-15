<?php
    //Includ fisierul care face legatura dintre pagina si baza de date a galeriei de arta.
    include_once 'includes/dbh.inc.php';
?>

<!-- 
        Acest fisier reprezinta pagina corespunzatoare pagini cu Inserturi. Initial am niste cod de CSS pentru a aranja aspectul paginii. Apoi
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
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
            <div class = "div_2 pr-2">
                <br><br>
                <!--
                    Aici  fac un select cu ajutorcul cu careia pot da select la fiecare tabel in parte si a vedea datele din el.
                -->
                <h3>Afisare Tabele</h3>
                <form action="#" method="POST" class="form-inline">
                    <select  name="tabele" class="form-control">
                    <!--
                        Optiunile pentru select.
                    -->
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
                        <!--
                            Butonul pentru trimiterea optiunii(tabelului) alese.
                        -->
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
            <div class = "div_3 container_2">
                <br><br>
                <div class = "div_4 pl-3"> 
                    <br>
                    <!--
                        Partea aceasta de cod reprezinta partea in care introducem date in baza de date.
                    -->
                    <h3> Inserare in tabelul artisti </h3>
                    <form action="#" method="POST" class="form-inline">
                        <div class="form-row p-2">
                            <div class="col">
                            <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                <input type="text" class="form-control  p-3" placeholder="ID artist" name="ID_artist">
                            </div>
                            <div class="col">
                            <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                <input type="text" class="form-control p-3" placeholder="Nume" name="nume">
                            </div>
                            <div class="col">
                            <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                <input type="text" class="form-control p-3" placeholder="Prenume" name="prenume">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-row p-2">
                        <div class="col">
                        <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                <input type="text" class="form-control p-3" placeholder="CNP" name="CNP">
                            </div>
                            <div class="col">
                            <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                <input type="text" class="form-control p-3" placeholder="Nationalitate" name="Nationalitate">
                            </div>
                            <div class="col">
                            <!-- Aici putem alege o valoare specifica campului-->
                                <select class="form-control" name="Sex">
                                    <option>Sex</option>
                                    <option>F</option>
                                    <option>M</option>
                                </select>
                            </div>
                        </div>  
                        <br><br>
                        <div class="form-row p-2">
                            <div class="col">
                            <!-- Aici punem un camp in interfata in care putem introduce o valoare anumita, specifica campului-->
                                    <input type="text" class="form-control p-3" placeholder="YYYY-MM-DD" name="Data_nastere">
                                </div>
                        </div> 
                        <!-- Butonul care fiind apasat, trimite datele introduse in formularul de mai sus -->     
                        <input type="submit"  name="submit_insert" value="Insert" class="btn btn-pill btn-dark"/> 
                    </form>

                    <?php
                        //daca este apasat butonul de insert se executa blocul de cod urmator
                        if (isset($_POST['submit_insert'])){
                            // atribui valorile inserate unor va
                            $ID_artist = $_POST['ID_artist'];
                            $nume = $_POST['nume'];
                            $prenume = $_POST['prenume'];
                            $cnp = $_POST['CNP'];
                            $nationalitatea = $_POST['Nationalitate'];
                            $sex = $_POST['Sex'];
                            $data_nasterii = $_POST['Data_nastere'];
                            // atribui unei variabile queryul de select specific ca sa verific daca a fost sau nu deja introdus pe acel ID
                            $sql_2 = "SELECT * FROM artisti WHERE ID_Artist = $ID_artist;";
                            $result_2 = mysqli_query($conn, $sql_2) ;
                            $resultCheck_2 = mysqli_num_rows($result_2);
                            
                            if($resultCheck_2 == 1)
                                echo "Deja introdus pe ID-ul acela";
                            else
                                echo "Introdus cu succes";
                            //aici fac queryul pentru INSERT
                            $sql_1 = "INSERT INTO artisti (ID_Artist, Nume, Prenume, CNP, Nationalitate, Sex, Data_Nastere) VALUES ($ID_artist, '$nume', '$prenume',$cnp,'$nationalitatea','$sex','$data_nasterii')";
                            $result_1 = mysqli_query($conn, $sql_1);

                            if(mysqli_query($conn, $sql_1))
                                echo "ERROR: Could not able to execute $sql_1. ";
                        }       

                    ?>
                </div>
                <div class = "div_5 pl-3"> 
                <!-- Se repeta aceeasi pasi pe insertul pe tabelul expozitii ca mai sus -->
                <br>
                    <h3> Inserare in tabelul expozitii </h3>
                    <form action="#" method="POST" class="form-inline">
                        <div class="form-row p-2">
                            <div class="col">
                                <input type="text" class="form-control  p-3" placeholder="ID expozitie" name="ID_expozitie">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control p-3" placeholder="Denumire" name="Denumire">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control p-3" placeholder="Telefon" name="Telefon">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-row p-2">
                        <div class="col">
                                <input type="text" class="form-control p-3" placeholder="Adresa" name="Adresa">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control p-3" placeholder="Program" name="Program">
                            </div>
                        </div>
                        <input type="submit"  name="submit_insert_2" value="Insert" class="btn btn-pill btn-dark"/> 
                    </form>

                    <?php
                        if (isset($_POST['submit_insert_2'])){

                            $ID_expozitie = $_POST['ID_expozitie'];
                            $Denumire = $_POST['Denumire'];
                            $Telefon = $_POST['Telefon'];
                            $Adresa = $_POST['Adresa'];
                            $Program = $_POST['Program'];

                            $sql_3 = "SELECT * FROM expozitii WHERE ID_expozitie = $ID_expozitie;";
                            $result_3 = mysqli_query($conn, $sql_3) ;
                            $resultCheck_3 = mysqli_num_rows($result_3);
                            
                            if($resultCheck_3 == 1)
                                echo "Deja introdus pe ID-ul acela";
                            else
                                echo "Introdus cu succes";

                            $sql_4 = "INSERT INTO expozitii (ID_expozitie, Denumire_expozitie, Telefon, Adresa, Program) VALUES ('$ID_expozitie', '$Denumire', '$Telefon','$Adresa','$Program')";
                            $result_4 = mysqli_query($conn, $sql_4);

                            if(mysqli_query($conn, $sql_4))
                                echo "ERROR: Could not able to execute $sql_4. ";
                        }       

                    ?>
                </div>
            </div>
        </div>

        </script>
    </body>
</html>