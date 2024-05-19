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
        $Data = $momo->LayThongTinTk($Token,$SdtMomo)['data'];
        $Balance = $Data['balance'];
        $Phone = $Data['phone'];
        $Name = $Data['name']; 
        $Query = "UPDATE momolist SET SoDu = '$Balance' WHERE Name = '$Name' AND Sdt = '$Phone'";
        $System->conn->UpdateData($Query);
        return;
    }
}