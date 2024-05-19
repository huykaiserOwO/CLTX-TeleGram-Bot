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

<body id="QuanLyNguoiChoi">
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
                    <a class="btn btn-danger" href="" role="button"><i class="fa-solid fa-gears"></i> Quản lý người
                        chơi</a>
                    <a class="btn btn-primary" href="?Giftcode" role="button"><i class="fa-solid fa-gears"></i>
                        Giftcode</a>
                    <a class="btn btn-primary" href="?LichSuGame" role="button"><i class="fa-solid fa-gears"></i> Lịch
                        sử game</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-users"></i>
                        <p>DANH SÁCH NGƯỜI CHƠI</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 500px;">
                    <div style="margin-bottom: 80px;">
                        <form method="post" enctype="application/x-www-form-urlencoded" onsubmit="unreloadPage(event)">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm người chơi"
                                    name="SearchUser" id="SearchUser">
                                <button class="btn btn-outline-secondary" type="submit" id="Search"
                                    style="margin: 0;"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="table-responsive-xxl" id="ShowSearch">
                                <table class="table">
                                    <thead>
                                        <tr style="color: whitesmoke;">
                                            <th>Id</th>
                                            <th>Id Telegram</th>
                                            <th>Thời gian tạo acc</th>
                                            <th>Email</th>
                                            <th>Nickname</th>
                                            <th>App banking</th>
                                            <th>Số tài khoản</th>
                                            <th>Tên chủ tài khoản</th>
                                            <th>Ví</th>
                                            <th>Xử lý</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ShowSearchUser">

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id</th>
                                    <th>Id Telegram</th>
                                    <th>Thời gian tạo acc</th>
                                    <th>Email</th>
                                    <th>Nickname</th>
                                    <th>App banking</th>
                                    <th>Số tài khoản</th>
                                    <th>Tên chủ tài khoản</th>
                                    <th>Ví</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="DanhSachNguoiChoi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-user"></i>
                        <p>THỐNG KÊ NGƯỜI CHƠI</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id</th>
                                    <th>Id Telegram</th>
                                    <th>Nickname</th>
                                    <th>Tổng tiền cược</th>
                                    <th>Tổng tiền thắng cược</th>
                                    <th>Số lần chơi</th>
                                </tr>
                            </thead>
                            <tbody id="ThongKeNguoiChoi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-ban"></i>
                        <p>DANH SÁCH BLACKLIST</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id Telegram</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="DanhSachBlackList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-dice"></i>
                        <p>DANH SÁCH BẺ CẦU</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id Telegram</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="DanhSachBeCau">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-dice"></i>
                        <p>DANH SÁCH BLOCK SPAM</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id Telegram</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="DanhSachBlockSpam">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-trophy"></i>
                        <p>TOP</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Id</th>
                                    <th>Id Telegram</th>
                                    <th>Nickname</th>
                                    <th>Tổng tiền chơi</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="BangTop">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <i class="fa-solid fa-gear"></i>
                        <p>CẬP NHẬP</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label for="ThongBao" class="form-label" style="color: red;"><i
                                    class="fa-solid fa-paper-plane"></i> Gửi thông báo tới
                                người
                                chơi
                                trên telegram</label>
                            <textarea class="form-control" id="ThongBao" rows="3" name="ThongBao" placeholder="Text">
LIXI66.TOP 
📢 Thông Báo
❗️ 
                                        </textarea>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Gửi
                                Thông
                                Báo</button>
                        </div>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label class="form-label" style="color: red;"><i class="fa-brands fa-telegram"></i> Gửi
                                thông
                                báo từng
                                người
                                chơi telegram</label>
                            <select class="form-select IdTeleList" name="IdTelegram"
                                style="margin-bottom: 10px;color:brown;">
                            </select>
                            <textarea class="form-control" rows="3" name="ThongBaoTheoId" placeholder="Text">
