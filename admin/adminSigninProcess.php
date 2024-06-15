<?php
session_start();
require "../connection.php";

$ars = Database::search("SELECT * FROM `admin` ");
$adata = $ars->fetch_assoc();


$email = $_POST["em"];
$password = $_POST["pw"];
$otp = $_POST["otp"];

if ($email != $adata["email"] || $password != $adata["password"]) {
    echo("Incorrect Email or Password");
}else if ($otp == ""){
    echo("Please Enter Your OTP");

}else if ($otp != $adata["otp"]){
    echo("Incorrect OTP.. Please Enter Correct OTP");

}else {
    echo("ok");
    $_SESSION["admin"] = $adata; 
}



?>