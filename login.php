<!-- Acest fisier reprezinta pagina corespunzatoare login-ului. Initial am niste cod de CSS pentru a aranja aspectul paginii. Apoi
        am continuat cu codul HTML in care am descris ceea ce contine pagina aceasta.
-->

<style>
    body {
        background-image: url("nu7.jpg");
    }

    .mijloc{
        top:20%;
        left:37%;
        width:25%;
        height:50%;
        position: absolute;
        background: rgb(180, 180, 180, 0.4);
        display	: flex;
        flex-direction	: column;
        align-items:center;
        align-content: center;
    }

    .user_2{
        padding-left:30%;
    }
    
    .user_3{
        padding-left:35%;
    }
</style>

<!DOCTYPE html>
<html>
    <body>
        <header>
            <!-- Aici am inclus un link care imi permite sa folosesc Bootstrap, care este un set de instrumente open source pentru 
            dezvoltarea cu HTML, CSS și JS, care ma ajuta in creearea unui aspect mai placut al paginii. Prin atribuirea unor clase
            specifice Bootstrap-ului se pun automat niste syluri anumite, corespunzatoare numelor clasei.-->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </header>
        <div class="mijloc">
            <!--
                Incep forumul pentru sectia de login.
            -->
            <form action="#" method="POST" >
                <div class=" user_2">
                    <br><br>
                    <h1>Login </h1>
                    <br>
                </div>
                <div class=" pb-3 ">
                    <!--
                        Input unde trebuie sa introdus username-ul.
                    -->
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
                </div>
                <div class=" pb-3  ">
                    <!--
                        Input unde trebuie sa introdus password-ul.
                    -->
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password_1">
                </div>
                <div class=" user_3">
                    <!--
                        Aici avem butonul de login care preia datele introduse in cele doua campuri de mai sus.
                    -->
                    <input type="submit"  name="login" value="Login" class="btn btn-pill btn-dark"/>
                </div>
            </form>
        </div>
        <?php
            //Includ fisierul care face legatura dintre pagina si baza de date care contine parolele si username-urile.
            include_once 'includes/config.php';
            //verific daca a fost apasat butonul de login
            if (isset($_POST['login'])){
            //verific daca perechea de user-pass introduse, corespund datelor din baza de date
                $username = $_POST['username'];
                $password = $_POST['password_1'];
                //aici avem o variabila in care introduc queryul, aici cautand daca exista cinva cu acel user si pass in baza de date
                $sql_1 = " SELECT * FROM users WHERE username = '$username' AND password = $password";
                $result_1 = mysqli_query($link, $sql_1);
                $resultCheck_1 = mysqli_num_rows($result_1);   
                if($resultCheck_1 == 1)
                    //daca gasim, mergem in pagina de home
                    header('Location: home_index.php');
                else
                    echo "Userul nu exista sau parola gresita";}
        ?>
    </body>
</html>


