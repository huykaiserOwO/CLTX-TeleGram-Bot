<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Main.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Tele.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/Momo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Core/ZaloPay.php';
$System = new System();
$TeleBot = new BOT();
$momo = new Momo();
$zalopay = new ZaloPay();
if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
    if (isset($_SESSION['TokenAdmin'])) {
        if (isset($_GET['QuanLyNguoiChoi'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/QuanLyNguoiChoi.php';
            return;
        }
        if (isset($_GET['Giftcode'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/GiftCode.php';
            return;
        }
        if (isset($_GET['LichSuGame'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/LichSuChoi.php';
            return;
        }
        if (isset($_GET['Game'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/Game.php';
            return;
        }
        if (isset($_GET['MmZlBanking'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/GameMmZlBanking.php';
            return;
        }
        if (isset($_GET['BanTaiXiu'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/BanTaiXiu.php';
            return;
        }
        if (isset($_GET['Banking'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/Banking.php';
            return;
        }
        if (isset($_GET['LogOut'])) {
            unset($_SESSION['TokenAdmin']);
            $Query = "SELECT ThietBiDangNhap FROM admin WHERE Id = '1'";
            $Data = $System->conn->SelectData($Query);
            $SoLanThietBiDangNhap  = (int)$Data[0]['ThietBiDangNhap'] - 1;
            $Query = "UPDATE admin SET ThietBiDangNhap = '$SoLanThietBiDangNhap' WHERE Id = '1'";
            $System->conn->UpdateData($Query);
            $Script = "
                <script>
                    setTimeout(() => {
                        location.href = 'Admin';
                    })
                </script>
            ";

            echo $Script;
        }
        else {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/System.php';
            return;
        }
    }
    else {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/TeleBotV3/Src/Admin/View/DangNhap.php';
        return;
    }
}
?>