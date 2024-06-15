<?php
require "../connection.php";


$wid = $_POST["wid"];

$wrs = Database::search("SELECT * FROM `writer` WHERE `writer_id` = '".$wid."' ");

$wd = $wrs->fetch_assoc();


if ($wd["writer_status_id"] == 1 ) {
    Database::iud(" UPDATE `writer` SET `writer_status_id` = '2' ");
    echo("d");

    $subject = "Important Notice: Posting Privileges Suspended on TD EDU HUB";
    $body = '
    <center>
    <figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:61.07%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$wd["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>We hope this message finds you well. We regret to inform you that your posting privileges on TD EDU HUB have been temporarily suspended by our administrative team.</p>
                    <hr>
                    <p>This decision was made to ensure that our community guidelines are upheld and to maintain a positive and productive environment for all members. We understand this may be disappointing news, and we want to assure you that this measure is temporary.</p>
                    <hr>
                    <p>If you have any questions or believe this action was taken in error, please contact our support team at <a rel="noreferrer">thamindudisna.se@gmail.com</a>. We are here to listen and help resolve any issues.</p>
                    <hr>
                    <p>Thank you for your understanding and for being a part of TD EDU HUB.</p>
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

    $message = 'Dear '.$wd["name"].',

We hope this message finds you well. We regret to inform you that your posting privileges on TD EDU HUB have been temporarily suspended by our administrative team.

This decision was made to ensure that our community guidelines are upheld and to maintain a positive and productive environment for all members. We understand this may be disappointing news, and we want to assure you that this measure is temporary.

If you have any questions or believe this action was taken in error, please contact our support team at thamindudisna.se@gmail.com. We are here to listen and help resolve any issues.

Thank you for your understanding and for being a part of TD EDU HUB.

Best regards,
The ';
    

}else if ($wd["writer_status_id"] == 2 ) {
    Database::iud(" UPDATE `writer` SET `writer_status_id` = '1' ");
    echo("a");

    $subject = "Your Posting Privileges Have Been Restored on TD EDU HUB!";
    $body = '
    <center>
    <figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:61.07%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$wd["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>Great news! Your posting privileges on TD EDU HUB have been reinstated by our administrative team. We are excited to welcome your contributions back to our community.</p>
                    <hr>
                    <p>Your insights and creativity are highly valued, and we are thrilled to see you back in action. If you have any questions or need support, please feel free to reach out to us at thamindudisna.se@gmail.com.</p>
                    <hr>
                    <p>Thank you for your patience and understanding. We look forward to your continued involvement and the fantastic content you will share.</p>
                    <hr>
                    <p>Welcome back to the TD EDU HUB family!</p>
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
    
    $message = 'Dear '.$wd["name"].',

Great news! Your posting privileges on TD EDU HUB have been reinstated by our administrative team. We are excited to welcome your contributions back to our community.

Your insights and creativity are highly valued, and we are thrilled to see you back in action. If you have any questions or need support, please feel free to reach out to us at thamindudisna.se@gmail.com.

Thank you for your patience and understanding. We look forward to your continued involvement and the fantastic content you will share.

Welcome back to the TD EDU HUB family!

Best regards,
The ';

}

$mobile = $wd["mobile"];

$email = $wd["email"];



require "./mailler.php";
require "./whatsapp.php";


?>