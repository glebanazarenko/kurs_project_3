<?php
include $_SERVER["DOCUMENT_ROOT"]."/курсач/php/db.php";

if(!empty($_POST) && ($_POST['address'] != "" || !isset($_POST['address']))){
    $result1 = mysqli_query($mysql, "SELECT * FROM user WHERE
    login='".$_POST["login"]."'
    ");

    $result2 = mysqli_query($mysql, "SELECT * FROM user WHERE
    login='".$_POST["login"]."' AND
    password='".md5($_POST["password"])."'
    ");

    if(!$result1 || mysqli_num_rows($result1) == 0){
        echo "Пользователя с таким логином не существует.";
        exit;
    }

    if(!$result2 || mysqli_num_rows($result2) == 0){
        echo "Неправильный пароль.";
        exit;
    }

    if(!isset($_GET['session_user'])){
        $Arr = mysqli_fetch_assoc($result2);
        $_SESSION["user"] = $Arr['login'];
        $session_user_login = $_SESSION["user"];
    }
    else{
        $session_user_login = $_GET['session_user'];
    }

    include("../../user/black/signed_black.php");
}

if(!empty($_GET)){
    $result1 = mysqli_query($mysql, "SELECT * FROM user WHERE
    id='".$_GET["id"]."'
    ");

    if(!isset($_GET['session_user'])){
        $Arr = mysqli_fetch_assoc($result1);
        $_SESSION["user"] = $Arr['login'];
        $session_user_login = $_SESSION["user"];
    }
    else{
        $session_user_login = $_GET['session_user'];
    }

    $type = $_GET['type'];
    if($type != ""){
        if ($type == "search"){
            include("../../user/black/search_black.php");
        }
        if ($type == "house"){
            $house_id = $_GET["house_id"];
            include("../../user/black/house_black.php");
        }
    }else{
        include("../../user/black/signed_black.php");
    }
}
?> 