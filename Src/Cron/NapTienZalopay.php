<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Zalopay.php';
    $System = new System();
    $TeleBot = new BOT();
    $zaloPay = new ZaloPay();
    if (isset($_GET['OauthToken']) and ($_GET['OauthToken'] == 'LIXI66TOP')) {
        # Lấy danh sách zalo pay list
        $Query = "SELECT * FROM zalopaylist";
        $Data = $System->conn->SelectData($Query);
        if ($Data !== false) {
            $TenTk = $Data[0]['Name'];
            $Sdt = $Data[0]['Sdt'];
            $Cookie = $Data[0]['Token'];
            $AccessToken = $Data[0]['AccessToken'];
            $LsgdArray = $zaloPay->LayLsGd($Cookie,$AccessToken,10); 
            foreach($LsgdArray as $Lsgd) {
                $NoiDungChuyen = $Lsgd['NoiDung'];
                
                // Kiểm tra trong DB mã giao có khơp với mã giao dịch Zalopay
                $Query = "SELECT * FROM  zalopaycode WHERE Code = '$NoiDungChuyen'";
                $Data = $System->conn->SelectData($Query);
                if ($Data != false) {
                    foreach($Data as $DataCodeZalopay) {
                        $IdTelegram = $DataCodeZalopay['IdTelegram'];
                        $NguoiChuyen = $Lsgd['NguoiGui'];
                        $SoTienChuyen = (int)$Lsgd['SoTienGui'];
                        $SoDu = (int)$Lsgd['SoDu'];
                        $ThoiGianTao = $Lsgd['ThoiGian'];

                        // Cập nhập ví người chơi
                        $Query = "SELECT Wallet, Nickname FROM user WHERE IdTelegram = '$IdTelegram'";
                        $Wallet = (int)(($System->conn->SelectData($Query))[0]['Wallet']);
                        $Nickname = ($System->conn->SelectData($Query))[0]['Nickname'];
                        $UpdateWallet = $Wallet + $SoTienChuyen;
                        $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                        $System->conn->UpdateData($Query);
                        
                        // Cập nhập số dư Zalopay
                        $Query = "SELECT SoDu,Name FROM zalopaylist";
                        $UpDateSoDu = $SoDu + (int)($System->conn->SelectData($Query))[0]['SoDu'];
                        $Name = ($System->conn->SelectData($Query))[0]['Name'];
                        $Query = "UPDATE zalopaylist SET SoDu = '$UpdateSoDu' WHERE Name = '$Name'";
                        $System->conn->UpdateData($Query);

                        // Lưu lịch sử nạp tiền
                        $Query = "INSERT INTO deposit_history (TimeInit,IdTelegram,Nickname,AppBanking,TenTaiKhoan,SoTienNap) VALUES ('$ThoiGianTao','$IdTelegram','$Nickname','Zalopay','$NguoiChuyen','$SoTienChuyen')";
                        $System->conn->InsertData($Query);

                        // Xóa Zalopay Code
                        $Query = "DELETE FROM zalopaycode WHERE IdTelegram = '$IdTelegram'";
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
                }
                else {
                    continue;
                }
            }
        }
        
    }
?>