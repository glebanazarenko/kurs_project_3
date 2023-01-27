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
        <link href="/курсач/css/styles.css" rel="stylesheet" type="text/css" />
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
                    <a class="nav-link-a active" href="checkIn.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../black/checkIn_black.php?id='.$Arr["id"].'">Темная тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->                        
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=new_feedback_all&id='.$Arr["id"].'">Новые сообщения</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=old_feedback_all&id='.$Arr["id"].'">Старые сообщения</a>
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
';

?>

<br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h6 class="bg-white text-dark fs-2 container text-center">Карта домов</h6>
        

        <div class="container text-center">
            <iframe src="https://www.google.com/maps/d/embed?mid=1QbGBYwVrHw58rU2W_GePLaZlPHLrrUw&ehbc=2E312F" width="1080" height="720"></iframe>
            <br>
        </div>


        <div class="container">
            <h2 class="bg-white text-dark fs-2 container text-center">Информация о сайте</h2>
            <br>
            <h3>Доброго времени суток, вы попали на сайт, который вам поможет с точностью и филигранной тонкостью найти для себя или оставить отзыв о любом доме, который вы посчитаете нужным.</h3>
            <br>
            <h3>Воспользовавшись нашими услугами, вы сможете найти такую информацию как:</h3>
            <br>
            <ul>
                <li><h3>Год постройки дома</h3></li>
                <li><h3>Общая площадь</h3></li>
                <li><h3>Тип проекта</h3></li>
            </ul>
            <br>
            <h3>Вы можете оставить отзыв, и наша специальная группа проверщиков проверит и подтвердит ваши слова. </h3>
            <br>
            <h3>Также у вас есть возможность стать вип-пользователем, который сможет помочь много более чем просто рядовой пользователь. У него в случае ошибки есть возможность скорректировать свой комментарий до проверки администрации и так же после с последующей дополнительной проверкой.</h3>
            <br>
            <h3>У нас есть удобная система поиска при помощи многогранно-функционального фильтра, который подстроиться под самые экстравагантные запросы.</h3>
            <br>
            <h3>Так же у вас есть возможность попасть в закрытый набор модераторов(админов), которые помогают и поддерживают проект проверкой информации и корректности комментариев.</h3>
            <br>
            <h3>Присоединяйся к нам и оставь свой первый и очень важный отзыв, ведь каждый будет, читая его понимать и принимать серьезное решение, помоги принять решение Всем!</h3>
            <br>
        </div>

        
        </main>


<?php
include "footer.php";
?>

    </body>
</html>