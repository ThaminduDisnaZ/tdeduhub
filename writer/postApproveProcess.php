<?php
require "../connection.php";

$pid = $_POST["pid"];


$prs = Database::search("SELECT * FROM `post` WHERE `post_id` = '".$pid."' ");
$pdata = $prs->fetch_assoc();


if ($pdata["post_status_id"] != 1 ) {
    echo ("ok");

    Database::iud(" UPDATE `post` SET `post_status_id` = '1' WHERE `post_id` = '".$pid."' ");

    $wrs = Database::search("SELECT * FROM `writer` WHERE `writer_id` = '".$pdata["writer_id"]."' ");
$wdata = $wrs->fetch_assoc();

$email = $wdata["email"];
$subject = 'Your Post "'.$pdata["title"].'" Has Been Approved on TD EDU HUB!';
$body = '
<figure class="table">
    <table style="border:5px dashed hsl(0, 0%, 30%);">
        <tbody>
            <tr>
                <td style="background-color:hsl(0, 0%, 90%);">
                    <h1 style="text-align:center;"><img class="image_resized" style="aspect-ratio:448/198;width:61.07%;" src="https://telegra.ph/file/8be03fba8a8c276aa10e1.png" width="448" height="198"></h1>
                    <h4>Dear '.$wdata["name"].',</h4>
                    <p>&nbsp;</p>
                    <p>Exciting news! Your recent post has been reviewed and approved by our admin team. It’s now live for the entire TD EDU HUB community to enjoy and engage with.</p>
                    <hr>
                    <p>We truly appreciate your effort and creativity in contributing such valuable content. Your insights help make TD EDU HUB a vibrant and enlightening place for all our members.</p>
                    <hr>
                    <p>Feel free to share your post with your network and keep an eye out for comments and feedback from our community. If you have any questions or need further assistance, don’t hesitate to reach out to us at <a rel="noreferrer">thamindudisna.se@gmail.com</a>.</p>
                    <hr>
                    <p>Thank you for being a vital part of TD EDU HUB. We can’t wait to see more of your inspiring work!</p>
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

Exciting news! Your recent post has been reviewed and approved by our admin team. It’s now live for the entire TD EDU HUB community to enjoy and engage with.

We truly appreciate your effort and creativity in contributing such valuable content. Your insights help make TD EDU HUB a vibrant and enlightening place for all our members.

Feel free to share your post with your network and keep an eye out for comments and feedback from our community. If you have any questions or need further assistance, don’t hesitate to reach out to us at support@tdeduhub.com.

Thank you for being a vital part of TD EDU HUB. We can’t wait to see more of your inspiring work!

Best regards,
';



require "./mailler.php";
require "./whatsapp.php";



} else {
    echo("Already Approved Post");
}









?>