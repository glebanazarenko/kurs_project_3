<?php
include $_SERVER["DOCUMENT_ROOT"]."/курсач/php/db.php";

if(!empty($_POST)){
    $house_id = $_POST["house_id"];
    $user_id = $_POST["user_id"];
    $text = $_POST["text"];
    if ($_POST["rating"] == ""){
        $rating = 0;
    }else{
        $rating = $_POST["rating"];
    }   

    $result = mysqli_query($mysql, "SELECT * FROM feedback WHERE user_id=\"".$user_id."\" AND house_id=\"".$house_id."\"");

    if(mysqli_num_rows($result) == 0 && $text != ""){
        mysqli_query($mysql, "INSERT INTO feedback (id, user_id, house_id, text, rating, is_checked, is_published) VALUES (
            NULL, 
            \"".$user_id."\",
            \"".$house_id."\",
            \"".$text."\",
            \"".$rating."\",
            \"0\",
            \"0\"
            )"
        );
        $new_url = 'checkIn_black.php?house_id='.$house_id.'&type=house&id='.$user_id.'';
        header('Location: '.$new_url);
    }else{
        if($text != ""){
            Echo 'Вы уже добавили отзыв об этом доме.';
        }
        else{
            Echo 'Заполните тект отзыва. Если хотите поставить 0 звезд, то просто не нажимайте на звезды.';
        }
    }

    
}

/*
один челик на один дом может оставить лишь один рейтинг
если ничего не набрать в тексте, то сообщение не приходит*/

?>

