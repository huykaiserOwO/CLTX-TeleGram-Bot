<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title Page-->
    <title id="TitlePage"><?= $TenGame ?></title>
    <meta http-equiv="refresh" content="3600">
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
    <!-- Draggable -->
    <style>
    #draggable {
        width: 580px;
        height: 360px;
        padding: 0;
        background: url(Src/Public/Upload/bantx.png) no-repeat;
        background-size: 100% 100%;
        border: none;
    }

    #TaiText {
        width: 60px;
        height: 30px;
        background: url(Src/Public/Upload/Tai.gif) no-repeat;
        background-size: 100% 100%;
        position: absolute;
        left: 130px;
        top: 100px;
    }

    #XiuText {
        width: 60px;
        height: 30px;
        background: url(Src/Public/Upload/Xiu.gif) no-repeat;
        background-size: 100% 100%;
        position: absolute;
        left: 390px;
        top: 100px;
    }


    .TaiTextAnim {
        animation: zoomout 0.2s ease-in-out infinite alternate;
    }

    @keyframes zoomout {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.2);
        }
    }

    .XiuTextAnim {
        animation: zoomout 0.2s ease-in-out infinite alternate;

    }

    #TongSoTienTai {
        position: absolute;
        color: #fef142;
        left: 110px;
        top: 143px;
        text-align: center;
        width: 100px;
        overflow: hidden;
    }

    #TongSoTienXiu {
        position: absolute;
        color: #fef142;
        left: 370px;
        top: 143px;
        text-align: center;
        width: 100px;
        overflow: hidden;
    }

    #TongSoNguoiChoiTai {
        position: absolute;
        color: #fef142;
        left: 97px;
        top: 275px;
        text-align: right;
        width: 50px;
        overflow: hidden;
    }

    #TongSoNguoiChoiXiu {
        position: absolute;
        color: #fef142;
        left: 431px;
        top: 273px;
        text-align: left;
        width: 50px;
        overflow: hidden;
    }

    #ThoiGian {
        position: absolute;
        color: #fef142;
        left: 259px;
        top: 171px;
        text-align: center;
        width: 60px;
        height: 50px;
        overflow: hidden;
        font-size: 300%;
        line-height: 45px;
    }

    #DiceGift {
        width: 100px;
        height: 100px;
        background: url(Src/Public/Upload/roll1.gif) no-repeat;
        background-size: 100% 100%;
        position: absolute;
        top: 145px;
        left: 238px;
        opacity: 0;
        display: none;
    }

    #Dice1 {
        width: 130px;
        height: 130px;
        position: absolute;
        left: 225px;
        top: 120px;
        opacity: 1;
    }

    #Dice2 {
        width: 130px;
        height: 130px;
        position: absolute;
        left: 235px;
        top: 120px;
        opacity: 0;
    }

    #Dice3 {
        width: 130px;
        height: 130px;
        position: absolute;
        left: 228px;
        top: 120px;
        opacity: 0;
    }

    #Msg {
        width: 150px;
        height: 30px;
        text-align: center;
        font-size: 100%;
        color: #fef142;
        position: absolute;
        left: 212px;
        top: 80px;
        transition: all 1s;
    }

    @media only screen and (max-width: 800px) {
        #draggable {
            width: 300px;
            height: 180px;
        }

        #TaiText {
            width: 40px;
            height: 20px;
            left: 63px;
            top: 45px;
        }

        #XiuText {
            width: 40px;
            height: 20px;
            left: 200px;
            top: 45px;
        }

        #TongSoTienTai {
            height: 15px;
            left: 60px;
            top: 71px;
            width: 50px;
            font-size: 50%;
        }

        #TongSoTienXiu {
            height: 15px;
            left: 195px;
            top: 71px;
            width: 50px;
            font-size: 50%;
        }

        #TongSoNguoiChoiTai {
            left: 45px;
            width: 30px;
            height: 15px;
            font-size: 50%;
            top: 138px;
        }

        #TongSoNguoiChoiXiu {
            left: 225px;
            height: 15px;
            font-size: 50%;
            top: 137px;
            width: 30px;
        }

        #ThoiGian {
            left: 130px;
            top: 80px;
            height: 30px;
            width: 40px;
            font-size: 120%;
            line-height: 35px;
        }

        #DiceGift {
            left: 125px;
            top: 73px;
            width: 50px;
            height: 50px;
        }

        #Dice1 {
            width: 60px;
            height: 60px;
            left: 120px;
            top: 65px;
        }

        #Dice2 {
            width: 60px;
            height: 60px;
            left: 125px;
            top: 65px;
        }

        #Dice3 {
            width: 60px;
            height: 60px;
            left: 122px;
            top: 65px;
        }

        #Msg {
            left: 110px;
            top: 37px;
            width: 80px;
            height: 20px;
            font-size: 50%;
        }
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#draggable").draggable();
    });
    </script>
    <link rel="stylesheet" href="All">
