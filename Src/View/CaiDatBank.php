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

<body class="CaiDatBank">
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
                <a href="" style="padding-left: 30px;" class="active"><i class="fa-solid fa-building-columns"></i>
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
                    <a class="btn btn-primary" href="?TrangChu" role="button"><i class="fa-solid fa-gamepad"></i> GAME TELE</a>
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
                        <i class="fa-solid fa-building-columns"></i>
                        <p>CÀI ĐẶT BANK</p>
                    </h1>
                </div>
                <div class="bodyBox">
                    <form method="post" id="formData" onsubmit="unreloadPage(event)">
                        <select class="form-select" aria-label="Default select example" name="AppBanking">
                            <option value="" id="ShowAppBanking">Chọn ngân hàng nhận tiền</option>
                            <option value="Momo" id="Momo">Momo</option>
                            <option value="Zalopay" id="Zalopay">Zalopay</option>
                        </select>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nhập Số Tài Khoản" name="Stk" id="Stk">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nhập Tên Chủ Tài Khoản"
                                name="BankingUserName" id="BankingUserName">
                        </div>
                        <input type="hidden" value="<?= $_SESSION['IdTelegram'] ?>" name="IdTelegram">
                        <div style="text-align: center;">
                            <button class="sign__btn" type="submit" fdprocessedid="6npn4" id="submitBtn"><span
                                    style="color: whitesmoke;font-weight:600;">Cập Nhập</span></button>
                        </div>
                        <div style="text-align: center;margin-top: 30px;">
                            <h2>LƯU Ý: TÀI KHOẢN BANK CỦA BẠN TỰ ĐỘNG Ở CHẾ ĐỘ BẢO VỆ SAU LẦN TRẢ THƯỞNG THÀNH
                                CÔNG ĐẦU TIÊN.</h2>
                            <h2 style="color: brown;font-weight:600;margin-top: 10px;">ĐIỀN ĐÚNG THÔNG TIN VÌ SẼ
                                ẢNH HƯỞNG ĐẾN TIỀN VỀ TÀI KHOẢN QUÝ KHÁCH.</h2>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<style>
.headerBox h1 {
    font-size: 130%;
    text-align: center;
    line-height: 25px;
    color: brown;
    font-weight: 600;
    font-size: 18px;
    line-height: 100%;
    margin-bottom: 0;
}

.container .box {
    width: 100%;
}

.mb-3 input,
.form-select {
    margin: auto;
    margin-top: 20px;
    width: 500px;
    color: brown;
}

.sign__btn {
    height: 50px;
    width: 500px;
    border-radius: 8px;
    background: linear-gradient(90deg, #fef9a6 0%, #fe5b09 100%);
    box-shadow: 0 0 16px 0 rgb(254 155 33 / 30%);
    color: #333;
    border: none;
}

@media only screen and (max-width: 1000px) {

    .mb-3 input,
    .form-select {
        width: 100%;
    }

    .sign__btn {
        width: 100%;
    }
}

span {
    font-size: 100%;
    font-weight: 600;
    color: brown;
}
</style>
<script>
// Ajax
var form = document.getElementById('formData');
var submitBtn = document.getElementById('submitBtn');
var Stk = document.getElementById('Stk');
var BankingUserName = document.getElementById('BankingUserName');
var ShowAppBanking = document.getElementById('ShowAppBanking');

function unreloadPage(event) {
    event.preventDefault();
}

submitBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'CaiDatBank', true);
    xhr.onload = () => {
        if ((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)) {
            let data = JSON.parse(xhr.response);
            if (data['Status'] == 'error') {
                Swal.fire({
                    text: data['Msg'],
                    icon: "error",
                    timer: 3000,
                    iconColor: "red",
                    color: "brown",
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
                Stk.value = "";
                BankingUserName.value = "";
                return;
            }
            if (data['Status'] == 200) {
                Swal.fire({
                    text: data['Msg'],
                    icon: "success",
                    timer: 3000,
                    iconColor: "red",
                    color: "brown",
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
                Stk.value = data['Stk'];
                BankingUserName.value = data['BankingUserName'];
                ShowAppBanking.innerText = data['AppBanking'];
                return;
            }

        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

window.onload = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", 'CaiDatBank?Data=1', true);
    xhr.onload = () => {
        if ((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)) {
            let data = JSON.parse(xhr.response);
            Stk.value = data[0]['Stk'];
            BankingUserName.value = data[0]['BankingUserName'];
            if (data[0]['AppBanking'] != '') {
                var NameBanking = data[0]['AppBanking'];
                var NameBanking = document.getElementById(NameBanking);
                NameBanking.selected = true;
            }
        }
    }
    xhr.send();
}
</script>
<script src="AllJs"></script>