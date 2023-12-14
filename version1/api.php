<?php
include 'connection.php';
class WhatsappSender
{
    public function sendWhatsappMessage($receiverNumber, $message,$url)
    {
        $params=array(
            'token' => '9nxeygnp69xrpen0',
            'to' => $receiverNumber,
            'image' => $url,
            'caption' => $message
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance70745/messages/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }


    }
}
$whatsappSender = new WhatsappSender();

// $sql = "Select photo_dwa from dwa where id_dwa=20";
// $q= mysqli_query($con,$sql);
// while ($row=mysqli_fetch_assoc($q)){
//     $url= $row['photo_dwa'];
//     $image='https://meskwhatss.com//manager/'. $url;
//     $message="HEllo Bibo";
//     $receiverNumber = '201024214263';
//     echo $image;
//     $whatsappSender->sendWhatsappMessage($receiverNumber,$message,$image);

// }
// Example usage:

//$receiverNumber = '201024214263'; // Replace with the actual receiver number
//$message = 'Example message';
//$imageUrl = 'https://meskwhatss.com/manager/uploads/s2.jpg'; // Provide the correct URL to the image file
//
//$whatsappSender->sendWhatsappMessage($receiverNumber, $message, $imageUrl);
?>
