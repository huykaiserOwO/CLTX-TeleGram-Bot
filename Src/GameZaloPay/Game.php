<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/ZaloPay.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $Zalopay = new ZaloPay();
    $System = new System();
    $TeleBot = new BOT();
    if (isset($_GET['OauthToken']) and ($_GET['OauthToken'] == 'LIXI66TOP')) {
        $Query = "SELECT * FROM zalopaylist";
        $Data = $System->conn->SelectData($Query);
        if ($Data !== false) {
            $Cookie = $Data[0]['Token'];
            $AccessToken = $Data[0]['AccessToken'];
            $check_info = $Zalopay->get_info_web('0334916700', $Cookie, $AccessToken);
            
        }
    }
    else {

    }
?>