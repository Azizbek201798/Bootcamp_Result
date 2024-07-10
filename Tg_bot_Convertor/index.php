<?php

    declare(strict_types=1);
    require 'vendor/autoload.php';
    
    use GuzzleHttp\Client;
    
    $token = "7284381414:AAHv-6aSoVU2c98Z3MQug0WuEotG_qPt75o";
    $tgApi = "https://api.telegram.org/bot$token/";
    
    $client = new Client(['base_uri' => $tgApi,]);
    $currency = new Client(['base_uri' => 'https://cbu.uz/oz/arkhiv-kursov-valyut/json/']);

    $update = json_decode(file_get_contents('php://input'));
    var_dump($update);

    if (isset($update)){
        if(isset($update->message)){

            $message = $update->message;
            $chat_id = $message->chat_id;
            $miid =$message->message_id;
            $name = $message->from->first_name;
            $fromid = $message->from->id;
            $text = $message->text;
            
            $exp = explode('-',$text);
            
            $client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chat_id,
                'text' => "data: " . json_encode($exp)
            ]
            ]);

            
            }
    }

?>