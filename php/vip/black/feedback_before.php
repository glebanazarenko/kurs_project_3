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
        <link href="../../../css/styles-dark.css" rel="stylesheet" type="text/css" />
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



echo'<body class="Site bg-dark">
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
                    <a class="nav-link-a" href="../white/checkIn.php?type=feedback_before&feedback_id='.$feedback_id.'&id='.$Arr["id"].'">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?type=feedback_before_all&id='.$Arr["id"].'">Отзыв до проверки</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=feedback_after_all&id='.$Arr["id"].'">Отзыв после проверки</a>
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
            <h6 class="bg-dark text-white fs-2 container text-center">Ваши отзывы до проверки админинстрации</h6>
            <br>
            <br>
        <!-- end hero --> 
';


$result = mysqli_query($mysql, "SELECT u.login, u.name, h.address, f.rating, f.text FROM feedback as f JOIN user as u ON f.user_id=u.id JOIN house as h on f.house_id = h.id WHERE f.id = ".$feedback_id."");

            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                        $context = '
                        <div class="row margin-top-40" style="margin:auto;"> 
                        <div class="col-md-7" style="margin:auto;"> 
                            <dl class="dl-horizontal house bg-dark text-white"> 
                                <dt>Логин человека</dt>
                                <dd>'.$product["login"].'</dd>
                                <dt>Ник человека</dt>
                                <dd>'.$product["name"].'</dd>
                                <dt>Адрес дома</dt>
                                <dd>'.$product["address"].'</dd>
                            <dl>
                        </div>
                        </div>';

                        $text = $product["text"];
                        $rating = $product["rating"];
                
                }
                $context .= '</table>';
            }
            
            echo $context;


echo'

            <section class="container text-left">
                <form action="../../check/black/checkIn_black.php?type=feedback_before_all&delete=0&feedback_id='.$feedback_id.'&id='.$Arr["id"].'"   method="POST">
                    <!-- Hidden Required Fields -->';


                        $result = mysqli_query($mysql, "SELECT * FROM user WHERE
                        login='".$session_user_login."'
                        ");
                        $Arr = mysqli_fetch_assoc($result);
                        echo'
                        <input type="hidden" name="user_id" value="'.$Arr["id"].'">
                        <input type="hidden" name="house_id" value="'.$house_id.'">

                        <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label bg-dark text-white">Тема сообщения</label>
                        <textarea class="form-control bg-dark text-white" id="exampleFormControlTextarea1" rows="3" name="text">'.$text.'</textarea>
                        </div> 
                        ';        
                        
if($rating == 0){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5" >
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}
if($rating == 1){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1" checked>
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}
if($rating == 2){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2" checked>
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}
if($rating == 3){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3" checked>
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}
if($rating == 4){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4" checked>
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}
if($rating == 5){
    echo'
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5" checked>
                        <label for="star-5" title="Оценка «5»"></label>	
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>    
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>  
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>    
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    ';
}

echo '

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Подтвердить изменения</button>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger" href="checkIn.php?type=feedback_before_all&delete=1&feedback_id='.$feedback_id.'&id='.$Arr["id"].'" role="button">Удалить отзыв</a>
                        </div>
                    </div>
                </div>
                
    </form>
</section>';

?>


            </main>

        <?php
        include "footer.php";
        ?>
        
    </body>
</html>