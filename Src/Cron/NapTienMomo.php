<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Momo.php';
    $System = new System();
    $TeleBot = new BOT();
    $momo = new Momo();
    if (isset($_GET['OauthToken']) and ($_GET['OauthToken'] == 'LIXI66TOP')) {
        # Lấy danh sách momo
        $Query = "SELECT * FROM momolist";
        $Data = $System->conn->SelectData($Query);
        if ($Data !== false) {
            $TenTaiKhoanMomo = $Data[0]['Name'];
            $SdtMomo = $Data[0]['Sdt'];
            $Token = $Data[0]['Token'];
            $DataMomo = $momo->LayLsgd($Token,$SdtMomo,1);
            $DataMomo = $DataMomo['data'];
            
            foreach($DataMomo as $dataMomo) {

                $NoiDungChuyen = $dataMomo['comment'];
                
                // Kiểm tra trong DB mã giao dịch có khớp với mã giao dịch trong Momo
                $Query = "SELECT * FROM momocode";
                $Data = $System->conn->SelectData($Query);
                if ($Data !== false) {
                    foreach($Data as $DataCodeMomo) {
                        if ($DataCodeMomo['Code'] === $NoiDungChuyen) {
                            $IdTelegram = $DataCodeMomo['IdTelegram'];
                            $ThoiGianTao = $dataMomo['clientTime'];
                            $TenTaiKhoanNguoiChuyen = $dataMomo['partnerName'];
                            $SoTienChuyen = (int)$dataMomo['amount'];
                            
                            // Cập nhập ví người chơi
                            $Query = "SELECT Wallet, Nickname FROM user WHERE IdTelegram = '$IdTelegram'";
                            $Wallet = (int)(($System->conn->SelectData($Query))[0]['Wallet']);
                            $Nickname = ($System->conn->SelectData($Query))[0]['Nickname'];
                            $UpdateWallet = $Wallet + $SoTienChuyen;
                            $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                            $System->conn->UpdateData($Query);
                            
                            // Lưu lịch sử nạp tiền
                            $Query = "INSERT INTO deposit_history (TimeInit,IdTelegram,Nickname,AppBanking,TenTaiKhoan,SoTienNap) VALUES ('$ThoiGianTao','$IdTelegram','$Nickname','Momo','$TenTaiKhoanNguoiChuyen','$SoTienChuyen')";
                            $System->conn->InsertData($Query);
    
                            // Xóa Momo Code
                            $Query = "DELETE FROM momocode WHERE IdTelegram = '$IdTelegram'";
                            $System->conn->DeleData($Query);
    
                            // Gửi thông báo nạp tiền thành công tới tele người chơi
                            $Msg = "
                                💳 Id ".$IdTelegram." nạp tiền thành công vào tài khoản ✅\n💴 Số tiền nạp: ".number_format($SoTienChuyen)." đ\n
                            ";
                            $TeleBot->SEND_entities($Msg,$IdTelegram);
                            
                            $Msggroup = "
                                Người chơi ".$Nickname." nạp tiền thành công ✅\nGiá trị số tiền nạp: ".number_format($SoTienChuyen)." đ\n
                            ";

                            $TeleBot->SEND_group_entities($Msggroup,'-1002071291215');

                            $TeleBot->SEND_group_entities($Msggroup,'-1002025011978');

                        }
                        else {
                            continue;
                        }
                    }
                }
            }
        }
    }
