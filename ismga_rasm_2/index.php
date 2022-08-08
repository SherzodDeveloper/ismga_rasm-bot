<?php
   define('API_KEY','5540824122:AAHLlZ8gePckHbTRExwsojAUouNWIF8HX1o');
   $admin = "1020678098";
   function ACL($callbackQueryId, $text = null, $showAlert = false)
   {
       return bot('answerCallbackQuery', [
           'callback_query_id' => $callbackQueryId,
           'text' => $text,
           'show_alert' => $showAlert,
       ]);
   }

   function bot($method,$datas=[]){
       $url = "https://api.telegram.org/bot".API_KEY."/".$method;
       $ch = curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
       $res = curl_exec($ch);
       if(curl_error($ch)){
           var_dump(curl_error($ch));
       }else{
           return json_decode($res);
       }
   }

   $update = json_decode(file_get_contents('php://input'));
   $message = $update->message;
   $chat_id = $message->chat->id;
   $name = $message->chat->first_name;
   $user = $message->from->username;
   $fromid = $message->from->id;
   $text = $message->text;
   $mid = $message->message_id;
   $reply = $message->reply_to_message->text;
   $doc = $message->document;
   $photo = $message->photo; 
   $document = $message->document;
   $callback = $update->callback_query; 
   $cbid = $callback->from->id;
   $ida = $callback->id;
   $data = $callback->data;

   include 'db.php';

   //yigitlar
   $photo1 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot.php?text=$text";
   $photo2 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot1.php?text=$text";
   $photo3 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot2.php?text=$text";
   $photo4 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot3.php?text=$text";
   $photo5 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot4.php?text=$text";
   $photo6 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/bot5.php?text=$text";
   //qizlar
   $q_photo1 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq1.php?text=$text";
   $q_photo2 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq2.php?text=$text";
   $q_photo3 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq3.php?text=$text";
   $q_photo4 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq4.php?text=$text";
   $q_photo5 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq5.php?text=$text";
   $q_photo6 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/botq6.php?text=$text";
   //juft
   $j_photo1 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/juft1.php?text=$text";
   $j_photo2 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/juft2.php?text=$text";
   $j_photo3 = "https://u1775.xvest4.ru/PHP/Ravi0107/RasmgIsmbot/juft3.php?text=$text";

   $rpl = json_encode([
    'resize_keyboard'=>false,
    'force_reply'=>true,
    'selective'=>true
   ]);

    $menu = json_encode([
        'resize_keyboard' => true,
        'keyboard' => [
            [['text' => '🧑🏻‍🦱Yigitlar uchun'],['text' => '👩🏻Qizlar uchun'],],
            [['text' => '👩🏻‍❤️‍👨🏻Juftliklar uchun'],],
        ]
    ]);

    $yigitlar_inline = json_encode(
        ['inline_keyboard' => [
            [['text' => "1", 'callback_data' => "one"],['text' => "2", 'callback_data' => "two"],['text' => "3", 'callback_data' => "three"],],
            [['text' => "4", 'callback_data' => "four"],['text' => "5", 'callback_data' => "five"],['text' => "6", 'callback_data' => "six"],],
        ]
    ]);
    $qizlar_inline = json_encode(
        ['inline_keyboard' => [
            [['text' => "1", 'callback_data' => "q_one"],['text' => "2", 'callback_data' => "q_two"],['text' => "3", 'callback_data' => "q_three"],],
            [['text' => "4", 'callback_data' => "q_four"],['text' => "5", 'callback_data' => "q_five"],['text' => "6", 'callback_data' => "q_six"],],
        ]
    ]);
    $juft_inline = json_encode(
        ['inline_keyboard' => [
            [['text' => "1", 'callback_data' => "j_one"],['text' => "2", 'callback_data' => "j_two"],['text' => "3", 'callback_data' => "j_three"],],
        ]
    ]);

    if ($text == "/start") { 
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Menuni tanlang",
            'reply_markup' => $menu
        ]);
    };
    if ($text == "🧑🏻‍🦱Yigitlar uchun") { 
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => new CURLFile("yigitlar.jpg"),
            'caption' => "O'zingizga yoqqan rasm raqamini tanlang",
            'reply_markup' => $yigitlar_inline
        ]);
    };
    //one
    if ($data == "one") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"Yigitlar uchun - 1",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 1"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo1
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

    //two
    if ($data == "two") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Yigitlar uchun - 2",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 2"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo2
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };
    //three
    if ($data == "three") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Yigitlar uchun - 3",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 3"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo3
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //four
     if ($data == "four") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Yigitlar uchun - 4",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 4"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo4
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //five
     if ($data == "five") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Yigitlar uchun - 5",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 5"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo5
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //six
     if ($data == "six") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Yigitlar uchun - 6",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Yigitlar uchun - 6"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $photo6
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };
  

    //qizlar
    if ($text == "👩🏻Qizlar uchun") { 
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => new CURLFile("qizlar.jpg"),
            'caption' => "O'zingizga yoqqan rasm raqamini tanlang",
            'reply_markup' => $qizlar_inline
        ]);
    };
    //one
    if ($data == "q_one") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"Qizlar uchun - 1",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 1"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo1
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

    //two
    if ($data == "q_two") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Qizlar uchun - 2",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 2"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo2
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };
    //three
    if ($data == "q_three") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Qizlar uchun - 3",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 3"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo3
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //four
     if ($data == "q_four") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Qizlar uchun - 4",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 4"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo4
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //five
     if ($data == "q_five") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Qizlar uchun - 5",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 5"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo5
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

     //six
     if ($data == "q_six") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"Qizlar uchun - 6",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "Qizlar uchun - 6"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $q_photo6
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

    //juft
  
    if ($text == "👩🏻‍❤️‍👨🏻Juftliklar uchun") { 
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => new CURLFile("juft.jpg"),
            'caption' => "O'zingizga yoqqan rasm raqamini tanlang",
            'reply_markup' => $juft_inline
        ]);
    };
    //one
    if ($data == "j_one") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'text'=>"👩‍❤️‍👨Juftliklar uchun - 1",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "👩‍❤️‍👨Juftliklar uchun - 1"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $j_photo1
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

    //two
    if ($data == "j_two") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"👩‍❤️‍👨Juftliklar uchun - 2",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "👩‍❤️‍👨Juftliklar uchun - 2"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $j_photo2
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };
    //three
    if ($data == "j_three") { 
        bot('sendMessage',[
        'chat_id'=>$cbid,
        'message_id'=>$mid,
        'text'=>"👩‍❤️‍👨Juftliklar uchun - 3",
        'reply_markup'=>$rpl,
    ]);
    }
    if($reply == "👩‍❤️‍👨Juftliklar uchun - 3"){
        bot('sendPhoto',[
            'chat_id'=> $chat_id,
            'photo'=> $j_photo3
        ]);
        bot('editMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$mid+1,
            'caption'=>"Rasmingiz tayyor bo'ldi",
        ]);
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"Menuni tanlang",
            'reply_markup'=>$menu
        ]);
    };

   
?>