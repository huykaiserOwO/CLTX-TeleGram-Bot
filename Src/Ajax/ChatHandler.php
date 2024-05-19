<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $System = new System();
    $TeleBot = new BOT();
     if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['IdTelegram']) and !empty($_POST['Msg']) and !empty($_POST['Nickname'])) {
                $IdTelegram = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IdTelegram'])));
                $Nickname = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['Nickname'])));
                $Msg = $System->DectInjecSql($System->DectXSS($_POST['Msg']));
                $Query = "SELECT * FROM blockchat WHERE IdTelegram = '$IdTelegram'";
                $Check = $System->conn->SelectData($Query);
                if ($Check !== false) {
                    $Reponse = [
                        "Status" => 'error',
                        "Msg" => 'Bạn đã bị admin chặn chat !'
                    ];
                    echo json_encode($Reponse);
                    exit; 
                }
                if ($IdTelegram == $_SESSION['IdTelegram']) {
                    if (strlen($Msg) > 100) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Tin nhắn tối đa 100 kí tự !'
                        ];
                        echo json_encode($Reponse);
                        exit; 
                    }
                    $TimeNow = date('H:i d/m/Y');
                    $Query = "INSERT INTO chat (Nickname,TimeInit,IdNguoiGui,IdNguoiNhan,Mess) VALUES (
                        '$Nickname','$TimeNow','$IdTelegram','All','$Msg'
                    )";
                    $System->conn->InsertData($Query);
                    $Reponse = [
                        "Status" => 'success',
                        "Msg" => ''
                    ];
                    echo json_encode($Reponse);
                    exit;
                }
            }
            elseif(!empty($_POST['IdNguoiGui']) and !empty($_POST['Msg'])) {
                $Msg = $_POST['Msg'];
                $TimeNow = date('H:i d/m/Y');
                $Query = "INSERT INTO chat (Nickname,TimeInit,IdNguoiGui,IdNguoiNhan,Mess) VALUES (
                    '','$TimeNow','System','All','$Msg'
                )";
                $System->conn->InsertData($Query);
                $Reponse = [
                    "Status" => 'success',
                    "Msg" => ''
                ];
                echo json_encode($Reponse);
                exit;
            }
            else {
                $Reponse = [
                    "Status" => 'error',
                    "Msg" => 'Chat không được để trống !'
                ];
                echo json_encode($Reponse);
                exit; 
            }
        }
    }
?>