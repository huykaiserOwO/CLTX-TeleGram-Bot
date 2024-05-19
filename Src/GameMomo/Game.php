<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Momo.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $momo = new Momo();
    $System = new System();
    $TeleBot = new BOT();
    if (isset($_GET['OauthToken']) and ($_GET['OauthToken'] == 'LIXI66TOP')) {
        $Query = "SELECT * FROM momolist";
        $Data = $System->conn->SelectData($Query);
        if ($Data !== false) {
            if (count($Data) <= 1) {
                exit;
            }
            else {
                $TenTaiKhoanMomo = $Data[1]['Name'];
                $SdtMomo = $Data[1]['Sdt'];
                $Token = $Data[1]['Token'];
                $CuocMin = $Data[1]['CuocMin'];
                $CuocMax = $Data[1]['CuocMax'];
                $LichSuGiaoDich = $momo->LayLsgd($Token,$SdtMomo,10);
                foreach ($LichSuGiaoDich['data'] as $data) {
                    $NoiDungGame = $data['comment'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                    // Game CLTX Chẳn Lẻ
                    if (strpos($NoiDungGame, 'C') !== false or strpos($NoiDungGame, 'L') !== false) {
                        $Array = explode(" ",$NoiDungGame);
                        if (!empty($Array[1]) and !empty($Array[0])) {
                            $NoiDungChuyen = $Array[1];
                            $Nickname = $Array[0];

                            $ThoiGianTao = $data['clientTime'];
                            $TenTaiKhoanNguoiChuyen = $data['partnerName'];
                            $SdtNguoiChuyen = $data['partnerId'];
                            $SoTienChuyen = (int)$data['amount'];

                            // Kiểm tra cược min cược max
                            if ($SoTienChuyen >= (int)$CuocMin and  $SoTienChuyen <= (int)$CuocMax) {
                                
                                // Kiểm tra Nick name có tồn tại trong hệ thống
                                $Query = "SELECT IdTelegram FROM user WHERE Nickname = '$Nickname'";
                                $UserData = $System->conn->SelectData($Query);
                                if ($UserData !== false) {
                                    $TranId = (int)str_split($data['tranId'])[10];
                                    $MaGiaoDich = $data['tranId'];
                                    $TiLe = (float)(($System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json'))[0]['TiLe1']);
                                    
                                    // Kiểm tra mã giao dịch có tồn tại trong DB
                                    $Query = "SELECT Id FROM gamehistory WHERE KetQua = '$MaGiaoDich'";
                                    $Check = $System->conn->SelectData($Query);

                                    if ($Check === false) {
                                        $IdTelegram = $UserData[0]['IdTelegram'];

                                        // Xử lý chẳn lẻ
                                        $KetQuaChanLe = 'Le';
                                        $Chan = [2,4,6,8];
                                        foreach ($Chan as $chan) {
                                            if ($TranId == $chan) {
                                                $KetQuaChanLe = 'Chan';
                                            }
                                        }
                                
                                        if ($NoiDungChuyen == 'C') {
                                            if ($KetQuaChanLe == 'Chan') {

                                                $WinAmount = $SoTienChuyen * $TiLe;

                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }


                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Trả thưởng 
                                                $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                            else {


                                                $WinAmount = 0;
                                            
                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                        }

                                        elseif ($NoiDungChuyen == 'L') {

                                            if ($KetQuaChanLe == 'Le') {

                                                $WinAmount = $SoTienChuyen * $TiLe;

                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }


                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Trả thưởng 
                                                $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                            else {


                                                $WinAmount = 0;
                                            
                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }

                                        }
                                    }

                                }
                            }

                        }
                    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                    // Tài Xỉu
                    if (strpos($NoiDungChuyen, 'T') !== false or strpos($NoiDungChuyen, 'X') !== false) {
                        $Array = explode(" ",$NoiDungGame);
                        if (!empty($Array[1]) and !empty($Array[0])) {
                            $NoiDungChuyen = $Array[1];
                            $Nickname = $Array[0];

                            $ThoiGianTao = $data['clientTime'];
                            $TenTaiKhoanNguoiChuyen = $data['partnerName'];
                            $SdtNguoiChuyen = $data['partnerId'];
                            $SoTienChuyen = (int)$data['amount'];

                            // Kiểm tra cược min cược max
                            if ($SoTienChuyen >= (int)$CuocMin and  $SoTienChuyen <= (int)$CuocMax) {
                                
                                // Kiểm tra Nick name có tồn tại trong hệ thống
                                $Query = "SELECT IdTelegram FROM user WHERE Nickname = '$Nickname'";
                                $UserData = $System->conn->SelectData($Query);
                                if ($UserData !== false) {
                                    $TranId = (int)str_split($data['tranId'])[10];
                                    $MaGiaoDich = $data['tranId'];
                                    $TiLe = (float)(($System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json'))[0]['TiLe1']);
                                    
                                    // Kiểm tra mã giao dịch có tồn tại trong DB
                                    $Query = "SELECT Id FROM gamehistory WHERE KetQua = '$MaGiaoDich'";
                                    $Check = $System->conn->SelectData($Query);

                                    if ($Check === false) {
                                        $IdTelegram = $UserData[0]['IdTelegram'];

                                        // Xử lý tài xỉu
                                        $KetQuaTaiXiu = 'Xiu';
                                        $Tai = [5,6,7,8];
                                        foreach ($Tai as $tai) {
                                            if ($TranId == $tai) {
                                                $KetQuaTaiXiu = 'Tai';
                                            }
                                        }


                                        if ($NoiDungChuyen == 'T') {
                                            if ($KetQuaChanLe == 'Tai') {

                                                $WinAmount = $SoTienChuyen * $TiLe;

                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }


                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Trả thưởng 
                                                $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                            else {


                                                $WinAmount = 0;
                                            
                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                        }

                                        elseif($NoiDungChuyen == 'X') {

                                            if ($KetQuaChanLe == 'Xiu') {

                                                $WinAmount = $SoTienChuyen * $TiLe;

                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }


                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Trả thưởng 
                                                $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }
                                            else {


                                                $WinAmount = 0;
                                            
                                                // Thống kê người chơi
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                $SoLanChoi = 1;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $SoLanChoi += $Data[0]['SoLanChoi'];
                                                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Thống kê game Momo
                                                $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                                $Data = $System->conn->SelectData($Query);
                                                $TongTienCuoc = 0;
                                                $TongTienThangCuoc = 0;
                                                if ($Data !== false) {
                                                    $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                    $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                    $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                    $System->conn->UpdateData($Query);
                                                }
                                                else {
                                                    $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                    $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                    $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                    $System->conn->InsertData($Query);
                                                    
                                                }

                                                // Lưu lịch sử chơi 
                                                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                                ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                                $System->conn->InsertData($Query);


                                                // Gửi tin nhắn đến telegram
                                                $Msg = "
                                                LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                                ";
                                                $TeleBot->SEND_entities($Msg,$IdTelegram);

                                            }

                                        }


                                    }
                                }
                            }
                        }
                    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                // Game Chẳn Lẻ Tài Xỉu +2
                if (strpos($NoiDungChuyen, 'TC') !== false or strpos($NoiDungChuyen, 'TL') !== false) {
                    $Array = explode(" ",$NoiDungGame);
                    if (!empty($Array[1]) and !empty($Array[0])) {
                        $NoiDungChuyen = $Array[1];
                        $Nickname = $Array[0];

                        $ThoiGianTao = $data['clientTime'];
                        $TenTaiKhoanNguoiChuyen = $data['partnerName'];
                        $SdtNguoiChuyen = $data['partnerId'];
                        $SoTienChuyen = (int)$data['amount'];

                        // Kiểm tra cược min cược max
                        if ($SoTienChuyen >= (int)$CuocMin and  $SoTienChuyen <= (int)$CuocMax) {
                            
                            // Kiểm tra Nick name có tồn tại trong hệ thống
                            $Query = "SELECT IdTelegram FROM user WHERE Nickname = '$Nickname'";
                            $UserData = $System->conn->SelectData($Query);
                            if ($UserData !== false) {
                                $TranId = (int)str_split($data['tranId'])[10] + (int)str_split($dataMomo['tranId'])[9];
                                $MaGiaoDich = $data['tranId'];
                                $TiLe = (float)(($System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json'))[1]['TiLe1']);
                                
                                // Kiểm tra mã giao dịch có tồn tại trong DB
                                $Query = "SELECT Id FROM gamehistory WHERE KetQua = '$MaGiaoDich'";
                                $Check = $System->conn->SelectData($Query);

                                if ($Check === false) {
                                    $IdTelegram = $UserData[0]['IdTelegram'];

                                    // Xử lý chẳn lẻ +2
                                    $KetQuaChanLe = 'Le';
                                    $Chan = [0,2,4,6,8];
                                    foreach ($Chan as $chan) {
                                        if ($TranId == $chan) {
                                            $KetQuaChanLe = 'Chan';
                                        }
                                    }

                                    if ($NoiDungChuyen == 'TC') {
                                        if ($KetQuaChanLe == 'Chan') {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {


                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                    }

                                    elseif ($NoiDungChuyen == 'TL') {

                                        if ($KetQuaChanLe == 'Le') {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {


                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','CHẴN LẺ +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }

                                    }

                                }
                            }
                        }
                    }
                   
                }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                
                if (strpos($NoiDungChuyen, 'TT') !== false or strpos($NoiDungChuyen, 'TX') !== false) {
                    $Array = explode(" ",$NoiDungGame);
                    if (!empty($Array[1]) and !empty($Array[0])) {
                        $NoiDungChuyen = $Array[1];
                        $Nickname = $Array[0];

                        $ThoiGianTao = $data['clientTime'];
                        $TenTaiKhoanNguoiChuyen = $data['partnerName'];
                        $SdtNguoiChuyen = $data['partnerId'];
                        $SoTienChuyen = (int)$data['amount'];

                        // Kiểm tra cược min cược max
                        if ($SoTienChuyen >= (int)$CuocMin and  $SoTienChuyen <= (int)$CuocMax) {
                            
                            // Kiểm tra Nick name có tồn tại trong hệ thống
                            $Query = "SELECT IdTelegram FROM user WHERE Nickname = '$Nickname'";
                            $UserData = $System->conn->SelectData($Query);
                            if ($UserData !== false) {
                                $TranId = (int)str_split($data['tranId'])[10] + (int)str_split($dataMomo['tranId'])[9];
                                $MaGiaoDich = $data['tranId'];
                                $TiLe = (float)(($System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json'))[1]['TiLe1']);
                                
                                // Kiểm tra mã giao dịch có tồn tại trong DB
                                $Query = "SELECT Id FROM gamehistory WHERE KetQua = '$MaGiaoDich'";
                                $Check = $System->conn->SelectData($Query);

                                if ($Check === false) {
                                    $IdTelegram = $UserData[0]['IdTelegram'];
                                    
                                    // Xử lý tài xỉu +2
                                    $KetQuaTaiXiu = 'Xiu';
                                    $Tai = [5,6,7,8,9];
                                    foreach ($Tai as $tai) {
                                        if ($TranId == $tai) {
                                            $KetQuaTaiXiu = 'Tai';
                                        }
                                    }

                                    if ($NoiDungChuyen == 'TT') {
                                        if ($KetQuaChanLe == 'Tai') {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {


                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                    }

                                    elseif($NoiDungChuyen == 'TX') {

                                        if ($KetQuaChanLe == 'Xiu') {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {


                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','TÀI XỈU +2 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME CHẲN LẺ-TÀI XỈU +2 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }

                                    }


                                }
                            }
                        }
                    }
                }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                

                // 1 Phần 3
                if (strpos($NoiDungChuyen, 'N1') !== false or strpos($NoiDungChuyen, 'N2') !== false or strpos($NoiDungChuyen, 'N3') !== false) {
                    $Array = explode(" ",$NoiDungGame);
                    if (!empty($Array[1]) and !empty($Array[0])) {
                        $NoiDungChuyen = $Array[1];
                        $Nickname = $Array[0];

                        $ThoiGianTao = $data['clientTime'];
                        $TenTaiKhoanNguoiChuyen = $data['partnerName'];
                        $SdtNguoiChuyen = $data['partnerId'];
                        $SoTienChuyen = (int)$data['amount'];

                        // Kiểm tra cược min cược max
                        if ($SoTienChuyen >= (int)$CuocMin and  $SoTienChuyen <= (int)$CuocMax) {
                            
                            // Kiểm tra Nick name có tồn tại trong hệ thống
                            $Query = "SELECT IdTelegram FROM user WHERE Nickname = '$Nickname'";
                            $UserData = $System->conn->SelectData($Query);
                            if ($UserData !== false) {
                                $TranId = (int)str_split($data['tranId'])[10] + (int)str_split($dataMomo['tranId'])[9];
                                $MaGiaoDich = $data['tranId'];
                                $TiLe = (float)(($System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameZpMmBk.json'))[2]['TiLe1']);
                                
                                // Kiểm tra mã giao dịch có tồn tại trong DB
                                $Query = "SELECT Id FROM gamehistory WHERE KetQua = '$MaGiaoDich'";
                                $Check = $System->conn->SelectData($Query);

                                if ($Check === false) {
                                    $IdTelegram = $UserData[0]['IdTelegram'];
                                    
                                    // Xử lý N1 N2 N3
                                    if ($NoiDungChuyen == 'N1') {
                                        if ((int)$TranId == 1 or (int)$TranId == 5 or (int)$TranId == 7) {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {

                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);
                                        }
                                    }
                                    ////////////////////////////////////////////////////////////////////////////////////////////////
                                    if ($NoiDungChuyen == 'N2') {
                                        if ((int)$TranId == 2 or (int)$TranId == 4 or (int)$TranId == 8) {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {

                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);
                                        }
                                    }
                                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    if ($NoiDungChuyen == 'N3') {
                                        if ((int)$TranId == 3 or (int)$TranId == 6 or (int)$TranId == 9) {

                                            $WinAmount = $SoTienChuyen * $TiLe;

                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }


                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Win','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Trả thưởng 
                                            $momo->ChuyenTienMomo($Token,$SdtMomo,$SdtNguoiChuyen,$WinAmount,'');


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\n🏆 Thắng cược: ".number_format(($WinAmount - $SoTienChuyen))." đ
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);

                                        }
                                        else {

                                            $WinAmount = 0;
                                        
                                            // Thống kê người chơi
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc, SoLanChoi FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            $SoLanChoi = 1;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $SoLanChoi += $Data[0]['SoLanChoi'];
                                                $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Thống kê game Momo
                                            $Query = "SELECT TongTienCuoc, TongTienThangCuoc FROM thongkegamemomo WHERE IdTelegram = '$IdTelegram'";
                                            $Data = $System->conn->SelectData($Query);
                                            $TongTienCuoc = 0;
                                            $TongTienThangCuoc = 0;
                                            if ($Data !== false) {
                                                $TongTienCuoc = $Data[0]['TongTienCuoc'] + $SoTienChuyen;
                                                $TongTienThangCuoc = $Data[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienChuyen);
                                                $Query = "UPDATE thongkegamemomo SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                                                $System->conn->UpdateData($Query);
                                            }
                                            else {
                                                $TongTienCuoc = $TongTienCuoc + $SoTienChuyen;
                                                $TongTienThangCuoc = $TongTienThangCuoc + ($WinAmount - $SoTienChuyen);
                                                $Query = "INSERT INTO thongkegamemomo (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                                                $System->conn->InsertData($Query);
                                                
                                            }

                                            // Lưu lịch sử chơi 
                                            $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES 

                                            ('$ThoiGianTao','$IdTelegram','$Nickname','1 PHẦN 3 MOMO','$NoiDungChuyen','$SoTienChuyen','$MaGiaoDich','Losing','($WinAmount - $SoTienChuyen)','None','$NoiDungGame')";
                                            $System->conn->InsertData($Query);


                                            // Gửi tin nhắn đến telegram
                                            $Msg = "
                                            LIXI66.TOP \n\n 🎮 GAME 1 PHẦN 3 MOMO 🎮 \n\n💳 Id: ".$IdTelegram."\n👤 Nickname: ".$Nickname."\n💴 Tiền cược: ".number_format($SoTienChuyen)." đ\nNội dung cược: ".$NoiDungChuyen."\nMã giao dịch: ".$MaGiaoDich."\nThua cược: ".number_format(($WinAmount - $SoTienChuyen))." đ\nVán sau có thể may mắn nè 🍀
                                            ";
                                            $TeleBot->SEND_entities($Msg,$IdTelegram);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
            }

        }
    }
}