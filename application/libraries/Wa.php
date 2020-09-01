<?php
class Wa
{

    function kirim($phone, $message)
    {
        // kadang ada penulisan no hp 0811 239 345
        $phone = str_replace(" ", "", $phone);
        $phone = str_replace("+", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace("(", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace(")", "", $phone);
        // kadang ada penulisan no hp 0811.239.345
        $phone = str_replace(".", "", $phone);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($phone))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($phone), 0, 2) == '62') {
                $hp = trim($phone);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($phone), 0, 1) == '0') {
                $hp = '62' . substr(trim($phone), 1);
            }
        }
        $data = [
            'phone' => $hp, // Receivers phone
            'body' => $message, // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://api.chat-api.com/instance166891/sendMessage?token=hsw5obo19qjyw1sa';
        // Make a POST request
        $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
        ]]);
        // Send a request
        $result = file_get_contents($url, false, $options);
        $hasil = (array)json_decode($result);
        if ($hasil) {
            return true;
        } else {
            return false;
        }
    }
}
