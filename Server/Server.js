const express = require('express')
const { createServer } = require('http')
const path = require('path')
const { Server } = require('socket.io')
const app = express()
const httpServer = createServer(app)
const mysql = require('mysql')
var fs = require('fs')
var request = require('request')
var DB = require('./Config/DB')

const port = 8000

// Socket Io
const io = new Server(httpServer, {
    cors: "http://127.0.0.1:8000"

})

var conn = DB.ConnectToDataBase()

// Game Bàn Tài Xỉu
const GameTaiXiu = function () {

    // cài đặt
    this.idPhien = 0;  // id phiên đặt
    this.TimeInit = ''; // Thời gian khởi tạo
    this.timeDatCuoc = 60; // thời gian đặt cược = 60s;
    this.timechophienmoi = 20; // thời gian chờ phiên mới = 10s;
    this.soNguoiChonTai = 0;  // Số người đặt tài
    this.soNguoiChonXiu = 0;  // Số người đặt xỉu
    this.tongTienDatTai = 0;  // tổng tiền đặt tài
    this.tongTienDatXiu = 0;  // tổng tiền đặt xỉu
    this.time;  // thời gian
    this.coTheDatCuoc = true; // có thể đặt hay không
    this.idChonTai = []; // array id chọn tài
    this.idChonXiu = []; // array id chọn xỉu
    this.ketQua = ''; // kết quả

    // game bắt đầu
    this.gameStart = function () {

        // Mở đặt cược
        var Sql = 'DELETE FROM blockcuocbantaixiu'
        conn.query(Sql, function (err) {
            if (err) throw err
        })
        // code
        seft = this;
        seft.ketQua = '';
        seft.TimeInit = user.TimeCurrent()
        seft.idPhien = seft.RandomNumber(5);
        seft.coTheDatCuoc = true // có thể đặt
        seft.soNguoiChonTai = 0;  // Số người đặt tài
        seft.soNguoiChonXiu = 0;  // Số người đặt xỉu
        seft.tongTienDatTai = 0;  // tổng tiền đặt tài
        seft.tongTienDatXiu = 0;  // tổng tiền đặt xỉu
        seft.idChonTai = []; // array id chọn tài
        seft.idChonXiu = []; // array id chọn xỉu
        seft.time = seft.timeDatCuoc;
        console.log('newgame');
        io.sockets.emit('gameStart', this.ketQua);
        // Lưu đoạn chat 
        var Mess = "Id phiên: " + seft.idPhien + ", phiên đang diễn ra..."
        Sql = "INSERT INTO chat (Nickname,TimeInit,IdNguoiGui,IdNguoiNhan,Mess) VALUES (?,?,?,?,?)"
        conn.query(Sql, ['', seft.TimeInit, 'System', 'All', Mess], function (err) {
            if (err) throw err
            user.SendChat()
        })


        // Dự định đổ xúc xắc 
        this.ketQua = this.gameRandomResult()

        loopAGame = setInterval(function () {
            seft.time--;
            io.sockets.emit('gameData', {
                TimeInit: seft.TimeInit,
                idGame: seft.idPhien,
                soNguoiChonTai: seft.soNguoiChonTai,
                soNguoiChonXiu: seft.soNguoiChonXiu,
                tongTienDatTai: seft.tongTienDatTai,
                tongTienDatXiu: seft.tongTienDatXiu,
                time: seft.time,
                Msg: 'Phiên đang diễn ra'
            });
            io.to('LIXI66TOP').emit('DuDinhKetQua', seft.ketQua)
            console.log(
                'Dự định đổ xúc xắc: ' + seft.ketQua.dice1 + ' | ' + seft.ketQua.dice2 + ' | '
                + seft.ketQua.dice3 + ' | ' + seft.ketQua.result
            )
            console.log('thời gian khởi tạo: ' + seft.TimeInit)
            console.log('Phiên: ' + seft.idPhien);
            console.log('Số người chọn tài: ' + seft.soNguoiChonTai);
            console.log('Số người chọn xỉu: ' + seft.soNguoiChonXiu);
            console.log('Tổng tiền đặt tài: ' + seft.tongTienDatTai);
            console.log('Tổng tiền đặt xỉu: ' + seft.tongTienDatXiu);
            console.log('time: ' + seft.time);
            if (seft.time == 0) {
                clearInterval(loopAGame);
                seft.gameOver();
            }
        }, 1000);

    };


    // game kết thúc
    this.gameOver = function () {
        seft = this;
        seft.coTheDatCuoc = false // không thể đặt
        // Chặn đặt cược
        var Sql = "INSERT INTO blockcuocbantaixiu (On_Off) VALUES ('On')"
        conn.query(Sql, function (err) {
            if (err) throw err
        })
        seft.time = seft.timechophienmoi;
        io.sockets.emit('gameOver', this.ketQua);
        console.log(JSON.stringify(this.ketQua));
        var Win = seft.ketQua.result == 'tai' ? seft.idChonTai : seft.idChonXiu
        console.log('Số người thắng cược: ' + Win.length)

        if (seft.ketQua.result === 'tai') {
            if (seft.idChonTai != '') {
                for (var x in seft.idChonTai) {

                    // Trả thưởng 
                    var WinAmount = Number((seft.idChonTai)[x]['TienCuoc']) * Number((seft.idChonTai[x]['TiLe']))
                    var UpdateWalletUser = WinAmount + Number((seft.idChonTai[x]['Vi']))
                    Sql = "UPDATE user SET Wallet = ? WHERE IdTelegram = ?"
                    conn.query(Sql, [UpdateWalletUser, (seft.idChonTai)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })

                    // Lưu thống kê người chơi
                    Sql = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonTai)[x]['IdTelegram']], function (err, data) {
                        if (err) throw err
                        if (data != '') {
                            var TongTienCuoc = Number(data[0]['TongTienCuoc']) + Number((seft.idChonTai)[x]['TienCuoc'])
                            var TongTienThangCuoc = Number(data[0]['TongTienThangCuoc']) + (WinAmount - Number((seft.idChonTai)[x]['TienCuoc']))
                            var SoLanChoi = Number(data[0]['SoLanChoi']) + 1
                            Sql = "UPDATE thongkenguoichoi SET TongTienCuoc = ?, TongTienThangCuoc = ?, SoLanChoi = ? WHERE IdTelegram = ?"
                            conn.query(Sql, [TongTienCuoc, TongTienThangCuoc, SoLanChoi, (seft.idChonTai)[x]['IdTelegram']], function (err) {
                                if (err) throw err
                            })

                        }
                        else if (data == '') {
                            var TongTienCuoc = Number((seft.idChonTai)[x]['TienCuoc'])
                            var TongTienThangCuoc = WinAmount - Number((seft.idChonTai)[x]['TienCuoc'])
                            var SoLanChoi = 1
                            Sql = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES (?,?,?,?,?)"
                            conn.query(Sql, [
                                (seft.idChonTai)[x]['IdTelegram'],
                                (seft.idChonTai)[x]['Nickname'],
                                TongTienCuoc,
                                TongTienThangCuoc,
                                SoLanChoi
                            ],
                                function (err) {
                                    if (err) throw err
                                })
                        }
                    })

                    // Xóa đơn cược bàn tài xỉu
                    Sql = "DELETE FROM doncuocbantaixiu WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonTai)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })

                    // Lưu lịch sử chơi
                    Sql = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
                    conn.query(Sql, [
                        (seft.idChonTai)[x]['TimeInit'],
                        (seft.idChonTai)[x]['IdTelegram'],
                        (seft.idChonTai)[x]['Nickname'],
                        'Bàn Tài Xỉu',
                        (seft.idChonTai)[x]['Cau'],
                        (seft.idChonTai)[x]['TienCuoc'],
                        seft.ketQua.result,
                        'Win',
                        (WinAmount - Number((seft.idChonTai)[x]['TienCuoc'])),
                        Number(seft.idChonTai[x]['Vi']),
                        (String((seft.idChonTai)[x]['Cau']) + ' ' + String((seft.idChonTai)[x]['TienCuoc']))

                    ], function (err) {
                        if (err) throw err
                    })

                    // Gửi tới tele
                    var Text = "LIXI66.TOP\n\n🎮 Id phiên game: " + seft.idPhien + "\n🎲 Xúc xắc đổ về tài\n🏆 Chúc mừng bạn thắng cược"
                    this.SEND((seft.idChonTai)[x]['IdTelegram'], Text)

                    user.GameHistoryUser((seft.idChonTai)[x]['IdTelegram'])
                    user.DonCuocBanTaiXiu((seft.idChonTai)[x]['IdTelegram'])

                }

            }

            if (seft.idChonXiu != '') {
                for (var x in seft.idChonXiu) {

                    // Lưu thống kê người chơi
                    Sql = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonXiu)[x]['IdTelegram']], function (err, data) {
                        if (err) throw err
                        if (data != '') {
                            var TongTienCuoc = Number(data[0]['TongTienCuoc']) + Number((seft.idChonXiu)[x]['TienCuoc'])
                            var TongTienThangCuoc = Number(data[0]['TongTienThangCuoc']) + (0 - Number((seft.idChonXiu)[x]['TienCuoc']))
                            var SoLanChoi = Number(data[0]['SoLanChoi']) + 1
                            Sql = "UPDATE thongkenguoichoi SET TongTienCuoc = ?, TongTienThangCuoc = ?, SoLanChoi = ? WHERE IdTelegram = ?"
                            conn.query(Sql, [TongTienCuoc, TongTienThangCuoc, SoLanChoi, (seft.idChonXiu)[x]['IdTelegram']], function (err) {
                                if (err) throw err
                            })

                        }
                        else if (data == '') {
                            var TongTienCuoc = Number((seft.idChonXiu)[x]['TienCuoc'])
                            var TongTienThangCuoc = 0 - Number((seft.idChonXiu)[x]['TienCuoc'])
                            var SoLanChoi = 1
                            Sql = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES (?,?,?,?,?)"
                            conn.query(Sql, [
                                (seft.idChonXiu)[x]['IdTelegram'],
                                (seft.idChonXiu)[x]['Nickname'],
                                TongTienCuoc,
                                TongTienThangCuoc,
                                SoLanChoi
                            ],
                                function (err) {
                                    if (err) throw err
                                })

                        }

                    })

                    // Xóa đơn cược bàn tài xỉu
                    Sql = "DELETE FROM doncuocbantaixiu WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonXiu)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })



                    // Lưu lịch sử chơi
                    Sql = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
                    conn.query(Sql, [
                        (seft.idChonXiu)[x]['TimeInit'],
                        (seft.idChonXiu)[x]['IdTelegram'],
                        (seft.idChonXiu)[x]['Nickname'],
                        'Bàn Tài Xỉu',
                        (seft.idChonXiu)[x]['Cau'],
                        (seft.idChonXiu)[x]['TienCuoc'],
                        seft.ketQua.result,
                        'Losing',
                        (0 - Number((seft.idChonXiu)[x]['TienCuoc'])),
                        Number(seft.idChonXiu[x]['Vi']),
                        (String((seft.idChonXiu)[x]['Cau']) + ' ' + String((seft.idChonXiu)[x]['TienCuoc']))

                    ], function (err) {
                        if (err) throw err
                    })


                    // Gửi tới tele
                    var Text = "LIXI66.TOP\n\n🎮 Id phiên game: " + seft.idPhien + "\n🎲 Xúc xắc đổ về tài\n🍀 Ván sau có thể may mắn nè !"
                    this.SEND((seft.idChonXiu)[x]['IdTelegram'], Text)

                    user.GameHistoryUser((seft.idChonXiu)[x]['IdTelegram'])
                    user.DonCuocBanTaiXiu((seft.idChonXiu)[x]['IdTelegram'])
                }
            }
        }
        else {
            if (seft.idChonXiu != '') {
                for (var x in seft.idChonXiu) {

                    // Trả thưởng 
                    var WinAmount = Number((seft.idChonXiu)[x]['TienCuoc']) * Number((seft.idChonXiu[x]['TiLe']))
                    var UpdateWalletUser = WinAmount + Number((seft.idChonXiu[x]['Vi']))
                    Sql = "UPDATE user SET Wallet = ? WHERE IdTelegram = ?"
                    conn.query(Sql, [UpdateWalletUser, (seft.idChonXiu)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })

                    // Lưu thống kê người chơi
                    Sql = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonXiu)[x]['IdTelegram']], function (err, data) {
                        if (err) throw err
                        if (data != '') {
                            var TongTienCuoc = Number(data[0]['TongTienCuoc']) + Number((seft.idChonXiu)[x]['TienCuoc'])
                            var TongTienThangCuoc = Number(data[0]['TongTienThangCuoc']) + (WinAmount - Number((seft.idChonXiu)[x]['TienCuoc']))
                            var SoLanChoi = Number(data[0]['SoLanChoi']) + 1
                            Sql = "UPDATE thongkenguoichoi SET TongTienCuoc = ?, TongTienThangCuoc = ?, SoLanChoi = ? WHERE IdTelegram = ?"
                            conn.query(Sql, [TongTienCuoc, TongTienThangCuoc, SoLanChoi, (seft.idChonXiu)[x]['IdTelegram']], function (err) {
                                if (err) throw err
                            })

                        }
                        else if (data == '') {
                            var TongTienCuoc = Number((seft.idChonXiu)[x]['TienCuoc'])
                            var TongTienThangCuoc = WinAmount - Number((seft.idChonXiu)[x]['TienCuoc'])
                            var SoLanChoi = 1
                            Sql = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES (?,?,?,?,?)"
                            conn.query(Sql, [
                                (seft.idChonXiu)[x]['IdTelegram'],
                                (seft.idChonXiu)[x]['Nickname'],
                                TongTienCuoc,
                                TongTienThangCuoc,
                                SoLanChoi
                            ],
                                function (err) {
                                    if (err) throw err
                                })
                        }
                    })

                    // Xóa đơn cược bàn tài xỉu
                    Sql = "DELETE FROM doncuocbantaixiu WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonXiu)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })

                    // Lưu lịch sử chơi
                    Sql = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
                    conn.query(Sql, [
                        (seft.idChonXiu)[x]['TimeInit'],
                        (seft.idChonXiu)[x]['IdTelegram'],
                        (seft.idChonXiu)[x]['Nickname'],
                        'Bàn Tài Xỉu',
                        (seft.idChonXiu)[x]['Cau'],
                        (seft.idChonXiu)[x]['TienCuoc'],
                        seft.ketQua.result,
                        'Win',
                        (WinAmount - Number((seft.idChonXiu)[x]['TienCuoc'])),
                        Number(seft.idChonXiu[x]['Vi']),
                        (String((seft.idChonXiu)[x]['Cau']) + ' ' + String((seft.idChonXiu)[x]['TienCuoc']))

                    ], function (err) {
                        if (err) throw err
                    })

                    // Gửi tới tele
                    var Text = "LIXI66.TOP\n\n🎮 Id phiên game: " + seft.idPhien + "\n🎲 Xúc xắc đổ về xỉu\n🏆 Chúc mừng bạn thắng cược"
                    this.SEND((seft.idChonXiu)[x]['IdTelegram'], Text)

                    user.GameHistoryUser((seft.idChonXiu)[x]['IdTelegram'])
                    user.DonCuocBanTaiXiu((seft.idChonXiu)[x]['IdTelegram'])
                }

            }
            if (seft.idChonTai != '') {
                for (var x in seft.idChonTai) {

                    // Lưu thống kê người chơi
                    Sql = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonTai)[x]['IdTelegram']], function (err, data) {
                        if (err) throw err
                        if (data != '') {
                            var TongTienCuoc = Number(data[0]['TongTienCuoc']) + Number((seft.idChonTai)[x]['TienCuoc'])
                            var TongTienThangCuoc = Number(data[0]['TongTienThangCuoc']) + (0 - Number((seft.idChonTai)[x]['TienCuoc']))
                            var SoLanChoi = Number(data[0]['SoLanChoi']) + 1
                            Sql = "UPDATE thongkenguoichoi SET TongTienCuoc = ?, TongTienThangCuoc = ?, SoLanChoi = ? WHERE IdTelegram = ?"
                            conn.query(Sql, [TongTienCuoc, TongTienThangCuoc, SoLanChoi, (seft.idChonTai)[x]['IdTelegram']], function (err) {
                                if (err) throw err
                            })

                        }
                        else if (data == '') {
                            var TongTienCuoc = Number((seft.idChonTai)[x]['TienCuoc'])
                            var TongTienThangCuoc = 0 - Number((seft.idChonTai)[x]['TienCuoc'])
                            var SoLanChoi = 1
                            Sql = "INSERT INTO thongkenguoichoi (IdTelegram,Nickname,TongTienCuoc,TongTienThangCuoc,SoLanChoi) VALUES (?,?,?,?,?)"
                            conn.query(Sql, [
                                (seft.idChonTai)[x]['IdTelegram'],
                                (seft.idChonTai)[x]['Nickname'],
                                TongTienCuoc,
                                TongTienThangCuoc,
                                SoLanChoi
                            ],
                                function (err) {
                                    if (err) throw err
                                })

                        }

                    })

                    // Xóa đơn cược bàn tài xỉu
                    Sql = "DELETE FROM doncuocbantaixiu WHERE IdTelegram = ?"
                    conn.query(Sql, [(seft.idChonTai)[x]['IdTelegram']], function (err) {
                        if (err) throw err
                    })



                    // Lưu lịch sử chơi
                    Sql = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
                    conn.query(Sql, [
                        (seft.idChonTai)[x]['TimeInit'],
                        (seft.idChonTai)[x]['IdTelegram'],
                        (seft.idChonTai)[x]['Nickname'],
                        'Bàn Tài Xỉu',
                        (seft.idChonTai)[x]['Cau'],
                        (seft.idChonTai)[x]['TienCuoc'],
                        seft.ketQua.result,
                        'Losing',
                        (0 - Number((seft.idChonTai)[x]['TienCuoc'])),
                        Number(seft.idChonTai[x]['Vi']),
                        (String((seft.idChonTai)[x]['Cau']) + ' ' + String((seft.idChonTai)[x]['TienCuoc']))

                    ], function (err) {
                        if (err) throw err
                    })


                    // Gửi tới tele
                    var Text = "LIXI66.TOP\n\n🎮 Id phiên game: " + seft.idPhien + "\n🎲 Xúc xắc đổ về xỉu\n🍀 Ván sau có thể may mắn nè !"
                    this.SEND((seft.idChonTai)[x]['IdTelegram'], Text)

                    user.GameHistoryUser((seft.idChonTai)[x]['IdTelegram'])
                    user.DonCuocBanTaiXiu((seft.idChonTai)[x]['IdTelegram'])
                }
            }

        }

        setTimeout(() => {
            // Lưu đoạn chat 
            var Mess = "Kết thúc phiên !<br>Chúc mừng những bạn đã chọn " + (seft.ketQua.result == 'tai' ? 'Tài' : 'Xỉu') + "<br>" + "Xúc xắc: " + seft.ketQua.dice1 + " - " + seft.ketQua.dice2 + " - " + seft.ketQua.dice3 + " tổng 3 xúc xắc: " + (seft.ketQua.dice1 + seft.ketQua.dice2 + seft.ketQua.dice3)
            Sql = "INSERT INTO chat (Nickname,TimeInit,IdNguoiGui,IdNguoiNhan,Mess) VALUES (?,?,?,?,?)"
            conn.query(Sql, ['', seft.TimeInit, 'System', 'All', Mess], function (err) {
                if (err) throw err
                user.SendChat()
            })
        }, 3000)

        user.GameHistory()
        loopAGame = setInterval(function () {
            seft.time--;
            console.log(seft.time);
            io.sockets.emit('gameData', {
                TimeInit: seft.TimeInit,
                idGame: seft.idPhien,
                soNguoiChonTai: seft.soNguoiChonTai,
                soNguoiChonXiu: seft.soNguoiChonXiu,
                tongTienDatTai: seft.tongTienDatTai,
                tongTienDatXiu: seft.tongTienDatXiu,
                time: seft.time,
                Msg: 'Kết thúc phiên'
            });
            if (seft.time == 0) {
                clearInterval(loopAGame);
                seft.gameStart();
            }
        }, 1000);
    };


    // Đặt cược
    this.putMoney = function (TimeInit, IdTelegram, Nickname, Cau, TienCuoc, Vi, TiLe) {
        if (Cau == 'BT') {
            this.tongTienDatTai += Number(TienCuoc)
            // thêm id vào list id array nếu chưa có
            if (!this.idChonTai.find(x => x.IdTelegram === IdTelegram)) {
                this.idChonTai.push({
                    TimeInit: TimeInit,
                    IdTelegram: IdTelegram,
                    Nickname: Nickname,
                    Cau: Cau,
                    TienCuoc: TienCuoc,
                    Vi: Vi,
                    TiLe: TiLe
                })
                this.soNguoiChonTai++;
            }
            else {
                // nếu tìm thấy thì cộng thêm tiền vô
                this.idChonTai.find(x => x.IdTelegram === IdTelegram).TienCuoc += TienCuoc
            }
        }
        else {
            this.tongTienDatXiu += Number(TienCuoc)
            // thêm id vào list id array nếu chưa có
            if (!this.idChonXiu.find(x => x.IdTelegram === IdTelegram)) {
                this.idChonXiu.push({
                    TimeInit: TimeInit,
                    IdTelegram: IdTelegram,
                    Nickname: Nickname,
                    Cau: Cau,
                    TienCuoc: TienCuoc,
                    Vi: Vi,
                    TiLe: TiLe
                })
                this.soNguoiChonXiu++;
            }
            else {
                // nếu tìm thấy thì cộng thêm tiền vô
                this.idChonXiu.find(x => x.IdTelegram === IdTelegram).TienCuoc += TienCuoc
            }
        }
        return
    }

    // Thay đổi xúc xắc
    this.ThayDoiXucXac = (data) => {
        seft = this 
        seft.ketQua.dice1 = data.dice1
        seft.ketQua.dice2 = data.dice2
        seft.ketQua.dice3 = data.dice3
        seft.ketQua.result = data.dice1 + data.dice2 + data.dice3 <= 10 ? 'xiu' : 'tai'
        return
    }

    // random kết quả
    this.gameRandomResult = function () {
        dice1 = Math.floor(1 + Math.random() * (6));
        dice2 = Math.floor(1 + Math.random() * (6));
        dice3 = Math.floor(1 + Math.random() * (6));
        return {
            dice1: dice1,
            dice2: dice2,
            dice3: dice3,
            result: dice1 + dice2 + dice3 <= 10 ? 'xiu' : 'tai'
        };
    }

    // Tạo Id Phiên
    this.RandomNumber = function (length) {
        characters = '0123456789';
        result = '';
        charactersLength = characters.length;
        for (i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result;
    }

    // Gửi tin nhắn bot tele
    this.SEND = function (IdTelegram, Text) {
        var url = 'https://api.telegram.org/bot' + encodeURI('6562374329:AAGpe0dZVpJzkMJf2LUVvg1zT-GytH02YQU') + '/sendMessage?chat_id=' + IdTelegram + '&text=' + encodeURI(Text);
        request.get(url);
        return
    }

}

