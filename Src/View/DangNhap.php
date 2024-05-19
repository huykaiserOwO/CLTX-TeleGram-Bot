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

<body class="DangKy">
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
                <a href="?TrangChu" style="padding-left: 30px;"><i class="fa-solid fa-house"></i>
                    <p>Trang Chủ</p>
                </a>
                <a href="?GiftCode" style="padding-left: 30px;"><i class="fa-solid fa-gift"></i>
                    <p>GiftCode</p>
                </a>
                <a href="?NhiemVuNgay" style="padding-left: 30px;"><i class="fa-solid fa-list"></i>
                    <p>Nhiệm Vụ Ngày</p>
                </a>
                <a href="?DacQuyenVip" style="padding-left: 30px;"><i class="fa-solid fa-medal"></i>
                    <p>Đặc Quyền Vip</p>
                </a>
                <a href="?FanMienPhi" style="padding-left: 30px;"><i class="fa-solid fa-star"></i>
                    <p>Fan Miễn Phí 25K</p>
                </a>
                <a href="?Ctv" style="padding-left: 30px;"><i class="fa-solid fa-user-plus"></i>
                    <p>Trở Thành CTV</p>
                </a>
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-right-to-bracket"></i>
                    <p>Đăng Nhập</p>
                </a>
                <a href="?DangKy" style="padding-left: 30px;"><i class="fa-solid fa-right-to-bracket"></i>
                    <p>Đăng Ký</p>
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
                    <form method="post" enctype="multipart/form-data">
                        <div><a href="?TrangChu"><img
                                    src="<?= $ImageLogo ?>"
                                    width="220" height="auto"></a>
                        </div>
                        <div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="EmailAccount" placeholder="Email đăng nhập"
                                    name="EmailAccount">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="PasswordAccount" placeholder="Mật khẩu"
                                    name="PasswordAccount">
                            </div>
                            <?php 
                            if (!isset($_SESSION['TokenForm']) and empty($_SESSION['TokenForm'])) {
                                $TokenForm = $System->RandomStringNumber(20);
                                $_SESSION['TokenForm'] = $TokenForm;
                            }
                        ?>
                            <input type="hidden" value="<?= $_SESSION['TokenForm'] ?>" name="CSRF">
                            <div style="margin: 0;">
                                <button class="sign__btn" type="submit" fdprocessedid="6npn4"><span
                                        style="color: whitesmoke;font-weight:600;">ĐĂNG NHẬP</span></button>
                            </div>
                            <span class="sign__text">Chưa có tài khoản? <a href="?DangKy">Đăng Ký!</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AllJs"></script>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['EmailAccount']) and !empty($_POST['PasswordAccount']) and !empty($_POST['CSRF'])) {
            $CSRF = $_POST['CSRF'];
            if ($CSRF == $_SESSION['TokenForm']) {
                $EmailAccount = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['EmailAccount'])));
                $PasswordAccount = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['PasswordAccount'])));
?>
<?php 
                if ($System->FilterEmail($EmailAccount) === 0) {
?>
<script>
Swal.fire({
    text: "Email không đúng định dạng !",
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
                    return;
                }
                if ($System->CheckSpecialCharsAndVietNamese($PasswordAccount) === false) {
?>
<script>
Swal.fire({
    text: "Mật khẩu có kí tự đặc biệt hoặc từ tiếng việt !",
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
                $PasswordMd5 = $System->Md5($PasswordAccount);
                $QuerySelect1 = "SELECT TokenUser, IdTelegram, Nickname FROM user WHERE Email = '$EmailAccount' AND Password = '$PasswordMd5'";
                $Check = $System->conn->SelectData($QuerySelect1);
                if ($Check !== false) {
                    unset($_SESSION['TokenForm']);
                    $TokenUser = $Check[0]['TokenUser'];
                    $IdTelegram = $Check[0]['IdTelegram'];
                    $NickName = $Check[0]['Nickname'];
                    $_SESSION['TokenUser'] = $TokenUser;
                    $_SESSION['IdTelegram'] = $IdTelegram;
                    $_SESSION['Nickname'] = $NickName;
                    $Ip = $System->getRealUserIp();
                    $Device = $System->GetDevice();
                    $Msg = "
                        💳 Id Telegram: ".$IdTelegram."\n✅ Bạn đã đăng nhập thành công tại LIXI66.TOP\nIP: ".$Ip."\nDEVICE: ".$Device."
                    ";
                    $TeleBot->SEND_entities($Msg, $_SESSION['IdTelegram']);

                    $Script = "
                        <script>
                            setTimeout(() => {
                                location.href = '?TrangChu';
                            }, 200);
                        </script>";
                    echo $Script;
                    exit;
                }
                else {
?>
<script>
Swal.fire({
    text: "Email hoặc mật khẩu không đúng !",
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
        }
        else {
?>
<script>
Swal.fire({
    text: "Cần điền đầy đủ thông tin !",
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
        }
    }
?>