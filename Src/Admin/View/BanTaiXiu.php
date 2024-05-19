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
    text-align: left;
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

input {
    border-radius: 10px;
    padding: 2px 10px;
    font-size: 120%;
    font-weight: 600;
    color: red;
    border: none;
    width: 50px;
}
</style>

<body id="Game2">
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
                    <a class="btn btn-primary" href="?Game" role="button"><i class="fa-solid fa-gears"></i> GAME
                        TELE</a>
                    <a class="btn btn-primary" href="?MmZlBanking" role="button"><i class="fa-solid fa-gears"></i>
                        GAME MOMO ZALOPAY BANKING</a>
                    <a class="btn btn-danger" href="?BanTaiXiu" role="button"><i class="fa-solid fa-gears"></i> BÀN TÀI
                        XỈU</a>
                </div>
            </div>
            <div class="container" style="margin-top: 30px;">
                <div class="row" style="height:100%;">
                    <div class="headerBox">
                        <h1>
                            <i class="fa-solid fa-dice-five"></i>
                            <p style="line-height: 15px;">BẺ CẦU BÀN TÀI XỈU</p>
                        </h1>
                    </div>
                    <div class="bodyBox" style="font-size: 110%;">
                        <h2>Thời gian: <b id="ThoiGian"></b></h2>
                        <h2>Thông báo: <b id="Msg"></b></h2>
                        <h2>Thời gian hết phiên: <b id="ThoiGian1"></b></h2>
                        <h2>Phiên game: <b id="PhienGame"></b></h2>
                        <h2>Số người chọn tài: <b id="SoNguoiChonTai"></b></h2>
                        <h2>Số người chọn xỉu: <b id="SoNguoiChonXiu"></b></h2>
                        <h2>Tổng tiền đặt cửa tài: <b id="TongTienDatTai"></b></h2>
                        <h2>Tổng tiền đặt cửa xỉu: <b id="TongTienDatXiu"></b></h2>
                        <h2>Dự định kết quả:
                            <input type="text" id="XucXac1" placeholder="" style="text-align: center;">
                            <input type="text" id="XucXac2" placeholder="" style="text-align: center;">
                            <input type="text" id="XucXac3" placeholder="" style="text-align: center;">
                        </h2>
                        <h2>Tổng xúc xắc: <b id="TongXucXac"></b></h2>
                        <h2>Kết quả: <b id="KetQua"></b></h2>
                        <div>
                            <div>
                                <input type="text" id="xucXac1" style="text-align: center;">
                                <input type="text" id="xucXac2" style="text-align: center;">
                                <input type="text" id="xucXac3" style="text-align: center;">
                            </div>
                            <button type="button" class="btn btn-secondary" id="BeCau">Bẻ Cầu</button>
                        </div>
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
                                    <textarea class="form-control" id="ChatMsg" name="Msg" rows="1"
                                        placeholder="Chat ở đây..."></textarea>
                                    <input type="hidden" value="System" name="IdNguoiGui">
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
                    <h1>
                        <p style="line-height: 15px;">CHẶN CHAT NGƯỜI CHƠI</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 360px;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Id Telegram</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="BlockChat">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bodyBox">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <select class="form-select IdTeleList" name="ChanChat" style="margin-bottom: 10px;color:red;">
                        </select>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Chặn</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="AdminJs"></script>
<script>
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('Game', '<?= $_SESSION['TokenAdmin'] ?>');
</script>
<script>
var boxChat = document.getElementById('boxChat');
var ChatMsg = document.getElementById('ChatMsg');

function ScrollHeight() {
    boxChat.scrollTop = boxChat.scrollHeight;
}
socket.emit('ReqChat')
socket.on('Msg', (data) => {
    var Text = "";
    for (var x in data) {
        if (data[x]['IdNguoiGui'] == 'System') {
            Text += `
                <div class="MyMsg">
                    <h2 style="color:#fef142;">Admin<i style="font-size: 80%;color: brown;padding-left:10px;">12:24 19/03/2024</i></h2>
                        <h2>` + data[x]['Mess'] + `</h2>
                </div>
            `
        } else {
            Text += `
                <div class="YourMsg">
                    <h2 style="color:#fef142;">` + data[x]['Nickname'] + ` ` + data[x]['IdNguoiGui'] + `<i
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

</script>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['ChanChat'])) {
            $IdTelegram = $_POST['ChanChat'];
            $Query = "INSERT INTO blockchat (IdTelegram) VALUES ('$IdTelegram')";
            $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Chặn chat người chơi thành công !",
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
        if (isset($_POST['XoaBlockChat']) and isset($_POST['IdTelegram'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $Query = "DELETE FROM blockchat WHERE IdTelegram = '$IdTelegram'";
            $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa block chat người chơi thành công !",
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
?>