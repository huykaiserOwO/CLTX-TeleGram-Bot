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
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    font-size: 73%;
}

th,
td {
    padding: 16px;
    font-weight: 610;


}

tr {
    border-bottom: 1px solid darkgray;
}

.FlexDiv {
    justify-content: center;
    display: flex;
    flex-direction: row;
    gap: 30px;
}

.FlexDiv span {
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
}

input {
    border-radius: 10px;
    padding: 2px 10px;
    font-size: 80%;
    font-weight: 600;
    color: red;
    border: none;
    background-color: transparent;
}
</style>

<body class="BongDaClient">
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
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-house"></i>
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
                <div style="display: flex;gap:20px;padding: 20px;flex-wrap: wrap;justify-content: center;">
                    <a class="btn btn-primary" href="?TrangChu" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                        TELE</a>
                    <a class="btn btn-primary" href="?Zalopay" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                        ZALOPAY</a>
                    <a class="btn btn-primary" href="?Momo" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                        MOMO</a>
                    <a class="btn btn-primary" href="?Banking" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                        BANKING</a>
                    <a class="btn btn-primary" href="?BanTaiXiu" role="button"><i class="fa-solid fa-gamepad"></i> BÀN
                        TÀI
                        XỈU</a>
                    <a class="btn btn-primary" href="?BanBauCua" role="button"><i class="fa-solid fa-gamepad"></i> BÀN
                        BẦU
                        CUA</a>
                    <a class="btn btn-danger" href="" role="button"><i class="fa-solid fa-gamepad"></i> BÓNG ĐÁ</a>
                    <a class="btn btn-primary" href="?SoXo" role="button"><i class="fa-solid fa-gamepad"></i> SỔ XỐ</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-football"></i>
                        <p>GIẢI BÓNG ĐÁ TRỰC TUYẾN</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="BongDaBox" style="margin-bottom: 100px;">
                        <div class="table-responsive-xxl">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="7" style="color: whitesmoke;"><img src="" width="50" height="auto"
                                                id="ImgGiai"> <b id="GiaiName" style="font-weight: 600;"></b></th>
                                    </tr>
                                    <tr style="color: whitesmoke; text-align: center;font-size:110%;">
                                        <th>Giờ</th>
                                        <th>Trận Đấu</th>
                                        <th>Tỷ Lệ Cả Trận</th>
                                        <th>Tài Xỉu Cả Trận</th>
                                        <th>Tỷ Lệ H1</th>
                                        <th>Tài Xỉu H1</th>
                                    </tr>
                                    <tr style="color: whitesmoke; text-align: center;">
                                        <th colspan="7">
                                            Ngày <b id="DateBongDa" style="font-weight: 600;"></b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="KeoBongDaList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AllJs"></script>
<script>
    socket.emit('KeoBongDa');
</script>