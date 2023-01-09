<?php
include "db.php";

if(!empty($_POST)){
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

    include("signed.php");
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

    include("signed.php");
}
?>