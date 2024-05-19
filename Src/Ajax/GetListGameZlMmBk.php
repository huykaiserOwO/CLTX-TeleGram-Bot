<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    $System = new System();
    if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if (isset($_GET['IdBtn'])) {
            $IdBtn = $_GET['IdBtn'];
            $Data = $System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json');
            foreach ($Data as $data) {
                if ($data['Id'] == $IdBtn) {
                    print_r(json_encode($data));
                }
            }
        }
    }
?>