const User = function () {

    // Gửi chat tới client
    this.SendChat = () => {
        var Sql = "SELECT * FROM chat ORDER BY Id DESC LIMIT 50"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.sockets.emit('Msg', data.reverse())

        })

        return
    }


    // Lấy dữ liệu bóng đá 
    this.FootballData = () => {
        var Sql = "SELECT * FROM keobongda ORDER BY Gio ASC"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.sockets.emit('FootballData', data.reverse())
        })

        return
    }

    // Lấy lịch sử người chơi 
    this.GameHistoryUser = (IdTelegram) => {
        var Sql = "SELECT * FROM gamehistory WHERE IdTelegram = ? ORDER BY Id DESC LIMIT 15"
        conn.query(Sql, [IdTelegram], function (err, data) {
            if (err) throw err
            io.to(IdTelegram).emit('GameHistoryUser', data)
        })

        return
    }

    // Lấy lịch sử chơi
    this.GameHistory = () => {
        var Sql = "SELECT * FROM gamehistory ORDER BY Id DESC LIMIT 10"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.sockets.emit('GameHistory', data)
        })

        return
    }

    // Lấy bảng top
    this.BangTop = () => {
        var Sql = "SELECT * FROM bangtop"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.sockets.emit('Top', data)
        })

        return
    }

    // Lấy danh sách banking
    this.BankingList = (IdTelegram, List) => {
        if (List == 'Zalopay') {
            var Sql = "SELECT * FROM zalopaylist"
            conn.query(Sql, function (err, data) {
                if (err) throw err
                io.to(IdTelegram).emit('ZalopayList', data)
            })
            return
        }
        else if (List == 'Momo') {
            var Sql = "SELECT * FROM momolist"
            conn.query(Sql, function (err, data) {
                if (err) throw err
                io.to(IdTelegram).emit('MomoList', data)
            })
            return
        }
        var Sql = "SELECT * FROM bankinglist"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(IdTelegram).emit('BankingList', data)
        })
        return
    }


    // Lấy đơn cược bàn tài xỉu
    this.DonCuocBanTaiXiu = (IdTelegram) => {
        var Sql = "SELECT Cau,TienCuoc FROM doncuocbantaixiu WHERE IdTelegram = ?"
        conn.query(Sql, [IdTelegram], function (err, data) {
            if (err) throw err
            io.to(IdTelegram).emit('DonCuocBanTaiXiu', data)
        })
    }

    // Time Current
    this.TimeCurrent = () => {
        var date = new Date(Date.now())
        dateFormat = (String(date.getHours()).length == 1 ? ('0' + date.getHours()) : date.getHours()) + 'h' + ":" + (String(date.getMinutes()).length == 1 ? ('0' + date.getMinutes()) : date.getMinutes()) + 'm' + ", " + date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        return dateFormat;
    }
}

