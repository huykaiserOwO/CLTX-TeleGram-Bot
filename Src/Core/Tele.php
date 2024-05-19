<?php
class BOT {	
	private $useragent = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
    private $token = '6562374329:AAGpe0dZVpJzkMJf2LUVvg1zT-GytH02YQU';
	public function GET_ME()
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getMe';
		return $this->REQUEST($url);
	}
	
	public function GET_MSG($time = 0)
	{
		$TIME = isset($time) ? $time : '0';
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getUpdates?timeout='.$TIME.'&limit=10000';
        // echo $url;
		return $this->REQUEST($url);
	}

    public function GET_MSG_UPDATE($time = 0, $update_id)
	{
		$TIME = isset($time) ? $time : '0';
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getUpdates?timeout='.$TIME.'&limit=10000&offset='.$update_id;
		return $this->REQUEST($url);
	}

	public function GET_MSG_GROUP($time = 0, $chat_id)
	{
		$TIME = isset($time) ? $time : '0';
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getUpdates?timeout='.$TIME.'&limit=10000&chat_id='.urlencode($chat_id);
        // echo $url;
		return $this->REQUEST($url);
	}

	public function getChat($chat_id)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getChat?chat_id='.$chat_id;
		return $this->REQUEST($url);
	}
	
	public function SEND($text, $chatID)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text);
		return $this->REQUEST($url);
	}

	public function SEND_group($text, $message_thread_id)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$message_thread_id.'&text='.urlencode($text).'&message_thread_id='.urlencode($message_thread_id);
		return $this->REQUEST($url);
	}

	public function SEND_group_entities($text, $message_thread_id)
	{
		$text = str_replace(array('(', ')', '+', '.', '|', '-', '!', '_', '='), array('\(', "\\)", '\+', '\.', '\|', '\-', '\!', '\_', '\='), $text);
        $message_entities = array(
            array(
                'type' => 'code',
                'offset' => 15,
                'length' => 5
            ),
            array(
                'type' => 'bold',
                'offset' => 5,
                'length' => 4
            )
        );
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$message_thread_id.'&text='.urlencode($text).'&message_thread_id='.urlencode($message_thread_id).'&parse_mode=HTML&entities='.urlencode(json_encode($message_entities));
		return $this->REQUEST($url);
	}

	public function SEND_group_entities_reply($text, $message_thread_id, $message_id)
	{
		$text = str_replace(array('(', ')', '+', '.', '|', '-', '!', '_', '='), array('\(', "\\)", '\+', '\.', '\|', '\-', '\!', '\_', '\='), $text);
        $message_entities = array(
            array(
                'type' => 'code',
                'offset' => 15,
                'length' => 5
            ),
            array(
                'type' => 'bold',
                'offset' => 5,
                'length' => 4
            )
        );
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$message_thread_id.'&text='.urlencode($text).'&message_thread_id='.urlencode($message_thread_id).'&parse_mode=MarkdownV2&entities='.urlencode(json_encode($message_entities)).'&reply_to_message_id='.urlencode($message_id);
		return $this->REQUEST($url);
	}

	

    public function SEND_entities($text, $chatID)
	{
		$text = str_replace(array('(', ')', '+', '.', '|', '-', '!', '_', '='), array('\(', "\\)", '\+', '\.', '\|', '\-', '\!', '\_', '\='), $text);
        $message_entities = array(
            array(
                'type' => 'code',
                'offset' => 15,
                'length' => 5
            ),
            array(
                'type' => 'bold',
                'offset' => 5,
                'length' => 4
            )
        );
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text).'&parse_mode=MarkdownV2&entities='.(json_encode($message_entities));
		return $this->REQUEST($url);
	}

    public function SEND_entities_reply($text, $chatID, $message_id)
	{
		$text = str_replace(array('(', ')', '+', '.', '|', '-', '!', '_', '='), array('\(', "\\)", '\+', '\.', '\|', '\-', '\!', '\_', '\='), $text);
        $message_entities = array(
            array(
                'type' => 'code',
                'offset' => 15,
                'length' => 5
            ),
            array(
                'type' => 'bold',
                'offset' => 5,
                'length' => 4
            )
        );
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text).'&parse_mode=MarkdownV2&entities='.(json_encode($message_entities)).'&reply_to_message_id='.urlencode($message_id);
		return $this->REQUEST($url);
	}

	public function SEND_sticker($sticker_id, $chatID)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendSticker?chat_id='.$chatID.'&sticker='.urlencode($sticker_id);
		return $this->REQUEST($url);
	}

	public function getStickerSet($name)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getStickerSet?name='.urlencode($name);
		return $this->REQUEST($url);
	}

    public function REPLY($text, $chatID, $message_id)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text).'&reply_to_message_id='.urlencode($message_id);
		return $this->REQUEST($url);
	}

    public function REG_MENU($text, $chatID, $reply_markup)
	{
		echo $url = 'https://api.telegram.org/bot'.urlencode($this->token).'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text).'&reply_markup='.(json_encode($reply_markup));
		return $this->REQUEST($url);
	}

    public function setChatDescription($chatID, $description)
	{
		echo $url = 'https://api.telegram.org/bot'.urlencode($this->token).'/setChatDescription?&description='.urlencode($description);
		return $this->REQUEST($url);
	}

    public function getMyDescription()
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getMyDescription';
		return $this->REQUEST($url);
	}

    public function setMyShortDescription($description)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/setMyShortDescription?short_description='.urlencode($description);
		return $this->REQUEST($url);
	}

    public function getMyShortDescription()
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getMyShortDescription';
		return $this->REQUEST($url);
	}

    public function setMyCommands($commands, $scope)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getMyCommands?commands='.urlencode(json_encode($commands)).'&scope='.urlencode(json_encode($scope));
		return $this->REQUEST($url);
	}

    public function getMyCommands()
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/getMyCommands';
		return $this->REQUEST($url);
	}


	public function deleteMessage($chat_id, $message_id)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/deleteMessage?chat_id='.urlencode($chat_id).'&message_thread_id='.urlencode($chat_id).'&message_id='.urlencode($message_id);
		return $this->REQUEST($url);
	}



    public function setChatMenuButton($chatID, $menu_button)
	{
		$url = 'https://api.telegram.org/bot'.urlencode($this->token).'/setChatMenuButton?chat_id='.urlencode($chatID).'&menu_button='.urlencode(json_encode($menu_button));
		return $this->REQUEST($url);
	}


    public function POST_TELE($action, $data) {
        $url = 'https://api.telegram.org/bot'.urlencode($this->token).'/'.$action;
        $header = array(
            'Content-Type: application/json',
            'accept: application/json'
        ); 
        return $this->REQUEST_POST($url, $header, json_encode($data));
    }

    function REQUEST_POST($url, $header, $data)
    {
        $curl = curl_init();
        $opt = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_ENCODING => "",
            CURLOPT_HEADER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_TIMEOUT => 20,
        );
        curl_setopt_array($curl, $opt);
        $body = curl_exec($curl);
        return json_decode($body, true);
    }



	public function REQUEST($url)
	{
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HEADER => FALSE,
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_ENCODING => '',
			CURLOPT_USERAGENT => $this->useragent,
			CURLOPT_AUTOREFERER => TRUE,
			CURLOPT_CONNECTTIMEOUT => 15,
			CURLOPT_TIMEOUT => 15,
			CURLOPT_MAXREDIRS => 5,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_SSL_VERIFYPEER => 0
		));
        $access = curl_exec($ch);
        return json_decode($access, true);
	}
}