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

    <body class="bg-dark">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
            <div class="container">
                <a href="main_black.php">
                    <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
                </a><!--end navbar-brand-->

                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                        <li class="nav-item">
                            <a class="nav-link-a" href="main_black.php">Главная</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/white/search.php">Светлая тема</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a active" href="search_black.php">Поиск</a>
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

        <!-- start hero -->
        <section class="hero-one position-relative bg-dark" style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row align-items-center justify-content-center py-100">
                    <div class="col-lg-7 text-center py-5 text-center">
                        <h5 class="head-title py-4" aria-label="Регистрация"></h5>                        
                    </div><!--end col-->                  
                </div><!--end row-->             
            </div><!-- end container -->
        </section>
        <!-- end hero -->

        <!-- start hero -->
            <h6 class="bg-dark text-white text-dark fs-2 container text-center">Поиск</h6>
        <!-- end hero --> 


        <section class="container text-left">
            <form method="POST">
                <div class="mb-4">
                <label for="exampleInputLogin1" class="form-label bg-dark text-white">Адрес</label>
                    <input type="text" name="address" class="form-control bg-dark text-white" placeholder="qwerty" id="exampleInputLogin1" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <button type="submit" class="btn btn-outline-success">Подтвердить</button>

            </form>
        </section>

        
        <?php


        if(!empty($_POST)){
            $result = mysqli_query($mysql, "SELECT * FROM house as h where h.address LIKE \"%".$_POST['address']."%\" Limit 10");
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
                    }else{
                        $context .= '
                        <tr>
                            <td width=500px height=50px><a class="nav-link-a" href=house_black.php?id='.$product["id"].'>'.$product["address"].'</a>
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
                
                }
                $context .= '</table></div>';
            }
            
            echo $context;
        }


        include "footer_black.php";
        ?>
        
    </body>
</html>