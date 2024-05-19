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

<body id="Banking">
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
                    <span><img src="https://<?= $_SERVER['SERVER_NAME'] ?>/TeleBotV3/Src/Public/Upload/logo256.png"
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
                <a href="?Game" style="padding-left: 30px;">
                    <i class="bi bi-controller"></i>
                    <p>GAME</p>
                </a>
                <a href="?Banking" style="padding-left: 30px;" class="active">
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
            <div class="row">
                <div class="headerBox">
                    <h1>
                        <p>MOMO</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Tên chủ số TK</th>
                                    <th>Sđt</th>
                                    <th>Số dư</th>
                                    <th>Hạn mức</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="Momo">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>GAME MOMO</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Tên chủ số TK</th>
                                    <th>Sđt</th>
                                    <th>Số dư</th>
                                    <th>Hạn mức</th>
                                    <th>Cược min</th>
                                    <th>Cược max</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="GameMomo">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>ZALOPAY</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Tên chủ số TK</th>
                                    <th>Sđt</th>
                                    <th>Số dư</th>
                                    <th>Hạn mức</th>
                                    <th>Access token</th>
                                </tr>
                            </thead>
                            <tbody id="Zalopay">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>GAME ZALOPAY</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Tên chủ số TK</th>
                                    <th>Sđt</th>
                                    <th>Số dư</th>
                                    <th>Hạn mức</th>
                                    <th>Cược min</th>
                                    <th>Cược max</th>
                                    <th>Access token</th>
                                </tr>
                            </thead>
                            <tbody id="GameZalopay">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>XỬ LÝ RÚT TIỀN</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead style="color: whitesmoke;">
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Id telegram</th>
                                    <th>Nick name</th>
                                    <th>App</th>
                                    <th>Stk</th>
                                    <th>Số tiền rút</th>
                                    <th>Trạng thái</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody id="LichSuRutTien">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>THÊM BANKING</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="TienRutToiThieu"
                                placeholder="Số tiền rút tối thiểu" name="TienRutToiThieu">
                            <label for="TienRutToiThieu">Số tiền rút tối thiểu</label>
                        </div>
                        <button type="submit" class="btn btn-danger">Cập nhập</button>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <label class="form-label" style="color: red;">
                            Thêm stk Momo</label>
                        <div class="mb-3">
                            <label for="Phone" class="form-label" style="color:#fef142;font-size:72%;">Số điện
                                thoại</label>
                            <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Sđt">
                        </div>
                        <div class="mb-3">
                            <label for="Token" class="form-label" style="color:#fef142;font-size:72%;">Token</label>
                            <input type="text" class="form-control" id="Token" name="Token" placeholder="Token">
                        </div>
                        <div class="mb-3">
                            <label for="CuocMin" class="form-label" style="color:#fef142;font-size:72%;">Cược tối
                                thiểu</label>
                            <input type="text" class="form-control" id="CuocMin" name="CuocMin" placeholder="Cược min">
                        </div>
                        <div class="mb-3">
                            <label for="CuocMax" class="form-label" style="color:#fef142;font-size:72%;">Cược tối
                                đa</label>
                            <input type="text" class="form-control" id="CuocMax" name="CuocMax" placeholder="Cược max">
                        </div>
                        <button type="submit" class="btn btn-secondary">Thêm</button>
                    </form>
                </div>
                <div class="bodyBox" style="height: 100%;">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <label class="form-label" style="color: red;">
                            Thêm stk Zalopay</label>
                        <div class="mb-3">
                            <label for="Phone" class="form-label" style="color:#fef142;font-size:72%;">Số điện
                                thoại</label>
                            <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Sđt">
                        </div>
                        <div class="mb-3">
                            <label for="Token" class="form-label" style="color:#fef142;font-size:72%;">Token</label>
                            <input type="text" class="form-control" id="Token" name="Token" placeholder="Token">
                        </div>
                        <div class="mb-3">
                            <label for="TokenBanking" class="form-label" style="color:#fef142;font-size:72%;">Token
                                bank</label>
                            <input type="text" class="form-control" id="TokenBanking" name="TokenBanking"
                                placeholder="Token bank">
                        </div>
                        <div class="mb-3">
                            <label for="AccessToken" class="form-label" style="color:#fef142;font-size:72%;">Mã truy
                                cập</label>
                            <input type="text" class="form-control" id="AccessToken" name="AccessToken"
                                placeholder="Access token">
                        </div>
                        <div class="mb-3">
                            <label for="CuocMin" class="form-label" style="color:#fef142;font-size:72%;">Cược tối
                                thiểu</label>
                            <input type="text" class="form-control" id="CuocMin" name="CuocMin" placeholder="Cược min">
                        </div>
                        <div class="mb-3">
                            <label for="CuocMax" class="form-label" style="color:#fef142;font-size:72%;">Cược tối
                                đa</label>
                            <input type="text" class="form-control" id="CuocMax" name="CuocMax" placeholder="Cược max">
                        </div>
                        <button type="submit" class="btn btn-secondary">Thêm</button>
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
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('Banking', '<?= $_SESSION['TokenAdmin'] ?>');
</script>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['Phone']) and !empty($_POST['Token']) and empty($_POST['CuocMin']) and empty($_POST['CuocMax'])) {
            $Phone = $_POST['Phone'];
            $Token = $_POST['Token'];
            $ThongTinTk = $momo->LayThongTinTk($Token,$Phone);
            if ($ThongTinTk['error'] === 0) {
                $Phone = $ThongTinTk['data']['phone'];
                $TenTk = $ThongTinTk['data']['name'];
                $SoDu = $ThongTinTk['data']['balance'];
                $HanMuc = $ThongTinTk['data']['capset'];
                $Query = "INSERT INTO momolist (Name,Sdt,SoDu,Token,HanMuc) VALUES ('$TenTk','$Phone','$SoDu','$Token','$HanMuc')";
                $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Thêm tài khoản momo thành công !",
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
        if (!empty($_POST['Phone']) and !empty($_POST['Token']) and !empty($_POST['CuocMin']) and !empty($_POST['CuocMax'])) {
            $Phone = $_POST['Phone'];
            $Token = $_POST['Token'];
            $CuocMin = $_POST['CuocMin'];
            $CuocMax = $_POST['CuocMax'];
            $ThongTinTk = $momo->LayThongTinTk($Token,$Phone);
            if ($ThongTinTk['error'] === 0) {
                $Phone = $ThongTinTk['data']['phone'];
                $TenTk = $ThongTinTk['data']['name'];
                $SoDu = $ThongTinTk['data']['balance'];
                $HanMuc = $ThongTinTk['data']['capset'];
                $Query = "INSERT INTO momolist (Name,Sdt,SoDu,Token,HanMuc,CuocMin,CuocMax) VALUES ('$TenTk','$Phone','$SoDu','$Token','$HanMuc','$CuocMin','$CuocMax')";
                $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Thêm tài khoản game momo thành công !",
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
    if (isset($_POST['XoaMomo'])) {
        $Phone = $_POST['Sdt'];
        $Query= "DELETE FROM momolist WHERE Sdt = '$Phone'";
        $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa tài khoản momo thành công !",
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
    if (!empty($_POST['Phone']) and !empty($_POST['Token']) and !empty($_POST['TokenBanking']) and !empty($_POST['AccessToken']) and empty($_POST['CuocMin']) and empty($_POST['CuocMax'])) {
        $Phone = $_POST['Phone'];
        $Token = $_POST['Token'];
        $TokenBanking = $_POST['TokenBanking'];
        $AccessToken = $_POST['AccessToken'];
        $Info = $zalopay->get_info_web($Phone,$Token,$AccessToken);
        if (!empty($Info)) {
            $Name = $Info['data']['name'];
            $Balance = ($zalopay->getBalance($AccessToken))['data']['balance'];
            $Query = "INSERT INTO zalopaylist (Name,Sdt,SoDu,Token,TokenBanking,AccessToken) VALUES ('$Name','$Phone','$Balance','$Token','$TokenBanking','$AccessToken')";
            $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Thêm tài khoản zalopay thành công !",
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
    if (!empty($_POST['Phone']) and !empty($_POST['Token']) and !empty($_POST['TokenBanking']) and !empty($_POST['AccessToken']) and !empty($_POST['CuocMin']) and !empty($_POST['CuocMax'])) {
        $Phone = $_POST['Phone'];
        $Token = $_POST['Token'];
        $TokenBanking = $_POST['TokenBanking'];
        $AccessToken = $_POST['AccessToken'];
        $CuocMin = $_POST['CuocMin'];
        $CuocMax = $_POST['CuocMax'];
        $Info = $zalopay->get_info_web($Phone,$Token,$AccessToken);
        if (!empty($Info)) {
            $Name = $Info['data']['name'];
            $Balance = ($zalopay->getBalance($AccessToken))['data']['balance'];
            $Query = "INSERT INTO zalopaylist (Name,Sdt,SoDu,Token,TokenBanking,CuocMin,CuocMax,AccessToken) VALUES ('$Name','$Phone','$Balance','$Token','$TokenBanking','$CuocMin','$CuocMax','$AccessToken')";
            $System->conn->InsertData($Query);
?>
<script>
Swal.fire({
    text: "Thêm tài khoản game zalopay thành công !",
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
    if (isset($_POST['XoaZalopay'])) {
        $Phone = $_POST['Sdt'];
        $Query= "DELETE FROM zalopaylist WHERE Sdt = '$Phone'";
        $System->conn->DeleData($Query);
?>
<script>
Swal.fire({
    text: "Xóa tài khoản zalopay thành công !",
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
    if (isset($_POST['TienRutToiThieu'])) {
        $TienRutToiThieu = $_POST['TienRutToiThieu'];
        $Query = "UPDATE sotienrut SET SoTienRut = '$TienRutToiThieu '";
        $System->conn->UpdateData($Query);
?>
<script>
Swal.fire({
text: "Cập nhập số tiền rút thành công !",
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

    if (isset($_POST['CapNhapTrangThaiRutTien'])) {
        $TimeInit = $_POST['TimeInit'];
        $IdTelegram = $_POST['IdTelegram'];
        $TrangThai = $_POST['TrangThai'];
        $Query = "UPDATE lichsuruttien SET TrangThai = '$TrangThai' WHERE IdTelegram = '$IdTelegram' AND TimeInit = '$TimeInit'";
        $System->conn->UpdateData($Query);
        if ($TrangThai == 'Thành công') {
            $Msg = "✅ Rút tiền về tài khoản thành công ❗️";
            $TeleBot->SEND_entities($Msg,$IdTelegram);
        }
        else {
            $Msg = "❌ Rút tiền về tài khoản thất bại ❗️\n\nLiên hệ admin @Lymannhi để xử lý lỗi";
            $TeleBot->SEND_entities($Msg,$IdTelegram);
        }
?>
<script>
Swal.fire({
text: "Xử lý số tiền rút thành công !",
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