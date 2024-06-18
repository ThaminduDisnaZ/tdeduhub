<?php
require "../connection.php";

$pid = $_POST["pid"];

$prs = Database::search("SELECT * FROM `post` WHERE `post_id` = '".$pid."' ");
$pdata = $prs->fetch_assoc();

if ($pdata["post_status_id"] != 2 ) { 
    echo ("ok");

    Database::iud(" UPDATE `post` SET `post_status_id` = '2' WHERE `post_id` = '".$pid."' ");

    $wrs = Database::search("SELECT * FROM `writer` WHERE `writer_id` = '".$pdata["writer_id"]."' ");
    $wdata = $wrs->fetch_assoc();

    $email = $wdata["email"];
    $subject = 'Your Post "'.$pdata["title"].'" Has Been Disapproved on TD EDU HUB';
    $body = '
<figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:61.07%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$wdata["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>We regret to inform you that your recent post titled "'.$pdata["title"].'" has been reviewed and disapproved by our admin team.</p>
                    <hr>
                    <p>While we appreciate your effort in contributing to TD EDU HUB, we found that the content did not meet our community guidelines and standards.</p>
                    <hr>
                    <p>If you have any questions or need further clarification, please feel free to reach out to us at <a rel="noreferrer">thamindudisna.se@gmail.com</a>. We are here to help and support you in improving your future submissions.</p>
                    <hr>
                    <p>Thank you for your understanding and for being a part of TD EDU HUB. We look forward to your continued contributions.</p>
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
';

    $mobile = $wdata["mobile"];

    $message = '
Dear '.$wdata["name"].',

We regret to inform you that your recent post titled "'.$pdata["title"].'" has been reviewed and disapproved by our admin team.

While we appreciate your effort in contributing to TD EDU HUB, we found that the content did not meet our community guidelines and standards.

If you have any questions or need further clarification, please feel free to reach out to us at support@tdeduhub.com. We are here to help and support you in improving your future submissions.

Thank you for your understanding and for being a part of TD EDU HUB. We look forward to your continued contributions.

Best regards,
The TD EDU HUB Team
';

    require "./mailler.php";
    require "./whatsapp.php";

} else {
    echo("Already Disapproved Post");
}
?>
