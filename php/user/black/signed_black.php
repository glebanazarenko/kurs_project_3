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



echo'<body class="bg-dark">
<!-- start navbar -->
<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <a href="checkIn_black.php?id='.$Arr["id"].'">
            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
        </a><!--end navbar-brand-->

        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../white/checkIn.php?id='.$Arr["id"].'">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?id='.$Arr["id"].'&type=search">Поиск</a>
                </li><!--end nav-item-->                        
                <li class="nav-item">
                    <a class="nav-link-a" href="resume.html">Резюме</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="contact.php">Контакт</a>
                </li><!--end nav-item-->
            </ul><!--end navbar-nav-->
            <button type="button" class="btn btn-primary btn-hover">'.$Arr['name'].'</button>
            <button type="button" class="btn btn-green"><a class="btn-a" href="../../visitor/black/main_black.php">Выйти из аккаунта</a></button>
            <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
        </div><!-- end #navbarNav -->
    </div><!-- end container -->
</nav>
<!-- end navbar -->
';

?>


        <!-- start hero -->
        <section class="hero-one position-relative main-bg" id="home"  style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    
                    <div class="col-lg-5  mx-auto mt-5"> 
                        <img src="images/personal/1.png" alt="" class="img-fluid ml-lg-5">
                    </div><!--end col--> 
                    <div class="col-lg-7 text-center px-0 px-xl-4 mt-5 mt-lg-0 pt-5 pt-lg-0">
                        <h5 class="d-inline-block py-1 px-3 rounded text-muted font-secondary">Привет, Я Глеб Назаренко</h5>
                        <h1 class="hero-title mb-4 font-secondary fo">Я фриланс <mark><span class="fw-medium typewrite" data-period="2000" data-type='["Java-", "PHP-", "Python-"]'></span></mark>разработчик</h1>   
                        <span class="wrap"></span>                     
                        <div class="mb-5 mb-lg-0">                           
                            <div class="d-inline-block">
                                <a href="resume.html" class="btn btn-primary">Резюме</a>
                            </div>
                        </div>
                    </div><!--end col-->                  
                </div><!--end row-->             
            </div><!-- end container -->
        </section>
        <!-- end hero -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- start about -->
        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>
        <!-- end about -->

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>


<?php
include "footer_black.php";
?>

    </body>
</html>