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

$id = $_GET["id"];


$result = mysqli_query($mysql, "SELECT * FROM user WHERE
login='".$session_user_login."'
");
$Arr = mysqli_fetch_assoc($result);


echo'<body class="bg-dark Site">
<!-- start navbar -->
<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <a href="checkIn_black.php?id='.$Arr["id"].'">
            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="50" />
        </a><!--end navbar-brand-->

        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?id='.$Arr["id"].'">Главная</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a" href="../white/checkIn.php?house_id='.$house_id.'&type=house&id='.$Arr["id"].'">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?type=search&id='.$Arr["id"].'">Поиск</a>
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

<main class="Site-content">
';

?>

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
            <h6 class="bg-dark text-white text-dark fs-2 container text-center">Информация о доме</h6>
            <br>
        <!-- end hero --> 
        
        <?php
        
        $result = mysqli_query($mysql, "SELECT * FROM house as h where h.id = ".$house_id."");
            
            
        if($result != NULL){
            $product = mysqli_fetch_assoc($result);
            if($context == NULL){
                $context = '
                <div class="row margin-top-40" style="margin:auto;"> 
                    <div class="col-md-7" style="margin:auto;"> 
                        <dl class="dl-horizontal house bg-dark text-white"> 
                            <dt>Адрес дома</dt>
                            <dd>'.$product["address"].'</dd>
                            <dt>Год постройки</dt>
                            <dd>';
                if($product["built_year"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["built_year"].'';
                }

                $context .= '
                        </dd>
                        <dt>Год эксплуатации</dt>
                        <dd>';
                
                if($product["exploitation_start_year"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["exploitation_start_year"].'';
                } 

                $context .= '
                        </dd>
                        <dt>Тип проекта</dt>
                        <dd>';

                if($product["project_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["project_type"].'';
                }
                
                $context .= '
                        </dd>
                        <dt>Тип дома</dd>
                        <dd>';
                        
                if($product["house_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["house_type"].'';
                }      

                $context .= '
                        </dd>
                        <dt>Количество этажей макс</dt>
                        <dd>';

                if($product["floor_count_max"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["floor_count_max"].'';
                }

                $context .= '
                        </dd>
                        <dt>Количество этажей мин</dt>
                        <dd>';

                if($product["floor_count_min"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["floor_count_min"].'';
                }

                $context .= '
                        </dd>
                        <dt>Энергоэффективность</dt>
                        <dd>';

                if($product["energy_efficiency"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["energy_efficiency"].'';
                }

                $context .= '
                        </dd>
                        <dt>Количество квартир</dt>
                        <dd>';

                if($product["quarters_count"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["quarters_count"].'';
                }

                $context .= '
                        </dd>
                        <dt>Общая площадь</dt>
                        <dd>';

                if($product["area_total"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["area_total"].'';
                }

                $context .= '
                        </dd>
                        <dt>Площадь парковки</dt>
                        <dd>';

                if($product["parking_square"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["parking_square"].'';
                }

                $context .= '
                        </dd>
                        <dt>Другие удобства</dt>
                        <dd>';

                if($product["other_beautification"] == NULL || $product["other_beautification"] === "Не имеется"){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["other_beautification"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип фундамента</dt>
                        <dd>';

                if($product["foundation_type"] == NULL || $product["foundation_type"] === "Не заполнено" || $product["foundation_type"] === "Иной"){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["foundation_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Полы</dt>
                        <dd>';

                if($product["floor_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["floor_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Стены</dt>
                        <dd>';

                if($product["wall_material"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["wall_material"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип мусоропровода</dt>
                        <dd>';

                if($product["chute_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["chute_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Количество мусоропроводов</dt>
                        <dd>';

                if($product["chute_count"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["chute_count"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип горячей воды</dt>
                        <dd>';

                if($product["hot_water_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["hot_water_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип холодной воды</dt>
                        <dd>';

                if($product["cold_water_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["cold_water_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Водоотведение</dt>
                        <dd>';

                if($product["sewerage_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["sewerage_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Газоснабжение</dt>
                        <dd>';

                if($product["gas_type"] == NULL){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["gas_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип вентиляции</dt>
                        <dd>';

                if($product["ventilation_type"] == NULL || $product["ventilation_type"] === "Не заполнено"){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["ventilation_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Система пожарной безопасности</dt>
                        <dd>';

                if($product["fifefighting_type"] == NULL || $product["fifefighting_type"] === "Не заполнено"){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["fifefighting_type"].'';
                }

                $context .= '
                        </dd>
                        <dt>Тип дренажа</dt>
                        <dd>';

                if($product["drainage_type"] == NULL || $product["drainage_type"] === "Не заполнено"){
                    $context .= 'Нет данных';
                }
                else{
                    $context .= ''.$product["drainage_type"].'';
                }

                $context .= '
                        </dd>
                    </dl>
                    ';
                }
            
            $context .= '</div></div>';
        }
        
        echo $context;
            


            ?>

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
            <h6 class="bg-dark text-white fs-2 container text-center">Оставьте отзыв об этом доме</h6>
            <!-- end hero -->  

            <section class="container text-left">
                <form action="../../check/black/check_form.php"   method="POST">
                    <!-- Hidden Required Fields -->
                    <?php
                        $result = mysqli_query($mysql, "SELECT * FROM user WHERE
                        login='".$session_user_login."'
                        ");
                        $Arr = mysqli_fetch_assoc($result);
                        echo'
                        <input type="hidden" name="user_id" value="'.$Arr["id"].'">
                        <input type="hidden" name="house_id" value="'.$house_id.'">
                        ';
                    ?>
                    

                    <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label bg-dark text-white">Тема сообщения</label>
                    <textarea class="form-control bg-dark text-white" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                    </div> 
                    <div class="rating-area" name="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
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
                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                </form>
            </section>


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
        include "footer_black.php";
        ?>
        
    </body>
</html>