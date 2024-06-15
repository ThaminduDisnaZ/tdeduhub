<?php

require "../connection.php";


$uid = uniqid();
$ars = Database::search("SELECT * FROM `admin` ");
$adata = $ars->fetch_assoc();

Database::iud(" UPDATE `admin` SET `otp` = '".$uid."' ");



$email = $adata["email"];
$subject = "Admin Login Verification";
$body = '
<center>
<figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td>
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:85.6%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h1 style="text-align:center;">Admin OTP Verification</h1>
                    <center>
                    <figure class="table" style="width:250px;">
                        <table style="background-color:hsl(0, 0%, 30%);border-style:dashed;border-width:3px;border:3px dashed hsl(0, 75%, 60%);">
                            <tbody>
                                <tr>
                                    <td>
                                        <p style="text-align:center;"><span style="font-size:20px;color:#fafafa;">'.$uid.'</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </figure>
                    </center>
                    <p style="text-align:center;">&nbsp;</p>
                    <p style="text-align:center;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
</figure>
<p>&nbsp;</p>
<h1>&nbsp;</h1>
</center>
';


echo("ok");



require "./mailler.php";



?>