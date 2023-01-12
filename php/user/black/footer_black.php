<?php

if(!isset($session_user_login)){
    $session_user_login = "Ошибка";
}


$result = mysqli_query($mysql, "SELECT * FROM user WHERE
login='".$session_user_login."'
");
$Arr = mysqli_fetch_assoc($result);
echo'


<!-- start footer -->
<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 border-e-dashed">
                        <a href="">
                            <img src="/курсач/images/NormDomTextFooter.png" alt="" height="70" />
                            <img src="/курсач/images/logo-light.png" alt="" height="16" />
                        </a>
                        <p class="my-4">Дом - это не место, а состояние луши. <br>Дом - это там, где твое сердце.
                        </p>
                    </div><!-- end col -->
                    <div class="col-lg-6 offset-lg-1">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="text-footer mb-4 mt-sm-0 mt-5">Меньше информации</h6>
                                <ul class="list-unstyled footer-list">
                                    <?php

                                    ?>
                                    <li><a href="checkIn_black.php?id='.$Arr["id"].'">Домашняя</a></li>';

                                    ?>
                                    <li><a href="about.html">Обо мне</a></li>
                                    <!--<li><a href="services.html">Серверы</a></li>-->         
                                    
                                </ul>
                            </div><!-- end col -->
                            <div class="col-md-4">
                                <h6 class="text-footer mb-4 mt-sm-0 mt-4">Информация</h6>
                                <ul class="list-unstyled footer-list">
                                    <li><a href="resume.html">Резюме</a></li>
                                    <!--<li><a href="#review">Отзывы</a></li>-->
                                    <!--<li><a href="projects.html">Проекты</a></li>         -->     
                                    <li><a href="services.html">Услуги</a></li>                      
                                    
                                </ul>
                            </div><!-- end col -->
                            <div class="col-md-4">
                                <h6 class="text-footer mb-4 mt-sm-0 mt-4">Больше информации</h6>
                                <ul class="list-unstyled footer-list">
                                    <!--<li><a href="#blogs">Блоги</a></li>-->
                                    <li><a href="contact.php">Контакт</a></li>
                                    <!--<li><a href="#">Правила и условия</a></li>-->
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
            <!-- end container -->


        <!-- start footer alter -->
        <div class="footer-alt">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 white">
                        <p> &copy; <script>
                            document.write(new Date().getFullYear())
                        </script> НормДом. Следано с Любовью</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <ul class="list-inline mb-0 white">
                            <a href="#">Наверх<sup class="text-danger">*</sup></a>
                        </ul>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end footer alter -->

</footer>
<!-- end footer -->