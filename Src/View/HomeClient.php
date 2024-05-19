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
                    <a class="btn btn-danger" href="" role="button"><i class="fa-solid fa-gamepad"></i> GAME TELE</a>
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
            <div class="container" style="margin-top: 30px;">
                <div class="row">
                    <div class="headerBox">
                        <h1><i class="fa-solid fa-dice-five"></i>
                            <p style="line-height: 15px;">GAME TELEGRAM</p>
                        </h1>
                    </div>
                    <div class="ListGame">
                        <button type="button" class="btn btn-light BtnGame" id="Btn1">🎲 Chẳn Lẻ Tele</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn2">🎲 Tài Xỉu Tele</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn3">🎲 Xúc Xắc Tele</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn4">🎰 Slot Tele</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn5">💲 BTC Tele</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn6">🍀 Sổ Xố</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn7">🎲 Bàn Tài Xỉu</button>
                        <button type="button" class="btn btn-light BtnGame" id="Btn8">⚽️ Bóng Đá</button>
                    </div>
                    <div class="bodyBox">
                        <h2><b class="GameName">🎲 Chẳn Lẻ Tele</b> là một game dựa vào kết quả của <b
                                class="GameType">Timestick ⏱</b></h2>
                        <h2>Chat Bot Tele để chơi <a class="btn btn-danger" href="<?= $LinkBotTele ?>" role="button">Bot Telegram</a></h2>
                        <div class="table-responsive">
                            <table class="table table-striped" style="font-size: 100%;">
                                <thead>
                                    <tr>
                                        <th>Game</th>
                                        <th>Điểm</th>
                                        <th>Tỉ lệ</th>
                                    </tr>
                                </thead>
                                <tbody id="ListGame">
                                    <tr>
                                        <td style="color: white;">C</td>
                                        <td style="color: white;">
                                            <button type="button" class="btn btn-secondary DiemGame">0 - 2 - 4 - 6 -
                                                8</button>
                                        </td>
                                        <td style="color: white;">x1.95</td>
                                    </tr>
                                    <tr>
                                        <td style="color: white;">L</td>
                                        <td style="color: white;">
                                            <button type="button" class="btn btn-secondary DiemGame">1 - 3 - 5 - 7 -
                                                9</button>

                                        </td>
                                        <td style="color: white;">x1.95</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin: 30px;">
                            <button type="button" class="btn btn-danger">Tiền Cược</button> <b
                                style="color:whitesmoke;">x</b> <button type="button" class="btn btn-danger">Tỉ
                                lệ</button> <b style="color: whitesmoke;">=</b> <button type="button"
                                class="btn btn-danger">Tiền Thắng</button>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            - Chat riêng với bot: ND cược [dấu cách] số tiền chơi
                        </div>
                    </div>
                </div>
                <div class="row" style="height:100%;">
                    <div class="headerBox">
                        <h1><i class="fa-solid fa-dice-five"></i>
                            <p style="line-height: 15px;">LƯU Ý</p>
                        </h1>
                    </div>
                    <div class="bodyBox">
                        <div class="alert alert-warning" role="alert">
                            ⏱ TimeStick: <b id="TimeStick"></b> <br>
                            - Timestick là thời gian hiện tại tính theo mili giây 0,001 giây <br>
                            - Thời gian các bạn đặt lệnh, BOT sẽ tự động ghi nhận Timestick và sử dụng để xét kết quả
                            thắng/thua <br>
                            - Quy đổi Timestick sang ngày tháng tại: <a href="https://www.epochconverter.com/"
                                style="text-decoration: none;">epochconverter.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1><i class="fa-solid fa-clock-rotate-left"></i>
                        <p style="line-height: 15px;">LỊCH SỬ CHƠI GẦN ĐÂY</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div style="text-align: center;">
                        <h2>ĐỂ XEM LỊCH SỬ CHƠI GẦN ĐÂY CỦA BẠN, VUI LÒNG <a href="#"
                                style="color: #fef142;text-decoration: none;">ĐĂNG NHẬP</a> HOẶC <a href="#"
                                style="color: #fef142;text-decoration: none;">ĐĂNG KÝ</a> NHANH</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1><i class="fa-solid fa-clock-rotate-left"></i>
                        <p style="line-height: 15px;">LỊCH SỬ THAM GIA</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr style="font-size: 80%;word-wrap: normal;">
                                    <th>Thời gian</th>
                                    <th>Nick name</th>
                                    <th>Trò chơi</th>
                                    <th>Đã chọn</th>
                                    <th>Tiền cược</th>
                                    <th>Tiền nhận</th>
                                    <th>Kết quả</th>
                                </tr>
                            </thead>
                            <tbody id="GameHistory">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1><i class="fa-solid fa-medal"></i>
                        <p style="line-height: 15px;">TOP TAY TO TUẦN</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr style="font-size: 80%;word-wrap: normal;">
                                    <th>Hạng</th>
                                    <th>Nick name</th>
                                    <th>Tổng tiền cược</th>
                                </tr>
                            </thead>
                            <tbody id="Top">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AllJs"></script>