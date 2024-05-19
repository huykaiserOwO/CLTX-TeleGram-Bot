const socket = io();
socket.on('connect', () => {

})
var sideBar = document.getElementById('sidebar');
function myFunction(x) {
    x.classList.toggle("change");
    if (sideBar.className == "") {
        sideBar.style.marginLeft = 0;
        sideBar.className = "sidebarMobileOn";
    }
    else {
        sideBar.className = "";
        sideBar.style.marginLeft = -300;
    }
}

var System = document.getElementById('System');
if (System != undefined) {
    var User = document.getElementById('User');
    var TongDoanhThu = document.getElementById('TongDoanhThu');
    var TongDoanhThuGameTele = document.getElementById('TongDoanhThuGameTele');
    var TongDoanhThuGameMomo = document.getElementById('TongDoanhThuGameMomo');
    var TongDoanhThuGameZalopay = document.getElementById('ongDoanhThuGameZalopay');
    var TongDoanhThuGameBanking = document.getElementById('TongDoanhThuGameBanking');
    var SoDonCuocbongDa = document.getElementById('SoDonCuocbongDa');
    var SoDonCuocSoXo = document.getElementById('SoDonCuocSoXo');
    var ImageLogo = document.getElementById('ImageLogo');
    var TenGame = document.getElementById('TenGame');
    var LinkBotTele = document.getElementById('LinkBotTele');
    var ThongBao = document.getElementById('ThongBao');
    var Off = document.getElementById('Off');
    var On = document.getElementById('On');
    //
    socket.on('SoLuongNguoiChoi', (data) => {
        User.innerText = data;
    })
    //
    socket.on('TongDoanhThu', (data) => {
        TongDoanhThu.innerText = data;
    })
    //   
    socket.on('DoanhThuGameTele', (data) => {
        TongDoanhThuGameTele.innerText = data;
    })
    //
    socket.on('DoanhThuGameMomo', (data) => {
        TongDoanhThuGameMomo.innerText = data;
    })
    //
    socket.on('DonCuocSoXo', (data) => {
        SoDonCuocSoXo.innerText = data;
    })
    //
    socket.on('DonCuocBongDa', (data) => {
        SoDonCuocbongDa.innerText = data;
    })
    //
    socket.on('File', (data) => {
        ImageLogo.src = data[0]['Url'];
        TenGame.placeholder = data[1]['Name'];
        LinkBotTele.placeholder = data[2]['Url'];
        ThongBao.placeholder = data[5]['Msg'];
        if (data[4]['On_Off'] == 'On') {
            On.selected = true;
        }
        else {
            Off.selected = true;
        }
    })
}

