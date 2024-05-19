<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
    $System = new System();
    $TeleBot = new BOT();
    $json = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/TeleBotV3/Server/Public/Json/System.json'); 
    $json_data = json_decode($json,true);
    $ImageLogo = $json_data[0]['Url'];
    $TenGame = $json_data[1]['Name'];
    $LinkBotTele = $json_data[2]['Url'];
    $ThongBaoAdmin = $json_data[5]['Msg'];
    $BaoTri = $json_data[3]['On_Off'];
    if ($BaoTri == 'On') {

        return;
    }
    if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
        if (isset($_SESSION['IdTelegram']) and isset($_SESSION['TokenUser'])) {
            $IdTelegram = $_SESSION['IdTelegram'];
            if (isset($_GET['TrangChu'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/Home.php';
                return;
            }
            if (isset($_GET['CaiDatBank'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/CaiDatBank.php';
                return;
            }
            if (isset($_GET['LichSuChoi'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/LichSuChoi.php';
                return;
            }
            if (isset($_GET['TaiKhoan'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/TaiKhoan.php';
                return;
            }
            if (isset($_GET['GiftCode'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/GiftCode.php';
                return;
            }
            if (isset($_GET['GiftCode'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/GiftCode.php';
                return;
            }
            if (isset($_GET['Zalopay'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/Zalopay.php';
                return;
            }
            if (isset($_GET['Momo'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/Momo.php';
                return;
            }
            if (isset($_GET['Banking'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/Banking.php';
                return;
            }
            if (isset($_GET['BanTaiXiu'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/BanTaiXiu.php';
                return;
            }
            if (isset($_GET['BongDa'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/BongDa.php';
                return;
            }
            if (isset($_GET['SoXo'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/SoXo.php';
                return;
            }
            if (isset($_GET['DangXuat'])) {
                unset($_SESSION['TokenUser']);
                unset($_SESSION['IdTelegram']);
                $Script = "
                    <script>
                        setTimeout(() => {
                            location.href = '?TrangChu';
                        }, 200);
                    </script>";
                echo $Script;
            return;
            }
            if (isset($_GET['NhiemVuNgay'])) {
                $Query = "SELECT SoLanChoi, TongTienCuoc FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $SoLanChoi = $System->conn->SelectData($Query)[0]['SoLanChoi'];
                $TongTienCuoc = (int)$System->conn->SelectData($Query)[0]['TongTienCuoc'];
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/NhiemVuNgay.php';
                return;
            }
            else {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/Home.php';
                return;
            }
        }
        else if (isset($_SESSION['TokenUser']) and !isset($_SESSION['IdTelegram'])) {
            $Script = "
                    <script>
                        setTimeout(() => {
                            location.href = 'LienKetTele';
                        }, 200);
                    </script>";
                echo $Script;
            return;
        }
        else {
            if (isset($_GET['TrangChu'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/HomeClient.php';
                return;
            }
            if (isset($_GET['GiftCode'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/GiftCodeClient.php';
                return;
            }
            if (isset($_GET['NhiemVuNgay'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/NhiemVuNgayClient.php';
                return;
            }
            if (isset($_GET['DacQuyenVip'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/DacQuyenVipClient.php';
                return;
            }
            if (isset($_GET['Ctv'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/CtvClient.php';
                return;
            }
            if (isset($_GET['Zalopay'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/ZalopayClient.php';
                return;
            }
            if (isset($_GET['Momo'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/MomoClient.php';
                return;
            }
            if (isset($_GET['Banking'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/BankingClient.php';
                return;
            }
            if (isset($_GET['BanTaiXiu'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/BanTaiXiuClient.php';
                return;
            }
            if (isset($_GET['SoXo'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/SoXoClient.php';
                return;
            }
            if (isset($_GET['BongDa'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/BongDaClient.php';
                return;
            }
            if (isset($_GET['DangKy'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/DangKy.php';
                return;
            }
            if (isset($_GET['DangNhap'])) {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/DangNhap.php';
                return;
            }
            else {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/View/HomeClient.php';
                return;
            }
            
        }
    }
?>