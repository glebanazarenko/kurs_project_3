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
                    <a class="nav-link-a" href="checkIn.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../black/checkIn_black.php?type=feedback_before_all&id='.$Arr["id"].'">Темная тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn.php?type=feedback_before_all&id='.$Arr["id"].'">Отзывы до проверки</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn.php?type=feedback_after_all&id='.$Arr["id"].'">Отзывы после проверки</a>
                </li><!--end nav-item-->                
            </ul><!--end navbar-nav-->
            <button type="button" class="btn btn-primary btn-hover">VIP: '.$Arr['name'].'</button>
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
            <h6 class="bg-white text-dark fs-2 container text-center">Ваши отзывы до проверки админинстрации</h6>
            <br>
            <br>
        <!-- end hero --> 
';


$result = mysqli_query($mysql, "SELECT f.id, u.login, u.name, h.address, f.rating from feedback as f JOIN user as u on f.user_id = u.id join house as h on f.house_id = h.id WHERE f.user_id = ".$Arr['id']." AND f.is_checked = 0");

if($result != NULL){
    while( $product = mysqli_fetch_assoc($result)){
        if($context == NULL){
            $context = '
            <div style="container-lg text-align: center;">
                <div class="person_list_div">
                        <div class="person_list_name">Логин человека</div>
                        <div class="person_list_name">Ник человека</div>
                        <div class="person_list_name">Адрес дома</div>
                        <div class="person_list_name">Рейтинг</div>
                </div>
                <div class="person_list_div">
                    <a href="checkIn.php?type=feedback_before&feedback_id='.$product["id"].'&id='.$Arr["id"].'" class="person_list_row">
                        <div class="person_list_name"> '.$product["login"].'</div>
                        <div class="person_list_name"> '.$product["name"].'</div>
                        <div class="person_list_name"> '.$product["address"].'</div>
                        <div class="person_list_name"> '.$product["rating"].'</div>
                    </a>
                </div>';
        }else{
            $context .= '
            <div class="person_list_div">
                <a href="checkIn.php?type=feedback_before&feedback_id='.$product["id"].'&id='.$Arr["id"].'" class="person_list_row">
                    <div class="person_list_name"> '.$product["login"].'</div>
                    <div class="person_list_name"> '.$product["name"].'</div>
                    <div class="person_list_name"> '.$product["address"].'</div>
                    <div class="person_list_name"> '.$product["rating"].'</div>
                </a>
            </div>
            ';
        }
    
    }
    $context .= '</div>';
}
            
            echo $context;



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