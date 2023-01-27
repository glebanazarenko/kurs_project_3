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

echo'<body class="Site">
<!-- start navbar -->
<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <a href="checkIn.php?id='.$Arr["id"].'">
            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
        </a><!--end navbar-brand-->

        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../black/checkIn_black.php?feedback_id='.$feedback_id.'&type=old_feedback&id='.$Arr["id"].'&role_id=3">Темная тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->                        
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=new_feedback_all&id='.$Arr["id"].'">Новые сообщения</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn.php?type=old_feedback_all&id='.$Arr["id"].'">Старые сообщения</a>
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

<br>
        <br>
        <br>
        <br>
        <br>
        <br>


            <!-- start hero -->
            <h6 class="bg-white text-dark fs-2 container text-center">Старые комментарии людей</h6>
            <br>
            <br>
        <!-- end hero --> 
';


$result = mysqli_query($mysql, "SELECT u.login, u.name, h.address, f.rating, f.text, f.is_published FROM feedback as f JOIN user as u ON f.user_id=u.id JOIN house as h on f.house_id = h.id WHERE f.id = ".$feedback_id."");

            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                    if($product["is_published"] == 0){
                        $status = "Отклонено";
                    }else{
                        $status = "Подтверждено";
                    }
                        $context = '
                        <div class="row margin-top-40" style="margin:auto;"> 
                        <div class="col-md-7" style="margin:auto;"> 
                            <dl class="dl-horizontal house"> 
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
                                <dt>Статус</dt>
                                <dd>'.$status.'</dd>
                            <dl>
                        </div>
                        </div>';
                
                }
                $context .= '</table>';
            }
            
            echo $context;

            if($status == "Отклонено"){
                echo'
                <br>
                <br>

                <section>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-success" href="checkIn.php?type=old_feedback_all&is_published=1&feedback_id='.$feedback_id.'&id='.$Arr["id"].'" role="button">Подтвердить</a>
                            </div>
                        </div>
                    </div>
                </section>
                ';
            }else{
                echo'
                <br>
                <br>

                <section>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger" href="checkIn.php?type=old_feedback_all&is_published=0&feedback_id='.$feedback_id.'&id='.$Arr["id"].'" role="button">Отклонить</a>
                            </div>
                        </div>
                    </div>
                </section>
                ';
            }



?>

<br>
        <br>
        <br>
        <br>
        <br>
        <br>

            </main>

        <?php
        include "footer.php";
        ?>
        
    </body>
</html>