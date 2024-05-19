<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $System = new System();
    $TeleBot = new BOT();
    if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['Giftcode']) and !empty($_POST['IdTelegram'])) {
                $IdTelegram = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IdTelegram'])));
                if ($IdTelegram == $_SESSION['IdTelegram']) {
                    $GiftCode = strtoupper(preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['Giftcode']))));
                    if ($System->CheckSpecialCharsAndVietNamese($GiftCode) === true) {
                        $Query = "SELECT Money,Id FROM giftcode WHERE Code = '$GiftCode'";
                        $Check = $System->conn->SelectData($Query);
                        if ($Check !== false) {
                            $Query1 = "SELECT Id FROM giftcodehistory WHERE Code = '$GiftCode' AND IdTelegram = '$IdTelegram'";
                            $Check1 = $System->conn->SelectData($Query1);
                            if ($Check1 !== false) {
                                $Reponse = [
                                    "Status" => 'error',
                                    "Msg" => 'Bạn đã nhập mã Giftcode này !'
                                ];
                                echo json_encode($Reponse);
                                exit;
                            }
                            $TimeNow = date('H:i d/m/Y');
                            $Nickname = $_SESSION['Nickname'];
                            $CodeMoney = (int) $Check[0]['Money'];
                            $Id = $Check[0]['Id'];
                            $TokenUser = $_SESSION['TokenUser'];
                            $Query = "SELECT Wallet FROM user WHERE IdTelegram = '$IdTelegram'";
                            $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                            $UpdateWallet = $CodeMoney + $Wallet;
                            $Update = "UPDATE user SET wallet='$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                            $System->conn->UpdateData($Update);
                            $Delete = "DELETE FROM giftcode WHERE Id = '$Id'";
                            $System->conn->DeleData($Delete);
                            $InsertGiftcodeHistory = "INSERT INTO giftcodehistory (TimeInit,IdTelegram,Nickname,Code,Money) VALUES ('$TimeNow','$IdTelegram','$Nickname','$GiftCode','$CodeMoney')";
                            $System->conn->InsertData($InsertGiftcodeHistory);
                            $Msg = "
                                ✅ Bạn đã nhập mã 🎁 code: ".$GiftCode." thành công\n💴 số tiền: ".number_format($CodeMoney)." đ";
                            $TeleBot->SEND_entities($Msg, $IdTelegram);

                            $Msggroup = "
                                Người chơi ".$Nickname." nhập mã code ".$GiftCode." thành công ✅\nGiá trị giftcode nạp: ".number_format($CodeMoney)." đ\n
                            ";

                            $TeleBot->SEND_group_entities($Msggroup,'-1002071291215');

                            $TeleBot->SEND_group_entities($Msggroup,'-1002025011978');

                            $Reponse = [
                                "Status" => 200,
                                "Msg" => 'Cập nhập mã code thành công !'
                            ];
                            echo json_encode($Reponse);
                            exit; 
                        }
                        else {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Giftcode không hợp lệ !'
                            ];
                            echo json_encode($Reponse);
                            exit; 
                        }
                    }
                    else {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt và từ tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit; 
                    }
                }
            }
            else {
                $Reponse = [
                    "Status" => 'error',
                    "Msg" => 'Cần điền đầy đủ thông tin !'
                ];
                echo json_encode($Reponse);
                exit; 
            }
        }
    }
?>