</head>

<body class="BanTaiXiu">
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
                    <a class="btn btn-danger" href="" role="button"><i class="fa-solid fa-gamepad"></i> BÀN TÀI
                        XỈU</a>
                    <a class="btn btn-primary" href="?BanBauCua" role="button"><i class="fa-solid fa-gamepad"></i> BÀN
                        BẦU
                        CUA</a>
                    <a class="btn btn-primary" href="?BongDa" role="button"><i class="fa-solid fa-gamepad"></i> BÓNG
                        ĐÁ</a>
                    <a class="btn btn-primary" href="?SoXo" role="button"><i class="fa-solid fa-gamepad"></i> SỔ XỐ</a>
                </div>
            </div>
            <div class="container" style="margin-top: 30px;">
                <div class="row" style="height:100%;">
                    <div class="headerBox">
                        <h1>
                            <i class="fa-solid fa-dice-five"></i>
                            <p style="line-height: 15px;">BÀN TÀI XỈU</p>
                        </h1>
                    </div>
                    <div class="bodyBox">
                        <h2>Bạn cược cửa: <b id="Cau"></b></h2>
                        <h2>Số tiền cược: <b id="TienCuoc"></b></h2>
                    </div>
                    <div id="draggable" class="ui-widget-content">
                        <div id="TaiText"></div>
                        <div id="XiuText"></div>
                        <div id="TongSoTienTai">0</div>
                        <div id="TongSoTienXiu">0</div>
                        <div id="TongSoNguoiChoiTai">0</div>
                        <div id="TongSoNguoiChoiXiu">0</div>
                        <div id="ThoiGian"></div>
                        <div id="DiceGift"></div>
                        <div id="Dice1"></div>
                        <div id="Dice2"></div>
                        <div id="Dice3"></div>
                        <div id="Msg"></div>
                    </div>
                </div>
                <div class="row" style="height:100%;">
                    <div class="headerBox">
                        <h1>
                            <i class="fa-solid fa-comments"></i>
                            <p style="line-height: 15px;">CHAT</p>
                        </h1>
                    </div>
                    <div class="bodyBox">
                        <div class="boxChat" id="boxChat">
                            <!--<div class="YourMsg">
                                <h2 style="color:#fef142;">Hệ thống <i
                                        style="font-size: 80%;color: brown;padding-left:10px;">12:24 19/03/2024</i></h2>
                                <h2>a</h2>
                            </div>
                            <!--<div class="MyMsg">
                            <h2 style="color:#fef142;">Bạn <i style="font-size: 80%;color: brown;padding-left:10px;">12:24 19/03/2024</i></h2>
                                <h2>a</h2>
                            </div> -->
                        </div>
                        <div class="BtnSend">
                            <form method="post" enctype="application/x-www-form-urlencoded"
                                onsubmit="unreloadPage(event)" id="form">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Chat ở đây..." name="Msg"
                                        id="ChatMsg">
                                    <input type="hidden" value="<?= $_SESSION['IdTelegram'] ?>" name="IdTelegram">
                                    <input type="hidden" value="<?= $_SESSION['Nickname'] ?>" name="Nickname">
                                    <button class="btn btn-outline-secondary" type="submit" id="Send"><i
                                            class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>
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
                    <div class="table-responsive-xxl">
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
<style>
.boxChat {
    width: 100%;
    height: 500px;
    background-color: whitesmoke;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    background-color: #28282d;
    padding: 20px;
    overflow-y: auto;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
}

