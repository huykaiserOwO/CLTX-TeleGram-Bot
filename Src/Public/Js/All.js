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


var HomeClient = document.getElementsByClassName('HomeClient');
if (HomeClient[0] != undefined) {
    var TimeStick = document.getElementById('TimeStick');
    setInterval(() => {
        TimeStick.innerHTML = Date.now();
    });

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
                    var GameName = document.getElementsByClassName('GameName');
                    var GameType = document.getElementsByClassName('GameType');
                    var Text = "";
                    var Array = JSON.parse(xhr.response);
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

                    GameName[0].innerHTML = Array['GameName'];
                    GameType[0].innerHTML = Array['GameType'];
                }
            }
            xhr.send();
        })
    }
}


var Home = document.getElementsByClassName('Home');
if (Home[0] != undefined) {
    var sideBar = document.getElementById('sidebar');
    var TimeStick = document.getElementById('TimeStick');
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

    setInterval(() => {
        TimeStick.innerHTML = Date.now();
    });

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
                    var GameName = document.getElementsByClassName('GameName');
                    var GameType = document.getElementsByClassName('GameType');
                    var Text = "";
                    var Array = JSON.parse(xhr.response);
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

                    GameName[0].innerHTML = Array['GameName'];
                    GameType[0].innerHTML = Array['GameType'];
                }
            }
            xhr.send();
        })
    }
}

var ZalopayClient = document.getElementsByClassName('ZalopayClient');
if (ZalopayClient[0] != undefined) {
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
                    var GameName = document.getElementsByClassName('GameName');
                    var GameType = document.getElementsByClassName('GameType');
                    var Text = "";
                    var Array = JSON.parse(xhr.response);
                    for (var x in Array['MaGame1']) {
                        Text += `
                        <tr>
                            <td style="color: white;">NickName `+ x + ` </b> <i class="bi bi-clipboard-check-fill copyContent" style="cursor: pointer;"></i></td>
                            <td style="color: white;">
                                <button type="button" class="btn btn-secondary DiemGame">` + Array['MaGame1'][x] + `</button>
                            </td>
                            <td style="color: white;">x`+ Array['TiLe1'] + `</td>
                        </tr>
                    `;
                    }
                    ListGame.innerHTML = Text;

                    GameName[0].innerHTML = Array['GameName'];
                    GameType[0].innerHTML = Array['Description'];

                    var copyContent = document.getElementsByClassName('copyContent');
                    for (var x = 0; x < copyContent.length; x++) {
                        copyContent[x].addEventListener('click', function () {
                            Swal.fire({
                                text: "Bạn Cần Đăng Nhập Telegram !",
                                icon: "error",
                                confirmButtonText: "Hiểu ròi"
                            });
                        })
                    }
                }
            }
            xhr.send();
        })
    }
    var copyContent = document.getElementsByClassName('copyContent');
    for (var x = 0; x < copyContent.length; x++) {
        copyContent[x].addEventListener('click', function () {
            Swal.fire({
                text: "Bạn Cần Đăng Nhập Telegram !",
                icon: "error",
                confirmButtonText: "Hiểu ròi"
            });
        })
    }
}

var BanTaiXiuClient = document.getElementsByClassName('BanTaiXiuClient');
if (BanTaiXiuClient[0] != undefined) {
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
        TongSoTienTai.innerText = String(Number(data.tongTienDatTai) != 0 ? (Number(data.tongTienDatTai) / 1000) : 0) + ' K';
        TongSoTienXiu.innerText = String(Number(data.tongTienDatXiu) != 0 ? (Number(data.tongTienDatXiu) / 1000) : 0) + ' K';;
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
            }
            else {
                XiuText.className = 'XiuTextAnim';
            }
        }, 1000);
        setTimeout(() => {
            Dice1.style.opacity = 0;
            Dice2.style.opacity = 0;
            Dice3.style.opacity = 0;
            TaiText.className = '';
            XiuText.className = '';
            DiceGift.style.display = 'none';
        }, 15000)
    })

    var boxChat = document.getElementById('boxChat');
    function ScrollHeight() {
        boxChat.scrollTop = boxChat.scrollHeight;
    }
    socket.emit('ReqChat')
    socket.on('Msg', (data) => {
        var Text = "";
        for (var x in data) {
            if (data[x]['Nickname'] != '') {
                Text += `
                    <div class="YourMsg">
                        <h2 style="color:#fef142;">`+ data[x]['Nickname'] + `<i
                                style="font-size: 80%;color: brown;padding-left:10px;">`+ data[x]['TimeInit'] + `</i></h2>
                        <h2>`+ data[x]['Mess'] + `</h2>
                    </div>
                `
            }
            else {
                Text += `
                    <div class="YourMsg">
                        <h2 style="color:#fef142;">`+ data[x]['IdNguoiGui'] + `<i
                                style="font-size: 80%;color: brown;padding-left:10px;">`+ data[x]['TimeInit'] + `</i></h2>
                        <h2>`+ data[x]['Mess'] + `</h2>
                    </div>
                `
            }
        }
        boxChat.innerHTML = Text
        ScrollHeight();

        var ChatMsg = document.getElementById('ChatMsg');
        ChatMsg.onclick = () => {
            ScrollHeight();
        }
    })

}