const Admin = function () {

    // Open File Json
    this.OpenFileJson = (PathFile) => {
        let File = path.join(__dirname, PathFile);
        File = fs.readFileSync(File, 'utf-8')
        return JSON.parse(File, true)
    }

    // Hệ thống
    this.System = (TokenAdmin) => {

        // Số lượng người chơi
        var Sql = "SELECT Id FROM user"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('SoLuongNguoiChoi', data.length)
        })

        // Tổng doanh thu
        var Sql = "SELECT TongTienThangCuoc FROM thongkenguoichoi"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            var TongTienThangCuoc = 0
            for (var x in data) {
                TongTienThangCuoc += (-Number(data[x]['TongTienThangCuoc']))
            }
            io.to(TokenAdmin).emit('TongDoanhThu', TongTienThangCuoc)
        })

        // Doanh thu game tele
        var Sql = "SELECT TongTienThangCuoc FROM thongkegametele"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            var TongTienThangCuoc = 0
            for (var x in data) {
                TongTienThangCuoc += (-Number(data[x]['TongTienThangCuoc']))
            }
            io.to(TokenAdmin).emit('DoanhThuGameTele', TongTienThangCuoc)
        })

        // Doanh thu game zalopay

        // Doanh thu game banking

        // Doanh thu game momo
        var Sql = "SELECT TongTienThangCuoc FROM thongkegamemomo"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            var TongTienThangCuoc = 0
            for (var x in data) {
                TongTienThangCuoc += Number(data[x]['TongTienThangCuoc'])
            }
            io.to(TokenAdmin).emit('DoanhThuGameMomo', TongTienThangCuoc)
        })

        // Đơn cược bóng đá
        var Sql = "SELECT * FROM doncuocbongda"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DonCuocBongDa', data.length)
        })
        // Đơn cược sổ xố
        var Sql = "SELECT * FROM doncuocsoxo"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DonCuocSoXo', data.length)
        })
        // File system
        var File = this.OpenFileJson('Public/Json/System.json')
        io.to(TokenAdmin).emit('File', File)

        return
    }

    // Tìm kiếm người chơi
    this.TimKiemNguoiChoi = (TokenAdmin, Search) => {
        var Sql = "SELECT * FROM user WHERE IdTelegram = ? OR Nickname = ?"
        conn.query(Sql, [Search, Search], function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('TimKiemNguoiChoi', data)
        })
        return
    }

    // Quản lý người chơi
    this.QuanLyNguoiChoi = (TokenAdmin) => {
        // Lấy danh sách người chơi
        var Sql = "SELECT * FROM user"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DanhSachNguoiChoi', data)
        })
        // Thống kê người chơi
        var Sql = "SELECT * FROM thongkenguoichoi"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('ThongKeNguoiChoi', data)
        })
        // Lấy danh blacklist
        var Sql = "SELECT * FROM blacklist"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DanhSachBlackList', data)
        })
        // Lấy danh bẻ cầu
        var Sql = "SELECT * FROM becau"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DanhSachBeCau', data)
        })
        // Lấy danh block spam
        var Sql = "SELECT * FROM blockspam"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DanhSachBlockSpam', data)
        })
        // Lấy bảng top
        var Sql = "SELECT * FROM bangtop"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('BangTop', data)
            user.BangTop()
        })


        return
    }

    // Giftcode 
    this.Giftcode = (TokenAdmin) => {
        // Lấy bảng giftcode 
        var Sql = "SELECT * FROM giftcode"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('Giftcode', data)
        })

        // Lấy lịch sử gift code 
        var Sql = "SELECT * FROM giftcodehistory"
        conn.query(Sql, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('LichSuGiftCode', data)
        })

        return
    }

    // Lịch sử game
    this.LichSuGame = (TokenAdmin) => {
        // Lấy lịch sử chơi 
        var Query = "SELECT * FROM gamehistory ORDER BY Id DESC"
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('LichSuChoi', data)
        })


        // Lấy lịch sử nạp tiền 
        var Query = "SELECT * FROM deposit_history ORDER BY Id DESC"
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('LichSuNapTien', data)
        })

        // Lấy lịch sử rút tiền 
        var Query = "SELECT * FROM lichsuruttien ORDER BY Id DESC"
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('LichSuRutTien', data)
        })

        return

    }

    // Game 
    this.Game = (TokenAdmin) => {
        // Lấy doanh thu game tele
        var Query = 'SELECT * FROM thongkegametele'
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('ThongKeGameTele', data)
        })

        // Lấy đơn cược sổ xố
        var Query = 'SELECT * FROM doncuocsoxo'
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('DonCuocSoXo', data)
        })

        // Lấy kèo bóng đá 
        var Query = "SELECT * FROM keobongda ORDER BY Gio ASC"
        conn.query(Query, function (err, data) {
            if (err) throw err
            if (data != "") {
                io.to(TokenAdmin).emit('KeoBongDa', data)
            }
        })

        // Lấy đơn cược bóng đá 
        var Query = "SELECT * FROM doncuocbongda"
        conn.query(Query, function (err, data) {
            if (err) throw err
            if (data != "") {
                io.to(TokenAdmin).emit('DonCuocBongDa', data)
            }
        })

        // Lấy Id người chơi
        var Query = "SELECT IdTelegram,Nickname FROM user"
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('IdTelegram', data)
        })

        // Lấy block chat
        var Query = "SELECT * FROM blockchat"
        conn.query(Query, function (err, data) {
            if (err) throw err
            io.to(TokenAdmin).emit('BlockChat', data)
        })

        return
    }

    this.Banking = (TokenAdmin) => {

        // Lấy danh sách banking momo
        var Query = "SELECT * FROM momolist"
        conn.query(Query, function (err, data) {
            if (err) throw err
            if (data != '') {
                io.to(TokenAdmin).emit('Momo', data)
            }
        })

        // Lấy danh sách zalo pay
        var Query = "SELECT * FROM zalopaylist"
        conn.query(Query, function (err, data) {
            if (err) throw err
            if (data != '') {
                io.to(TokenAdmin).emit('Zalopay', data)
            }
        })

        // Lấy danh sách rút tiền 
        var Query = "SELECT * FROM lichsuruttien WHERE TrangThai = 'Đang xử lý'"
        conn.query(Query, function (err, data) {
            if (err) throw err
            if (data != '') {
                io.to(TokenAdmin).emit('LichSuRutTien', data)
            }
        })

        return

    }

}