.BtnSend {
    width: 100%;
    height: auto;
    margin-top: 10px;
}

.BtnSend button {
    margin: 0;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.BtnSend input {
    background-color: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.YourMsg {
    max-width: 100%;
    height: auto;
    background-color: rgba(0, 0, 0, 0.080);
    padding: 20px;
    margin-bottom: 10px;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-self: flex-start;
}

.YourMsg h2 {
    max-width: 100%;
    word-wrap: break-word;
    font-size: 90%;
    text-align: left;
}

.MyMsg {
    max-width: 100%;
    height: auto;
    background-color: rgba(0, 0, 0, 0.080);
    padding: 20px;
    margin-bottom: 10px;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-self: flex-end;
}

.MyMsg h2 {
    max-width: 100%;
    word-wrap: break-word;
    font-size: 90%;
    text-align: right;
}

table {
    border: none;
    font-size: 95%;
    table-layout: auto;
}

table tbody tr td {
    font-size: 95%;
    font-weight: 500;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.05);
}
</style>

<script>
socket.emit('JoinRoom', '<?= $_SESSION['IdTelegram'] ?>')
var TaiText = document.getElementById('TaiText');
var XiuText = document.getElementById('XiuText');
var TongSoTienTai = document.getElementById('TongSoTienTai');
var TongSoTienXiu = document.getElementById('TongSoTienXiu');
var TongSoNguoiChoiTai = document.getElementById('TongSoNguoiChoiTai');
var TongSoNguoiChoiXiu = document.getElementById('TongSoNguoiChoiXiu');
var ThoiGian = document.getElementById('ThoiGian');
var DiceGift = document.getElementById('DiceGift');
var Dice1 = document.getElementById('Dice1');
var Dice2 = document.getElementById('Dice2');
var Dice3 = document.getElementById('Dice3');
var Msg = document.getElementById('Msg');
socket.on('gameData', (data) => {
    ThoiGian.style.opacity = 1;
    ThoiGian.innerText = data.time;
    TongSoNguoiChoiTai.innerText = data.soNguoiChonTai;
    TongSoNguoiChoiXiu.innerText = data.soNguoiChonXiu;
    TongSoTienTai.innerText = String(Number(data.tongTienDatTai) != 0 ? (Number(data.tongTienDatTai) / 1000) :
        0) + ' K';
    TongSoTienXiu.innerText = String(Number(data.tongTienDatXiu) != 0 ? (Number(data.tongTienDatXiu) / 1000) :
        0) + ' K';;
    Msg.style.marginTop = 6
    Msg.innerText = data.Msg;

})
socket.on('gameOver', (data) => {
    DiceGift.style.display = 'block';
    setTimeout(() => {
        ThoiGian.style.opacity = 0;
        DiceGift.style.opacity = 1;
    }, 100)
    setTimeout(() => {
        DiceGift.style.opacity = 0;
        DiceGift.style.display = 'none';
        Dice1.style.background = "url(Src/Public/Upload/xxright" + data.dice1 + ".png) no-repeat";
        Dice2.style.background = "url(Src/Public/Upload/xxleft" + data.dice2 + ".png) no-repeat";
        Dice3.style.background = "url(Src/Public/Upload/xxup" + data.dice3 + ".png) no-repeat";
        Dice1.style.backgroundSize = '100% 100%';
        Dice2.style.backgroundSize = '100% 100%';
        Dice3.style.backgroundSize = '100% 100%';
        Dice1.style.opacity = 1;
        Dice2.style.opacity = 1;
        Dice3.style.opacity = 1;
        if (data.result == 'tai') {
            TaiText.className = 'TaiTextAnim';
        } else {
            XiuText.className = 'XiuTextAnim';
        }
    }, 1000);
    setTimeout(() => {
        Dice1.style.opacity = 0;
        Dice2.style.opacity = 0;
        Dice3.style.opacity = 0;
        TaiText.className = '';
        XiuText.className = '';
    }, 15000)
})

var boxChat = document.getElementById('boxChat');
var ChatMsg = document.getElementById('ChatMsg');

function ScrollHeight() {
    boxChat.scrollTop = boxChat.scrollHeight;
}
socket.emit('ReqChat')
socket.on('Msg', (data) => {
    var Text = "";
    for (var x in data) {
        if (data[x]['Nickname'] != '' && data[x]['Nickname'] == '<?= $_SESSION['Nickname'] ?>') {
            Text += `
                <div class="MyMsg">
                    <h2 style="color:#fef142;">Bạn<i style="font-size: 80%;color: brown;padding-left:10px;">12:24 19/03/2024</i></h2>
                        <h2>` + data[x]['Mess'] + `</h2>
                </div>
            `
        } else if (data[x]['Nickname'] != '' && data[x]['Nickname'] != '<?= $_SESSION['Nickname'] ?>') {
            Text += `
                <div class="YourMsg">
                    <h2 style="color:#fef142;">` + data[x]['Nickname'] + `<i
                            style="font-size: 80%;color: brown;padding-left:10px;">` + data[x]['TimeInit'] + `</i></h2>
                    <h2>` + data[x]['Mess'] + `</h2>
                </div>
            `
        } else {
            Text += `
                <div class="YourMsg">
                    <h2 style="color:#fef142;">` + data[x]['IdNguoiGui'] + `<i
                            style="font-size: 80%;color: brown;padding-left:10px;">` + data[x]['TimeInit'] + `</i></h2>
                    <h2>` + data[x]['Mess'] + `</h2>
                </div>
            `
        }
    }
    boxChat.innerHTML = Text
    ScrollHeight();

    ChatMsg.onclick = () => {
        ScrollHeight();
    }
})

function unreloadPage(event) {
    event.preventDefault();
}
var Send = document.getElementById('Send');
var form = document.getElementById('form');
Send.onclick = () => {
    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);
    xhr.open('POST', 'ChatHandler', true);
    xhr.onload = () => {
        if ((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)) {
            var Text = JSON.parse(xhr.response);
            if (Text['Status'] == 'error') {
                Swal.fire({
                    text: Text['Msg'],
                    icon: "error",
                    confirmButtonText: "Hiểu ròi"
                });
                ChatMsg.value = "";
                return;
            } else if (Text['Status'] == 'success') {
                socket.emit('ReqChat');
                ChatMsg.value = "";
                return;
            }
        }
    }
    xhr.send(formData);
}
socket.emit('DonCuocBanTaiXiu', '<?= $_SESSION['IdTelegram'] ?>');
var Cau = document.getElementById('Cau');
var TienCuoc = document.getElementById('TienCuoc');
socket.on('DonCuocBanTaiXiu', (data) => {
    if (data == '') {
        Cau.innerText = "Chưa có đơn cược nào";
        TienCuoc.innerText = "Chưa có đơn cược nào";
        return;
    }
    for (var x in data) {
        Cau.innerText = data[x]['Cau'];
        TienCuoc.innerText = String(Intl.NumberFormat('vi-VN').format(data[x]['TienCuoc'])) + ' đ';
    }
})


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
                <td style="color: whitesmoke;word-wrap: normal;"><button type="button" class="btn btn-secondary" style="padding: 0 10px;font-size:90%">` + Intl.NumberFormat('vi-VN').format(
                data[x]['SoTien']) + ` đ</button></td>
                <td style="color: whitesmoke;word-wrap: normal;">` + Intl.NumberFormat('vi-VN').format(data[x]['TraThuong']) +
            ` đ</td>
                <td style="color: whitesmoke;word-wrap: normal;"><button type="button" class="btn btn-secondary" style="padding: 0 10px;font-size:90%">` + data[x]['KetQua1'] + `</button></td>
            </tr>
        `;
    }
    GameHistoryUser.innerHTML = Text;
})
</script>