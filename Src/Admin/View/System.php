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
    <!-- Alertify js -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- Admin Lte -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../TeleBotV3/Src/Public/Lib/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="All">
</head>

<body id="System">
    <div class="Box">
        <header class="Header">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo.gif"
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
                        src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo.gif" width="200"
                        height="auto"></a>
                <a href="#" class="User">
                    <span><img
                            src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo256.png"
                            width="50" height="auto" style="border-radius: 50%;"></span>
                    <span style="margin-top: 5px;">
                        <p>Xin chào</p>
                        <p>ADMIN</p>
                    </span>
                </a>
            </div>
            <div style="margin-top: 150px;position: relative;z-index: 1;">
                <a href="?" style="padding-left: 30px;" class="active">
                    <i class="fa-solid fa-house"></i>
                    <p>HỆ THỐNG</p>
                </a>
                <a href="?Game" style="padding-left: 30px;">
                    <i class="bi bi-controller"></i>
                    <p>GAME</p>
                </a>
                <a href="?Banking" style="padding-left: 30px;">
                    <i class="bi bi-bank"></i>
                    <p>BANKING</p>
                </a>
                <a href="?LogOut" style="padding-left: 30px;">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <p>ĐĂNG XUẤT</p>
                </a>
            </div>
        </div>
        <main>
            <div class="row" style="margin-top: 30px;">
                <div style="display: flex;gap:20px;padding: 20px;flex-wrap: wrap;justify-content: center;">
                    <a class="btn btn-primary" href="?QuanLyNguoiChoi" role="button"><i class="fa-solid fa-gears"></i> Quản lý người
                        chơi</a>
                    <a class="btn btn-primary" href="?Giftcode" role="button"><i class="fa-solid fa-gears"></i> Giftcode</a>
                    <a class="btn btn-primary" href="?LichSuGame" role="button"><i class="fa-solid fa-gears"></i> Lịch sử game</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Số Lượng Người Chơi</span>
                            <span class="info-box-number">
                                <b id="User">0</b>
                                <small>Người</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tổng Doanh Thu</span>
                            <span class="info-box-number">
                                <b id="TongDoanhThu">0</b>
                                <small>VND</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doanh Thu Game Tele</span>
                            <span class="info-box-number">
                                <b id="TongDoanhThuGameTele">0</b>
                                <small>VND</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doanh Thu Game Momo</span>
                            <span class="info-box-number">
                                <b id="TongDoanhThuGameMomo">0</b>
                                <small>VND</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doanh Thu Game Zalopay</span>
                            <span class="info-box-number">
                                <b id="TongDoanhThuGameZalopay">0</b>
                                <small>VND</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doanh Thu Game Banking</span>
                            <span class="info-box-number">
                                <b id="TongDoanhThuGameBanking">0</b>
                                <small>VND</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox" style="margin-bottom: 10px;">
                    <h1>
                        <p>ĐƠN CƯỢC BÓNG ĐÁ VÀ SỔ XỐ</p>
                    </h1>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-football"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">
                                <b id="SoDonCuocbongDa">0</b>
                                <small>Đơn</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-dice"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <span class="info-box-number">
                                <b id="SoDonCuocSoXo">0</b>
                                <small>Đơn</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox" style="margin-bottom: 15px;">
                    <h1>
                        <p>HỆ THỐNG</p>
                    </h1>
                </div>
                <div>
                    <form method="post" enctype="multipart/form-data">
                        <label class="label-form" style="color: #fef142;"><i class="fa-solid fa-image"></i> Upload
                            ảnh hệ thống</label>
                        <div style="margin-top: 10px; margin-bottom: 10px;">
                            <img src="" width="100" height="auto" id="ImageLogo">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="fileToUpload">
                        </div>
                        <div class="mb-3">
                            <label for="TenGame" class="form-label" style="color: #fef142;"><i
                                    class="fa-solid fa-gamepad"></i> Thay
                                đổi
                                tên Game</label>
                            <input type="text" class="form-control" id="TenGame" placeholder="Tên game" name="TenGame">
                        </div>
                        <div class="mb-3">
                            <label for="LinkBot" class="form-label" style="color: #fef142;"><i
                                    class="fa-brands fa-telegram"></i> Link Bot Telegram</label>
                            <input type="text" class="form-control" id="LinkBotTele" placeholder="Link Bot"
                                name="LinkBotTele">
                        </div>
                        <div class="mb-3">
                            <label for="ThongBao" class="form-label" style="color: #fef142;"><i
                                    class="fa-solid fa-bullhorn"></i> Thông báo tới
                                người
                                chơi
                                trên website và telegram</label>
                            <textarea class="form-control" id="ThongBao" rows="1" name="ThongBao"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color: #fef142;"><i
                                    class="fa-solid fa-database"></i> Làm mới các bảng dữ liệu</label>
                            <select class="form-select" aria-label="Default select example" name="LamMoiCacBang">
                                <option selected>Auto</option>
                                <option value="Off">Off</option>
                                <option value="On">On</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color: #fef142;"><i
                                    class="fa-solid fa-server"></i> Bảo
                                trì
                                hệ thống</label>
                            <select class="form-select" aria-label="Default select example" name="BaoTriHeThong">
                                <option selected>Auto</option>
                                <option value="Off" id="Off">Off</option>
                                <option value="On" id="On">On</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Cập Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AdminJs"></script>
