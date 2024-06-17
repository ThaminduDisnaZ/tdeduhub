<?php

require "../connection.php";

$cid = $_POST["cid"];


$prs = Database::search("SELECT * FROM `post` WHERE `category_id` = '".$cid."' ");
$pnum = $prs->num_rows;

$crs = Database::search("SELECT * FROM `category`  WHERE `category_id` = '".$cid."'  ");
$cdata = $crs->fetch_assoc();


if($cdata["category_status_id"] == 1){
    echo("Caregory is Already Active");

}else {
    echo("Category Activated Successfull");
    Database::iud("UPDATE `category` SET `category_status_id` = '1' WHERE `category_id` = '".$cid."'");
}


?>