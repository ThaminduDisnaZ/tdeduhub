<?php
require "../connection.php";


$uid = $_POST["uid"];

$urs = Database::search("SELECT * FROM `user` WHERE `user_id` = '".$uid."' ");

$ud = $urs->fetch_assoc();


if ($ud["user_status_id"] == 1 ) {
    Database::iud(" UPDATE `user` SET `user_status_id` = '2' ");
    echo("d");

    $subject = "Access Restricted on TD EDU HUB";
    $body = '
    <center>
    <figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:85.6%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$ud["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>We regret to inform you that your access to TD EDU HUB has been temporarily restricted by our administrative team. This decision was made to ensure a safe and productive environment for all our members.</p>
                    <hr>
                    <p>If you believe this was a mistake or if you have any questions, please contact our support team at <a rel="noreferrer">thamindudisna.se@gmail.com</a>. We are here to help resolve any issues and appreciate your understanding and cooperation.</p>
                    <hr>
                    <p>Thank you for being a part of the TD EDU HUB community.</p>
                    <p>Best regards,<br>The TD EDU HUB Team</p>
                    <p>&nbsp;</p>
                    <p style="text-align:center;">&nbsp;</p>
                    <p style="text-align:center;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
    </center>
    ';
    

}else if ($ud["user_status_id"] == 2 ) {
    Database::iud(" UPDATE `user` SET `user_status_id` = '1' ");
    echo("a");

    $subject = "Welcome Back to TD EDU HUB!";
    $body = '
    <center>
    <figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:85.6%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$ud["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>Great news! Your access to TD EDU HUB has been restored by our administrative team. We are thrilled to welcome you back to our vibrant learning community.</p>
                    <hr>
                    <p>We appreciate your patience and understanding. If you have any questions or need further assistance, please do not hesitate to reach out to us at thamindudisna.se@gmail.com.</p>
                    <hr>
                    <p>Thank you for being a valued member of TD EDU HUB. We look forward to your continued participation and contributions.</p>
                    <p>&nbsp;</p>
                    <p>Best regards,<br>The TD EDU HUB Team</p>
                    <p>&nbsp;</p>
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
    


}



$email = $ud["email"];



require "./mailler.php";


?>