var QuanLyNguoiChoi = document.getElementById('QuanLyNguoiChoi');
if (QuanLyNguoiChoi != undefined) {
    var DanhSachNguoiChoi = document.getElementById('DanhSachNguoiChoi');
    var IdTeleList = document.getElementsByClassName('IdTeleList');
    // Danh sách người chơi
    socket.on('DanhSachNguoiChoi', (data) => {
        var Text = '';
        var idTeleText = "";
        for (var x in data) {
            Text += `
                <tr style="color: whitesmoke;font-size:100%;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['Email'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ data[x]['AppBanking'] + `</td>
                    <td>`+ data[x]['Stk'] + `</td>
                    <td>`+ data[x]['BankingUserName'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['Wallet']) + ` đ</td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-ban"></i></label>
                            <input type="submit" value="BlackList">
                            <input type="hidden" name="BlackList" value="On">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                        </form>
                        <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-dice"></i></label>
                            <input type="submit" value="Bẻ Cầu">
                            <input type="hidden" name="BeCau" value="On">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                        </form>
                    </td>
                </tr>
            `;

            idTeleText += `
                <option value="`+ data[x]['IdTelegram'] + `" >Id Telegram: ` + data[x]['IdTelegram'] + ` Nickname: ` + data[x]['Nickname'] + `</option>
            `;

        }
        DanhSachNguoiChoi.innerHTML = Text;

        for (var x = 0; x < IdTeleList.length; x++) {
            IdTeleList[x].innerHTML = idTeleText;
        }
    })
    // Thống kê người chơi
    var ThongKeNguoiChoi = document.getElementById('ThongKeNguoiChoi');
    socket.on('ThongKeNguoiChoi', (data) => {
        var Text = '';
        for (var x in data) {
            Text += `
                <tr style="color: whitesmoke;font-size:100%;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TongTienCuoc']) + ` đ</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TongTienThangCuoc']) + ` đ</td>
                    <td>`+ data[x]['SoLanChoi'] + `</td>
                </tr>
            `;
        }
        ThongKeNguoiChoi.innerHTML = Text;
    })
    // Danh sách black list
    var DanhSachBlackList = document.getElementById('DanhSachBlackList');
    socket.on('DanhSachBlackList', (data) => {
        var Text = '';
        for (var x in data) {
            Text += `
            <tr style="color: whitesmoke;font-size:100%;">
                <td>`+ data[x]['IdTelegram'] + `</td>
                <td>
                    <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-ban"></i></label>
                        <input type="submit" value="Xóa blacklist">
                        <input type="hidden" name="BlackList" value="Off">
                        <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                    </form>
                </td>
            </tr>
        `;
        }
        DanhSachBlackList.innerHTML = Text;
    })
    // Danh sách bẻ cầu
    var DanhSachBeCau = document.getElementById('DanhSachBeCau');
    socket.on('DanhSachBeCau', (data) => {
        console.log(data)
        var Text = '';
        for (var x in data) {
            Text += `
            <tr style="color: whitesmoke;font-size:100%;">
                <td>`+ data[x]['IdTelegram'] + `</td>
                <td>
                    <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-dice"></i></label>
                        <input type="submit" value="Gỡ bẻ cầu">
                        <input type="hidden" name="BeCau" value="Off">
                        <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                    </form>
                </td>
            </tr>
        `;
        }
        DanhSachBeCau.innerHTML = Text;
    })

    // Danh sách block spam
    var DanhSachBlockSpam = document.getElementById('DanhSachBlockSpam');
    socket.on('DanhSachBlockSpam', (data) => {
        var Text = '';
        for (var x in data) {
            Text += `
            <tr style="color: whitesmoke;font-size:100%;">
                <td>`+ data[x]['IdTelegram'] + `</td>
                <td>
                    <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-ban"></i></label>
                        <input type="submit" value="Gỡ block spam">
                        <input type="hidden" name="BlockSpam" value="Off">
                        <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                    </form>
                </td>
            </tr>
        `;
        }
        DanhSachBlockSpam.innerHTML = Text;
    })

    // Bảng top
    var BangTop = document.getElementById('BangTop');
    socket.on('BangTop', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color: whitesmoke;font-size:100%;">
                    <td style="color: whitesmoke;font-size:100%;">`+ data[x]['Top'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TongTienChoi']) + ` đ</td>
                    <td>
                    <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                        <input type="submit" value="Xóa top">
                        <input type="hidden" name="XoaTop" value="On">
                        <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                    </form>
                </td>
                </tr>
            `;
        }
        BangTop.innerHTML = Text;
    })

    // Tìm kiếm người chơi
    socket.on('TimKiemNguoiChoi', (data) => {
        if (data != '') {
            var Text = "";
            for (var x in data) {
                Text += `
                    <tr style="color: whitesmoke;font-size:100%;">
                        <td>`+ data[x]['Id'] + `</td>
                        <td>`+ data[x]['IdTelegram'] + `</td>
                        <td>`+ data[x]['TimeInit'] + `</td>
                        <td>`+ data[x]['Email'] + `</td>
                        <td>`+ data[x]['Nickname'] + `</td>
                        <td>`+ data[x]['AppBanking'] + `</td>
                        <td>`+ data[x]['Stk'] + `</td>
                        <td>`+ data[x]['BankingUserName'] + `</td>
                        <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['Wallet']) + ` đ</td>
                        <td>
                            <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                                <label class="label-form"><i class="fa-solid fa-ban"></i></label>
                                <input type="submit" value="BlackList">
                                <input type="hidden" name="BlackList" value="On">
                                <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            </form>
                            <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                                <label class="label-form"><i class="fa-solid fa-dice"></i></label>
                                <input type="submit" value="Bẻ Cầu">
                                <input type="hidden" name="BeCau" value="On">
                                <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            </form>
                        </td>
                    </tr>
                `;

            }
            ShowSearch.style.display = "block";
            ShowSearchUser.innerHTML = Text;
        }
        else {
            ShowSearch.style.display = "none";
        }
    })
}

var MaCode = document.getElementById('MaCode');
if (MaCode != undefined) {
    socket.on('Giftcode', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:white;">    
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['Code'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['Money']) + ` đ</td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa Giftcode">
                            <input type="hidden" name="XoaCode" value="On">
                            <input type="hidden" name="Id" value="`+ data[x]['Id'] + `">
                        </form>
                    </td>
                </tr>
            `;
        }
        MaCode.innerHTML = Text;
    })

    var LichSuGiftCode = document.getElementById('LichSuGiftcode');
    socket.on('LichSuGiftCode', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:white;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ data[x]['Code'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['Money']) + ` đ</td>
                </tr>
            `;

        }
        LichSuGiftCode.innerHTML = Text;
    })
}


