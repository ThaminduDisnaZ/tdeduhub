<?php
session_start();
require "../connection.php";

$wrs = Database::search("SELECT * FROM `writer` ");
$wdata = $wrs->fetch_assoc();


$email = $_POST["em"];
$password = $_POST["pw"];


if ($email != $wdata["email"] || $password != $wdata["password"]) {
    echo("Incorrect Email or Password");
}else {
    echo("ok");
    $_SESSION["writer"] = $wdata; 
}



?>