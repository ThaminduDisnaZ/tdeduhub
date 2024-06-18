<?php

require "../connection.php";

$cid = $_POST["cid"];
$name = $_POST["name"];
$des = $_POST["des"];


$crs = Database::search("SELECT * FROM `category` WHERE `category_id` = '".$cid."' ");
$cdata = $crs->fetch_assoc();


if ($cdata["category"] == $name && $cdata["description"] == $des) {
   echo("Not Changes");
}else {
    echo ("Category is Updated Successfull");
    Database::iud("UPDATE `category` SET `category` = '".$name."', `description` = '".$des."' WHERE `category_id` = '".$cid."'");
}

?>