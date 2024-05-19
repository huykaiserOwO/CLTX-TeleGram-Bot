<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title Page-->
    <title id="TitlePage"></title>
    <meta http-equiv="refresh" content="12000">
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
<style>
/* width */
::-webkit-scrollbar {
    width: 5px;
    opacity: 1;
}

/* Track */
::-webkit-scrollbar-track {
    opacity: 1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    opacity: 1;
    display: block;
    background-color: whitesmoke;
    border-radius: 30px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    opacity: 1;
    background-color: whitesmoke;
}
</style>
<!-- Modal -->
<div class="modal fade" id="ThemKeo" tabindex="-1" aria-labelledby="ThemKeo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: brown;font-weight:600;">
                    <img src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/betting.png"
                        width="30" height="auto"> KÈO BÓNG ĐÁ
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="application/x-www-form-urlencoded">
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="Giai" placeholder="Thêm giải" name="Giai">
                        <label for="Giai">Thêm giải</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="UrlGiai" placeholder="Url hình ảnh" name="UrlGiai">
                        <label for="UrlGiai">Url hình ảnh giải</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="Date" placeholder="Ngày tháng" name="Date">
                        <label for="Date">Ngày tháng</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="Gio" placeholder="Giờ" name="Gio">
                        <label for="Gio">Giờ</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="DoiNha" placeholder="Tên đội nhà" name="DoiNha">
                        <label for="DoiNha">Tên đội nhà</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="DoiBan" placeholder="Tên đội bạn" name="DoiBan">
                        <label for="DoiBan">Tên đội bạn</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="UrlDoiNha" placeholder="Url hình ảnh đội nhà"
                            name="UrlDoiNha">
                        <label for="UrlDoiNha">Url hình ảnh đội nhà</label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px;">
                        <input type="text" class="form-control" id="UrlDoiBan" placeholder="Url hình ảnh đội bạn"
                            name="UrlDoiBan">
                        <label for="UrlDoiBan">Url hình ảnh đội bạn</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<body id="Game">
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
                <a href="?" style="padding-left: 30px;">
                    <i class="fa-solid fa-house"></i>
                    <p>HỆ THỐNG</p>
                </a>
                <a href="" style="padding-left: 30px;" class="active">
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
                    <a class="btn btn-danger" href="" role="button"><i class="fa-solid fa-gears"></i> GAME TELE</a>
                    <a class="btn btn-primary" href="?MmZlBanking" role="button"><i class="fa-solid fa-gears"></i>
                        GAME MOMO ZALOPAY BANKING</a>
                    <a class="btn btn-primary" href="?BanTaiXiu" role="button"><i class="fa-solid fa-gears"></i> BÀN TÀI
                        XỈU</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>GAME TELE</p>
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
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table table-striped" style="font-size: 100%;">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Game</th>
                                    <th>Điểm</th>
                                    <th>Tỉ lệ</th>
                                </tr>
                            </thead>
                            <tbody id="ListGame">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>THỐNG KÊ GAME TELE</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div style="margin-top: 30px;" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="color:whitesmoke;">
                                    <th>Id</th>
                                    <th>Id Telegram</th>
                                    <th>Nickname</th>
                                    <th>Tổng tiền chơi</th>
                                    <th>Tổng tiền thắng cược</th>
                                </tr>
                            </thead>
                            <tbody id="DoanhThuGameTele">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        <p>SỔ XỐ MIỀN BẮC NGÀY <i id="DateTime"></i></p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;;">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody style="color: whitesmoke;">
                                <tr>
                                    <td style="width:100px;">ĐB</td>
                                    <td style="font-size: 150%;font-weight: 680;" colspan="4" id="DacBiet">
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="4" id="Giai1"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai2"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai2-2"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">3</td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai3"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai3-2"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai3-3"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai3_4"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai3-5"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai3-6"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai4"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai4-2"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai4-3"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai4-4"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">5</td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai5"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai5-2"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai5-3"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai5-4"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai5-5"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai5-6"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai6"></td>
                                    <td style="font-size: 120%;font-weight: 680;" colspan="2" id="Giai6-2"></td>
                                    <td style="font-size: 120%;font-weight: 680;" id="Giai6-3"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td style="font-size: 120%;font-weight: 680;color: #fef142;" id="Giai7"></td>
                                    <td style="font-size: 120%;font-weight: 680;color: #fef142;" id="Giai7-2"></td>
                                    <td style="font-size: 120%;font-weight: 680;color: #fef142;" id="Giai7-3"></td>
                                    <td style="font-size: 120%;font-weight: 680;color: #fef142;" id="Giai7-4"></td>
                                </tr>
                            </tbody>
                        </table>
                        <style>
                        table tbody tr td {
                            font-size: 90%;
                            font-weight: 500;
                            text-align: center;
                            border: 1px solid rgba(255, 255, 255, 0.05);
                        }
                        </style>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>ĐƠN CƯỢC SỔ XỐ</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="font-size: 90%;color:whitesmoke;">
                                <tr>
                                    <th>Thời gian tạo</th>
                                    <th>Id Telegram</th>
                                    <th>Nickname</th>
                                    <th>Nội dung cược</th>
                                    <th>Số tiền cược</th>
                                    <th>Số dự đoán</th>
                                    <th>Trạng thái</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 80%;" id="DonCuocSoXoList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>KÈO BÓNG ĐÁ</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="7" style="color: red;"><img src="" width="50" height="auto"
                                            id="ImgGiai"> <b id="GiaiName" style="font-weight: 600;"></b></th>
                                </tr>
                                <tr style="color: whitesmoke; text-align: center;font-size:110%;">
                                    <th>Giờ</th>
                                    <th>Trận Đấu</th>
                                    <th>Tỷ Lệ Cả Trận</th>
                                    <th>Tài Xỉu Cả Trận</th>
                                    <th>Tỷ Lệ H1</th>
                                    <th>Tài Xỉu H1</th>
                                    <th>Xử Lý</th>
                                </tr>
                                <tr style="color: red; text-align: center;">
                                    <th colspan="7">
                                        Ngày <b id="DateBongDa" style="font-weight: 600;"></b>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="KeoBongDaList">

                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 30px;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ThemKeo">
                            <i class="fa-solid fa-plus"></i> Thêm Kèo
                        </button>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>ĐƠN CƯỢC BÓNG ĐÁ</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="font-size: 90%;text-align: center">
                                <tr style="color: whitesmoke;">
                                    <th>Thời gian tạo</th>
                                    <th>Id Telegram</th>
                                    <th>Nickname</th>
                                    <th>Số tiền cược</th>
                                    <th>Đội</th>
                                    <th>Kèo</th>
                                    <th>Tỉ lệ kèo</th>
                                    <th>Trạng thái</th>
                                    <th>Trả thưởng</th>
                                    <th>Xử lý</th>

                                </tr>
                            </thead>
                            <tbody style="font-size: 80%;" id="DonCuocBongDaList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>CẬP NHẬP</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <label class="form-label" style="color: red;"><i class="fa-solid fa-ban"></i>
                            Cấm người chơi cược bóng đá</label>
                        <p style="font-size: 80%;color:red;font-weight: bold">
                            Lưu ý: chỉ sử dụng khi vào trận
                        </p>
                        <select class="form-select" name="ChanCuocBongDa">
                            <option selected>Chặn cược bóng đá</option>
                            <option value="On">Bật</option>
                            <option value="Off">Tắt</option>
                        </select>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập
                            nhập</button>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label class="form-label" style="color: red;"><i class="fa-solid fa-gift"></i>
                                Trả thưởng</label>
                            <select class="form-select IdTeleList" name="IdTelegram"
                                style="margin-bottom: 10px;color:red;">
                            </select>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="SoTienTraThuong"
                                    placeholder="Số tiền trả thưởng" name="SoTienTraThuong">
                                <label for="SoTienTraThuong">Số tiền trả thưởng</label>
                            </div>
                            <textarea class="form-control" rows="5" name="ThongBaoTraThuong">
