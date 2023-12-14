<?php
include('connection.php');
include "api.php";
$SenderMessage = new WhatsappSender();
date_default_timezone_set('Africa/Cairo');

// while (true) {
$query = "SELECT c.id_client, c.nom_client, c.num_client, t.id_dwa, t.hours, t.id_trt, t.days, t.start_date, t.end_date, d.nom_dwa,d.photo_dwa ,  f.text_form, m.fin_txt
FROM client c
JOIN trt t ON c.id_client = t.id_client
JOIN dwa d ON t.id_dwa = d.id_dwa
JOIN form f ON c.id_user = f.id_user
JOIN fin_form m ON c.id_user = m.id_user

";

$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_trt = $row['id_trt'];
        $hours = $row['hours'];
        $days = $row['days'];
        $client_phone = $row['num_client'];
        $client_name = $row['nom_client'];
        $name_dwa = $row['nom_dwa'];
        $image= $row['photo_dwa'];
        $ff = $row['text_form'];
        $fm = $row['fin_txt'];
        //   $times=$row['next'];
        $startDate = strtotime($row['start_date']);
        $endDate = strtotime($row['end_date']);
        $currentDate = time();
        $url='https://meskwhatss.com/manager/'.$image;

        if ($startDate >= $endDate) {
            // echo "Final message should be sent";
            $fm = str_replace("بالعميل", $client_name, $fm);
            $SenderMessage ->sendWhatsappMessage($client_phone,$fm,$url);

            //  $sql2 = "DELETE FROM `trt` WHERE `trt`.`id_trt` = $id_trt";
            //   $res2 = mysqli_query($con, $sql2);
        } else if ($currentDate < $endDate) {

            $nexttime = $startDate + $hours * 3600;
            if ($currentDate >= ($nexttime - 3600) && $currentDate <= ($nexttime + 3600)) {
                $next = date("Y-m-d H:i:s", $nexttime);
                $sql1 = "UPDATE `trt` SET `start_date` = '$next' WHERE `trt`.`id_trt` = $id_trt";
                $res1 = mysqli_query($con, $sql1);

                if ($res1) {
                    $ff = str_replace("اسم_العميل", $client_name, $ff);
                    $ff = str_replace("رقم_العميل", $client_phone, $ff);
                    $ff = str_replace("عدد_الايام", $days, $ff);
                    $ff = str_replace("عدد_الساعات", $hours, $ff);
                    $ff = str_replace("الدواء", $name_dwa, $ff);

                    $hdr = " تذكير من الصيدلية ";
                    $body = $hdr . "  " . $ff;

                    echo  $url;
                    echo "<br>";
                    echo $client_phone.' '. $body,
                    $x=  sendWhatsappMessage($client_phone, $body,$url);
                    if($x){
                        echo "Message was Sent";
                    }
                    else{
                        echo"Some thing error";
                    }
                    echo "<br>";
                    echo "Current Date: " . date("Y-m-d H:i:s", $currentDate);
                    echo "<br>";
                    echo "Next Start Date: " . $next;
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "No action needed";
                echo "<br>";
                echo "Current Date: " . date("Y-m-d H:i:s", $currentDate);
                echo "<br>";
                echo "Next Date: " . date("Y-m-d H:i:s", $nexttime);
                echo "<br>";
            }
        }
    }
    echo '<meta http-equiv="refresh" content="10">'; // Auto-refresh every 5 seconds
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
