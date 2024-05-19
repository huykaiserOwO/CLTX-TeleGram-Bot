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

<body class="SoXoClient">
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
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-house"></i>
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
                    <a class="btn btn-primary" href="?BongDa" role="button"><i class="fa-solid fa-gamepad"></i> BÓNG
                        ĐÁ</a>
                    <a class="btn btn-danger" href="?SoXo" role="button"><i class="fa-solid fa-gamepad"></i> SỔ XỐ</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        <p>SỔ XỐ MIỀN BẮC NGÀY <i id="DateTime"></i></p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
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
        </main>
    </div>
</body>
<script src="AllJs"></script>
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