LIXI66.TOP 

🎁 Trả thưởng:
👉 Nếu bị lỗi liên hệ admin @Lymannhi
                                    </textarea>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập
                                nhập</button>
                        </div>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <label class="form-label" style="color: red;">
                            Thay đổi tỉ lệ <b id="GameName"></b></label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TiLe1" placeholder="Tỉ lệ 1" name="TiLe1">
                            <label for="TiLe1">Tỉ lệ 1</label>
                        </div>
                        <p style="font-size: 80%;color:red;font-weight: bold">
                            Lưu ý: đối với game <b>Xúc Xắc Tele</b>, <b>Slot Tele</b>
                            mới thay đổi được tỉ lệ 2
                        </p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TiLe2" placeholder="Tỉ lệ 2" name="TiLe2">
                            <label for=" TiLe2">Tỉ lệ 2</label>
                        </div>
                        <p style="font-size: 80%;color:red;font-weight: bold">
                            Lưu ý: đối với game <b>Sổ Xố Tele</b>
                            mới thay đổi được tỉ lệ 3
                        </p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TiLe3" placeholder="Tỉ lệ 3" name="TiLe3">
                            <label for=" TiLe3">Tỉ lệ 3</label>
                        </div>
                        <p style="font-size: 80%;color:red;font-weight: bold">
                            Lưu ý: đối với game <b>Sổ Xố Tele</b>
                            mới thay đổi được tỉ lệ 4
                        </p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TiLe4" placeholder="Tỉ lệ 4" name="TiLe4">
                            <label for=" TiLe4">Tỉ lệ 4</label>
                        </div>
                        <p style="font-size: 80%;color:red;font-weight: bold">
                            Lưu ý: đối với game <b>Sổ Xố Tele</b>
                            mới thay đổi được tỉ lệ 5
                        </p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TiLe5" placeholder="Tỉ lệ 5" name="TiLe5">
                            <label for=" TiLe5">Tỉ lệ 5</label>
                        </div>
                        <input type="hidden" value="" name="Settings" id="Settings">
                        <input type="hidden" value="" name="Id" id="Id">
                        <button type="submit" class="btn btn-danger">Thay Đổi</button>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <label class="form-label" style="color: red;">Làm mới bảng thống kê Game Telegram</label>
                        <select class="form-select" name="LamMoiDuLieuBangThongKeGameTelegram">
                            <option selected value="">Auto</option>
                            <option value="On">On</option>
                        </select>
                        <button type="submit" class="btn btn-danger" style="margin-top: 15px;">Xác
                            Nhận</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<style>
table tbody tr td {
    font-size: 90%;
    font-weight: 500;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.bodyBox {
    height: 350px;
    overflow-y: scroll;
}

#ShowSearch {
    display: none;
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
    font-size: 120%;
    font-weight: 600;
    color: red;
    border: none;
    background-color: transparent;
}
</style>
<script src="AdminJs"></script>
<script>
// So Xo
var SoXo = document.getElementsByClassName('SoXo');
var DateTime = document.getElementById('DateTime');
var DacBiet = document.getElementById('DacBiet');
var Giai1 = document.getElementById('Giai1');
var Giai2 = document.getElementById('Giai2');
var Giai2_2 = document.getElementById('Giai2-2');
var Giai3 = document.getElementById('Giai3');
var Giai3_2 = document.getElementById('Giai3-2');
var Giai3_3 = document.getElementById('Giai3-3');
var Giai3_4 = document.getElementById('Giai3_4');
var Giai3_5 = document.getElementById('Giai3-5');
var Giai3_6 = document.getElementById('Giai3-6');
var Giai4 = document.getElementById('Giai4');
var Giai4 = document.getElementById('Giai4');
var Giai4_2 = document.getElementById('Giai4-2');
var Giai4_3 = document.getElementById('Giai4-3');
var Giai4_4 = document.getElementById('Giai4-4');
var Giai5 = document.getElementById('Giai5');
var Giai5_2 = document.getElementById('Giai5-2');
var Giai5_3 = document.getElementById('Giai5-3');
var Giai5_4 = document.getElementById('Giai5-4');
var Giai5_5 = document.getElementById('Giai5-5');
var Giai5_6 = document.getElementById('Giai5-6');
var Giai6 = document.getElementById('Giai6');
var Giai6_2 = document.getElementById('Giai6-2');
var Giai6_3 = document.getElementById('Giai6-3');
var Giai7 = document.getElementById('Giai7');
var Giai7_2 = document.getElementById('Giai7-2');
var Giai7_3 = document.getElementById('Giai7-3');
var Giai7_4 = document.getElementById('Giai7-4');

