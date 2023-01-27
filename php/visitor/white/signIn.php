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
?>

<body class="Site">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
            <div class="container">
                <a href="index.php">
                    <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
                </a><!--end navbar-brand-->

                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                        <li class="nav-item">
                            <a class="nav-link-a" href="index.php">Главная</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/black/signIn_black.php">Темная тема</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="search.php">Поиск</a>
                        </li><!--end nav-item-->                        
                    </ul><!--end navbar-nav-->
                    <button type="button" class="btn btn-primary btn-hover"><a class="btn-a" href="signUp.php">Регистрация<a></button>
                    <button type="button" class="btn btn-green"><a class="btn-a" href="signIn.php">Вход<a></button>
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
            <h6 class="bg-white text-dark fs-2 container text-center">Вход</h6>
        <!-- end hero -->        

        <section class="container text-left">
            <form action="../../check/white/checkIn.php"   method="POST">
                <div class="mb-4">
                <label for="exampleInputLogin1" class="form-label">Логин</label>
                    <input type="text" name="login" class="form-control" placeholder="qwerty" id="exampleInputLogin1" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <div class="mb-5">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" placeholder="******" class="form-control" id="exampleInputPassword1">
                    <div id="passwordHelp" class="form-text">Мы не будем передавать пароль никому другому</div>
                </div> 
                <button type="submit" class="btn btn-primary">Подтвердить</button>
            </form>
        </section>

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