var BongDaClient = document.getElementsByClassName('BongDaClient');
if (BongDaClient[0] != undefined) {
    var GiaiName = document.getElementById('GiaiName');
    var DateBongDa = document.getElementById('DateBongDa');
    var ImgGiai = document.getElementById('ImgGiai');
    var KeoBongDaList = document.getElementById('KeoBongDaList');
    socket.on('FootballData', (data) => {
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
                        <div class="FlexDiv">
                            <span style="color: red;">
                                <p>`+ data[x]['LoaiKeoChapCaTran'] + `</P>
                            </span>
                            <span>
                                <p>`+ data[x]['TiLeKeoChapCaTran1'] + `</p>
                                <p>`+ data[x]['TiLeKeoChapCaTran2'] + `</p>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="FlexDiv">
                            <span style="color: red;">
                                <p>`+ data[x]['LoaiKeoTaiXiuCaTran'] + `</p>
                            </span>
                            <span>
                                <p>`+ data[x]['TiLeKeoTaiXiuCaTran1'] + `</p>
                                <p>`+ data[x]['TiLeKeoTaiXiuCaTran2'] + `</p>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="FlexDiv">
                            <span style="color: red;">
                                <p>`+ data[x]['LoaiKeoChapH1'] + `</p>
                            </span>
                            <span>
                                <p>`+ data[x]['TiLeKeoChapH1_1'] + `</p>
                                <p>`+ data[x]['TiLeKeoChapH1_2'] + `</p>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="FlexDiv">
                            <span style="color: red;">
                                <p>`+ data[x]['LoaiKeoTaiXiuH1'] + `</p>
                            </span>
                            <span>
                                <p>`+ data[x]['TiLeKeoTaiXiuH1_1'] + `</p>
                                <p>`+ data[x]['TiLeKeoTaiXiuH1_2'] + `</p>
                            </span>
                        </div>
                    </td>
                </tr>
            `;
        }
        KeoBongDaList.innerHTML = Text;
    })
}


var GameHistory = document.getElementById('GameHistory')
socket.emit('GameHistory');
if (GameHistory != undefined) {
    socket.on('GameHistory', (data) => {
        var Text = "";
        for (var x in data) {
            Text += `
                <tr style="line-height: 26px;">
                    <td style="color: whitesmoke;word-wrap: normal;">` + data[x]['TimeInit'] + `</td>
                    <td style="color: whitesmoke;word-wrap: normal;">` + data[x]['Nickname'] + `</td>
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
        GameHistory.innerHTML = Text;
    })
}

var Top = document.getElementById('Top');
socket.emit('Top');
if (Top != undefined) {
    socket.on('Top', (data) => {

        var Text1 = "";
        for (var x in data) {

            if (data[x]['Top'] == '1') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/1.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '2') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/2.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '3') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/3.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '4') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/4.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '5') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/5.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '6') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/6.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '7') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/7.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
            if (data[x]['Top'] == '8') {
                Text1 += `
                    <tr>
                        <td style="color:whitesmoke;font-weight:600;"><img src="https://127.0.0.1/TeleBotV3/Src/Public/Upload/8.gif" width="30" height="auto"></td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + data[x]['Nickname'] + `</td>
                        <td style="color:whitesmoke;font-weight:600;padding-top:16px;">` + Intl.NumberFormat('vi-VN')
                            .format(data[x]['TongTienChoi']) + ` đ</td>
                    </tr>
            `;
            }
        }
        Top.innerHTML = Text1;
    })
}