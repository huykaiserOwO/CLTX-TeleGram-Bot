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
    width: 3px;
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

<body id="LichSuGame">
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
                    <a class="btn btn-primary" href="?QuanLyNguoiChoi" role="button"><i class="fa-solid fa-gears"></i>
                        Quản lý người
                        chơi</a>
                    <a class="btn btn-primary" href="?Giftcode" role="button"><i class="fa-solid fa-gears"></i>
                        Giftcode</a>
                    <a class="btn btn-danger" href="?LichSuGame" role="button"><i class="fa-solid fa-gears"></i> Lịch
                        sử game</a>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>LỊCH SỬ CHƠI</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 600px;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id</th>
                                    <th>Thời gian</th>
                                    <th>Id telegram</th>
                                    <th>Nick name</th>
                                    <th>Trò chơi</th>
                                    <th>Đã chọn</th>
                                    <th>Số tiền</th>
                                    <th>Kết quả</th>
                                    <th>Kết quả</th>
                                    <th>Trả thưởng</th>
                                    <th>Sao kê</th>
                                    <th>Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody id="LichSuChoi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>LỊCH SỬ NẠP TIỀN</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 600px;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id</th>
                                    <th>Thời gian</th>
                                    <th>Id telegram</th>
                                    <th>Nick name</th>
                                    <th>App banking</th>
                                    <th>Tên chủ tài khoản</th>
                                    <th>Số tiền nạp</th>
                                </tr>
                            </thead>
                            <tbody id="LichSuNapTien">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="headerBox">
                    <h1>
                        <p>LỊCH SỬ RÚT TIỀN</p>
                    </h1>
                </div>
                <div class="bodyBox" style="height: 600px;">
                    <div class="table-responsive-xxl">
                        <table class="table">
                            <thead>
                                <tr style="color: whitesmoke;">
                                    <th>Id</th>
                                    <th>Thời gian</th>
                                    <th>Id telegram</th>
                                    <th>Nick name</th>
                                    <th>App banking</th>
                                    <th>Tên chủ tài khoản</th>
                                    <th>Số tiền rút</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="LichSuRutTien">

                            </tbody>
                        </table>
                    </div>
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

#HienThiTimKiemLichSuChoi {
    display: none;
}
</style>
<script src="AdminJs"></script>
<script>
socket.emit('JoinAdmin', '<?= $_SESSION['TokenAdmin'] ?>')
socket.emit('LichSuGame', '<?= $_SESSION['TokenAdmin'] ?>');
</script>