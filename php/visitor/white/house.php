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
                        <?php 
                            echo'
                            <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/black/house_black.php?id='.$_GET['id'].'">Темная тема</a>
                            </li><!--end nav-item-->
                            ';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link-a active" href="search.php">Поиск</a>
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

        <!-- start hero -->
            <h6 class="bg-white text-dark fs-2 container text-center">Информация о доме</h6>
        <!-- end hero --> 
        
        <?php
        


        if(!empty($_GET)){
            $result = mysqli_query($mysql, "SELECT * FROM house as h where h.id = ".$id."");
            
            
            if($result != NULL){
                $product = mysqli_fetch_assoc($result);
                if($context == NULL){
                    $context = '
                    <div class="row margin-top-40" style="margin:auto;"> 
                        <div class="col-md-7" style="margin:auto;"> 
                            <dl class="dl-horizontal house"> 
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
            
        }

        $result2 = mysqli_query($mysql, "SELECT u.name, f.text, f.rating from feedback as f join user as u on f.user_id =u.id WHERE f.house_id = ".$id." and f.is_published = 1");
            
            
        if($result2 != NULL){
            while( $back = mysqli_fetch_assoc($result2)){
                if($feed == NULL){
                    $feed = '
                    <br>
                    <!-- start hero -->
                    <h6 class="bg-white text-dark fs-2 container text-center">Отзывы других людей</h6>
                    <!-- end hero --> 

                    <div class="row margin-top-40" style="margin:auto;"> 
                        <div class="col-md-7" style="margin:auto;"> 
                            <dl> 
                                <dt>'.$back['name'].'</dt>
                                <dd>'.$back['text'].'</dd>
                                <dd><div class="rating-result">';

                                if ($back['rating'] == 0){
                                    $feed .= '
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    </div>
                                </dd>
                                <br>';
                                }
                                if ($back['rating'] == 1){
                                    $feed .= '
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    </div>
                                </dd>
                                <br>';
                                }
                                if ($back['rating'] == 2){
                                    $feed .= '
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    </div>
                                </dd>
                                <br>';
                                }
                                if ($back['rating'] == 3){
                                    $feed .= '
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                    </div>
                                </dd>
                                <br>';
                                }
                                if ($back['rating'] == 4){
                                    $feed .= '
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                    </div>
                                </dd>
                                <br>';
                                }
                                if ($back['rating'] == 5){
                                    $feed .= '
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    </div>
                                </dd>
                                <br>';
                                }

                }else{
                    $feed .= '
                    <dt>'.$back['name'].'</dt>
                    <dd>'.$back['text'].'</dd>
                    <dd><div class="rating-result">';

                    if ($back['rating'] == 0){
                        $feed .= '
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                    </dd>
                    <br>';
                    }
                    if ($back['rating'] == 1){
                        $feed .= '
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                    </dd>
                    <br>';
                    }
                    if ($back['rating'] == 2){
                        $feed .= '
                        <span class="active"></span>
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                    </dd>
                    <br>';
                    }
                    if ($back['rating'] == 3){
                        $feed .= '
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                        </div>
                    </dd>
                    <br>';
                    }
                    if ($back['rating'] == 4){
                        $feed .= '
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span></span>
                        </div>
                    </dd>
                    <br>';
                    }
                    if ($back['rating'] == 5){
                        $feed .= '
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        <span class="active"></span>
                        </div>
                    </dd>
                    <br>';
                    }
                }
            }
        }
        $feed .= '
        </dl>
        </div>
        </div>';

        echo $feed;


        ?>

<br>
        <br>
        <br>
        <br>
        <br>
        <br>

            <!-- start hero -->
            <h6 class="bg-white text-dark fs-2 container text-center">Чтобы оставить отзыв нужно войти в аккаунт</h6>
            <!-- end hero -->  

            </main>

        <?php
        include "footer.php";
        ?>
        
    </body>
</html>