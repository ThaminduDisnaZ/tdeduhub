<?php
require "../connection.php";

$pid = $_POST["pid"];
$content = $_POST["content"];
$title = $_POST["title"];
$summery = $_POST["summery"]; 
$cat = $_POST["cat"];
$allowed_img_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

$prs = Database::search("SELECT * FROM `post` WHERE `post_id` = '" . $pid . "' ");
$pdata = $prs->fetch_assoc();






if (isset($_FILES['image'])) {
    $img_file = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if (in_array($file_type, $allowed_img_extensions)) {
        $new_img_extension = '';

        if ($file_type == "image/jpg") {
            $new_img_extension = ".jpg";
        } elseif ($file_type == "image/jpeg") {
            $new_img_extension = ".jpeg";
        } elseif ($file_type == "image/png") {
            $new_img_extension = ".png";
        } elseif ($file_type == "image/svg+xml") {
            $new_img_extension = ".svg";
        }

        $file_name = "/resources/post_images/" . $title . "_" . uniqid() . $new_img_extension;
        move_uploaded_file($tmp_name, ".." . $file_name);



        if ( $file_name != $pdata["image"] ) {
            echo "ok";
        } else {
        
            echo "Not Changes";
        }
        


        Database::iud("UPDATE `post` SET `image` = '" . $file_name . "', `content` = '" . $content . "', `title` = '" . $title . "', `summery` = '" . $summery . "', `category_id` = '" . $cat . "' WHERE `post_id` = '" . $pid . "'");
    } else {
        echo "File type not allowed: " . $file_type . "\n";
    }
} else {


    if ($title != $pdata["title"] || $summery != $pdata["summery"] || $cat != $pdata["category_id"] || $content != $pdata["content"] ) {
        echo "ok";
    } else {
    
        echo "Not Changes";
    }
    



    Database::iud("UPDATE `post` SET `content` = '" . $content . "', `title` = '" . $title . "', `summery` = '" . $summery . "', `category_id` = '" . $cat . "' WHERE `post_id` = '" . $pid . "'");
}

