<?php

require "../connection.php";

$name = $_POST["name"];
$des = $_POST["des"];


$crs = Database::search("SELECT * FROM `category` ");
$cdata = $crs->fetch_assoc();

if($name == ""){
    echo("Pleace Enter Category Name");
}else if ($des == "") {
    echo("Pleace Enter Category Description");
}else if ($name == $cdata["category"]) {
    echo("This Caregory is Already Exisiting");
} else {
    echo("Caregory is Added Successfull");
    Database::iud("INSERT INTO `category` (`category`,`description`,`category_status_id`) VALUES ('".$name."','".$des."','1') ");
}
?>