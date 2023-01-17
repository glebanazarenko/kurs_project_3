<?php
include $_SERVER["DOCUMENT_ROOT"]."/курсач/php/db.php";

if(!empty($_POST)){
    $result = mysqli_query($mysql, "SELECT user.id FROM user WHERE login=\"".$_POST['login']."\"");
    //$profile = mysqli_fetch_assoc($result);
    //echo $profile["id"];
    if(mysqli_num_rows($result) == 0){
        $name = $_POST["name"];
        $login = $_POST["login"];
        $password = $_POST["password"];
        $gas = $_POST["gas"];
        $ventilation = $_POST["ventilation"];
        $heating = $_POST["heating"];
        $chute = $_POST["chute"];
        $parking = $_POST["parking"];
        $elevator = $_POST["elevator"];
        $house_type = $_POST["house_type"];

        if ($name == "" || $login == "" ||$password == "" ||$gas == "Выберите" ||$ventilation == "Выберите" ||$heating == "Выберите" ||
        $chute == "Выберите" ||$parking == "" ||$elevator == "" ||$house_type == "Выберите"){
            Echo'
        <!DOCTYPE html>
            <html lang="ru">
                <head>
                    <meta charset="utf-8" />
                    <title>НормДом</title>
                    <meta name="keywords" content="НормДом" />
                    <meta content="Mannatthemes" name="author" />

                    <!-- favicon -->
                    <link rel="shortcut icon" href="/курсач/images/NormDomLogoNOTEXT1.ico" />

                    <!-- css -->
                    <link href="/курсач/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <link href="../../../css/styles.css" rel="stylesheet" type="text/css" />
                </head>

                <body class="Site bg-dark text-white">
                    <main class="Site-content text-center">
                    <br>
                    <br>
                    <br>
                        <h3>Необходимо заполнить все поля</h3>
                        <br>
                        <a class="btn btn-light" href="../../visitor/black/signUp_black.php" role="button">Назад</a>
                    </main>
                </body>
            </html>
        ';
        }else{
            if (!is_numeric($parking) || !is_numeric($elevator)){
                Echo'
        <!DOCTYPE html>
            <html lang="ru">
                <head>
                    <meta charset="utf-8" />
                    <title>НормДом</title>
                    <meta name="keywords" content="НормДом" />
                    <meta content="Mannatthemes" name="author" />

                    <!-- favicon -->
                    <link rel="shortcut icon" href="/курсач/images/NormDomLogoNOTEXT1.ico" />

                    <!-- css -->
                    <link href="/курсач/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <link href="../../../css/styles.css" rel="stylesheet" type="text/css" />
                </head>

                <body class="Site bg-dark text-white">
                    <main class="Site-content text-center">
                    <br>
                    <br>
                    <br>
                        <h3>Поля с площадью парковки и количествами лифтов должны содержать цифры, а не други символы</h3>
                        <br>
                        <a class="btn btn-light" href="../../visitor/black/signUp_black.php" role="button">Назад</a>
                    </main>
                </body>
            </html>
        ';
            }else{
            mysqli_query($mysql, "INSERT INTO user (id, name, login, password, gas_type, ventilation_type, heating_type, chute_type, parking_square, elevators_count, house_type, role_id) VALUES (
                NULL,
                \"".$_POST["name"]."\",
                \"".$_POST["login"]."\",
                \"".md5($_POST["password"])."\",
                \"".$_POST["gas"]."\",
                \"".$_POST["ventilation"]."\",
                \"".$_POST["heating"]."\",
                \"".$_POST["chute"]."\",
                \"".$_POST["parking"]."\",
                \"".$_POST["elevator"]."\",
                \"".$_POST["house_type"] ."\",
                \"1\" 
                )"
            );


            if(!isset($_GET['session_user'])){
                $_SESSION["user"] = $_POST["login"];
                $session_user_login = $_SESSION["user"];
            }
            else{
                $session_user_login = $_GET['session_user'];
            }
        
            include("../../user/black/signed_black.php");
            }
        }

    }else{
        Echo'
        <!DOCTYPE html>
            <html lang="ru">
                <head>
                    <meta charset="utf-8" />
                    <title>НормДом</title>
                    <meta name="keywords" content="НормДом" />
                    <meta content="Mannatthemes" name="author" />

                    <!-- favicon -->
                    <link rel="shortcut icon" href="/курсач/images/NormDomLogoNOTEXT1.ico" />

                    <!-- css -->
                    <link href="/курсач/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <link href="../../../css/styles.css" rel="stylesheet" type="text/css" />
                </head>

                <body class="Site bg-dark text-white">
                    <main class="Site-content text-center">
                    <br>
                    <br>
                    <br>
                        <h3>Такой логин уже занят. Введите другой.</h3>
                        <br>
                        <a class="btn btn-light" href="../../visitor/black/signUp_black.php" role="button">Назад</a>
                    </main>
                </body>
            </html>
        ';
    }


}
?>