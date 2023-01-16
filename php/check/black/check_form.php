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
    
    $result1 = mysqli_query($mysql, "SELECT * FROM user as u WHERE u.id=".$user_id."");
    $Arr = mysqli_fetch_assoc($result1);
    $role_id = $Arr["role_id"];


    $result = mysqli_query($mysql, "SELECT * FROM feedback WHERE user_id=\"".$user_id."\" AND house_id=\"".$house_id."\"");

    if(mysqli_num_rows($result) == 0 && $text != ""){
        /*mysqli_query($mysql, "INSERT INTO feedback (id, user_id, house_id, text, rating, is_checked, is_published) VALUES (
            NULL, 
            \"".$user_id."\",
            \"".$house_id."\",
            \"".$text."\",
            \"".$rating."\",
            \"0\",
            \"0\"
            )"
        );
        */

        

        $new_url = 'checkIn_black.php?house_id='.$house_id.'&type=house&id='.$user_id.'&role_id='.$role_id.'';
        header('Location: '.$new_url);
        
    }else{
        if($text != ""){
            Echo '
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

                <body class="Site bg-dark text-white">
                    <main class="Site-content text-center">
                    <br>
                    <br>
                    <br>
                        <h3>Вы уже добавили отзыв об этом доме.</h3>
                        <br>
                        <a class="btn btn-light" href="checkIn_black.php?house_id='.$house_id.'&type=house&id='.$user_id.'&role_id='.$role_id.'" role="button">Назад</a>
                    </main>
                </body>
            </html>
            ';
        }
        else{
            Echo '
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

                <body class="Site bg-dark text-white">
                    <main class="Site-content text-center">
                    <br>
                    <br>
                    <br>
                        <h3>Заполните тект отзыва. Если хотите поставить 0 звезд, то просто не нажимайте на звезды.</h3>
                        <br>
                        <a class="btn btn-light" href="checkIn_black.php?house_id='.$house_id.'&type=house&id='.$user_id.'&role_id='.$role_id.'" role="button">Назад</a>
                    </main>
                </body>
            </html>
            ';
        }
    }

    
}

/*
один челик на один дом может оставить лишь один рейтинг
если ничего не набрать в тексте, то сообщение не приходит*/

?>

