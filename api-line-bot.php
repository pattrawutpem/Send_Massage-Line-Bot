<?php
//access token line
$access_token = '';
//channel secret line
$channel_secret = '';

//ข้อความที่รับจากหน้า index
$message = $_POST['message'];

// Prepare the broadcast message
$url = 'https://api.line.me/v2/bot/message/broadcast';

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);

$data = array(
    'messages' => array(
        array(
            'type' => 'text',
            'text' => $message
        )
    )
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$result = curl_exec($ch);

curl_close($ch);

// เช็คผลลัพธ์
if ($result) {
    $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line เรียบร้อยแล้ว!";
    header("location: index.php");
} else {
    $_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
    header("location: index.php");
}

?>