LIXI66.TOP 
📢 Thông Báo  
❗️ 
                                        </textarea>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Gửi
                                Thông
                                Báo</button>
                        </div>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label class="form-label" style="color: red;"><i class="fa-solid fa-trophy"></i> Cập
                                nhập top</label>
                            <select class="form-select IdTeleList" name="IdTelegram"
                                style="margin-bottom: 10px;color:brown;">
                            </select>
                            <select class="form-select" aria-label="Default select example" name="Top"
                                style="color:brown; margin-top: 10px;">
                                <option selected value="">Top</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="XoaTop"
                                style="color:brown; margin-top: 10px;">
                                <option selected value="">Xóa Top</option>
                                <option value="All">All</option>
                            </select>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập
                                Nhập</button>
                        </div>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label class="form-label" style="color: red;"><i class="fa-solid fa-trophy"></i> Fake
                                top</label>
                            <select class="form-select" aria-label="Default select example" name="Top"
                                style="color:brown; margin-bottom: 10px;">
                                <option selected value="">Top</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="FakeNickname" placeholder="Fake Nickname"
                                    name="FakeNickname">
                                <label for="FakeNickname">Fake nickname</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="FakeTongTienChoi"
                                    placeholder="Fake tổng tiền chơi" name="FakeTongTienChoi">
                                <label for="FakeTongTienChoi">Fake tổng tiền chơi</label>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập
                                Nhập</button>
                        </div>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="mb-3">
                            <label class="form-label" style="color: red;"><i class="fa-solid fa-gift"></i>
                                Nổ hủ</label>
                            <select class="form-select IdTeleList" name="IdTelegram"
                                style="margin-bottom: 10px;color:brown;">
                            </select>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="SoTienNoHu" placeholder="Số tiền nổ hủ"
                                    name="SoTienNoHu">
                                <label for="SoTienNoHu">Số tiền nổ hủ</label>
                            </div>
                            <textarea class="form-control" rows="5" name="ThongBaoNoHu"
                                placeholder="Tin nhắn thông báo nổ hủ" id="ThongBaoNoHu">
LIXI66.TOP 

💸 Chúc mừng người chơi
🎁 Nổ hủ: 
👉 Nếu bị lỗi liên hệ admin @Lymannhi
                                        </textarea>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập
                                nhập</button>
                        </div>
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
</style>
<script src="AdminJs"></script>
<script>
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('QuanLyNguoiChoi', '<?= $_SESSION['TokenAdmin'] ?>');

