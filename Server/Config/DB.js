const mysql = require('mysql')

// MYSQL 
var LocalHost = '127.0.0.1';
var UserName = 'root';
var PassWord = '';
var DataBase = 'game';
var conn = '';

var ConnectToDataBase = function () {
    conn = mysql.createConnection({
        host: LocalHost,
        user: UserName,
        password: PassWord,
        database: DataBase
    });
    conn.connect(function (err) {
        if (err) throw err
        console.log('Kết Nối Thành Công DataBase');

    })
    return conn
}

module.exports = {ConnectToDataBase}