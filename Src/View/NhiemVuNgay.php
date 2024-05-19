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
</head>

<body class="NhiemVuNgay">
    <header class="Header">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= $ImageLogo ?>" width="200" height="auto">
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
            <a href="" class="Logo"><img src="<?= $ImageLogo ?>" width="200" height="auto"></a>
            <a href="#" class="User">
                <span><img src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo256.png"
                        width="50" height="auto" style="border-radius: 50%;"></span>
                <span style="margin-top: 5px;">
                    <p>Xin chào</p>
                    <p><?= $_SESSION['Nickname'] ?></p>
                </span>
            </a>
        </div>
        <div style="margin-top: 150px;position: relative;z-index: 1;">
            <a href="?TrangChu" style="padding-left: 30px;"><i class="fa-solid fa-house"></i>
                <p>Trang Chủ</p>
            </a>
            <a href="?CaiDatBank" style="padding-left: 30px;"><i class="fa-solid fa-building-columns"></i>
                <p>Cài Đặt Bank</p>
            </a>
            <a href="?LichSuChoi" style="padding-left: 30px;"><i class="fa-solid fa-clock-rotate-left"></i>
                <p>Lịch Sử Chơi</p>
            </a>
            <a href="?TaiKhoan" style="padding-left: 30px;"><i class="fa-solid fa-user-gear"></i>
                <p>Tài Khoản</p>
            </a>
            <a href="?GiftCode" style="padding-left: 30px;"><i class="fa-solid fa-gift"></i>
                <p>GiftCode</p>
            </a>
            <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-list"></i>
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
            <a href="?DangXuat" style="padding-left: 30px;"><i class="fa-solid fa-right-from-bracket"></i>
                <p>Đăng Xuất</p>
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
            <div style="display: flex;gap:20px;padding: 20px;flex-wrap: wrap;justify-content: center;">
                <a class="btn btn-primary" href="?TrangChu" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                    TELE</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                    ZALOPAY</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> GAME MOMO</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                    BANKING</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> BÀN TÀI
                    XỈU</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> BÀN BẦU
                    CUA</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> BÓNG ĐÁ</a>
                <a class="btn btn-primary" href="#" role="button"><i class="fa-solid fa-gamepad"></i> SỔ XỐ</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="headerBox">
                <h1 style="justify-content: center;"><i class="fa-solid fa-list"></i>
                    <p>NHIỆM VỤ NGÀY</p>
                </h1>
            </div>
            <div class="bodyBox" style="text-align: center;">
                <h2>TỔNG CHƠI TRONG NGÀY: <b><?= $SoLanChoi ?></b></h2>
                <h2><i>(lưu ý: hệ thông cập nhật tổng chơi mỗi 5p)</i></h2>
                <h2><i>HỆ THỐNG LIÊN TỤC PHÁT CODE NGẪU NHIÊN - MIỄN PHÍ MỖI 10-15P TẠI <a href=""
                            style="text-decoration: none;color:#fef142;">GROUP TELEGRAM</a></i></h2>
                <div class="NhiemVuNgayTable" style="margin-top: 30px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mốc Chơi</th>
                                    <th>Thưởng</th>
                                    <th>Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30,000</td>
                                    <td>15,000 <i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc30k">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>1,000,000</td>
                                    <td>11,111<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc1m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>5,000,000</td>
                                    <td>55,555 <i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc5m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>10,000,000</td>
                                    <td>111,111<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc10m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>30,000,000</td>
                                    <td>333,333<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc30m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>49,000,000</td>
                                    <td>555,555<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc49m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>100,000,000</td>
                                    <td>1,111,111<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc100m">Chưa Đạt</button></td>
                                </tr>
                                <tr>
                                    <td>200,000,000</td>
                                    <td>2,222,222<i style="color: #fef142;">(fan + 20%)</i></td>
                                    <td><button type="button" class="btn btn-secondary"
                                            style="padding: 0 10px;font-size:80%" id="Moc200m">Chưa Đạt</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="AllJs"></script>
<?php 
    if ($TongTienCuoc >= 30000) {
?>
<script>
var Moc30k = document.getElementById('Moc30k');
Moc30k.innerText = 'Đạt';
</script>
<?php 
    }
    if ($TongTienCuoc >= 1000000) {
        ?>
<script>
var Moc1m = document.getElementById('Moc1m');
Moc1m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 5000000) {
        ?>
<script>
var Moc5m = document.getElementById('Moc5m');
Moc5m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 10000000) {
        ?>
<script>
var Moc10m = document.getElementById('Moc10m');
Moc10m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 30000000) {
        ?>
<script>
var Moc30m = document.getElementById('Moc30m');
Moc30m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 49000000) {
        ?>
<script>
var Moc49m = document.getElementById('Moc49m');
Moc49m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 100000000) {
        ?>
<script>
var Moc100m = document.getElementById('Moc100m');
Moc100m.innerText = 'Đạt';
</script>
<?php 
    }

    if ($TongTienCuoc >= 200000000) {
        ?>
<script>
var Moc200m = document.getElementById('Moc200m');
Moc200m.innerText = 'Đạt';
</script>
<?php 
    }

?>