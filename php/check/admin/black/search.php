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
        <link href="/курсач/css/styles-dark.css" rel="stylesheet" type="text/css" />
    </head>


<?php
include $_SERVER["DOCUMENT_ROOT"]."/курсач/php/db.php";

if(!isset($session_user_login)){
    $session_user_login = "Ошибка";
}


$result = mysqli_query($mysql, "SELECT * FROM user WHERE
login='".$session_user_login."'
");
$Arr = mysqli_fetch_assoc($result);

echo'<body class="bg-dark Site">
<!-- start navbar -->
<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <a href="checkIn_black.php?id='.$Arr["id"].'">
            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
        </a><!--end navbar-brand-->

        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../white/checkIn.php?id='.$Arr["id"].'&type=search">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?id='.$Arr["id"].'&type=search">Поиск</a>
                </li><!--end nav-item-->                        
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=new_feedback_all&id='.$Arr["id"].'">Новые сообщения</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=old_feedback_all&id='.$Arr["id"].'">Старые сообщения</a>
                </li><!--end nav-item-->
            </ul><!--end navbar-nav-->
            <button type="button" class="btn btn-primary btn-hover">Админ: '.$Arr['name'].'</button>
            <button type="button" class="btn btn-green"><a class="btn-a" href="../../visitor/black/main_black.php">Выйти из аккаунта</a></button>
            <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
        </div><!-- end #navbarNav -->
    </div><!-- end container -->
</nav>
<!-- end navbar -->

<main class="Site-content">
';

?>

<br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- start hero -->
            <h6 class="bg-dark text-white fs-2 container text-center">Поиск</h6>
        <!-- end hero --> 


        <section class="container text-left">
            <form method="POST">
                <div class="mb-4">
                <label for="exampleInputLogin1" class="form-label bg-dark text-white">Адрес</label>
                    <input type="text" name="address" class="form-control bg-dark text-white" placeholder="qwerty" id="exampleInputLogin1" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <button type="submit" class="btn btn-primary">Подтвердить</button>

            </form>
        </section>

        
        <?php

            $result = mysqli_query($mysql, "SELECT * FROM user WHERE
            login='".$session_user_login."'
            ");
            $Arr = mysqli_fetch_assoc($result);
        
            $result = mysqli_query($mysql, "SELECT * FROM house as h where h.address LIKE \"%".$_POST['address']."%\" Limit 20");
            
            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                    if($context == NULL){
                        $context = '
                        <div style="container-lg text-align: center;">
                        <table class="table table-dark" style="width: 1200px; margin: auto;">
                            <thead>
                            <tr>
                                <td width=500px height=50px> Адресс дома
                                </td>
                                <td width=150px height=50px> Год эксплуатации
                                </td>
                                <td width=150px height=50px> Общая площадь
                                </td>
                                <td width=250px height=50px> Тип проекта
                                </td>
                            </tr>
                            </thead>';
                    }
                        $context .= '
                        <tr>
                            <td width=500px height=50px><a class="nav-link-a" href=checkIn_black.php?house_id='.$product["id"].'&type=house&id='.$Arr["id"].'&role_id=3>'.$product["address"].'</a>
                            </td>
                            <td width=150px height=50px>'.$product["exploitation_start_year"].'
                            </td>
                            <td width=150px height=50px>'.$product["area_land"].'
                            </td>
                            <td width=250px height=50px>'.$product["project_type"].'
                            </td>
                        </tr>
                        ';
                    
                
                }
                $context .= '</table></div></main>';
            }
            
            echo $context;
        


        include "footer.php";
        ?>
        
    </body>
</html>