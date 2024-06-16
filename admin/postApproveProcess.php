<?php
require "../connection.php";

$pid = $_POST["pid"];


$prs = Database::search("SELECT * FROM `post` WHERE `post_id` = '".$pid."' ");
$pdata = $prs->fetch_assoc();


if ($pdata["post_status_id"] != 1 ) {
    echo ("ok");

    Database::iud(" UPDATE `post` SET `post_status_id` = '1' WHERE `post_id` = '".$pid."' ");

} else {
    echo("Already Approved Post");
}


$wrs = Database::search("SELECT * FROM `writer` WHERE `writer_id` = '".$pdata["writer_id"]."' ");
$wdata = $wrs->fetch_assoc();





require "./mailler.php";


?>