var gameTaiXiu = new GameTaiXiu()
var user = new User()
var admin = new Admin()
gameTaiXiu.gameStart()



io.on("connection", (socket) => {


    socket.on("disconnecting", (reason) => {
        for (const room of socket.rooms) {
            if (room !== socket.id) {
                socket.leave(socket.id)
            }
        }
    });

    socket.on('JoinRoom', (data) => {
        socket.join(data);
    })

    socket.on('JoinAdmin', (data) => {
        socket.join(data);
    })

    // Đặt cược
    socket.on('DatCuoc', (data) => {
        gameTaiXiu.putMoney(data.TimeInit, data.IdTelegram, data.Nickname, data.Cau, data.TienCuoc, data.Vi, data.TiLe)
    })

    // Thay đổi xúc xắc
    socket.on('ThayDoiXucXac', (data) => {
        console.log(data)
        gameTaiXiu.ThayDoiXucXac(data);
    })

    // Yêu cầu đơn cược bàn tài xỉu
    socket.on('DonCuocBanTaiXiu', (data) => {
        user.DonCuocBanTaiXiu(data)
    })

    // Yêu cầu chat
    socket.on('ReqChat', () => {
        user.SendChat()
    })

    // Yêu cầu dữ liệu bóng đá
    socket.on('KeoBongDa', () => {
        user.FootballData()
    })

    // Yêu cầu danh sách banking
    socket.on('BankingList', (data) => {
        user.BankingList(data[0], data[1])
    })

    // Yêu cầu lịch sử chơi của người chơi
    socket.on('GameHistoryUser', (data) => {
        user.GameHistoryUser(data)
    })

    // Yêu cầu lịch sử chơi 
    socket.on('GameHistory', (data) => {
        user.GameHistory(data)
    })

    // Yêu cầu Top
    socket.on('Top', () => {
        user.BangTop()
    })

    // Hệ thống
    socket.on('System', (data) => {
        admin.System(data)
    })

    // Tìm kiếm người chơi
    socket.on('TimKiemNguoiChoi', (data) => {
        admin.TimKiemNguoiChoi(data[0], data[1]);
    })

    // Quản lý người chơi
    socket.on('QuanLyNguoiChoi', (data) => {
        admin.QuanLyNguoiChoi(data)
    })

    // Gift code 
    socket.on('Giftcode', (data) => {
        admin.Giftcode(data)
    })

    // Lịch sử game
    socket.on('LichSuGame', (data) => {
        admin.LichSuGame(data)
    })

    // Game 
    socket.on('Game', (data) => {
        admin.Game(data)
    })

    // Banking
    socket.on('Banking', (data) => {
        admin.Banking(data);
    })

})

httpServer.listen(port, () => {
    console.log('Listen on port ' + port)
})