<script>
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('System', '<?= $_SESSION['TokenAdmin'] ?>');
</script>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // File To Up Load
        if (empty($_FILES["fileToUpload"]) === FALSE) {
            if (!empty($_FILES["fileToUpload"]['name'])) {
                $target_dir = "../../../Website/Client/Public/Assets/Upload/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check === false) {
?>
<script>
Swal.fire({
    text: "File không phải là ảnh !",
    icon: "error",
    timer: 1000,
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
}, 1000);
</script>
</script>
<?php 
               return; }
               if (file_exists($target_file)) {
?>
<script>
Swal.fire({
    text: "File ảnh đã tồn tại trong hệ thống !",
    icon: "error",
    timer: 1000,
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
}, 1000);
</script>
<?php 
               return; }
               if ($_FILES["fileToUpload"]["size"] > 500000) {
?>
<script>
Swal.fire({
    text: "File ảnh quá lớn !",
    icon: "error",
    timer: 1000,
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
}, 1000);
</script>
<?php 
               return; }
               if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $FileJsonPath = "/TeleBotV2/Server/Public/Json/System.json";
                $FileJson = $System->OpenFileJson($FileJsonPath);
                $Settings = "Image/Logo";
                $Id = 1;
                $Key = "Url";
                $ChangeContent = 'https://'.$_SERVER['SERVER_NAME'].'/TeleBotV3/Src/Public/Upload/' . $_FILES["fileToUpload"]["name"];
                $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings, $Id, $Key, $ChangeContent);
?>
<script>
Swal.fire({
    text: "Upload file ảnh thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
</script>
<?php 
                clearstatcache();
                return;}
                else {
?>
<script>
Swal.fire({
    text: "Upload file ảnh thất bại !",
    icon: "error",
    timer: 1000,
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
}, 1000);
</script>
<?php 
                return;}

            }

        }
        # Tên game 
        if (!empty($_POST['TenGame'])) {
            $FileJsonPath = "../TeleBotV3/Server/Public/Json/System.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings = "TenGame";
            $Id = 2;
            $Key = "Name";
            $ChangeContent = $_POST['TenGame'];
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings, $Id, $Key, $ChangeContent);
        ?>
<script>
Swal.fire({
    text: "Thay đổi tên game thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php 
        return;}
        # Link Bot Tele
        if (!empty($_POST['LinkBotTele'])) {
            $FileJsonPath = "../TeleBotV3/Server/Public/Json/System.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings = "LinkBotTele";
            $Id = 3;
            $Key = "Url";
            $ChangeContent = $_POST['LinkBotTele'];
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings, $Id, $Key, $ChangeContent);
?>
<script>
Swal.fire({
    text: "Thay đổi link bot telegram thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php 
        return; } 
        if (!empty($_POST['ThongBao'])) {
            $Msg = $_POST['ThongBao'];
            $Query = "SELECT IdTelegram FROM user";
            $Data = $System->conn->SelectData($Query);
            if ($Data !== false) {
                foreach ($Data as $IdTelegram) {
                    if (empty($IdTelegram['IdTelegram'])) {
                        continue;
                    }
                    $TeleBot->SEND($Msg, $IdTelegram['IdTelegram']);
                }
                $FileJsonPath = "../TeleBotV3/Server/Public/Json/System.json";
                $FileJson = $System->OpenFileJson($FileJsonPath);
                $Settings = "ThongBao";
                $Id = 6;
                $Key = "Msg";
                $ChangeContent = $Msg;
                $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings, $Id, $Key, $ChangeContent);
            }
?>
<script>
Swal.fire({
    text: "Gửi thông báo tới người chơi thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php        
        exit; }
        if (!empty($_POST['LamMoiCacBang'])) {
            if ($_POST['LamMoiCacBang'] == 'On') {
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkenguoichoi');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkegamemomo');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkegamezalopay');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkegamebanking');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkegametele');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE giftcodehistory');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE lichsuruttien');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE bangtop');
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE deposit_history');
?>
<script>
Swal.fire({
    text: "Hệ thống làm mới các bảng dữ liệu thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php 
            return;}
        }
        if (!empty($_POST['BaoTriHeThong'])) {
            $FileJsonPath = "/TeleBotV2/Server/Public/Json/System.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings = "BaoTriHeThong";
            $Id = 4;
            $Key = "On_Off";
            $ChangeContent = $_POST['BaoTriHeThong'];
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings, $Id, $Key, $ChangeContent);
            if ($_POST['BaoTriHeThong'] == 'On') {         
                $Msg = "🔧 Hiện tại hệ thống đang bảo trì. Xin lỗi vì dịch vụ của chúng tôi !";
                $Query = "SELECT IdTelegram FROM user";
                $Data = $System->conn->SelectData($Query);
                if ($Data !== false) {
                    foreach ($Data as $IdTelegram) {
                        $TeleBot->SEND($Msg, $IdTelegram['IdTelegram']);
                    }
                }
?>
<script>
Swal.fire({
    text: "Hệ thống cập nhập thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php 
            return; }
            else {         
                $Msg = "✅ Hệ thống đã hoạt động trở lại !";
                $Query = "SELECT IdTelegram FROM user";
                $Data = $System->conn->SelectData($Query);
                if ($Data !== false) {
                    foreach ($Data as $IdTelegram) {
                        $TeleBot->SEND($Msg, $IdTelegram['IdTelegram']);
                    }
                }
?>
<script>
Swal.fire({
    text: "Hệ thống cập nhập thành công !",
    icon: "success",
    timer: 1000,
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
}, 1000);
</script>
<?php 
            return; }
        }
    }
?>