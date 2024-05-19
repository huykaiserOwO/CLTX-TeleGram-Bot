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

<body class="LichSuChoi">
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
                <a href="#" class="User">
                    <span><img
                            src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo256.png"
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
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-clock-rotate-left"></i>
                    <p>Lịch Sử Chơi</p>
                </a>
                <a href="?TaiKhoan" style="padding-left: 30px;"><i class="fa-solid fa-user-gear"></i>
                    <p>Tài Khoản</p>
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
                    <h1>
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <p>LỊCH SỬ CHƠI CỦA BẠN</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr style="font-size: 80%;word-wrap: normal;">
                                    <th>Thời gian</th>
                                    <th>Trò chơi</th>
                                    <th>Đã chọn</th>
                                    <th>Tiền cược</th>
                                    <th>Tiền nhận</th>
                                    <th>Kết quả</th>
                                </tr>
                            </thead>
                            <tbody id="GameHistoryUser">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AllJs"></script>
<script>
socket.emit('JoinRoom', '<?= $_SESSION['IdTelegram'] ?>')
var GameHistoryUser = document.getElementById('GameHistoryUser');
socket.emit('GameHistoryUser', '<?= $_SESSION['IdTelegram'] ?>')
socket.on('GameHistoryUser', (data) => {
    var Text = "";
    for (var x in data) {
        Text += `
            <tr style="line-height: 26px;">
                <td style="color: whitesmoke;word-wrap: normal;">` + data[x]['TimeInit'] + `</td>
                <td style="color: whitesmoke;word-wrap: normal;">` + data[x]['TroChoi'] + `</td>
                <td style="color: whitesmoke;word-wrap: normal;">` + data[x]['DaChon'] +
            `</td>
                <td style="color: whitesmoke;word-wrap: normal;"><button type="button" class="btn btn-secondary" style="padding: 0 10px;font-size:90%">` +
            Intl.NumberFormat('vi-VN').format(
                data[x]['SoTien']) + ` đ</button></td>
                <td style="color: whitesmoke;word-wrap: normal;">` + Intl.NumberFormat('vi-VN').format(data[x][
                'TraThuong'
            ]) +
            ` đ</td>
                <td style="color: whitesmoke;word-wrap: normal;"><button type="button" class="btn btn-secondary" style="padding: 0 10px;font-size:90%">` +
            data[x]['KetQua1'] + `</button></td>
            </tr>
        `;
    }
    GameHistoryUser.innerHTML = Text;
})
</script>