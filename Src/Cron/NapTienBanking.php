<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/MbBank.php';
    $System = new System();
    $TeleBot = new BOT();
    $MbBank = new MbBank();
    if (isset($_GET['OauthToken']) and ($_GET['OauthToken'] == 'LIXI66TOP')) {
               
        
    }