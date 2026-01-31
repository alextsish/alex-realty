<?php

$token = "8298710724:AAFNUZbyMDpglFRLsMW4JWTmkikdrf-wFL0";
$chat_id = "583997045";

$text = "📩 Новая заявка с сайта\n\n";
$text .= "👤 Имя: " . ($_POST['name'] ?? '') . "\n";
$text .= "📞 Телефон: " . ($_POST['phone'] ?? '') . "\n";
$text .= "💬 Мессенджер: " . ($_POST['messenger'] ?? '') . "\n";
$text .= "🧭 Услуга: " . ($_POST['service'] ?? '') . "\n";
$text .= "📝 Описание:\n" . ($_POST['message'] ?? '');

$data = http_build_query([
    'chat_id' => $chat_id,
    'text' => $text
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$token}/sendMessage");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded',
    'User-Agent: Mozilla/5.0'
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
curl_close($ch);

echo "OK";