async function logSoXoMienBac() {
    const response = await fetch("https://api-xsmb.cyclic.app/api/v1");
    const data = await response.json();
    DateTime.innerText = data['time'];
    DacBiet.innerText = data['results']['ĐB'];
    Giai1.innerText = data['results']['G1'];
    Giai2.innerText = data['results']['G2'][0];
    Giai2_2.innerText = data['results']['G2'][1];
    Giai3.innerText = data['results']['G3'][0];
    Giai3_2.innerText = data['results']['G3'][1];
    Giai3_3.innerText = data['results']['G3'][2];
    Giai3_4.innerText = data['results']['G3'][3];
    Giai3_5.innerText = data['results']['G3'][4];
    Giai3_6.innerText = data['results']['G3'][5];
    Giai4.innerText = data['results']['G4'][0];
    Giai4_2.innerText = data['results']['G4'][1];
    Giai4_3.innerText = data['results']['G4'][2];
    Giai4_4.innerText = data['results']['G4'][3];
    Giai5.innerText = data['results']['G5'][0];
    Giai5_2.innerText = data['results']['G5'][1];
    Giai5_3.innerText = data['results']['G5'][2];
    Giai5_4.innerText = data['results']['G5'][3];
    Giai5_5.innerText = data['results']['G5'][4];
    Giai5_6.innerText = data['results']['G5'][5];
    Giai6.innerText = data['results']['G6'][0];
    Giai6_2.innerText = data['results']['G6'][1];
    Giai6_3.innerText = data['results']['G6'][2];
    Giai7.innerText = data['results']['G7'][0];
    Giai7_2.innerText = data['results']['G7'][1];
    Giai7_3.innerText = data['results']['G7'][2];
    Giai7_4.innerText = data['results']['G7'][3];
}
logSoXoMienBac();
</script>
<script>
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('Game', '<?= $_SESSION['TokenAdmin'] ?>');
</script>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['TiLe1']) and !empty($_POST['Settings']) and !empty($_POST['Id'])) {
            $TiLe1 = $_POST['TiLe1'];
            $Settings = $_POST['Settings'];
            $Id = $_POST['Id'];
            $FileJsonPath = "/TeleBotV3/Server/Public/Json/GameTele.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings1 = $Settings;
            $Id1 = (int)$Id;
            $Key = "TiLe1";
            $ChangeContent = $TiLe1;
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings1, $Id1, $Key, $ChangeContent);

