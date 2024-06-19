<?php

require "../connection.php";

$cid = $_POST["cid"];

echo($cid);

$crs = Database::search("SELECT * FROM `comment` WHERE `comment_id` = '".$cid."' ");
$cdata = $crs->fetch_assoc();



if ($cdata["comment_status_id"] == 2) {
   echo ("Already Delete Comment");
} else {
    echo ("Comment Deleted Successfull");
    Database::iud("UPDATE `comment` SET `comment_status_id` = '2'  WHERE `comment_id` = '".$cid."' ");
}





?>