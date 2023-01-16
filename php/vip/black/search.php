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

echo'<body class="bg-dark Site">
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
                    <a class="nav-link-a" href="../white/checkIn.php?id='.$Arr["id"].'&type=search">Светлая тема</a>
                </li><!--end nav-item-->
                <li class="nav-item">
                    <a class="nav-link-a active" href="checkIn_black.php?type=search&id='.$Arr["id"].'">Поиск</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=feedback_before_all&id='.$Arr["id"].'">Отзыв до проверки</a>
                </li><!--end nav-item-->      
                <li class="nav-item">
                    <a class="nav-link-a" href="checkIn_black.php?type=feedback_after_all&id='.$Arr["id"].'">Отзыв после проверки</a>
                </li><!--end nav-item-->                
            </ul><!--end navbar-nav-->
            <button type="button" class="btn btn-primary btn-hover">VIP: '.$Arr['name'].'</button>
            <button type="button" class="btn btn-green"><a class="btn-a" href="../../visitor/black/main_black.php">Выйти из аккаунта</a></button>
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
                        <h5 class="head-title py-4" aria-label="Регистрация"></h5>                        
                    </div><!--end col-->                  
                </div><!--end row-->             
            </div><!-- end container -->
        </section>
        <!-- end hero -->


        <div class="">';

        $user_id =$Arr["id"];
            
        $user = mysqli_query($mysql, "SELECT * from user WHERE user.id = $user_id");
        $filtr = mysqli_fetch_assoc($user);