?>
<script>
Swal.fire({
    text: "Thay đổi tỉ lệ game thành công !",
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
        if (!empty($_POST['TiLe2']) and !empty($_POST['Settings']) and !empty($_POST['Id'])) {
            $TiLe2 = $_POST['TiLe2'];
            $Settings = $_POST['Settings'];
            $Id = $_POST['Id'];
            $FileJsonPath = "/TeleBotV3/Server/Public/Json/GameTele.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings1 = $Settings;
            $Id1 = (int)$Id;
            $Key = "TiLe2";
            $ChangeContent = $TiLe2;
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings1, $Id1, $Key, $ChangeContent);

?>
<script>
Swal.fire({
    text: "Thay đổi tỉ lệ game thành công !",
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

        if (!empty($_POST['TiLe3']) and !empty($_POST['Settings']) and !empty($_POST['Id'])) {
            $TiLe3 = $_POST['TiLe3'];
            $Settings = $_POST['Settings'];
            $Id = $_POST['Id'];
            $FileJsonPath = "../TeleBotV3/Server/Public/Json/GameTele.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings1 = $Settings;
            $Id1 = (int)$Id;
            $Key = "TiLe3";
            $ChangeContent = $TiLe3;
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings1, $Id1, $Key, $ChangeContent);
?>
<script>
Swal.fire({
    text: "Thay đổi tỉ lệ game thành công !",
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

        if (!empty($_POST['TiLe4']) and !empty($_POST['Settings']) and !empty($_POST['Id'])) {
            $TiLe4 = $_POST['TiLe3'];
            $Settings = $_POST['Settings'];
            $Id = $_POST['Id'];
            $FileJsonPath = "/TeleBotV3/Server/Public/Json/GameTele.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings1 = $Settings;
            $Id1 = (int)$Id;
            $Key = "TiLe4";
            $ChangeContent = $TiLe4;
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings1, $Id1, $Key, $ChangeContent);
?>
<script>
Swal.fire({
    text: "Thay đổi tỉ lệ game thành công !",
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

        if (!empty($_POST['TiLe5']) and !empty($_POST['Settings']) and !empty($_POST['Id'])) {
            $TiLe5 = $_POST['TiLe5'];
            $Settings = $_POST['Settings'];
            $Id = $_POST['Id'];
            $FileJsonPath = "/TeleBotV3/Server/Public/Json/GameTele.json";
            $FileJson = $System->OpenFileJson($FileJsonPath);
            $Settings1 = $Settings;
            $Id1 = (int)$Id;
            $Key = "TiLe5";
            $ChangeContent = $TiLe5;
            $System->ChangeContentJson($FileJsonPath, $FileJson, $Settings1, $Id1, $Key, $ChangeContent);
?>
<script>
Swal.fire({
    text: "Thay đổi tỉ lệ game thành công !",
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

        // Xử lý dữ liệu sổ xố
        $SoXoData = $TeleBot->REQUEST('https://api-xsmb.cyclic.app/api/v1')['results'];
        $ĐB = substr($SoXoData['ĐB'][0], 3);
        $G1 = substr($SoXoData['G1'][0], 3);
        $G2 = substr($SoXoData['G2'][0], 3);
        $G2_1 = substr($SoXoData['G2'][1], 3);
        $G3 = substr($SoXoData['G3'][0], 3);
        $G3_1 = substr($SoXoData['G3'][1], 3);
        $G3_2 = substr($SoXoData['G3'][2], 3);
        $G3_3 = substr($SoXoData['G3'][3], 3);
        $G3_4 = substr($SoXoData['G3'][4], 3);
        $G3_5 = substr($SoXoData['G3'][5], 3);
        $G4 = substr($SoXoData['G4'][0], 2);
        $G4_1 = substr($SoXoData['G4'][1], 2);
        $G4_2 = substr($SoXoData['G4'][2], 2);
        $G4_3 = substr($SoXoData['G4'][3], 2);
        $G5 = substr($SoXoData['G5'][0], 2);
        $G5_1 = substr($SoXoData['G5'][1], 2);
        $G5_2 = substr($SoXoData['G5'][2], 2);
        $G5_3 = substr($SoXoData['G5'][3], 2);
        $G5_4 = substr($SoXoData['G5'][4], 2);
        $G5_5 = substr($SoXoData['G5'][5], 2);
        $G6 = substr($SoXoData['G6'][0], 1);
        $G6_1 = substr($SoXoData['G6'][1], 1);
        $G6_2 = substr($SoXoData['G6'][2], 1);
        $G7 = $SoXoData['G7'][0];
        $G7_1 = $SoXoData['G7'][1];
        $G7_2 = $SoXoData['G7'][2];
        $G7_3 = $SoXoData['G7'][3];
        $Array = [$ĐB,$G1,$G2,$G2_1,$G3,$G3_1,$G3_2,$G3_3,$G3_3,$G3_4,$G3_5,$G4,$G4_1,$G4_2,$G4_3,$G5,$G5_1,$G5_2,$G5_3,$G5_4,$G5_5,$G6,$G6_1,$G6_2,$G7,$G7_1,$G7_2,$G7_3];
        if (isset($_POST['CapNhap']) and !empty($_POST['IdTelegram']) and !empty($_POST['NoiDungCuoc']) and !empty($_POST['SoDuDoan'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $NoiDungCuoc = $_POST['NoiDungCuoc'];
            $SoDuDoanStr = (string)$_POST['SoDuDoan'];
            $SoDuDoanArray = explode(" ", $SoDuDoanStr);
            if (count($SoDuDoanArray) == 1) {
                $SoDuDoan1 = $SoDuDoanArray[0];
                if ($NoiDungCuoc == 'LO') {
                    foreach ($Array as $CheckSoXo) {
                        if ($SoDuDoan1 == $CheckSoXo) {
                            $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thắng Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan1'";
                            $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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
                    }

                    $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thua Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan1'";
                    $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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

                else {
                    if ($SoDuDoan1 == $ĐB) {
                        $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thắng Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan1'";
                        $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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
                        $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thua Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan1'";
                        $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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
                exit;}

            }
            elseif(count($SoDuDoanArray) == 2) {
                $SoDuDoan1 = $SoDuDoanArray[0];
                $SoDuDoan2 = $SoDuDoanArray[1];
                $Check = false;
                $Check1 = false;
                foreach ($Array as $CheckSoXo) {
                    if ($SoDuDoan1 == $CheckSoXo) {
                        $Check = true;
                    }
                    if ($SoDuDoan2 == $CheckSoXo) {
                        $Check1 = true;
                    }

                }
                if ($Check1 === true and $Check === true) {

                    $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thắng Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                    $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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
                $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thua Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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
            elseif(count($SoDuDoanArray) == 3) {
                $SoDuDoan1 = $SoDuDoanArray[0];
                $SoDuDoan2 = $SoDuDoanArray[1];
                $SoDuDoan3 = $SoDuDoanArray[2];
                $Check = false;
                $Check1 = false;
                $Check2 = false;
                foreach ($Array as $CheckSoXo) {
                    if ($SoDuDoan1 == $CheckSoXo) {
                        $Check = true;
                    }
                    if ($SoDuDoan2 == $CheckSoXo) {
                        $Check1 = true;
                    }
                    if ($SoDuDoan3 == $CheckSoXo) {
                        $Check2 = true;
                    }

                }
                if ($Check === true and $Check1 === true and $Check2 === true) {
                    $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thắng Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                    $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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

                $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thua Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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

                exit;
            }
            elseif(count($SoDuDoanArray) == 4) {
                $SoDuDoan1 = $SoDuDoanArray[0];
                $SoDuDoan2 = $SoDuDoanArray[1];
                $SoDuDoan3 = $SoDuDoanArray[2];
                $SoDuDoan4 = $SoDuDoanArray[3];
                $Check = false;
                $Check1 = false;
                $Check2 = false;
                $Check3 = false;
                foreach ($Array as $CheckSoXo) {
                    if ($SoDuDoan1 == $CheckSoXo) {
                        $Check = true;
                    }
                    if ($SoDuDoan2 == $CheckSoXo) {
                        $Check1 = true;
                    }
                    if ($SoDuDoan3 == $CheckSoXo) {
                        $Check2 = true;
                    }

                    if ($SoDuDoan4 == $CheckSoXo) {
                        $Check3 = true;
                    }

                }
                if ($Check === true and $Check1 === true and $Check2 === true and $Check3 === true) {
                    $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thắng Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                    $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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

                $Query = "UPDATE doncuocsoxo SET TrangThai = 'Thua Cược' WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoanStr'";
                $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập đơn cược sổ xố thành công !",
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

                exit;
            }

?>
<script>

</script>
<?php 
        exit; }

        if (isset($_POST['Xoa']) and !empty($_POST['IdTelegram']) and !empty($_POST['NoiDungCuoc']) and !empty($_POST['SoDuDoan'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $NoiDungCuoc = $_POST['NoiDungCuoc'];
            $SoDuDoan = $_POST['SoDuDoan'];
            $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
            $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa đơn cược sổ xố thành công !",
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

        // Trả thưởng và lưu lịch sử, thống kê
        if (isset($_POST['Luu']) and !empty($_POST['TimeInit']) and !empty($_POST['IdTelegram']) and !empty($_POST['Nickname']) and !empty($_POST['NoiDungCuoc']) and !empty($_POST['SoTienCuoc']) and !empty($_POST['SoDuDoan']) and !empty($_POST['TrangThai'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $NoiDungCuoc = $_POST['NoiDungCuoc'];
            $SoDuDoan = $_POST['SoDuDoan'];
            $Nickname = $_POST['Nickname'];
            $TimeInit = $_POST['TimeInit'];
            $SoTienCuoc = (int)$_POST['SoTienCuoc'];
            $TrangThai = $_POST['TrangThai'];
            $TimeNow = date('H:i d/m/Y');

            $Query = "SELECT Wallet FROM user WHERE IdTelegram = '$IdTelegram'";
            $TiLeSoXo = $System->OpenFileJson('/TeleBotV3/Server/Public/Json/GameTele.json');
            if ($TrangThai == 'Đang Xử Lý') {
?>
<script>
Swal.fire({
    text: "Đơn cược sổ xố chưa xử lý !",
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
                exit;
            }
            if ($NoiDungCuoc == 'LO') {
                $WinAmount = 0;
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $WinAmount;
                if ($TrangThai == 'Thắng Cược') {

                    // Trả thưởng 
                    $TiLe = (float)$TiLeSoXo[6]['TiLe4'];
                    $WinAmount = $SoTienCuoc * $TiLe;
                    $UpdateWallet = $Wallet + $WinAmount;
                    $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                    $KetQua1 = "Win";

                }
                $KetQua1 = "Losing";
                // Lưu lịch sử chơi 
                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES ('$TimeInit','$IdTelegram','$Nickname','Sổ Xố','$NoiDungCuoc','$SoTienCuoc','$TrangThai','$KetQua1','($WinAmount - $UpdateWallet)','$UpdateWallet','$NoiDungCuoc $SoTienCuoc $SoDuDoan')";
                $System->conn->InsertData($Query);

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n🍀  Sổ Xố Tele  🍀\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Nội dung cược: `".$NoiDungCuoc."`\n┣➤ Số dự đoán: `".$SoDuDoan."`\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã `".$TrangThai."` ! 💸 Với số tiền `".number_format($WinAmount - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược sổ xố
                $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Lưu đơn cược sổ xố thành công !",
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
            exit; }
            if ($NoiDungCuoc == "DE") {
                $WinAmount = 0;
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $WinAmount;
                if ($TrangThai == 'Thắng Cược') {

                    // Trả thưởng 
                    $TiLe = (float)$TiLeSoXo[6]['TiLe5'];
                    $WinAmount = $SoTienCuoc * $TiLe;
                    $UpdateWallet = $Wallet + $WinAmount;
                    $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                    $KetQua1 = "Win";

                }
                $KetQua1 = "Losing";
                // Lưu lịch sử chơi 
                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES ('$TimeInit','$IdTelegram','$Nickname','Sổ Xố','$NoiDungCuoc','$SoTienCuoc','$TrangThai','$KetQua1','($WinAmount - $UpdateWallet)','$UpdateWallet','$NoiDungCuoc $SoTienCuoc $SoDuDoan')";
                $System->conn->InsertData($Query);

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n🍀  Sổ Xố Tele  🍀\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Nội dung cược: `".$NoiDungCuoc."`\n┣➤ Số dự đoán: `".$SoDuDoan."`\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã `".$TrangThai."` ! 💸 Với số tiền `".number_format($WinAmount - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược sổ xố
                $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Lưu đơn cược sổ xố thành công !",
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
            exit; }

            if ($NoiDungCuoc == 'XIEN2') {

                $WinAmount = 0;
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $WinAmount;
                if ($TrangThai == 'Thắng Cược') {

                    // Trả thưởng 
                    $TiLe = (float)$TiLeSoXo[6]['TiLe1'];
                    $WinAmount = $SoTienCuoc * $TiLe;
                    $UpdateWallet = $Wallet + $WinAmount;
                    $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                    
                    $KetQua1 = "Win";
                }
                $KetQua1 = "Losing";
                // Lưu lịch sử chơi 
                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES ('$TimeInit','$IdTelegram','$Nickname','Sổ Xố','$NoiDungCuoc','$SoTienCuoc','$TrangThai','$KetQua1','($WinAmount - $UpdateWallet)','$UpdateWallet','$NoiDungCuoc $SoTienCuoc $SoDuDoan')";
                $System->conn->InsertData($Query);

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n🍀  Sổ Xố Tele  🍀\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Nội dung cược: `".$NoiDungCuoc."`\n┣➤ Số dự đoán: `".$SoDuDoan."`\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã `".$TrangThai."` ! 💸 Với số tiền `".number_format($WinAmount - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược sổ xố
                $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Lưu đơn cược sổ xố thành công !",
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

            exit; }
            
            if ($NoiDungCuoc == "XIEN3") {

                $WinAmount = 0;
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $WinAmount;
                if ($TrangThai == 'Thắng Cược') {

                    // Trả thưởng 
                    $TiLe = (float)$TiLeSoXo[6]['TiLe2'];
                    $WinAmount = $SoTienCuoc * $TiLe;
                    $UpdateWallet = $Wallet + $WinAmount;
                    $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                    
                    $KetQua1 = "Win";
                }

                $KetQua1 = "Losing";

                // Lưu lịch sử chơi 
                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES ('$TimeInit','$IdTelegram','$Nickname','Sổ Xố','$NoiDungCuoc','$SoTienCuoc','$TrangThai','$KetQua1','($WinAmount - $UpdateWallet)','$UpdateWallet','$NoiDungCuoc $SoTienCuoc $SoDuDoan')";
                $System->conn->InsertData($Query);

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n🍀  Sổ Xố Tele  🍀\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Nội dung cược: `".$NoiDungCuoc."`\n┣➤ Số dự đoán: `".$SoDuDoan."`\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã `".$TrangThai."` ! 💸 Với số tiền `".number_format($WinAmount - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược sổ xố
                $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Lưu đơn cược sổ xố thành công !",
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
            exit; }

            if ($NoiDungCuoc == "XIEN4") {

                $WinAmount = 0;
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $WinAmount;
                if ($TrangThai == 'Thắng Cược') {

                    // Trả thưởng 
                    $TiLe = (float)$TiLeSoXo[6]['TiLe3'];
                    $WinAmount = $SoTienCuoc * $TiLe;
                    $UpdateWallet = $Wallet + $WinAmount;
                    $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                    $KetQua1 = "Win";

                }

                $KetQua1 = "Losing";

                // Lưu lịch sử chơi 
                $Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES ('$TimeInit','$IdTelegram','$Nickname','Sổ Xố','$NoiDungCuoc','$SoTienCuoc','$TrangThai','$KetQua1','($WinAmount - $UpdateWallet)','$UpdateWallet','$NoiDungCuoc $SoTienCuoc $SoDuDoan')";
                $System->conn->InsertData($Query);

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($WinAmount - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $WinAmount - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n🍀  Sổ Xố Tele  🍀\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Nội dung cược: `".$NoiDungCuoc."`\n┣➤ Số dự đoán: `".$SoDuDoan."`\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã `".$TrangThai."` ! 💸 Với số tiền `".number_format($WinAmount - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược sổ xố
                $Query = "DELETE FROM doncuocsoxo  WHERE IdTelegram = '$IdTelegram' AND NoiDungCuoc = '$NoiDungCuoc' AND SoDuDoan = '$SoDuDoan'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Lưu đơn cược sổ xố thành công !",
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

            exit; }
        }


        
        if (!empty($_POST['LamMoiDuLieuBangThongKeGameTelegram'])) {
            if ($_POST['LamMoiDuLieuBangThongKeGameTelegram'] == 'On') {
                mysqli_query($System->conn->ConnectDb(), 'TRUNCATE TABLE thongkegametele');
?>
<script>
Swal.fire({
    text: "Làm mới bảng thống kê game telegram thành công !",
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
        }

        if (!empty($_POST['SoTienTraThuong']) and !empty($_POST['ThongBaoTraThuong']) and !empty($_POST['IdTelegram'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $SoTienTraThuong = (int)$_POST['SoTienTraThuong'];
            $ThongBaoTraThuong = $_POST['ThongBaoTraThuong'];
            $Query = "SELECT Wallet FROM user WHERE IdTelegram = '$IdTelegram'";
            $Wallet = (int)($System->conn->SelectData($Query)[0]['Wallet']);
            $UpdateWallet = $SoTienTraThuong + $Wallet;
            $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
            $System->conn->UpdateData($Query);
            $TeleBot->SEND_entities($ThongBaoTraThuong,$IdTelegram);
?>
<script>
Swal.fire({
    text: "Thông báo trả thưởng thành công !",
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
        }
        if (!empty($_POST['Gio']) and !empty($_POST['DoiNha']) and !empty($_POST['DoiBan']) and !empty($_POST['UrlDoiNha']) and !empty($_POST['UrlDoiBan'])) {
            $Giai = strtoupper($_POST['Giai']);
            $UrlGiai = $_POST['UrlGiai'];
            $Date = $_POST['Date'];
            $Gio = $_POST['Gio'];
            $DoiNha = $_POST['DoiNha'];
            $DoiBan = $_POST['DoiBan'];
            $UrlDoiNha = $_POST['UrlDoiNha'];
            $UrlDoiBan = $_POST['UrlDoiBan'];
            $LoaiKeoChapCaTran = '0';
            $TiLeKeoChapCaTran1 = 'none';
            $TiLeKeoChapCaTran2 = 'none';
            $LoaiKeoTaiXiuCaTran = '0';
            $TiLeKeoTaiXiuCaTran1 = 'none';
            $TiLeKeoTaiXiuCaTran2 = 'none';
            $LoaiKeoChapH1 = '0';
            $TiLeKeoChapH1_1 = 'none';
            $TiLeKeoChapH1_2 = 'none';
            $LoaiKeoTaiXiuH1 = '0';
            $TiLeKeoTaiXiuH1_1 = 'none';
            $TiLeKeoTaiXiuH1_2 = 'none';

            $Query = "INSERT INTO keobongda (
                Giai,
                UrlGiai,
                Date,
                Gio,
                DoiNha,
                DoiBan,
                UrlDoiNha,
                UrlDoiBan,
                LoaiKeoChapCaTran,
                TiLeKeoChapCaTran1,
                TiLeKeoChapCaTran2,
                LoaiKeoTaiXiuCaTran,
                TiLeKeoTaiXiuCaTran1,
                TiLeKeoTaiXiuCaTran2,
                LoaiKeoChapH1,
                TiLeKeoChapH1_1,
                TiLeKeoChapH1_2,
                LoaiKeoTaiXiuH1,
                TiLeKeoTaiXiuH1_1,
                TiLeKeoTaiXiuH1_2

            ) VALUES (
                '$Giai',
                '$UrlGiai',
                '$Date',
                '$Gio',
                '$DoiNha',
                '$DoiBan',
                '$UrlDoiNha',
                '$UrlDoiBan',
                '$LoaiKeoChapCaTran',
                '$TiLeKeoChapCaTran1',
                '$TiLeKeoChapCaTran2',
                '$LoaiKeoTaiXiuCaTran',
                '$TiLeKeoTaiXiuCaTran1',
                '$TiLeKeoTaiXiuCaTran2',
                '$LoaiKeoChapH1',
                '$TiLeKeoChapH1_1',
                '$TiLeKeoChapH1_2',
                '$LoaiKeoTaiXiuH1',
                '$TiLeKeoTaiXiuH1_1',
                '$TiLeKeoTaiXiuH1_2'
            )";

            

            $System->conn->InsertData($Query);

            $Msg = "
            LIXI66.TOP\n\n⚽️ KÈO BÓNG ĐÁ\n\nTrận ".$DoiNha." VS ".$DoiBan."\nChấp | Tài Xỉu\nVào danh sách game chọn bóng đá để cá cược 💰\nLink website xem tỉ lệ: https://".$_SERVER['SERVER_NAME']."/TeleBotV3/?BongDa\n
        ";
        
        $Query = "SELECT IdTelegram FROM user";
        $Data = $System->conn->SelectData($Query);

        foreach ($Data as $IdTelegram) {
            $TeleBot->SEND_entities($Msg, $IdTelegram['IdTelegram']);
        }
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Thêm kèo bóng đá thành công !",
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
        if (!empty($_POST['TiLeKeoChapCaTran1']) and !empty($_POST['TiLeKeoChapCaTran2']) and isset($_POST['CapNhapKeoChapCaTran'])) {
            $LoaiKeoChapCaTran = $_POST['LoaiKeoChapCaTran'];
            $TiLeKeoChapCaTran1 = $_POST['TiLeKeoChapCaTran1'];
            $TiLeKeoChapCaTran2 = $_POST['TiLeKeoChapCaTran2'];
            $Gio = $_POST['Gio'];
            $Query = "UPDATE keobongda SET LoaiKeoChapCaTran = '$LoaiKeoChapCaTran', TiLeKeoChapCaTran1 = '$TiLeKeoChapCaTran1', TiLeKeoChapCaTran2 = '$TiLeKeoChapCaTran2'  WHERE Gio = '$Gio'";
            $System->conn->UpdateData($Query);
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Cập nhập kèo chấp cả trận thành công !",
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

        if (!empty($_POST['TiLeKeoTaiXiuCaTran1']) and !empty($_POST['LoaiKeoTaiXiuCaTran']) and !empty($_POST['TiLeKeoTaiXiuCaTran2']) and isset($_POST['CapNhapKeoTaiXiuCaTran'])) {
            $LoaiKeoTaiXiuCaTran = $_POST['LoaiKeoTaiXiuCaTran'];
            $TiLeKeoTaiXiuCaTran1 = $_POST['TiLeKeoTaiXiuCaTran1'];
            $TiLeKeoTaiXiuCaTran2 = $_POST['TiLeKeoTaiXiuCaTran2'];
            $Gio = $_POST['Gio'];
            $Query = "UPDATE keobongda SET LoaiKeoTaiXiuCaTran = '$LoaiKeoTaiXiuCaTran', TiLeKeoTaiXiuCaTran1 = '$TiLeKeoTaiXiuCaTran1', TiLeKeoTaiXiuCaTran2 = '$TiLeKeoTaiXiuCaTran2'  WHERE Gio = '$Gio'";
            $System->conn->UpdateData($Query);
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Cập nhập kèo tài xỉu cả trận thành công !",
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

        if (!empty($_POST['TiLeKeoChapH1_1']) and !empty($_POST['LoaiKeoChapH1']) and !empty($_POST['TiLeKeoChapH1_2']) and isset($_POST['CapNhapKeoChapH1'])) {
            $LoaiKeoChapH1 = $_POST['LoaiKeoChapH1'];
            $TiLeKeoChapH1_1 = $_POST['TiLeKeoChapH1_1'];
            $TiLeKeoChapH1_2 = $_POST['TiLeKeoChapH1_2'];
            $Gio = $_POST['Gio'];
            $Query = "UPDATE keobongda SET LoaiKeoChapH1 = '$LoaiKeoChapH1', TiLeKeoChapH1_1 = '$TiLeKeoChapH1_1', TiLeKeoChapH1_2 = '$TiLeKeoChapH1_2'  WHERE Gio = '$Gio'";
            $System->conn->UpdateData($Query);
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Cập nhập kèo chấp H1 thành công !",
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

        if (!empty($_POST['TiLeKeoTaiXiuH1_1']) and !empty($_POST['LoaiKeoTaiXiuH1']) and !empty($_POST['TiLeKeoTaiXiuH1_2']) and isset($_POST['CapNhapKeoTaiXiuH1'])) {
            $LoaiKeoTaiXiuH1 = $_POST['LoaiKeoTaiXiuH1'];
            $TiLeKeoTaiXiuH1_1 = $_POST['TiLeKeoTaiXiuH1_1'];
            $TiLeKeoTaiXiuH1_2 = $_POST['TiLeKeoTaiXiuH1_2'];
            $Gio = $_POST['Gio'];
            $Query = "UPDATE keobongda SET LoaiKeoTaiXiuH1 = '$LoaiKeoTaiXiuH1', TiLeKeoTaiXiuH1_1 = '$TiLeKeoTaiXiuH1_1', TiLeKeoTaiXiuH1_2 = '$TiLeKeoTaiXiuH1_2'  WHERE Gio = '$Gio'";
            $System->conn->UpdateData($Query);
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Cập nhập kèo tài xỉu H1 thành công !",
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

        if (isset($_POST['Xoa']) and !empty($_POST['Gio'])) {
            $Gio = $_POST['Gio'];
            $Query = "DELETE FROM keobongda WHERE Gio = '$Gio'";
            $System->conn->DeleData($Query);
?>
<script>
socket.emit('KeoBongDa')
Swal.fire({
    text: "Xóa kèo bóng đá thành công !",
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

        if (isset($_POST['ChanCuocBongDa'])) {
            $ChanCuocBongDa = $_POST['ChanCuocBongDa'];
            if ($ChanCuocBongDa == 'On') {
                $Query = "SELECT IdTelegram FROM user";
                $Data = $System->conn->SelectData($Query);
                foreach ($Data as $data) {
                    $IdTelegram = $data['IdTelegram'];
                    $Query = "INSERT INTO blockcuocbongda (IdTelegram) VALUES ('$IdTelegram')";
                    $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Chặn cược bóng đá thành công !",
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
               }
            exit; }
            else {
                $Query = "DELETE FROM blockcuocbongda";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa chặn cược bóng đá thành công !",
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
        
        }

        if (isset($_POST['CapNhapTrangThai']) and !empty($_POST['TrangThai']) and !empty($_POST['IdTelegram']) and !empty($_POST['Doi']) and !empty($_POST['Keo']) and !empty($_POST['TiLeKeo'])) {
            $TrangThai = $_POST['TrangThai'];
            $IdTelegram = $_POST['IdTelegram'];
            $Doi = $_POST['Doi'];
            $Keo = $_POST['Keo'];
            $TiLeKeo = $_POST['TiLeKeo'];
            $Query = "UPDATE doncuocbongda SET TrangThai = '$TrangThai' WHERE IdTelegram = '$IdTelegram' AND Doi = '$Doi' AND Keo = '$Keo' AND TiLeKeo = '$TiLeKeo'";
            $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập trạng thái đơn cược bóng đá thành công !",
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

        if (isset($_POST['CapNhapTraThuong']) and !empty($_POST['TraThuong'])  and !empty($_POST['IdTelegram']) and !empty($_POST['Doi']) and !empty($_POST['Keo']) and !empty($_POST['TiLeKeo'])) {
            $TraThuong = $_POST['TraThuong'];
            $IdTelegram = $_POST['IdTelegram'];
            $Doi = $_POST['Doi'];
            $Keo = $_POST['Keo'];
            $TiLeKeo = $_POST['TiLeKeo'];
            $Query = "UPDATE doncuocbongda SET TraThuong = '$TraThuong' WHERE IdTelegram = '$IdTelegram' AND Doi = '$Doi' AND Keo = '$Keo' AND TiLeKeo = '$TiLeKeo'";
            $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
    text: "Cập nhập trả thưởng đơn cược bóng đá thành công !",
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

        if (isset($_POST['LuuDonCuocBongDa'])) {
            $TimeNow = date('H:i d/m/Y');
            $TimeInit = $_POST['TimeInit'];
            $IdTelegram = trim($_POST['IdTelegram']);
            $Nickname = $_POST['Nickname'];
            $SoTienCuoc = (int)$_POST['SoTienCuoc'];
            $Doi = $_POST['Doi'];
            $Keo = $_POST['Keo'];
            $TiLeKeo = $_POST['TiLeKeo'];
            $TrangThai = $_POST['TrangThai'];
            $TraThuong = (int)$_POST['TraThuong'];
            echo $IdTelegram;
            if ($TrangThai != 'Đang Xử Lý') {

                // Cập nhập ví người chơi
                $Query = "SELECT Wallet FROM user WHERE IdTelegram = '$IdTelegram'";
                $Wallet = (int)($System->conn->SelectData($Query))[0]['Wallet'];
                $UpdateWallet = $Wallet + $TraThuong;
                $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
                $System->conn->UpdateData($Query);
                
                // Lưu lịch sử chơi
                $Query = "INSERT INTO gamehistory (
                    TimeInit,IdTelegram,Nickname,TroChoi,DaChon,
                    SoTien,KetQua,TraThuong,SaoKe,GhiChu
                ) VALUES (
                    '$TimeInit','$IdTelegram','$Nickname','Bóng Đá','Đội: $Doi, Kèo: $Keo, Tỉ lệ: $TiLeKeo',
                    '$SoTienCuoc','$TrangThai','".$TraThuong - $SoTienCuoc."','$UpdateWallet','BET $SoTienCuoc $Doi $Keo $TiLeKeo'
                )";
                $System->conn->InsertData($Query);

                

                // Lưu thống kê game tele | Lưu thống kê người chơi
                $TongTienCuoc = 0;
                $TongTienThangCuoc = 0;
                $SoLanChoi = 1;
                $Query = "SELECT * FROM thongkegametele WHERE IdTelegram = '$IdTelegram'";
                $ThongKeGameTeleCheck = $System->conn->SelectData($Query);
                if ($ThongKeGameTeleCheck !== false) {
                    $TongTienCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeGameTeleCheck[0]['TongTienThangCuoc'] + ($TraThuong - $SoTienCuoc);
                    $Query = "UPDATE thongkegametele SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $TraThuong - $SoTienCuoc;
                    $Query = "INSERT INTO thongkegametele (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc')";
                    $System->conn->InsertData($Query);

                }

                $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
                $ThongKeNguoiChoiCheck = $System->conn->SelectData($Query);
                if ($ThongKeNguoiChoiCheck  !== false) {
                    $TongTienCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienCuoc'] + $SoTienCuoc;
                    $TongTienThangCuoc = (int)$ThongKeNguoiChoiCheck[0]['TongTienThangCuoc'] + ($TraThuong - $SoTienCuoc);
                    $SoLanChoi += (int)$ThongKeNguoiChoiCheck[0]['SoLanChoi'];
                    $Query = "UPDATE thongkenguoichoi SET TongTienCuoc = '$TongTienCuoc', TongTienThangCuoc = '$TongTienThangCuoc', SoLanChoi = '$SoLanChoi' WHERE IdTelegram = '$IdTelegram'";
                    $System->conn->UpdateData($Query);
                }
                else {
                    $TongTienCuoc = $SoTienCuoc;
                    $TongTienThangCuoc = $TraThuong - $SoTienCuoc;
                    $Query = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES ('$IdTelegram','$Nickname','$TongTienCuoc','$TongTienThangCuoc','$SoLanChoi')";
                    $System->conn->InsertData($Query);

                }

                // Gửi thông báo tới telegram
                $Msg = "LIXI66.TOP \n\n⚽️  Bóng Đá Tele  ⚽️\n\n┏━━━━━━━━━━━━━┓\n┣➤ ⏱ Thời gian: ".$TimeNow."\n┣➤ 💳 Id: `".$IdTelegram."`\n┣➤ 👤 Nickname: `".$Nickname."`\n┣➤ Đội: ".$Doi."\n┣➤ Kèo: ".$Keo."\n┣➤ Tỉ lệ kèo: ".$TiLeKeo."\n┣➤💰 Ví: `".number_format($UpdateWallet)."` đ\n┣➤ Bạn đã ".$TrangThai." ! 💸 Với số tiền `".number_format($TraThuong - $SoTienCuoc)."` đ\n👉 Nếu bị lỗi liên hệ admin @Lymannhi\n┗━━━━━━━━━━━━━┛\n";
                $TeleBot->SEND_entities($Msg,$IdTelegram);


                // Xóa đơn cược bóng đá 
                $Query = "DELETE FROM doncuocbongda WHERE IdTelegram = '$IdTelegram' AND Doi = '$Doi' AND Keo = '$Keo' AND TiLeKeo = '$TiLeKeo'";
                $System->conn->DeleData($Query);
               
?>
<script>
Swal.fire({
    text: "Trả thưởng đơn cược bóng đá thành công !",
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
            exit;}

            else {
?>
<script>
Swal.fire({
    text: "Trả thưởng đơn cược bóng đá chưa xử lý thành công !",
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
            exit;}
        }

        if (isset($_POST['XoaDonCuocBongDa'])) {
            $IdTelegram = trim($_POST['IdTelegram']);
            $Doi = $_POST['Doi'];
            $Keo = $_POST['Keo'];
            $TiLeKeo = $_POST['TiLeKeo'];

            // Xóa đơn cược bóng đá 
            $Query = "DELETE FROM doncuocbongda WHERE IdTelegram = '$IdTelegram' AND Doi = '$Doi' AND Keo = '$Keo' AND TiLeKeo = '$TiLeKeo'";
            $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa đơn cược bóng đá thành công !",
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
    }
?>