var LichSuGame = document.getElementById('LichSuGame');
if (LichSuGame != undefined) {
    var LichSuChoi = document.getElementById('LichSuChoi');
    socket.on('LichSuChoi', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:white;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ data[x]['TroChoi'] + `</td>
                    <td>`+ data[x]['DaChon'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['SoTien']) + ` đ</td>
                    <td>`+ data[x]['KetQua'] + `</td>
                    <td>`+ data[x]['KetQua1'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TraThuong']) + ` đ</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['SaoKe']) + ` đ</td>
                    <td>`+ data[x]['GhiChu'] + `</td>
                </tr>
            `;
        }
        LichSuChoi.innerHTML = Text;
    })

    var LichSuNapTien = document.getElementById('LichSuNapTien');
    socket.on('LichSuNapTien', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:white;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ data[x]['AppBanking'] + `</td>
                    <td>`+ data[x]['TenTaiKhoan'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['SoTienNap']) + ` đ</td>
                </tr>
            `;
        }
        LichSuNapTien.innerHTML = Text;

    })


    var LichSuRutTien = document.getElementById('LichSuRutTien');
    socket.on('LichSuRutTien', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:white;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['TimeInit'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ data[x]['AppBanking'] + `</td>
                    <td>`+ data[x]['SoTaiKhoan'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['SoTienRut']) + ` đ</td>
                    <td>`+ data[x]['TrangThai'] + `</td>
                </tr>
            `;
        }
        LichSuRutTien.innerHTML = Text;

    })
}

var Game = document.getElementById('Game');
if (Game != undefined) {
    var BtnGame = document.getElementsByClassName('BtnGame');
    for (var x = 0; x < BtnGame.length; x++) {
        BtnGame[x].addEventListener('click', function () {
            var Id = (this.id).slice(3);
            // Ajax
            let xhr = new XMLHttpRequest();
            xhr.open("GET", 'Ajax/GetGameTele?IdBtn=' + Id, true);
            xhr.onload = () => {
                if ((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)) {
                    var ListGame = document.getElementById('ListGame');
                    var Settings = document.getElementById('Settings');
                    var Id = document.getElementById('Id');
                    var GameName = document.getElementById('GameName');
                    var Text = "";
                    var Array = JSON.parse(xhr.response);
                    Settings.value = Array['Settings'];
                    Id.value = Array['Id'];
                    GameName.innerText = Array['GameName'];
                    for (var x in Array['MaGame1']) {
                        var y = x;
                        if (x == 0 || x == 1 || x == 2 || x == 3 || x == 4) {
                            y = 'S';
                        }
                        Text += `
                            <tr>
                                <td style="color: white;">`+ y + `</td>
                                <td style="color: white;">
                                    <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame1'][x] + `</button>
                                </td>
                                <td style="color: white;">x`+ Array['TiLe1'] + `</td>
                            </tr>
                        `;
                    }
                    for (var x in Array['MaGame2']) {
                        var y = x;
                        if (x == 0 || x == 1 || x == 2 || x == 3 || x == 4) {
                            y = 'S';
                        }
                        Text += `
                            <tr>
                                <td style="color: white;">`+ y + `</td>
                                <td style="color: white;">
                                    <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame2'][x] + `</button>
                                </td>
                                <td style="color: white;">x`+ Array['TiLe2'] + `</td>
                            </tr>
                        `;
                    }
                    for (var x in Array['MaGame3']) {
                        Text += `
                            <tr>
                                <td style="color: white;">`+ x + `</td>
                                <td style="color: white;">
                                    <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame3'][x] + `</button>
                                </td>
                                <td style="color: white;">x`+ Array['TiLe3'] + `</td>
                            </tr>
                        `;
                    }
                    for (var x in Array['MaGame4']) {
                        Text += `
                            <tr>
                                <td style="color: white;">`+ x + `</td>
                                <td style="color: white;">
                                    <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame4'][x] + `</button>
                                </td>
                                <td style="color: white;">x`+ Array['TiLe4'] + `</td>
                            </tr>
                        `;
                    }
                    for (var x in Array['MaGame5']) {
                        Text += `
                            <tr>
                                <td style="color: white;">`+ x + `</td>
                                <td style="color: white;">
                                    <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame5'][x] + `</button>
                                </td>
                                <td style="color: white;">x`+ Array['TiLe5'] + `</td>
                            </tr>
                        `;
                    }
                    ListGame.innerHTML = Text;
                }
            }
            xhr.send();
        })
    }

    var DoanhThuGameTele = document.getElementById('DoanhThuGameTele');
    socket.on('ThongKeGameTele', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:whitesmoke;">
                    <td>`+ data[x]['Id'] + `</td>
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>`+ data[x]['Nickname'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TongTienCuoc']) + ` đ</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['TongTienThangCuoc']) + ` đ</td>
                </tr>
            `;
        }
        DoanhThuGameTele.innerHTML = Text;
    })

    var DonCuocSoXoList = document.getElementById('DonCuocSoXoList');
    socket.on('DonCuocSoXo', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:whitesmoke;font-size: 150%;">
                    <td style="color:whitesmoke;">`+ data[x]['TimeInit'] + `</td>
                    <td style="color:whitesmoke;">`+ data[x]['IdTelegram'] + `</td>
                    <td style="color:whitesmoke;">`+ data[x]['Nickname'] + `</td>
                    <td style="color:whitesmoke;">`+ data[x]['NoiDungCuoc'] + `</td>
                    <td style="color:whitesmoke;">`+ Intl.NumberFormat('vi-VN').format(data[x]['SoTienCuoc']) + ` đ</td>
                    <td style="color:whitesmoke;">`+ data[x]['SoDuDoan'] + `</td>
                    <td style="color:whitesmoke;">`+ data[x]['TrangThai'] + `</td>
                    <td style="color:whitesmoke;">
                        <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-floppy-disk"></i></label>
                            <input type="submit" value="Lưu" name="Luu">
                            <input type="hidden" name="TimeInit" value="`+ data[x]['TimeInit'] + `">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            <input type="hidden" name="Nickname" value="`+ data[x]['Nickname'] + `">
                            <input type="hidden" name="NoiDungCuoc" value="`+ data[x]['NoiDungCuoc'] + `">
                            <input type="hidden" name="SoTienCuoc" value="`+ data[x]['SoTienCuoc'] + `">
                            <input type="hidden" name="SoDuDoan" value="`+ data[x]['SoDuDoan'] + `">
                            <input type="hidden" name="TrangThai" value="`+ data[x]['TrangThai'] + `">
                        </form>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                            style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="Xoa">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            <input type="hidden" name="NoiDungCuoc" value="`+ data[x]['NoiDungCuoc'] + `">
                            <input type="hidden" name="SoDuDoan" value="`+ data[x]['SoDuDoan'] + `">
                            
                        </form>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                            <input type="submit" value="Cập Nhập" name="CapNhap">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            <input type="hidden" name="NoiDungCuoc" value="`+ data[x]['NoiDungCuoc'] + `">
                            <input type="hidden" name="SoDuDoan" value="`+ data[x]['SoDuDoan'] + `">
                        </form>
                    </td>
                </tr>
            `;
        }
        DonCuocSoXoList.innerHTML = Text;
    })

    var GiaiName = document.getElementById('GiaiName');
    var DateBongDa = document.getElementById('DateBongDa');
    var ImgGiai = document.getElementById('ImgGiai');
    var KeoBongDaList = document.getElementById('KeoBongDaList');
    socket.on('KeoBongDa', (data) => {
        var Text = "";
        GiaiName.innerText = data[0]['Giai'];
        DateBongDa.innerText = data[0]['Date'];
        ImgGiai.src = data[0]['UrlGiai'];
        for (var x in data) {
            Text += `
                <tr style="background-color: whitesmoke;text-align: center;">
                    <td style="color:brown;">`+ data[x]['Gio'] + `</td>
                    <td>
                        <p><img src="`+ data[x]['UrlDoiNha'] + `"
                                width="30" height="auto"> `+ data[x]['DoiNha'] + `</p>
                        <p style="font-weight: bold;"><img
                                src="`+ data[x]['UrlDoiBan'] + `"
                                width="30" height="auto">
                            `+ data[x]['DoiBan'] + `</p>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <input type="text" value="`+ data[x]['LoaiKeoChapCaTran'] + `" style="width:60px;" name="LoaiKeoChapCaTran">
                                </span>
                                <span>
                                    <input type="text" value="`+ data[x]['TiLeKeoChapCaTran1'] + `" style="width:60px;" name="TiLeKeoChapCaTran1">
                                    <input type="text" value="`+ data[x]['TiLeKeoChapCaTran2'] + `" style="width:60px;" name="TiLeKeoChapCaTran2">
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="Gio" value="`+ data[x]['Gio'] + `">
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapKeoChapCaTran">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <input type="text" value="`+ data[x]['LoaiKeoTaiXiuCaTran'] + `" style="width:60px;" name="LoaiKeoTaiXiuCaTran">
                                </span>
                                <span>
                                    <input type="text" value="`+ data[x]['TiLeKeoTaiXiuCaTran1'] + `" style="width:60px;" name="TiLeKeoTaiXiuCaTran1">
                                    <input type="text" value="`+ data[x]['TiLeKeoTaiXiuCaTran2'] + `" style="width:60px;" name="TiLeKeoTaiXiuCaTran2">
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="Gio" value="`+ data[x]['Gio'] + `">
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapKeoTaiXiuCaTran">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <input type="text" value="`+ data[x]['LoaiKeoChapH1'] + `" style="width:60px;" name="LoaiKeoChapH1">
                                </span>
                                <span>
                                    <input type="text" value="`+ data[x]['TiLeKeoChapH1_1'] + `" style="width:60px;" name="TiLeKeoChapH1_1">
                                    <input type="text" value="`+ data[x]['TiLeKeoChapH1_2'] + `" style="width:60px;" name="TiLeKeoChapH1_2">
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="Gio" value="`+ data[x]['Gio'] + `">
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapKeoChapH1">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <input type="text" value="`+ data[x]['LoaiKeoTaiXiuH1'] + `" style="width:60px;" name="LoaiKeoTaiXiuH1">
                                </span>
                                <span>
                                    <input type="text" value="`+ data[x]['TiLeKeoTaiXiuH1_1'] + `" style="width:60px;" name="TiLeKeoTaiXiuH1_1">
                                    <input type="text" value="`+ data[x]['TiLeKeoTaiXiuH1_2'] + `" style="width:60px;" name="TiLeKeoTaiXiuH1_2">
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="Gio" value="`+ data[x]['Gio'] + `">
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapKeoTaiXiuH1">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="Xoa">
                            <input type="hidden" name="Gio" value="`+ data[x]['Gio'] + `">
                        </form>
                    </td>
                </tr>
            `;
        }
        KeoBongDaList.innerHTML = Text;

    })

    var DonCuocBongDaList = document.getElementById('DonCuocBongDaList');


    socket.on('DonCuocBongDa', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="background-color: whitesmoke;text-align: center;font-size:150%;">
                    <td style="background-color: whitesmoke;text-align: center;">
                        `+ data[x]['TimeInit'] + `
                    </td style="background-color: whitesmoke;text-align: center;">
                    <td style="background-color: whitesmoke;text-align: center;">`+ data[x]['IdTelegram'] + `</td>
                    <td style="background-color: whitesmoke;text-align: center;">`+ data[x]['Nickname'] + `</td>
                    <td style="background-color: whitesmoke;text-align: center;">`+ Intl.NumberFormat('vi-VN').format(data[x]['SoTienCuoc']) + ` đ</td>
                    <td style="background-color: whitesmoke;text-align: center;">`+ data[x]['Doi'] + `</td>
                    <td style="background-color: whitesmoke;text-align: center;">`+ data[x]['Keo'] + `</td>
                    <td style="background-color: whitesmoke;text-align: center;">`+ data[x]['TiLeKeo'] + `</td>
                    <td style="background-color: whitesmoke;text-align: center;">
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <select class="form-select" name="TrangThai">
                                        <option selected>`+ data[x]['TrangThai'] + `</option>
                                        <option value="Thắng Cược">Thắng Cược</option>
                                        <option value="Thua Cược">Thua Cược</option>
                                        <option value="Thắng Nữa Tiền">Thắng Nữa Tiền</option>
                                        <option value="Thua Nữa Tiền">Thua Nữa Tiền</option>
                                        <option value="Đang Xử Lý">Đang Xử Lý</option>
                                    </select>
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                                <input type="hidden" name="Doi" value="`+ data[x]['Doi'] + `"> 
                                <input type="hidden" name="Keo" value="`+ data[x]['Keo'] + `"> 
                                <input type="hidden" name="TiLeKeo" value="`+ data[x]['TiLeKeo'] + `">   
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapTrangThai">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <input type="text" value="`+ data[x]['TraThuong'] + `" style="width:60px;" name="TraThuong">
                                </span>
                            </div>
                            <div style="margin-top: 20px;">
                                <label class="label-form"><i class="fa-solid fa-gear"></i></label>
                                <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                                <input type="hidden" name="Doi" value="`+ data[x]['Doi'] + `"> 
                                <input type="hidden" name="Keo" value="`+ data[x]['Keo'] + `"> 
                                <input type="hidden" name="TiLeKeo" value="`+ data[x]['TiLeKeo'] + `">   
                                <input type="submit" value="Cập Nhập" name="CapNhap">
                                <input type="hidden" name="CapNhapTraThuong">
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded" style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-floppy-disk"></i></label>
                            <input type="submit" value="Lưu" name="LuuDonCuocBongDa">
                            <input type="hidden" name="TimeInit" value="`+ data[x]['TimeInit'] + `">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            <input type="hidden" name="Nickname" value="`+ data[x]['Nickname'] + `">
                            <input type="hidden" name="SoTienCuoc" value="`+ data[x]['SoTienCuoc'] + `"> 
                            <input type="hidden" name="Doi" value="`+ data[x]['Doi'] + `"> 
                            <input type="hidden" name="Keo" value="`+ data[x]['Keo'] + `"> 
                            <input type="hidden" name="TiLeKeo" value="`+ data[x]['TiLeKeo'] + `"> 
                            <input type="hidden" name="TrangThai" value="`+ data[x]['TrangThai'] + `"> 
                            <input type="hidden" name="TraThuong" value="`+ data[x]['TraThuong'] + `">   

                        </form>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                        style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="XoaDonCuocBongDa">
                            <input type="hidden" name="IdTelegram" value="`+ data[x]['IdTelegram'] + `">
                            <input type="hidden" name="Doi" value="`+ data[x]['Doi'] + `"> 
                            <input type="hidden" name="Keo" value="`+ data[x]['Keo'] + `"> 
                            <input type="hidden" name="TiLeKeo" value="`+ data[x]['TiLeKeo'] + `">        
                        </form>
                    </td>
                </tr>
            `;
        }
        DonCuocBongDaList.innerHTML = Text;
    })

    var IdTeleList = document.getElementsByClassName('IdTeleList');
    socket.on('IdTelegram', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <option value="`+ data[x]['IdTelegram'] + `" >Id Telegram: ` + data[x]['IdTelegram'] + ` Nickname: ` + data[x]['Nickname'] + `</option>
            `;
        }
        for (var x = 0; x < IdTeleList.length; x++) {
            IdTeleList[x].innerHTML = Text;
        }
    })

}

