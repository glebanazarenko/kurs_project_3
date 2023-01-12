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
                            <a class="nav-link-a" href="/курсач/php/visitor/black/search_black.php">Темная тема</a>
                        </li><!--end nav-item-->
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

        <div class="">

        
            <?php
                $gas_type = $_POST["gas"];
                $ventilation_type = $_POST["ventilation"];
                $heating_type = $_POST["heating"];
                $chute_type = $_POST["chute"];
                $house_type = $_POST["house_type"];
            ?>
            <div class="row">
                <div class="col col-lg-2">
                    <section class="container ">
                    <form method="POST">
                        <h1>Фильтр</h1>

                        <div class="input-group mb-2">
                        
                    <label class="input-group-text" for="inputGroupSelect01">Тип газа в доме</label>
                    <select name="gas" class="select-css" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($gas_type) && $gas_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($gas_type) && $gas_type=="2") echo "selected='selected'";?> >Автономное</option>
                        <option value="3" <?php if (isset($gas_type) && $gas_type=="3") echo "selected='selected'";?> >Центральное</option>
                        <option value="4" <?php if (isset($gas_type) && $gas_type=="4") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип вентиляции в доме</label>
                    <select name="ventilation" class="select-css" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($ventilation_type) && $ventilation_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($ventilation_type) && $ventilation_type=="2") echo "selected='selected'";?> >Вытяжная вентиляция</option>
                        <option value="3" <?php if (isset($ventilation_type) && $ventilation_type=="3") echo "selected='selected'";?> >Приточная вентиляция</option>
                        <option value="4" <?php if (isset($ventilation_type) && $ventilation_type=="4") echo "selected='selected'";?> >Приточно-вытяжная вентиляция</option>
                        <option value="5" <?php if (isset($ventilation_type) && $ventilation_type=="5") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип отопления в доме</label>
                    <select name="heating" class="select-css" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($heating_type) && $heating_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($heating_type) && $heating_type=="2") echo "selected='selected'";?> >Автономная котельная</option>
                        <option value="3" <?php if (isset($heating_type) && $heating_type=="3") echo "selected='selected'";?> >Индивидуальный тепловой пункт (ИТП)</option>
                        <option value="4" <?php if (isset($heating_type) && $heating_type=="4") echo "selected='selected'";?> >Квартирное отопление (квартирный котел)</option>
                        <option value="5" <?php if (isset($heating_type) && $heating_type=="5") echo "selected='selected'";?> >Центральное</option>
                        <option value="6" <?php if (isset($heating_type) && $heating_type=="6") echo "selected='selected'";?> >Печное</option>
                        <option value="7" <?php if (isset($heating_type) && $heating_type=="7") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип мусоропровода в доме</label>
                    <select name="chute" class="select-css" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($chute_type) && $chute_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($chute_type) && $chute_type=="2") echo "selected='selected'";?> >Cухой</option>
                        <option value="3" <?php if (isset($chute_type) && $chute_type=="3") echo "selected='selected'";?> >Cухой (холодный)</option>
                        <option value="4" <?php if (isset($chute_type) && $chute_type=="4") echo "selected='selected'";?> >Квартирные</option>
                        <option value="5" <?php if (isset($chute_type) && $chute_type=="5") echo "selected='selected'";?> >На лестничной клетке</option>
                        <option value="6" <?php if (isset($chute_type) && $chute_type=="6") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Площадь парковки (минимум)</span>
                    <input type="text" name="parking" class="form-control" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1"
                    value="<?=isset($_POST['parking'])?$_POST['parking']:''?>">
                </div> 
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Количество лифтов (минимум)</span>
                    <input type="text" name="elevator" class="form-control" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1"
                    value="<?=isset($_POST['elevator'])?$_POST['elevator']:''?>">
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип дома</label>
                    <select name="house_type" class="select-css" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($house_type) && $house_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($house_type) && $house_type=="2") echo "selected='selected'";?> >Жилой дом блокированной застройки</option>
                        <option value="3" <?php if (isset($house_type) && $house_type=="3") echo "selected='selected'";?> >Многоквартирный дом</option>
                        <option value="4" <?php if (isset($house_type) && $house_type=="4") echo "selected='selected'";?> >Специализированный жилищный фонд</option>
                    </select>
                </div>

                        <button type="submit" class="btn">Применить</button>
                    </form>
                    </section>



                </div>
                <div class="col">
                
                <!-- start hero -->
            <h6 class="bg-white text-dark fs-2 container text-center">Поиск</h6>
        <!-- end hero --> 


        <section class="container text-left">
            <form method="POST">
                <input type="hidden" name="gas_type" value="<?php $_POST["gas"] ?>">
                <input type="hidden" name="ventilation_type" value="<?php $_POST["ventilation"] ?>">
                <input type="hidden" name="heating_type" value="<?php $_POST["heating"] ?>">
                <input type="hidden" name="chute_type" value="<?php $_POST["chute"] ?>">
                <input type="hidden" name="parking" value="<?php $_POST["parking"] ?>">
                <input type="hidden" name="elevator" value="<?php $_POST["elevator"] ?>">
                <input type="hidden" name="house_type" value="<?php $_POST["house_type"] ?>">


                <div class="mb-4">
                <label for="exampleInputLogin1" class="form-label">Адрес</label>
                    <input type="text" name="address" class="form-control" placeholder="qwerty" id="exampleInputLogin1" aria-label="Username" 
                    aria-describedby="basic-addon1" value="<?=isset($_POST['address'])?$_POST['address']:''?>">
                </div> 
                <button type="submit" class="btn btn-primary">Подтвердить</button>

            </form>
        </section>
        
        <?php


        if(!empty($_POST)){
            $result = mysqli_query($mysql, "SELECT * FROM house as h where h.address LIKE \"%".$_POST['address']."%\" Limit 15");
            
            
            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                    if($context == NULL){
                        $context = '
                        <div style="container-lg text-align: center;">
                        <table class="table" style="width: 1200px; margin: auto;">
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
                            <td width=500px height=50px><a class="nav-link-a active" href=house.php?id='.$product["id"].'>'.$product["address"].'</a>
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
        ?>

                </div>
                <div class="col col-lg-2">
                
                </div>
            </div>
        </div>

        
<?php

        echo "</main>";

        include "footer.php";
        ?>
        
    </body>
</html>