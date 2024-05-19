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
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title Page-->
    <title id="TitlePage"><?= $TenGame ?></title>
    <meta http-equiv="refresh" content="120">
    <!--Icon Page-->
    <link rel="icon" href="">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Socket Io-->
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"
        integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous">
    </script>
    <!--DataTable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" />
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Truculenta:opsz,wght@12..72,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="All">
    <link rel="stylesheet" href="LoginCss">
</head>

<body class="HomeClient">
    <div class="Box">
        <header class="Header">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="<?= $ImageLogo ?>"
                            width="200" height="auto">
                    </a>
                    <div style="float: right;">
                        <div onclick="myFunction(this)">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id="sidebar">
            <div class="HeaderFixed">
                <a href="" class="Logo"><img
                        src="<?= $ImageLogo ?>" width="200"
                        height="auto"></a>
            </div>
            <div style="margin-top: 90px;position: relative;z-index: 1;">
                <a href="../TeleBotV3/?TrangChu" style="padding-left: 30px;"><i class="fa-solid fa-house"></i>
                    <p>Trang Chủ</p>
                </a>
                <a href="../TeleBotV3/?GiftCode" style="padding-left: 30px;"><i class="fa-solid fa-gift"></i>
                    <p>GiftCode</p>
                </a>
                <a href="../TeleBotV3/?NhiemVuNgay" style="padding-left: 30px;"><i class="fa-solid fa-list"></i>
                    <p>Nhiệm Vụ Ngày</p>
                </a>
                <a href="../TeleBotV3/?DacQuyenVip" style="padding-left: 30px;"><i class="fa-solid fa-medal"></i>
                    <p>Đặc Quyền Vip</p>
                </a>
                <a href="../TeleBotV3/?FanMienPhi" style="padding-left: 30px;"><i class="fa-solid fa-star"></i>
                    <p>Fan Miễn Phí 25K</p>
                </a>
                <a href="../TeleBotV3/?Ctv" style="padding-left: 30px;"><i class="fa-solid fa-user-plus"></i>
                    <p>Trở Thành CTV</p>
                </a>
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-brands fa-telegram"></i>
                    <p>Liên Kết Tele</p>
                </a>
            </div>
        </div>
        <main>
            <div class="row">
                <div style="display: flex;">
                    <h1><i class="fa-solid fa-bullhorn"></i></h1>
                    <marquee><?= $ThongBaoAdmin ?></marquee>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="loginBox">
                    <form method="post">
                        <div><a href=""><img
                                    src="<?= $ImageLogo ?>"
                                    width="220" height="auto"></a></div>
                        <div>
                            <div class="mb-3">
                                <h1 style="font-size: 80%;">Liên Kết Telegram
                                </h1>
                                <h1 style="font-size: 80%; margin-bottom: 20px;">
                                    * Lưu ý: 1 tài khoản chỉ liên kết một telegram duy nhất. Nếu bạn đã có tài khoản hãy
                                    đăng nhập vào mục cài đặt thay đổi id tele của bạn
                                </h1>
                                <script async src="https://telegram.org/js/telegram-widget.js?22"
                                    data-telegram-login="Lixi66_bot" data-size="large" data-userpic="false"
                                    data-auth-url="LienKetTele?" data-request-access="write"></script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AllJs"></script>
<?php 
    if (isset($_GET['id'])) {
        $IdTelegram = $_GET['id'];
        $CheckIdTele = $System->CheckIdTeleInDb($IdTelegram);
        if ($CheckIdTele === false) {
            $TokenUser = $_SESSION['TokenUser'];
            $QueryUpdate = "UPDATE user SET IdTelegram = '$IdTelegram' WHERE TokenUser = '$TokenUser'";
            $Check = $System->conn->UpdateData($QueryUpdate);
            if ($Check !== false) {
                $_SESSION['IdTelegram'] = $IdTelegram;
                $Ip = $System->getRealUserIp();
                $Device = $System->GetDevice();
                $NickName = $_SESSION['Nickname'];
                $Msg = "
                    💳 Id Telegram: ".$IdTelegram."\n✅ Bạn đã đăng ký thành công tại LIXI66.TOP\nIP: ".$Ip."\nDEVICE: ".$Device."\nTặng bạn số tiền 2,000 đ khời nghiệp !
                ";
                $TeleBot->SEND_entities($Msg, $_SESSION['IdTelegram']);   
?>
<?php           
                $Script = "
                    <script>
                        setTimeout(() => {
                            location.href = '../TeleBotV3/?TrangChu';
                        }, 200);
                    </script>";
                echo $Script;
                exit;
            }
        }
        elseif ($CheckIdTele === true){
?>
<script>
Swal.fire({
    text: "Id Telegram đã tồn tại trong hệ thống !",
    icon: "error",
    timer: 3000,
    iconColor: 'red',
    color: 'brown',
    showClass: {
        popup: `
      animate__animated
      animate__fadeInUp
      animate__faster
    `
    },
    hideClass: {
        popup: `
      animate__animated
      animate__fadeOutDown
      animate__faster
    `
    },
    timerProgressBar: true
});
</script>
<?php 
        return; }
    }
?>