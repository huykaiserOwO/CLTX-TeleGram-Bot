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
                <a href="?DangNhap" style="padding-left: 30px;"><i class="fa-solid fa-right-to-bracket"></i>
                    <p>Đăng Nhập</p>
                </a>
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-right-to-bracket"></i>
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
                        <div><a href=""><img
                                    src="<?= $ImageLogo ?>"
                                    width="220" height="auto"></a>
                        </div>
                        <div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="Email" placeholder="Email"
                                    name="EmailAccount">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="Nickname" placeholder="Nickname"
                                    name="Nickname">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="PasswordAccount" placeholder="Mật khẩu"
                                    name="PasswordAccount">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="PasswordRepeat"
                                    placeholder="Nhập lại mật khẩu" name="PasswordRepeat">
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
                                        style="color: whitesmoke;font-weight:600;">ĐĂNG KÝ</span></button>
                            </div>
                            <span class="sign__text">Đã có tài khoản? <a href="?DangNhap">Đăng nhập!</a></span>
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

        if (!empty($_POST['EmailAccount']) and !empty($_POST['Nickname']) and !empty($_POST['PasswordAccount']) and !empty($_POST['PasswordRepeat']) and !empty($_POST['CSRF'])) {
            $EmailAccount = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['EmailAccount'])));
            $NickName = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['Nickname'])));
            $PasswordAccount = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['PasswordAccount'])));
            $PasswordRepeat = preg_replace('/\s+/', '', $System->DectInjecSql($System->DectXSS($_POST['PasswordRepeat'])));
            $CSRF = $_POST['CSRF'];
            if ($_SESSION['TokenForm'] != $CSRF) {
?>
<script>
Swal.fire({
    text: "Dữ liệu form không có thuộc về web chúng tôi ???",
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
    } else {
            if ($System->CheckEmailInDb($EmailAccount)) {
?>
<script>
Swal.fire({
    text: "Email đã tồn tại trong hệ thống !",
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
            if ($System->FilterEmail($EmailAccount) == 0) {
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
           return; } 
           if ($System->CheckNicknameInDb($NickName)) {
?>
<script>
Swal.fire({
    text: "Nickname đã tồn tại trong hệ thống",
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
           if ($System->CheckSpecialCharsAndVietNamese($NickName) === false) {
?>
<script>
Swal.fire({
    text: "Nickname có kí tự đặc biệt hoặc từ tiếng việt !",
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
           if (strlen($NickName) < 5 or strlen($NickName) > 12) {
?>
<script>
Swal.fire({
    text: "Độ dài Nickname trên 5 kí tự và tối đa 12 kí tự",
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
             return;
           }
           if (strlen($PasswordAccount) < 5 or strlen($PasswordAccount) > 12) {
?>
<script>
Swal.fire({
    text: "Độ dài mật khẩu trên 5 kí tự và tối đa 12 kí tự",
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

           if ($PasswordAccount != $PasswordRepeat) {
?>
<script>
Swal.fire({
    text: "Mật khẩu nhập lại không khớp mật khẩu bạn nhập !",
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

           $TokenUser = $System->RandomStringNumber(10);
           $TimeInit = date('H:i d/m/Y');
           $Wallet = 2000;
           $Md5Password = $System->Md5($PasswordAccount);
           $Query = "INSERT INTO user (IdTelegram, TokenUser, TimeInit, Email, Nickname, Password, AppBanking, Stk, BankingUserName, Wallet) VALUES ('','$TokenUser','$TimeInit','$EmailAccount','$NickName','$Md5Password','','','','$Wallet')";
           $Check = $System->conn->InsertData($Query);
           if ($Check !== false) {
                unset($_SESSION['TokenForm']);
                $_SESSION['TokenUser'] = $TokenUser;
                $_SESSION['Nickname'] = $NickName;
                $Ip = $System->getRealUserIp();
                $Device = $System->GetDevice();         
                $Script = "
                    <script>
                        setTimeout(() => {
                            location.href = 'LienKetTele';
                        }, 200);
                    </script>";
                echo $Script;
                exit;
?>
<?php               
                }
            }
?>
<?php 
        }
        elseif(empty($_POST['EmailAccount']) or empty($_POST['Nickname']) or empty($_POST['PasswordAccount']) or empty($_POST['PasswordRepeat'])) {
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
    } }
?>