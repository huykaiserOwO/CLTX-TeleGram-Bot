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

<body class="CtvClient">
    <header class="Header">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= $ImageLogo ?>" width="200"
                        height="auto">
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
            <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-user-plus"></i>
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
                <a class="btn btn-primary" href="?Momo" role="button"><i class="fa-solid fa-gamepad"></i> GAME MOMO</a>
                <a class="btn btn-primary" href="?Banking" role="button"><i class="fa-solid fa-gamepad"></i> GAME
                    BANKING</a>
                <a class="btn btn-primary" href="?BanTaiXiu" role="button"><i class="fa-solid fa-gamepad"></i> BÀN TÀI
                    XỈU</a>
                <a class="btn btn-primary" href="?BanBauCua" role="button"><i class="fa-solid fa-gamepad"></i> BÀN BẦU
                    CUA</a>
                <a class="btn btn-primary" href="?BongDa" role="button"><i class="fa-solid fa-gamepad"></i> BÓNG ĐÁ</a>
                <a class="btn btn-primary" href="?SoXo" role="button"><i class="fa-solid fa-gamepad"></i> SỔ XỐ</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="headerBox">
                <h1 style="justify-content: center;">
                    <i class="fa-solid fa-user-plus"></i>
                    <p>GIỚI THIỆU NGƯỜI CHƠI</p>
                </h1>
            </div>
            <div class="bodyBox" style="text-align: center;">
                <h2>LINK GIỚI THIỆU CỦA BẠN:</h2>
                <h2>VUI LÒNG <a href="" style="color: #fef142;text-decoration: none;">ĐĂNG NHẬP</a> HOẶC <a href=""
                        style="color: #fef142;text-decoration: none;">ĐĂNG KÝ</a> ĐỂ NHẬN LINK GIỚI THIỆU</h2>
                <h2><b>GIỚI THIỆU NGƯỜI CHƠI</b> là chương trình cho phép bạn nhận thưởng lên tới 399K cho mỗi lượt giới
                    thiệu người chơi đến với chúng tôi.</h2>
                <h2>Bạn sẽ nhận được một khoản tiền khi người bạn giới thiệu đạt các mốc dưới đây.</h2>
            </div>
            <div class="NhiemVuNgayTable" style="margin-top: 30px;">
                <div class="table-reponsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mốc Chơi</th>
                                <th>Thưởng</th>
                                <th>% Nhận</th>
                            </tr>
                        </thead>
                        <tbody style="line-height: 55px;">
                            <tr>
                                <td>Đăng ký tài khoản</td>
                                <td>2,000 (+TK)</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>10,000</td>
                                <td>5,000 (+TK)</td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>30,000</td>
                                <td>10,000 (+TK)</td>
                                <td>33%</td>
                            </tr>
                            <tr>
                                <td>100,000</td>
                                <td>15,000 <i style="color: #fef142;">(fan +ATM)</i></td>
                                <td>15%</td>
                            </tr>
                            <tr>
                                <td>500,000</td>
                                <td>27,000 <i style="color: #fef142;">(fan +ATM)</i></td>
                                <td>5.8%</td>
                            </tr>
                            <tr>
                                <td>1,000,000</td>
                                <td>40,000 <i style="color: #fef142;">(fan +ATM)</i></td>
                                <td>4%</td>
                            </tr>
                            <tr>
                                <td>5,000,000</td>
                                <td>100,000 <i style="color: #fef142;">(fan +ATM)</i></td>
                                <td>2%</td>
                            </tr>
                            <tr>
                                <td>10,000,000</td>
                                <td>200,000 <i style="color: #fef142;">(fan +ATM)</i></td>
                                <td>1%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="AllJs"></script>