<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $System = new System();
    $TeleBot = new BOT();
    if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['MatKhauHienTai']) and !empty($_POST['MatKhauMoi']) and !empty($_POST['NhapLaiMatKhauMoi']) and !empty($_POST['IdTelegram'])) {
                $IdTelegram = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IdTelegram'])));
                if ($_SESSION['IdTelegram'] == $IdTelegram) {
                    $MatKhauHienTai = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['MatKhauHienTai'])));
                    $MatKhauMoi = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['MatKhauMoi'])));
                    $NhapLaiMatKhauMoi = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['NhapLaiMatKhauMoi'])));
                    
                    if ($System->CheckSpecialCharsAndVietNamese($MatKhauHienTai) === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt hoặc tù tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }   

                    if ($System->CheckSpecialCharsAndVietNamese($MatKhauMoi) === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt hoặc tù tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if ($System->CheckSpecialCharsAndVietNamese($NhapLaiMatKhauMoi) === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt hoặc tù tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if (strlen($MatKhauMoi) < 5 or strlen($MatKhauMoi) > 12) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Mật khẩu mới tối thiểu 5 kí tự tối đa 12 kí tự'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if ($MatKhauMoi != $NhapLaiMatKhauMoi) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Mật khẩu nhập lại không khớp !'
                        ];
                        echo json_encode($Reponse); 
                        exit;
                    }

                    $MatKhauHienTaiMd5 = $System->Md5($MatKhauHienTai);
                    $Query = "SELECT Id FROM user WHERE Password = '$MatKhauHienTaiMd5'";
                    $Check = $System->conn->SelectData($Query);
                    if ($Check === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Mật khẩu hiện tại bạn nhập không đúng !'
                        ];
                        echo json_encode($Reponse); 
                        exit;
                    }
                    else {
                        $MatKhauMoiMd5 = $System->Md5($MatKhauMoi);
                        $Update = "UPDATE user SET Password = '$MatKhauMoiMd5' WHERE Password = '$MatKhauHienTaiMd5'";
                        $Check = $System->conn->UpdateData($Update);
                        if ($Check !== false) {
                            $Reponse = [
                                "Status" => 200,
                                "Msg" => 'Cập nhập mật khẩu thành công !'
                            ];
                            echo json_encode($Reponse);
                            $Msg = "
                                💳 Id Telegram: ".$IdTelegram." \n✅ Cập nhập mật khẩu thành công !
                            ";
                            $TeleBot->SEND_entities($Msg,$IdTelegram);
                            exit;
                        }
                    }

                }
            }
            elseif (!empty($_POST['MatKhauHienTai1']) and !empty($_POST['IDTELEGRAM']) and !empty($_POST['IdTelegram'])) {
                $IdTelegram = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IdTelegram'])));
                if ($_SESSION['IdTelegram'] == $IdTelegram) {
                    $MatKhauHienTai1 = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['MatKhauHienTai1'])));
                    $IDTELEGRAM = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['IDTELEGRAM'])));
                    
                    if ($System->CheckSpecialCharsAndVietNamese($MatKhauHienTai1) === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt hoặc từ tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if ($System->CheckSpecialCharsAndVietNamese($IDTELEGRAM) === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Có ký tự đặc biệt hoặc từ tiếng việt !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if (strlen($IDTELEGRAM) != 10) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Id telegram phải đủ 10 số !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }

                    if (is_numeric($IDTELEGRAM) != 1) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Id telegram phải là số !'
                        ];
                        echo json_encode($Reponse);
                        exit;
                    }
                    
                    $MatKhauHienTai1Md5 = $System->Md5($MatKhauHienTai1);
                    $Query = "SELECT Id FROM user WHERE Password = '$MatKhauHienTai1Md5'";
                    $Check = $System->conn->SelectData($Query);
                    if ($Check === false) {
                        $Reponse = [
                            "Status" => 'error',
                            "Msg" => 'Mật khẩu hiện tại bạn nhập không đúng !'
                        ];
                        echo json_encode($Reponse); 
                        exit;
                    }
                    else {
                        $Msg = "
                            💳 Id Telegram: ".$IDTELEGRAM." \n✅ Cập nhập Id telegram thành công !
                            ";
                        $x = $TeleBot->SEND_entities($Msg,$IDTELEGRAM);
                        if ($x['error_code'] == 400) {
                            $Reponse = [
                                "Status" => 'error',
                                "Msg" => 'Id telegram không tồn tại !'
                            ];
                            echo json_encode($Reponse);
                            exit;
                        }
                        else {
                            $Update = "UPDATE user SET IdTelegram = '$IDTELEGRAM' WHERE Password = '$MatKhauHienTai1Md5'";
                            $Check = $System->conn->UpdateData($Update);
                            $_SESSION['IdTelegram'] = $IDTELEGRAM;
                            exit;
                        }
                    }



                
                }
            }
            else {
                $Reponse = [
                    "Status" => 'error',
                    "Msg" => 'Cần điền đẩy đủ thông tin !'
                ];
                echo json_encode($Reponse);
                exit;
            }
        }
    }
?>