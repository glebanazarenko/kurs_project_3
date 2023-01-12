<?php
include $_SERVER["DOCUMENT_ROOT"]."/курсач/php/db.php";

if(isset($_POST['login'])){

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

    $result3 = mysqli_query($mysql, "SELECT * FROM user WHERE
    login='".$_POST["login"]."' AND
    password='".md5($_POST["password"])."' AND
    role_id = 3
    ");

    if(!$result3 || mysqli_num_rows($result3) == 0){
        if(!isset($_GET['session_user'])){
            $Arr = mysqli_fetch_assoc($result2);
            $_SESSION["user"] = $Arr['login'];
            $session_user_login = $_SESSION["user"];
        }
        else{
            $session_user_login = $_GET['session_user'];
        }
        include("../../user/white/signed.php");
    }else{
        if(!isset($_GET['session_user'])){
            $Arr = mysqli_fetch_assoc($result3);
            $_SESSION["user"] = $Arr['login'];
            $session_user_login = $_SESSION["user"];
        }
        else{
            $session_user_login = $_GET['session_user'];
        }
        include("../../admin/white/signed.php");
    }
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
            if($Arr["role_id"] == 3){
                include("../../admin/white/search.php");
            }
            else{
                include("../../user/white/search.php");
            }  
        }
        if ($type == "house"){
            $house_id = $_GET["house_id"];

            $role_id = $_GET['role_id'];
            echo $role_id;
            if($role_id == 3){
                include("../../admin/white/house.php");
            }else{
                include("../../user/white/house.php");
            }
        }
        if ($type == "new_feedback_all"){
            include("../../admin/white/new_feedback_all.php");
        }
        if ($type == "old_feedback_all"){
            include("../../admin/white/old_feedback_all.php");
        }
        if ($type == "new_feedback"){
            $feedback_id = $_GET["feedback_id"];
            include("../../admin/white/new_feedback.php");
        }
        if ($type == "old_feedback"){
            $feedback_id = $_GET["feedback_id"];
            include("../../admin/white/old_feedback.php");
        }
    }else{
        if($Arr["role_id"] == 3){
            include("../../admin/white/signed.php");
        }
        else{
            include("../../user/white/signed.php");
        }
    }
}
?>