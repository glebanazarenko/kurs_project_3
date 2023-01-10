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
                        <li class="nav-item">
                            <a class="nav-link-a" href="/курсач/php/visitor/black/signUp_black.php">Темная тема</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="services.html">Поиск</a>
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
            <h6 class="bg-white text-dark fs-2 container text-center">Регистрация</h6>
        <!-- end hero -->        

        <section class="container text-center">
            <form action="../../check/white/check.php" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Ник пользователя</span>
                    <input type="text" name="name" class="form-control" placeholder="Глеб" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Логин</span>
                    <input type="text" name="login" class="form-control" placeholder="qwerty" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Пароль</span>
                    <input type="password" name="password" class="form-control" placeholder="********" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип газа в доме</label>
                    <select name="gas" class="form-select" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1">Без разницы</option>
                        <option value="2">Автономное</option>
                        <option value="3">Центральное</option>
                        <option value="4">Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип вентиляции в доме</label>
                    <select name="ventilation" class="form-select" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1">Без разницы</option>
                        <option value="2">Вытяжная вентиляция</option>
                        <option value="3">Приточная вентиляция</option>
                        <option value="4">Приточно-вытяжная вентиляция</option>
                        <option value="5">Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип отопления в доме</label>
                    <select name="heating" class="form-select" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1">Без разницы</option>
                        <option value="2">Автономная котельная</option>
                        <option value="3">Индивидуальный тепловой пункт (ИТП)</option>
                        <option value="4">Квартирное отопление (квартирный котел)</option>
                        <option value="5">Центральное</option>
                        <option value="6">Печное</option>
                        <option value="7">Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип мусоропровода в доме</label>
                    <select name="chute" class="form-select" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1">Без разницы</option>
                        <option value="2">Cухой</option>
                        <option value="3">Cухой (холодный)</option>
                        <option value="4">Квартирные</option>
                        <option value="5">На лестничной клетке</option>
                        <option value="6">Отсутствует</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Площадь парковки (от скольки хотите)</span>
                    <input type="text" name="parking" class="form-control" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Количество лифтов (от скольки хотите)</span>
                    <input type="text" name="elevator" class="form-control" placeholder="123456789" aria-label="Username" aria-describedby="basic-addon1">
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Тип дома</label>
                    <select name="house_type" class="form-select" id="inputGroupSelect01">
                        <option selected>Выберите</option>
                        <option value="1">Без разницы</option>
                        <option value="2">Жилой дом блокированной застройки</option>
                        <option value="3">Многоквартирный дом</option>
                        <option value="4">Специализированный жилищный фонд</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Подтвердить</button>

            </form>
        </section>

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


        <?php
        include "footer.php";
        ?>

    </body>
</html>