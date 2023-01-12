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
$id = $_GET["id"];

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
        <a href="checkIn.php?id='.$Arr["id"].'">
            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
        </a><!--end navbar-brand-->

        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../white/checkIn.php?feedback_id='.$feedback_id.'&type=new_feedback&id='.$Arr["id"].'&role_id=3">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->                        
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?type=new_feedback_all&id='.$Arr["id"].'">Новые сообщения</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=old_feedback_all&id='.$Arr["id"].'">Старые сообщения</a>
                </li><!--end nav-item-->
            </ul><!--end navbar-nav-->
            <button type="button" class="btn btn-primary btn-hover">Админ: '.$Arr['name'].'</button>
            <button type="button" class="btn btn-green"><a class="btn-a" href="../../visitor/white/index.php">Выйти из аккаунта</a></button>
            <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
        </div><!-- end #navbarNav -->
    </div><!-- end container -->
</nav>
<!-- end navbar -->

<main class="Site-content">

<!-- start hero -->
            <section class="hero-one position-relative bg-dark" style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
                <div class="container">
                    <div class="row align-items-center justify-content-center py-100">
                        <div class="col-lg-7 text-center py-5 text-center">
                            <h6 class="head-title py-4" aria-label="Регистрация"></h6>                        
                        </div><!--end col-->                  
                    </div><!--end row-->             
                </div><!-- end container -->
            </section>
            <!-- end hero -->


            <!-- start hero -->
            <h6 class="bg-dark text-white fs-2 container text-center">Новые комментарии людей</h6>
            <br>
            <br>
        <!-- end hero --> 
';


$result = mysqli_query($mysql, "SELECT u.login, u.name, h.address, f.rating, f.text FROM feedback as f JOIN user as u ON f.user_id=u.id JOIN house as h on f.house_id = h.id WHERE f.id = ".$feedback_id."");

            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                        $context = '
                        <div class="row margin-top-40" style="margin:auto; "> 
                        <div class="col-md-7" style="margin:auto;"> 
                            <dl class="dl-horizontal house bg-dark text-white"> 
                                <dt>Логин человека</dt>
                                <dd>'.$product["login"].'</dd>
                                <dt>Ник человека</dt>
                                <dd>'.$product["name"].'</dd>
                                <dt>Адрес дома</dt>
                                <dd>'.$product["address"].'</dd>
                                <dt>Рейтинг</dt>
                                <dd>'.$product["rating"].'</dd>
                                <dt>Текст комменатрия</dt>
                                <dd>'.$product["text"].'</dd>
                            <dl>
                        </div>
                        </div>';
                
                }
                $context .= '</table>';
            }
            
            echo $context;



?>


    




            <!-- start hero -->
            <section class="hero-one position-relative bg-dark" style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
                <div class="container">
                    <div class="row align-items-center justify-content-center py-100">
                        <div class="col-lg-7 text-center py-5 text-center">
                            <h6 class="head-title py-4" aria-label="Регистрация"></h6>                        
                        </div><!--end col-->                  
                    </div><!--end row-->             
                </div><!-- end container -->
            </section>
            <!-- end hero -->

        </main>

        <?php
        include "footer.php";
        ?>
        
    </body>
</html>