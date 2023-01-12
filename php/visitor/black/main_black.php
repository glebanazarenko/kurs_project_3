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
?>
    <body style="bg-dark Site">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
            <div class="container">
                <a href="main_black.php">
                    <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
                </a><!--end navbar-brand-->

                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                        <li class="nav-item">
                            <a class="nav-link-a active" href="main_black.php">Главная</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/white/index.php">Светлая тема</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="search_black.php">Поиск</a>
                        </li><!--end nav-item-->                        
                        <li class="nav-item">
                            <a class="nav-link-a" href="resume.html">Резюме</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="contact.php">Контакт</a>
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav-->
                    <button type="button" class="btn btn-primary btn-hover"><a class="btn-a" href="signUp_black.php">Регистрация<a></button>
                    <button type="button" class="btn btn-green"><a class="btn-a" href="signIn_black.php">Вход<a></button>
                    <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
                </div><!-- end #navbarNav -->
            </div><!-- end container -->
        </nav>
        <!-- end navbar -->

        <main class="Site-content">

        <!-- start hero -->
        <section class="hero-one position-relative bg-dark" id="about"  style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row align-items-center justify-content-center py-100">
                    <div class="col-lg-7 text-center py-5 text-center">
                        <h5 class="head-title py-4" aria-label="Обо мне"></h5>                        
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

        </main>

        <?php
        include "footer_black.php";
        ?>

    </body>
</html>