function unreloadPage(event) {
    event.preventDefault();
}
var SearchUser = document.getElementById('SearchUser');
var Search = document.getElementById('Search');
var ShowSearchUser = document.getElementById('ShowSearchUser');
var ShowSearch = document.getElementById('ShowSearch');
SearchUser.onclick = () => {
    ShowSearch.style.display = "none";
}
Search.onclick = () => {
    if (SearchUser.value != "") {
        socket.emit('TimKiemNguoiChoi', ['<?= $_SESSION['TokenAdmin'] ?>', SearchUser.value]);
        SearchUser.value = "";
    }
}
</script>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['ThongBao'])) {
            $Msg = $_POST['ThongBao'];
            $Query = "SELECT IdTelegram FROM user";
            $Data = $System->conn->SelectData($Query);
            if ($Data !== false) {
                foreach ($Data as $IdTelegram) {
                    if (empty($IdTelegram)) {
                        continue;
                    }
                    $TeleBot->SEND_entities($Msg, $IdTelegram['IdTelegram']);
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
            return; }
        return;}
        if (!empty($_POST['ThongBaoTheoId']) and !empty($_POST['IdTelegram'])) {
            $ThongBaoTheoId = $_POST['ThongBaoTheoId'];
            $IdTelegram = $_POST['IdTelegram'];
            $TeleBot->SEND_entities($ThongBaoTheoId, $IdTelegram);
?>
<script>
Swal.fire({
    text: "Gửi thông báo tới Id người chơi: <?= $IdTelegram ?> thành công !",
    icon: "success",
    timer: 2000,
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
}, 2000);
</script>
<?php 
        return; }
        if (!empty($_POST['BlackList']) and !empty($_POST['IdTelegram'])) {
            $BlackList = $_POST['BlackList'];
            if ($BlackList == 'On') {
                $IdTelegram = $_POST['IdTelegram'];
                $Query = "INSERT INTO blacklist (IdTelegram) VALUES ('$IdTelegram')";
                $System->conn->InsertData($Query);
                $Msg = "📣 Bạn đã bị admin đưa vào danh sách Black list. Liên hệ admin để gỡ Ban !";
                $TeleBot->SEND($Msg, $IdTelegram);
?>
<script>
Swal.fire({
    text: "Người chơi: <?= $IdTelegram ?> đã đưa vào danh sách Blacklist thành công !",
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
                $IdTelegram = $_POST['IdTelegram'];
                $Query = "DELETE FROM blacklist WHERE IdTelegram = '$IdTelegram'";
                $System->conn->DeleData($Query);
                $Msg = "📣 Bạn đã được admin gỡ Ban !";
                $TeleBot->SEND($Msg, $IdTelegram);
?>
<script>
Swal.fire({
    text: "Người chơi: <?= $IdTelegram ?> đã đưa ra khỏi danh sách Blacklist thành công !",
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
        if (!empty($_POST['BeCau']) and !empty($_POST['IdTelegram'])) {
            $BeCau = $_POST['BeCau'];
            if ($BeCau == 'On') {
                $IdTelegram = $_POST['IdTelegram'];
                $Query = "INSERT INTO becau (IdTelegram) VALUES ('$IdTelegram')";
                $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Người chơi: <?= $IdTelegram ?> đã bẻ cầu thành công !",
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
                $IdTelegram = $_POST['IdTelegram'];
                $Query = "DELETE FROM becau WHERE IdTelegram = '$IdTelegram'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Người chơi: <?= $IdTelegram ?> gỡ bẻ cầu thành công !",
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
        if (!empty($_POST['BlockSpam'])) {
            $IdTelegram = $_POST['IdTelegram'];
                $Query = "DELETE FROM blockspam WHERE IdTelegram = '$IdTelegram'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Người chơi: <?= $IdTelegram ?> gỡ block spam thành công !",
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

        if (!empty($_POST['Top']) and !empty($_POST['IdTelegram'])) {
            $Top = $_POST['Top'];
            $IdTelegram = $_POST['IdTelegram'];
            $Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = '$IdTelegram'";
            $Data = $System->conn->SelectData($Query);
            if ($Data != false) {
                $Nickname = $Data[0]['Nickname'];
                $TongTienChoi = $Data[0]['TongTienCuoc'];
                $Query = "INSERT INTO bangtop (Top,IdTelegram,Nickname,TongTienChoi) VALUES ('$Top','$IdTelegram','$Nickname','$TongTienChoi')";
                $System->conn->InsertData($Query);
            }
?>
<script>
Swal.fire({
    text: "Cập nhập top người chơi: <?= $Nickname ?> thành công !",
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
        if (!empty($_POST['XoaTop'])) {
            if ($_POST['XoaTop'] == 'On') {
                $IdTelegram = $_POST['IdTelegram'];
                $Query = "DELETE FROM bangtop WHERE IdTelegram = '$IdTelegram'";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa top thành công !",
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
            else {
                $Query = "DELETE FROM bangtop";
                $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa top thành công !",
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
        if (!empty($_POST['FakeNickname']) and !empty($_POST['FakeTongTienChoi']) and !empty($_POST['Top'])) {
            $Top = $_POST['Top'];
            $FakeNickname = $_POST['FakeNickname'];
            $FakeTongTienChoi = $_POST['FakeTongTienChoi'];
            $FakeIdTelegram = $System->RandNumber(10);
            $Query = "INSERT INTO bangtop (Top,IdTelegram,Nickname,TongTienChoi) VALUES ('$Top','$FakeIdTelegram','$FakeNickname','$FakeTongTienChoi')";
            $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Fake top thành công !",
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

        if (!empty($_POST['SoTienNoHu']) and !empty($_POST['ThongBaoNoHu']) and !empty($_POST['IdTelegram'])) {
            $IdTelegram = $_POST['IdTelegram'];
            $SoTienNoHu = (int)$_POST['SoTienNoHu'];
            $ThongBaoNoHu = $_POST['ThongBaoNoHu'];
            $Query = "SELECT Wallet FROM user WHERE IdTelegram = '$IdTelegram'";
            $Wallet = (int)(($System->conn->SelectData($Query))[0]['Wallet']);
            $UpdateWallet = $SoTienNoHu + $Wallet;
            $Query = "UPDATE user SET Wallet = '$UpdateWallet' WHERE IdTelegram = '$IdTelegram'";
            $System->conn->UpdateData($Query);
            $TeleBot->SEND_entities($ThongBaoNoHu,$IdTelegram);

?>
<script>
Swal.fire({
    text: "Nổ hủ tới Id người chơi: <?= $IdTelegram ?> thành công !",
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
?>