<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title Page-->
    <title id="TitlePage"></title>
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
    <link rel="stylesheet" href="LoginCss">
    <link rel="stylesheet" href="All">
</head>

<body>
    <div style="margin-top: 100px;">
        <div class="loginBox">
            <form method="post" enctype="multipart/form-data">
                <div><a href=""><img
                            src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo.gif"
                            width="220" height="auto"></a></div>
                <div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="AdminAccount" placeholder="Tài khoản admin"
                            name="AdminAccount">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="PasswordAccount" placeholder="Mật khẩu"
                            name="PasswordAccount">
                    </div>
                    <div style="margin: 0;">
                        <button class="sign__btn" type="submit" fdprocessedid="6npn4"><span
                                style="color: whitesmoke;font-weight:600;">ĐĂNG NHẬP</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['AdminAccount']) and !empty($_POST['PasswordAccount'])) {
            $Account = $System->DectInjecSql($System->DectXSS($_POST['AdminAccount']));
            $Password = $System->Md5($System->DectInjecSql($System->DectXSS($_POST['PasswordAccount'])));
            $Query = "SELECT * FROM admin WHERE Account = '$Account' AND Password = '$Password'";
            $Check = $System->conn->SelectData($Query);
            if ($Check != false) {
                $SoLanThietBiDangNhap = (int)$Check[0]['ThietBiDangNhap'];
                if ($SoLanThietBiDangNhap < 3) {
                    $SoLanThietBiDangNhap = $SoLanThietBiDangNhap + 1;
                    $Query = "UPDATE admin SET ThietBiDangNhap = '$SoLanThietBiDangNhap' WHERE Account = '$Account' AND Password = '$Password'";
                    $System->conn->UpdateData($Query);
                    $_SESSION['TokenAdmin'] = $Account;
                    $Ip = $System->getRealUserIp();
                    $Device = $System->GetDevice();
                    $Msg = "
                        ✅ Bạn đã đăng nhập thành công ADMIN\nIP: ".$Ip."\nDEVICE: ".$Device."
                    ";
                    $TeleBot->SEND_group($Msg, '-1002025011978');

?>
<script>
Swal.fire({
    text: "Đăng nhập thành công !",
    icon: "success",
    timer: 2000,
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
setTimeout(() => {
    location.href = "";
}, 2100)
</script>
<?php 



                exit; }
                else {
?>
<script>
Swal.fire({
    text: "Số lần thiết bị quá tối đa <?= $SoLanThietBiDangNhap ?> lần !",
    icon: "error",
    timer: 2000,
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
                exit; }
            }
            else {
?>
<script>
Swal.fire({
    text: "Điền sai thông tin !",
    icon: "error",
    timer: 2000,
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
            
        exit; }
        else {
?>
<script>
Swal.fire({
    text: "Điền đầy đủ thông tin !",
    icon: "error",
    timer: 2000,
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
        exit; }
    }
?>