?>
<?php
                        $gas_type = $_POST["gas"];
                        $ventilation_type = $_POST["ventilation"];
                        $heating_type = $_POST["heating"];
                        $chute_type = $_POST["chute"];
                        $parking = $_POST["parking"];
                        $elevator = $_POST["elevator"];
                        $house_type = $_POST["house_type"];

                        $mysql->query("UPDATE user SET gas_type = $gas_type, ventilation_type = $ventilation_type, heating_type = $heating_type, 
                        chute_type = $chute_type, parking_square = $parking, elevators_count = $elevator, house_type = $house_type WHERE user.id = $user_id");
        

                $gas_type = $filtr["gas_type"];
                $ventilation_type = $filtr["ventilation_type"];
                $heating_type = $filtr["heating_type"];
                $chute_type = $filtr["chute_type"];
                $parking_square = $filtr["parking_square"];
                $elevators_count = $filtr["elevators_count"];
                $house_type = $filtr["house_type"];


            ?>
            <div class="row">
                <div class="col col-lg-3">
                    <section class="container ">
                    <form method="POST">
                        <h1 class="bg-dark text-white">Фильтр</h1>

                        <div class="input-group mb-2">
                        
                    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Тип газа в доме</label>
                    <select name="gas" class="select-css bg-dark text-white" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($gas_type) && $gas_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($gas_type) && $gas_type=="2") echo "selected='selected'";?> >Автономное</option>
                        <option value="3" <?php if (isset($gas_type) && $gas_type=="3") echo "selected='selected'";?> >Центральное</option>
                        <option value="4" <?php if (isset($gas_type) && $gas_type=="4") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Тип вентиляции в доме</label>
                    <select name="ventilation" class="select-css bg-dark text-white" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($ventilation_type) && $ventilation_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($ventilation_type) && $ventilation_type=="2") echo "selected='selected'";?> >Вытяжная вентиляция</option>
                        <option value="3" <?php if (isset($ventilation_type) && $ventilation_type=="3") echo "selected='selected'";?> >Приточная вентиляция</option>
                        <option value="4" <?php if (isset($ventilation_type) && $ventilation_type=="4") echo "selected='selected'";?> >Приточно-вытяжная вентиляция</option>
                        <option value="5" <?php if (isset($ventilation_type) && $ventilation_type=="5") echo "selected='selected'";?> >Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Тип отопления в доме</label>
                    <select name="heating" class="select-css bg-dark text-white" id="inputGroupSelect01">
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
                    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Тип мусоропровода в доме</label>
                    <select name="chute" class="select-css bg-dark text-white" id="inputGroupSelect01">
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
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">Площадь парковки (минимум)</span>
                    <input type="text" name="parking" class="form-control bg-dark text-white" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1"
                    value="<?=$parking_square?>">
                </div> 
                <div class="input-group mb-3">
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">Количество лифтов (минимум)</span>
                    <input type="text" name="elevator" class="form-control bg-dark text-white" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1"
                    value="<?=$elevators_count?>">
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Тип дома</label>
                    <select name="house_type" class="select-css bg-dark text-white" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1" <?php if (isset($house_type) && $house_type=="1") echo "selected='selected'";?> >Без разницы</option>
                        <option value="2" <?php if (isset($house_type) && $house_type=="2") echo "selected='selected'";?> >Жилой дом блокированной застройки</option>
                        <option value="3" <?php if (isset($house_type) && $house_type=="3") echo "selected='selected'";?> >Многоквартирный дом</option>
                        <option value="4" <?php if (isset($house_type) && $house_type=="4") echo "selected='selected'";?> >Специализированный жилищный фонд</option>
                    </select>
                </div>

                        <button type="submit" class="btn bg-dark text-white">Применить</button>
                    </form>
                    </section>



                </div>
                <div class="col col-lg-8">
                

                <!-- start hero -->
                    <h6 class="bg-dark text-white fs-2 container text-center">Поиск</h6>
                <!-- end hero --> 


        <section class="container text-left">
            <form method="POST">
                <div class="mb-4">
                <label for="exampleInputLogin1" class="form-label bg-dark text-white">Адрес</label>
                    <input type="text" name="address" class="form-control bg-dark text-white" placeholder="qwerty" id="exampleInputLogin1" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <button type="submit" class="btn btn-success">Подтвердить</button>

            </form>
        </section>

        
        <?php

            $result = mysqli_query($mysql, "SELECT * FROM user WHERE
            login='".$session_user_login."'
            ");
            $Arr = mysqli_fetch_assoc($result);

            if ($gas_type == 1){
                $gas_type = "Безразницы";
            }
            if ($gas_type == 2){
                $gas_type = "Автономное";
            }
            if ($gas_type == 3){
                $gas_type = "Центральное";
            }
            if ($gas_type == 4){
                $gas_type = "Отсутствует";
            }

            if ($ventilation_type == 1){
                $ventilation_type = "Безразницы";
            }
            if ($ventilation_type == 2){
                $ventilation_type = "Вытяжная вентиляция";
            }
            if ($ventilation_type == 3){
                $ventilation_type = "Приточная вентиляция";
            }
            if ($ventilation_type == 4){
                $ventilation_type = "Приточно-вытяжная вентиляция";
            }
            if ($ventilation_type == 5){
                $ventilation_type = "Отсутствует";
            }

            
            if ($heating_type == 1){
                $heating_type = "Безразницы";
            }
            if ($heating_type == 2){
                $heating_type = "Автономная котельная (крышная, встроенно-пристроенная)";
            }
            if ($heating_type == 3){
                $heating_type = "Индивидуальный тепловой пункт (ИТП)";
            }
            if ($heating_type == 4){
                $heating_type = "Квартирное отопление (квартирный котел)";
            }
            if ($heating_type == 5){
                $heating_type = "Центральное";
            }
            if ($heating_type == 6){
                $heating_type = "Печное";
            }
            if ($heating_type == 7){
                $heating_type = "Отсутствует";
            }


            if ($chute_type == 1){
                $chute_type = "Безразницы";
            }
            if ($chute_type == 2){
                $chute_type = "Cухой";
            }
            if ($chute_type == 3){
                $chute_type = "Cухой (холодный)";
            }
            if ($chute_type == 4){
                $chute_type = "Квартирные";
            }
            if ($chute_type == 5){
                $chute_type = "На лестничной клетке";
            }
            if ($chute_type == 6){
                $chute_type = "Отсутствует";
            }



            if ($house_type == 1){
                $house_type = "Безразницы";
            }
            if ($house_type == 2){
                $house_type = "Жилой дом блокированной застройки";
            }
            if ($house_type == 3){
                $house_type = "Многоквартирный дом";
            }
            if ($house_type == 4){
                $house_type = "Специализированный жилищный фонд";
            }

        
            $parking_square;
            $elevators_count;


            if($gas_type == "Безразницы"){
                if($ventilation_type == "Безразницы"){
                    if($heating_type == "Безразницы"){
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where 
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where
                                h.chute_type = \"$chute_type\" AND 
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }else{
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where  h.heating_type = \"$heating_type\" AND
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.heating_type = \"$heating_type\" AND
                                 h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }
                }else{
                    if($heating_type == "Безразницы"){
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where  h.ventilation_type = \"$ventilation_type\" And
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And
                                h.chute_type = \"$chute_type\" AND 
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }else{
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And  h.heating_type = \"$heating_type\" AND
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                 h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }
                }
            }else{
                if($ventilation_type == "Безразницы"){
                    if($heating_type == "Безразницы"){
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where  h.gas_type = \"$gas_type\" AND
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND
                                h.chute_type = \"$chute_type\" AND 
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }else{
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND  h.heating_type = \"$heating_type\" AND
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.heating_type = \"$heating_type\" AND
                                 h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }
                }else{
                    if($heating_type == "Безразницы"){
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND  h.ventilation_type = \"$ventilation_type\" And
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And
                                h.chute_type = \"$chute_type\" AND 
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }else{
                        if($chute_type == "Безразницы"){
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }else{
                            if($house_type == "Безразницы"){
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And  h.heating_type = \"$heating_type\" AND
                                h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" 
                                AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                            else{  
                                $result = mysqli_query($mysql, "SELECT * FROM house as h where h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" And h.heating_type = \"$heating_type\" AND
                                 h.chute_type = \"$chute_type\" AND
                                h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
                                h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 15");
                            }
                        }
                    }
                }
            }

            /*$result = mysqli_query($mysql, "SELECT * FROM house as h where
            h.gas_type = \"$gas_type\" AND h.ventilation_type = \"$ventilation_type\" AND h.heating_type = \"$heating_type\" AND
            h.chute_type = \"$chute_type\" AND h.parking_square >= \"$parking_square\" AND h.elevators_count >= \"$elevators_count\" AND
            h.house_type = \"$house_type\" AND h.address LIKE \"%".$_POST['address']."%\" Limit 10");*/


            
            if($result != NULL){
                while( $product = mysqli_fetch_assoc($result)){
                    if($context == NULL){
                        $context = '
                        <div style="container-lg text-align: center;">
                        <table class="table table-dark" style="width: 1200px; margin: auto;">
                            <thead>
                            <tr>
                                <td> Адресс дома
                                </td>
                                <td> Год эксплуатации
                                </td>
                                <td> Общая площадь
                                </td>
                                <td> Тип проекта
                                </td>
                            </tr>
                            </thead>';
                    }
                        $context .= '
                        <tr>
                            <td><a class="nav-link-a" href=checkIn_black.php?house_id='.$product["id"].'&type=house&id='.$Arr["id"].'&role_id=2>'.$product["address"].'</a>
                            </td>
                            <td>'.$product["exploitation_start_year"].'
                            </td>
                            <td>'.$product["area_land"].'
                            </td>
                            <td>'.$product["project_type"].'
                            </td>
                        </tr>
                        ';
                    
                
                }
                $context .= '</table>';
            }
            
            echo $context;

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