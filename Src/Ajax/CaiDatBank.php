<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $System = new System();
    $TeleBot = new BOT();
    if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['AppBanking']) and !empty($_POST['Stk']) and !empty($_POST['BankingUserName']) and !empty($_POST['IdTelegram'])) {
                $IdTelegram = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IdTelegram'])));
                if ($System->CheckNumber($IdTelegram) === true) {
                    if ($IdTelegram == $_SESSION['IdTelegram']) {
                        $AppBanking = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['AppBanking'])));
                        $Stk = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['Stk'])));
                        $BankingUserName = strtoupper($System->DectInjecSql($System->DectXSS($_POST['BankingUserName'])));
                        if ($System->CheckSpecialCharsAndVietNamese($Stk) === false) {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Số tài khoản phải là số và không có kí tự đặc biệt !'
                            ];
                            echo json_encode($Reponse);
                            exit; 
                        }
                        if ($System->CheckSpecialCharsAndVietNamese($BankingUserName) === false) {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Tên tài khoản không được có kí tự đặc biệt !'
                            ];
                            echo json_encode($Reponse);
                            exit; 
                        }
                        if (is_numeric($Stk) === false) {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Số tài khoản phải là số và không có kí tự đặc biệt !'
                            ];
                            echo json_encode($Reponse);
                            exit; 
                        }
                        if (strlen($BankingUserName) < 5 or strlen($BankingUserName) > 20) {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Tên tài khoản tối thiểu trên 5 chữ cái và tối đa 20 chữ cái'
                            ];
                            echo json_encode($Reponse);
                            exit;
                        }
                        $QueryUpdate = "UPDATE user SET AppBanking = '$AppBanking', Stk = '$Stk', BankingUserName = '$BankingUserName' WHERE IdTelegram = '$IdTelegram'";
                        $Check = $System->conn->UpdateData($QueryUpdate);
                        if ($Check !== false) {
                            $Reponse = [
                                "Status" => 200,
                                "AppBanking" => $AppBanking,
                                "Stk" => $Stk,
                                "BankingUserName" => $BankingUserName,
                                "Msg" => 'Cập nhập ngân hàng thành công',
                            ];
                            echo json_encode($Reponse);
                            $Msg = "
                                💳 Id Telegram: ".$IdTelegram."\n✅ Cập nhập banking thành công !
                                ";
                            $TeleBot->SEND($Msg,$IdTelegram);
                            exit;
                        }
                    } 
                }
                else {
                    $Reponse = [
                        "Status" => 'error',
                        "Msg" => 'Lỗi định dạng số IdTelegram !'
                    ];
                    echo json_encode($Reponse);
                    exit;
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
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (!empty($_GET['Data'])) {
                $IdTelegram = $_SESSION['IdTelegram'];
                $QuerySelect = "SELECT AppBanking, Stk, BankingUserName FROM user WHERE IdTelegram = '$IdTelegram'";
                $Check = $System->conn->SelectData($QuerySelect);
                echo json_encode($Check);
            }
        }
    }
?>