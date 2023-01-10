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
$id = $_GET["id"];

?>

<body>
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
                        <?php 
                            echo'
                            <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/black/house_black.php?id='.$_GET['id'].'">Светлая тема</a>
                            </li><!--end nav-item-->
                            ';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link-a active" href="search.php">Поиск</a>
                        </li><!--end nav-item-->                        
                        <li class="nav-item">
                            <a class="nav-link-a" href="resume.html">Резюме</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="contact.php">Контакт</a>
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav-->
                    <button type="button" class="btn btn-primary btn-hover"><a class="btn-a" href="signUp.php">Регистрация<a></button>
                    <button type="button" class="btn btn-green"><a class="btn-a" href="signIn.php">Вход<a></button>
                    <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
                </div><!-- end #navbarNav -->
            </div><!-- end container -->
        </nav>
        <!-- end navbar -->

        <!-- start hero -->
        <section class="hero-one position-relative bg-white" style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
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
            <h6 class="bg-white text-dark fs-2 container text-center">Информация о доме</h6>
        <!-- end hero --> 
        
        <?php
        


        if(!empty($_GET)){
            echo $id;
            $result = mysqli_query($mysql, "SELECT * FROM house as h where h.id = ".$id."");
            
            
            if($result != NULL){
                $product = mysqli_fetch_assoc($result);
                if($context == NULL){
                    $context = '
                    <table class="allproduct">
                        <tr>
                            <td width=400px height=50px> Адресс дома
                            </td>
                            <td width=150px height=50px> Год постройки
                            </td>
                            <td width=150px height=50px> Год эксплуатации
                            </td>
                            <td width=150px height=50px> Тип проекта
                            </td>
                            <td width=250px height=50px> Тип дома
                            </td>
                            <td width=250px height=50px> Кол-во этажей макс
                            </td>
                            <td width=250px height=50px> Кол-во этажей мин
                            </td>
                            <td width=170px height=50px> Энергоэффективность
                            </td>
                            <td width=150px height=50px> Кол-во квартир
                            </td>
                            <td width=150px height=50px> Общая площадь
                            </td>
                            <td width=150px height=50px> Площадь парковки
                            </td>
                            <td width=150px height=50px> Другие удобства
                            </td>
                            <td width=150px height=50px> Тип фундамента
                            </td>
                            <td width=150px height=50px> Полы
                            </td>
                            <td width=150px height=50px> Стены
                            </td>
                            <td width=150px height=50px> Тип мусоропровода
                            </td>
                            <td width=150px height=50px> Кол-во мусоропроводов
                            </td>
                            <td width=150px height=50px> Тип горячей воды
                            </td>
                            <td width=150px height=50px> Тип холодной воды
                            </td>
                            <td width=150px height=50px> Водоотведение
                            </td>
                            <td width=150px height=50px> Газоснабжение
                            </td>
                            <td width=150px height=50px> Тип вентиляции
                            </td>
                            <td width=150px height=50px> Система пожарной безопасности
                            </td>
                            <td width=150px height=50px> Тип дренажа
                            </td>
                        </tr>
                        <tr>
                            <td width=400px height=50px>'.$product["address"].'
                            </td>
                            <td width=150px height=50px>';
                            
                    if($product["built_year"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["built_year"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>'.$product["exploitation_start_year"].'
                            </td>
                            <td width=100px height=50px>'.$product["project_type"].'
                            </td>
                            <td width=100px height=50px>'.$product["house_type"].'
                            </td>
                            <td width=100px height=50px>';

                    if($product["floor_count_max"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["floor_count_max"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>';

                    if($product["floor_count_min"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["floor_count_min"].'';
                    }


                    $context .= '
                            </td>
                            <td width=100px height=50px>'.$product["energy_efficiency"].'
                            </td>
                            <td width=100px height=50px>'.$product["quarters_count"].'
                            </td>
                            <td width=100px height=50px>'.$product["area_total"].'
                            </td>
                            <td width=100px height=50px>';

                    if($product["parking_square"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["parking_square"].'';
                    }
                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["other_beautification"] == NULL || $product["other_beautification"] === "Не имеется"){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["other_beautification"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["foundation_type"] == NULL || $product["foundation_type"] === "Не заполнено" || $product["foundation_type"] === "Иной"){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["foundation_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["floor_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["floor_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["wall_material"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["wall_material"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["chute_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["chute_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["chute_count"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["chute_count"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["hot_water_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["hot_water_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["cold_water_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["cold_water_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["sewerage_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["sewerage_type"].'';
                    }
                    
                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["gas_type"] == NULL){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["gas_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["ventilation_type"] == NULL || $product["ventilation_type"] === "Не заполнено"){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["ventilation_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["fifefighting_type"] == NULL || $product["fifefighting_type"] === "Не заполнено"){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["fifefighting_type"].'';
                    }

                    $context .= '
                            </td>
                            <td width=100px height=50px>
                            ';

                    if($product["drainage_type"] == NULL || $product["drainage_type"] === "Не заполнено"){
                        $context .= 'Нет данных';
                    }
                    else{
                        $context .= ''.$product["drainage_type"].'';
                    }

                    $context .= '
                            </td>
                        </tr>
                        ';
                    }
                
                $context .= '</table>';
            }
            
            echo $context;
            
        }


        include "footer.php";
        ?>
        
    </body>
</html>