var Game1 = document.getElementById('Game1');
if (Game1 != undefined) {
    var BtnGame = document.getElementsByClassName('BtnGame');
    for (var x = 0; x < BtnGame.length; x++) {
        BtnGame[x].addEventListener('click', function () {
            var Id = (this.id).slice(3);
            // Ajax
            let xhr = new XMLHttpRequest();
            xhr.open("GET", 'Ajax/GetGameZlMmBk?IdBtn=' + Id, true);
            xhr.onload = () => {
                if ((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)) {
                    var ListGame = document.getElementById('ListGame');
                    var Settings = document.getElementById('Settings');
                    var Id = document.getElementById('Id');
                    var GameName = document.getElementById('GameName');
                    var Text = "";
                    var Array = JSON.parse(xhr.response);
                    GameName.innerText = Array['GameName'];
                    Settings.value = Array['Settings'];
                    Id.value = Array['Id'];
                    for (var x in Array['MaGame1']) {
                        Text += `
                        <tr>
                            <td style="color: white;">`+ x + ` </b></td>
                            <td style="color: white;">
                                <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame1'][x] + `</button>
                            </td>
                            <td style="color: white;">x`+ Array['TiLe1'] + `</td>
                        </tr>
                    `;
                    }
                    ListGame.innerHTML = Text;



                }
            }
            xhr.send();
        })
    }
    var DoanhThuGameMomo = document.getElementById('DoanhThuGameMomo');
    socket.on('DoanhThuGameMomo', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                </tr>
            `;
        }
    })
    var DoanhThuGameZalopay = document.getElementById('DoanhThuGameZalopay');
    socket.on('DoanhThuGameZalopay', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                </tr>
            `;
        }
    })
    var DoanhThuGameBanking = document.getElementById('DoanhThuGameBanking');
    socket.on('DoanhThuGameBanking', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                    <td>`+ data[x][''] + `</td>
                </tr>
            `;
        }
    })
}

var Game2 = document.getElementById('Game2');
if (Game2 != undefined) {
    var ThoiGian = document.getElementById('ThoiGian');
    var ThoiGian1 = document.getElementById('ThoiGian1');
    var PhienGame = document.getElementById('PhienGame');
    var SoNguoiChonTai = document.getElementById('SoNguoiChonTai');
    var SoNguoiChonXiu = document.getElementById('SoNguoiChonXiu');
    var TongTienDatTai = document.getElementById('TongTienDatTai');
    var TongTienDatXiu = document.getElementById('TongTienDatXiu');
    var XucXac1 = document.getElementById('XucXac1');
    var XucXac2 = document.getElementById('XucXac2');
    var XucXac3 = document.getElementById('XucXac3');
    var TongXucXac = document.getElementById('TongXucXac');
    var KetQua = document.getElementById('KetQua');
    var Msg = document.getElementById('Msg');
    var BeCau = document.getElementById('BeCau');
    var xucXac1 = document.getElementById('xucXac1');
    var xucXac2 = document.getElementById('xucXac2');
    var xucXac3 = document.getElementById('xucXac3');
    socket.on('gameData', (data) => {
        ThoiGian.innerText = data.TimeInit;
        ThoiGian1.innerText = data.time;
        PhienGame.innerText = data.idGame;
        SoNguoiChonTai.innerText = data.soNguoiChonTai;
        SoNguoiChonXiu.innerText = data.soNguoiChonXiu;
        TongTienDatTai.innerText = new Intl.NumberFormat('vi-Vn').format(data.tongTienDatTai) + ' đ';
        TongTienDatXiu.innerText = new Intl.NumberFormat('vi-Vn').format(data.tongTienDatXiu) + ' đ';
        Msg.innerText = data.Msg;

    })
    socket.on('DuDinhKetQua', (data) => {
        XucXac1.placeholder = data.dice1;
        XucXac2.placeholder = data.dice2;
        XucXac3.placeholder = data.dice3;
        TongXucXac.innerText = Number(data.dice1 + data.dice2 + data.dice3);
        KetQua.innerText = data.result == 'tai' ? 'Tài' : 'Xỉu'
    })

    BeCau.onclick = () => {
        var XucXac1 = xucXac1.value;
        var XucXac2 = xucXac2.value;
        var XucXac3 = xucXac3.value;
        if (isNaN(XucXac1) == true || isNaN(XucXac2) == true || isNaN(XucXac3) == true) {
            Swal.fire({
                text: " Xúc xắc phải là số",
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
            xucXac1.value = "";
            xucXac2.value = "";
            xucXac3.value = "";
            return;
        }
        if (Number(XucXac1) > 6 || Number(XucXac2) > 6 || Number(XucXac3) > 6) {
            Swal.fire({
                text: " Xúc xắc không được lớn hơn 6",
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
            xucXac1.value = "";
            xucXac2.value = "";
            xucXac3.value = "";
            return;
        }
        socket.emit('ThayDoiXucXac', {
            dice1: Number(xucXac1.value),
            dice2: Number(xucXac2.value),
            dice3: Number(xucXac3.value)
        })
        xucXac1.value = "";
        xucXac2.value = "";
        xucXac3.value = "";

    }

    var IdTeleList = document.getElementsByClassName('IdTeleList');
    socket.on('IdTelegram', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <option value="`+ data[x]['IdTelegram'] + `" >Id Telegram: ` + data[x]['IdTelegram'] + ` Nickname: ` + data[x]['Nickname'] + `</option>
            `;
        }
        for (var x = 0; x < IdTeleList.length; x++) {
            IdTeleList[x].innerHTML = Text;
        }
    })

    var BlockChat = document.getElementById('BlockChat');
    socket.on('BlockChat', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:whitesmoke;">
                    <td>`+ data[x]['IdTelegram'] + `</td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                            style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="XoaBlockChat">    
                            <input type="hidden" value="`+ data[x]['IdTelegram'] + `" name="IdTelegram"> 
                        </form>
                    </td>
                </tr>
            `;
        }
        BlockChat.innerHTML = Text;
    })
}

var Banking = document.getElementById('Banking');
if (Banking != undefined) {
    var Momo = document.getElementById('Momo');
    var GameMomo = document.getElementById('GameMomo');
    socket.on('Momo', (data) => {
        var Text = "";
        Text = `
                <tr style="color:whitesmoke;">
                    <td>`+ data[0]['Name'] + `</td>
                    <td>`+ data[0]['Sdt'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[0]['SoDu']) + ` đ</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[0]['HanMuc']) + ` đ</td>  
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                            style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="XoaMomo">    
                            <input type="hidden" value="`+ data[0]['Sdt'] + `" name="Sdt"> 
                        </form>
                    </td>
                <tr>
            `;
        Momo.innerHTML = Text;
        var Text1 = "";
        if (data[1] != undefined) {
            Text1 = `
            <tr style="color:whitesmoke;">
                <td>`+ data[1]['Name'] + `</td>
                <td>`+ data[1]['Sdt'] + `</td>
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['SoDu']) + ` đ</td>
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['HanMuc']) + ` đ</td>  
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['CuocMin']) + ` đ</td>  
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['CuocMax']) + ` đ</td>  
                <td>
                    <form method="post" enctype="application/x-www-form-urlencoded"
                        style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                        <input type="submit" value="Xóa" name="XoaMomo">    
                        <input type="hidden" value="`+ data[1]['Sdt'] + `" name="Sdt"> 
                    </form>
                </td>
            <tr>
        `;
            GameMomo.innerHTML = Text1;
        }
    })

    var Zalopay = document.getElementById('Zalopay');
    var GameZalopay = document.getElementById('GameZalopay');
    socket.on('Zalopay', (data) => {
        var Text = "";
        Text = `
                <tr style="color:whitesmoke;">
                    <td>`+ data[0]['Name'] + `</td>
                    <td>`+ data[0]['Sdt'] + `</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[0]['SoDu']) + ` đ</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[0]['HanMuc']) + ` đ</td>  
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                            style="margin-bottom: 10px;">
                            <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                            <input type="submit" value="Xóa" name="XoaZalopay">    
                            <input type="hidden" value="`+ data[0]['Sdt'] + `" name="Sdt"> 
                        </form>
                    </td>
                <tr>
            `;
        Zalopay.innerHTML = Text;
        var Text1 = "";
        if (data[1] != undefined) {
            Text1 = `
            <tr style="color:whitesmoke;">
                <td>`+ data[1]['Name'] + `</td>
                <td>`+ data[1]['Sdt'] + `</td>
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['SoDu']) + ` đ</td>
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['HanMuc']) + ` đ</td>  
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['CuocMin']) + ` đ</td>  
                <td>`+ new Intl.NumberFormat('vi-VN').format(data[1]['CuocMax']) + ` đ</td>  
                <td>
                    <form method="post" enctype="application/x-www-form-urlencoded"
                        style="margin-bottom: 10px;">
                        <label class="label-form"><i class="fa-solid fa-trash"></i></label>
                        <input type="submit" value="Xóa" name="XoaZalopay">    
                        <input type="hidden" value="`+ data[1]['Sdt'] + `" name="Sdt"> 
                    </form>
                </td>
            <tr>
        `;
            GameZalopay.innerHTML = Text1;
        }
    })

    var LichSuRutTien = document.getElementById('LichSuRutTien');
    socket.on('LichSuRutTien', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="color:whitesmoke;">
                    <td>`+ data[x]['TimeInit'] +`</td>
                    <td>`+ data[x]['IdTelegram'] +`</td>
                    <td>`+ data[x]['Nickname'] +`</td>
                    <td>`+ data[x]['AppBanking'] +`</td>
                    <td>`+ data[x]['SoTaiKhoan'] +`</td>
                    <td>`+ new Intl.NumberFormat('vi-VN').format(data[x]['SoTienRut']) +` đ</td>
                    <td>`+ data[x]['TrangThai'] +`</td>
                    <td>
                        <form method="post" enctype="application/x-www-form-urlencoded"
                            style="margin-bottom: 10px;">
                            <div class="FlexDiv">
                                <span style="color: red;">
                                    <select class="form-select" name="TrangThai">
                                        <option selected>`+ data[x]['TrangThai'] + `</option>
                                        <option value="Thành công">Thành công</option>
                                        <option value="Lỗi giao dịch">Lỗi giao dịch</option>
                                    </select>
                                </span>
                            </div>
                            <div style="margin-top:10px;">
                                <label class="label-form"><i class="fa-solid fa-pen-to-square"></i></label>
                                <input type="submit" name="CapNhapTrangThaiRutTien" value="Cập nhập"> 
                                <input type="hidden" value="`+ data[x]['TimeInit'] +`" name="TimeInit">
                                <input type="hidden" value="`+ data[x]['IdTelegram'] +`" name="IdTelegram">
                            </div>
                        </form>
                    </td>
                </tr>
            `;
        }
        LichSuRutTien.innerHTML = Text;
    })
}