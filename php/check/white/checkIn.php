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

    $result4 = mysqli_query($mysql, "SELECT * FROM user WHERE
    login='".$_POST["login"]."' AND
    password='".md5($_POST["password"])."' AND
    role_id = 2
    ");


    if(!$result3 || mysqli_num_rows($result3) == 0){
        if(mysqli_num_rows($result4) != 0){
            if(!isset($_GET['session_user'])){
                $Arr = mysqli_fetch_assoc($result2);
                $_SESSION["user"] = $Arr['login'];
                $session_user_login = $_SESSION["user"];
            }
            else{
                $session_user_login = $_GET['session_user'];
            }
            include("../../vip/white/signed.php");
        }else{
            if(!isset($_GET['session_user'])){
                $Arr = mysqli_fetch_assoc($result2);
                $_SESSION["user"] = $Arr['login'];
                $session_user_login = $_SESSION["user"];
            }
            else{
                $session_user_login = $_GET['session_user'];
            }
            include("../../user/white/signed.php");
        }   
    }

    

    if(mysqli_num_rows($result3) != 0){
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
            if($Arr["role_id"] == 1){
                include("../../user/white/search.php");
            }  
            if($Arr["role_id"] == 2){
                include("../../vip/white/search.php");
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
            $is_published = $_GET['is_published'];
            $feedback_id = $_GET["feedback_id"];
            if ($is_published == NULL){
                include("../../admin/white/new_feedback_all.php");
            }else{
                if ($is_published == 1){
                    $mysql->query("UPDATE feedback SET is_checked = 1, is_published = 1 WHERE feedback.id = $feedback_id");
                    include("../../admin/white/new_feedback_all.php");
                }
                if ($is_published == 0){
                        $mysql->query("UPDATE feedback SET is_checked = 1 WHERE feedback.id = $feedback_id");
                        include("../../admin/white/new_feedback_all.php");
                    }
            }
        }
        if ($type == "old_feedback_all"){
            $is_published = $_GET['is_published'];
            $feedback_id = $_GET["feedback_id"];
            if ($is_published == NULL){
                include("../../admin/white/old_feedback_all.php");
            }else{
                if ($is_published == 1){
                    $mysql->query("UPDATE feedback SET is_published = 1 WHERE feedback.id = $feedback_id");
                    include("../../admin/white/old_feedback_all.php");
                }
                if ($is_published == 0){
                        $mysql->query("UPDATE feedback SET is_published = 0 WHERE feedback.id = $feedback_id");
                        include("../../admin/white/old_feedback_all.php");
                    }
            }
        }
        if ($type == "new_feedback"){
            $feedback_id = $_GET["feedback_id"];
            include("../../admin/white/new_feedback.php");
        }
        if ($type == "old_feedback"){
            $feedback_id = $_GET["feedback_id"];
            include("../../admin/white/old_feedback.php");
        }


        if($type == "feedback_before_all"){
            $feedback_id = $_GET["feedback_id"];
            $delete = $_GET["delete"];
            if ($delete == NULL){
                include("../../vip/white/feedback_before_all.php");
            }else{
                if ($delete == 1){
                    $mysql->query("DELETE FROM `feedback` WHERE `feedback`.`id` = $feedback_id");
                    include("../../vip/white/feedback_before_all.php");
                }
                if ($delete == 0){
                    if(!empty($_POST)){
                        $text = $_POST["text"];
                        $rating = $_POST["rating"];

                        
                        $mysql->query("UPDATE `feedback` SET `text` = '$text', `rating` = '$rating' WHERE `feedback`.`id` = $feedback_id");
                        include("../../vip/white/feedback_before_all.php");
                    }
                }
            }
            
        }
        if($type == "feedback_before"){
            $feedback_id = $_GET["feedback_id"];
            include("../../vip/white/feedback_before.php");
        }


    }else{
        if($Arr["role_id"] == 3){
            include("../../admin/white/signed.php");
        }
        if($Arr["role_id"] == 1){
            include("../../user/white/signed.php");
        }
        if($Arr["role_id"] == 2){
            include("../../vip/white/signed.php");
        }
    }
}
?>