<?php

require "../connection.php";

$cid = $_POST["cid"];


$prs = Database::search("SELECT * FROM `post` WHERE `category_id` = '".$cid."' ");
$pnum = $prs->num_rows;

$crs = Database::search("SELECT * FROM `category`  WHERE `category_id` = '".$cid."'  ");
$cdata = $crs->fetch_assoc();


if ($pnum > 0) {
  echo("This Category is Already Used in Post");
}else if($cdata["category_status_id"] > 1){
    echo("Caregory is Already Deactivated or Admin is not Approve");

}else {
    echo("Category is Deactivated Successfull");
    Database::iud("UPDATE `category` SET `category_status_id` = '2' WHERE `category_id` = '".$cid."'");
}


?>