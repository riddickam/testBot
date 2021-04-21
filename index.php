<?php

// $BOT_TOKEN = "1787672753:AAHgbD1VYtlO49DpAPQIi2mgoO6hjLnhabs";
// 
// $parameters = array(
//   "chat_id" => 1787672753,
//   "text"    => "Ciao, utente"
// );
// 
// send("sendMessage", $parameters);
// function send($method, $data){
//   global $BOT_TOKEN;
//   $url = "https://api.telegram.org/bot$BOT_TOKEN/$method";
// 
//   if(!$curl = curl_init()){
//     exit;
//   }
//   curl_setopt($curld, CURLOPT_POST, true);
//   curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
//   curl_setopt($curld, CURLOPT_URL, $url);
//   curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
//   $output = curl_exec($curld);
//   curl_close($curld);
//   return $output;
// }

echo "Ciao";

$botToken = '1787672753:AAHgbD1VYtlO49DpAPQIi2mgoO6hjLnhabs';
$website = 'https://api.telegram.org/bot'.$botToken;

//Salva l'update mandato da Telegram in un JSON e in una variabile
$update = file_get_contents('php://input');

//Codifica IL JSON in Array
$update = json_decode($update, TRUE);

//Prendiamo ID con 'from' quindi da user, chat se è una chat
$chatID = $update['message']['from']['id'];

//Prendiamo il testo con 'from' quindi da user, 'chat' se è una chat
$text = $update['message']['text'];

// $agg = json_encode($update,JSON_PRETTY_PRINT);


switch($text)
{
  case '/start':
    sendMessage($chatID, "Benvenuto in questo Bot");
    break;
  default:
    sendMessage($chatID, "Ciao, come va?");
    break;
}

function sendMessage($chatID,$text)
{
  $url = $GLOBALS[website]."/sendMessage?chat_id=$chatID&text=".urlencode($text);
  file_get_contents($url);
}


//   $BOT_TOKEN = "1787672753:AAHgbD1VYtlO49DpAPQIi2mgoO6hjLnhabs";
//
// $update = file_get_contents('php://input');
// $update = json_decode($update, true);
// $userChatId = $update["message"]["from"]["id"]?$update["message"]["from"]["id"]:null;
//
// if($userChatId){
//     $userMessage = $update["message"]["text"]?$update["message"]["text"]:"Nothing";
//     $firstName = $update["message"]["from"]["first_name"]?$update["message"]["from"]["first_name"]:"N/A";
//     $lastName = $update["message"]["from"]["last_name"]?$update["message"]["from"]["last_name"]:"N/A";
//     $fullName = $firstName." ".$lastName;
//     $replyMsg = "Hello ".$fullName."\nYou said: ".$userMessage;
//
//
//     $parameters = array(
//         "chat_id" => $userChatId,
//         "text" => $replyMsg,
//         "parseMode" => "html"
//     );
//
//     send("sendMessage", $parameters);
// }
//
// function send($method, $data){
//     global $BOT_TOKEN;
//     $url = "https://api.telegram.org/bot$BOT_TOKEN/$method";
//
//     if(!$curld = curl_init()){
//         exit;
//     }
//     curl_setopt($curld, CURLOPT_POST, true);
//     curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($curld, CURLOPT_URL, $url);
//     curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
//     $output = curl_exec($curld);
//     curl_close($curld);
//     return $output;
// }

?>
