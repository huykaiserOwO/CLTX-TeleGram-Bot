from Config.DB import DataBase
import datetime
import random
import json
import requests
import time

class Game():
    
    def __init__(self):
        self.database = DataBase()
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
        
    # Trả kết quả tài hay xỉu
    def ReturnTaiXiu(self, Result):
        TaiArray = [4,5,6]
        XiuArray = [1,2,3]
        if int(Result) in TaiArray:
            return 'Tai'
        elif int(Result) in XiuArray:
            return 'Xiu'
        
    # Trả kết quả chẳn hay lẻ   
    def ReturnChanLe(self, Result):
        ChanArray = [2,4,6]
        LeArray = [1,3,5]
        if int(Result) in ChanArray:
            return 'Chan'
        elif int(Result) in LeArray:
            return 'Le'
    
    
     # Trả kết quả chẳn lẻ time stick
    def ReturnChanLeTimeStick(self, Result):
        ChanArray = [0,2,4,6,8]
        LeArray = [1,3,5,7,9]
        if int(Result) in ChanArray:
            return 'Chan'
        elif int(Result) in LeArray:
            return 'Le'
    
    # Trả kết quả tài xỉu time stick
    def ReturnTaiXiuTimeStick(self, Result):
        TaiArray = [5,6,7,8,9]
        XiuArray = [0,1,2,3,4]
        if int(Result) in TaiArray:
            return 'Tai'
        elif int(Result) in XiuArray:
            return 'Xiu'
    
    # Trả kết quả Slot Tele
    def ReturnSlotTele(self, Result):
        SlotArray = {
            "3BAR" : 1,
            "3NHO" : 22,
            "3CHANH" : 43,
            "777" : 64
        }
        for x in SlotArray:
            if int(Result) == SlotArray[x]:
                return x 
        return 'Other'
    
    # BTC GAME
    def BTCGAME(self):
        x = requests.get('https://api.binance.com/api/v3/ticker/price?symbol=BTCUSDT')
        x = json.loads(x.text)
        priceBtc = (x['price'])[:8]
        return float(priceBtc)
    
    def ReturnBtcGame(self, ResultBtc, ResultBtcLast):
        if float(ResultBtc) < float(ResultBtcLast):
            return "UP"
        elif float(ResultBtc) > float(ResultBtcLast):
            return "DOWN"
        elif float(ResultBtc) == float(ResultBtcLast):
            return "MID"
    
    
    # Kiểm tra người chơi có trong block spam 
    def CheckBlockSpam(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM blockspam WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                QueryInsert = "INSERT INTO blockspam (IdTelegram) VALUES (%s)"
                Value = [IdTelegram,]
                self.database.execute_non_select_query(QueryInsert,Value)
                self.database.close_database_connection()
                return True
            else:
                self.database.close_database_connection()
                return False
        else:
            self.database.close_database_connection()
            return
    
    
    # Xóa block spam
    def DeleteBlockSpam(self, IdTelegram):
        self.database.__init__()
        Query = "DELETE FROM blockspam WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        self.database.execute_non_select_query(Query,Value)
        self.database.close_database_connection()
        return True
            
    
    # Lưu lịch sử chơi
    def LuuLichSuChoi(self,TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu):
        self.database.__init__()
        Query = "INSERT INTO gamehistory (TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        Values = [TimeInit,IdTelegram,Nickname,TroChoi,DaChon,SoTien,KetQua,KetQua1,TraThuong,SaoKe,GhiChu]
        self.database.execute_non_select_query(Query,Values)
        self.database.close_database_connection()
        return True
    
    
    
    
    # Thống kê người chơi
    def ThongKeNguoiChoi(self, IdTelegram, Nickname, TienThangCuoc, TienCuoc):
        self.database.__init__()
        Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        SoLanChoi = 1
        if Check != False:
            if not Check:
                Query = "INSERT INTO thongkenguoichoi (IdTelegram, Nickname, TongTienCuoc, TongTienThangCuoc, SoLanChoi) VALUES (%s,%s,%s,%s,%s)"
                Values = [IdTelegram, Nickname, TienCuoc,TienThangCuoc,1]
                self.database.execute_non_select_query(Query,Values)
                self.database.close_database_connection()
                return True
            else:
                Query = "SELECT * FROM thongkenguoichoi WHERE IdTelegram = %s"
                Value = [IdTelegram,]
                Data = self.database.execute_select_query(Query,Value)
                if Data != False:
                    for x in Data:
                        TongTienCuoc = int(x[3]) + int(TienCuoc)
                        TongTienThangCuoc = int(x[4]) + int(TienThangCuoc)
                        SoLanChoi += int(x[5])
                        Query = "UPDATE thongkenguoichoi SET TongTienCuoc = %s, TongTienThangCuoc = %s, SoLanChoi = %s WHERE IdTelegram = %s"
                        Values = [TongTienCuoc, TongTienThangCuoc, SoLanChoi, IdTelegram]
                        self.database.execute_non_select_query(Query,Values)
                        self.database.close_database_connection()
                        return True
                    
                    
                    
    # Thống kê game tele
    def ThongKeGameTele(self, IdTelegram, Nickname, TienThangCuoc, TienCuoc):
        self.database.__init__()
        Query = "SELECT * FROM thongkegametele WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                Query = "INSERT INTO thongkegametele (IdTelegram, Nickname, TongTienCuoc, TongTienThangCuoc) VALUES (%s,%s,%s,%s)"
                Values = [IdTelegram, Nickname, TienCuoc,TienThangCuoc]
                self.database.execute_non_select_query(Query,Values)
                self.database.close_database_connection()
                return True
            else:
                Query = "SELECT * FROM thongkegametele WHERE IdTelegram = %s"
                Value = [IdTelegram,]
                Data = self.database.execute_select_query(Query,Value)
                if Data != False:
                    for x in Data:
                        TongTienCuoc = int(x[3]) + int(TienCuoc)
                        TongTienThangCuoc = int(x[4]) + int(TienThangCuoc)
                        Query = "UPDATE thongkegametele SET TongTienCuoc = %s, TongTienThangCuoc = %s WHERE IdTelegram = %s"
                        Values = [TongTienCuoc, TongTienThangCuoc, IdTelegram]
                        self.database.execute_non_select_query(Query,Values)
                        self.database.close_database_connection()
                        return True
        
        
    # Bẻ cầu
    def BeCau(self,IdTelegram):
        self.database.__init__() 
        Query = "SELECT * FROM becau WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return False
            
            else:
                self.database.close_database_connection()
                return True
        
        else:
            self.database.close_database_connection()
            return
        
        
    # BTC GAME
    def BTCGAME(self):
        x = requests.get('https://api.binance.com/api/v3/ticker/price?symbol=BTCUSDT')
        x = json.loads(x.text)
        priceBtc = (x['price'])[:8]
        return float(priceBtc)
    
    
    def ReturnBtcGame(self, ResultBtc, ResultBtcLast):
        if float(ResultBtc) < float(ResultBtcLast):
            return "UP"
        elif float(ResultBtc) > float(ResultBtcLast):
            return "DOWN"
        elif float(ResultBtc) == float(ResultBtcLast):
            return "MID"
    
    
    # Lấy sổ xố miền bắc
    def LaySoXoMienBac(self):
        x = requests.get('https://k123b.com/api/front/open/lottery/history/list/5/miba')
        x = json.loads(x.text)
        return x
    
    
    # Lưu cược sổ xố
    def LuuCuocSoXo(self, TimeInit, IdTelegram, Nickname, NoiDungCuoc, SoTienCuoc, SoDuDoan, TrangThai):
        self.database.__init__()
        Query = "INSERT INTO doncuocsoxo (TimeInit,IdTelegram,Nickname,NoiDungCuoc,SoTienCuoc, SoDuDoan, TrangThai) VALUES (%s,%s,%s,%s,%s,%s,%s)"
        Values = [TimeInit,IdTelegram,Nickname,NoiDungCuoc,SoTienCuoc, SoDuDoan ,TrangThai]
        self.database.execute_non_select_query(Query,Values)
        self.database.close_database_connection()
        return
    
    
    # Kiểm tra cược sổ xố
    def KiemTraCuocSoXo(self, IdTelegram, NoiDungCuoc, SoDuDoan, SoTienCuoc):
        self.database.__init__()
        Query = "SELECT * FROM doncuocsoxo WHERE IdTelegram = %s AND NoiDungCuoc = %s AND SoDuDoan = %s AND TrangThai ='Đang Xử Lý'"
        Values = [IdTelegram,NoiDungCuoc,SoDuDoan]
        Check = self.database.execute_select_query(Query,Values)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return True
            else: 
                UpdateSoTienCuoc = int(Check[0][4]) + int(SoTienCuoc)
                Query = "UPDATE doncuocsoxo SET SoTienCuoc = %s WHERE IdTelegram = %s AND NoiDungCuoc = %s AND SoDuDoan = %s AND TrangThai ='Đang Xử Lý'"
                Values = [UpdateSoTienCuoc,IdTelegram,NoiDungCuoc,SoDuDoan]
                self.database.execute_non_select_query(Query,Values)
                self.database.close_database_connection()
                return False
        else:
            self.database.close_database_connection()
            return 
    
    # Lây đơn cược sổ xố
    def LayDonCuocSoXo(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM doncuocsoxo WHERE IdTelegram = %s LIMIT 10"
        Value = [IdTelegram,]
        Data = self.database.execute_select_query(Query,Value)
        if Data != False:
            if not Data:
                self.database.close_database_connection()
                return False
            else:
                return Data
        else:
            self.database.close_database_connection()
            return
    
    
    
    # Lưu đơn cược bóng đá
    def LuuCuocBongDa(self,TimeInit,IdTelegram,Nickname,SoTienCuoc,Doi,Keo,TiLeKeo,TrangThai):
        self.database.__init__()
        Query = "INSERT INTO doncuocbongda (TimeInit,IdTelegram,Nickname,SoTienCuoc,Doi,Keo,TiLeKeo,TrangThai,TraThuong) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        Values = [TimeInit,IdTelegram,Nickname,SoTienCuoc,Doi,Keo,TiLeKeo,TrangThai,0]
        self.database.execute_non_select_query(Query,Values)
        self.database.close_database_connection()
        return
    
    # Kiểm tra đơn cược bóng đá
    def KiemTraDonCuocBongDa(self,IdTelegram,Doi,Keo,TiLeKeo,TrangThai,SoTienCuoc):
        self.database.__init__()
        Query = "SELECT * FROM doncuocbongda WHERE IdTelegram = %s AND Doi = %s AND Keo = %s AND TiLeKeo = %s AND TrangThai = %s"
        Values = [IdTelegram,Doi,Keo,TiLeKeo,TrangThai]
        Check = self.database.execute_select_query(Query,Values)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return True
            else:
                UpdateSoTienCuoc = int(Check[0][3]) + int(SoTienCuoc)
                Query = "UPDATE doncuocbongda SET SoTienCuoc = %s WHERE IdTelegram = %s AND Doi = %s AND Keo = %s AND TiLeKeo = %s AND TrangThai = %s"
                Values = [UpdateSoTienCuoc,IdTelegram,Doi,Keo,TiLeKeo,TrangThai]
                self.database.execute_non_select_query(Query,Values)
                self.database.close_database_connection()
                return False
        
        else:
            self.database.close_database_connection()
            return
        
        
    # Kiểm tra block cược bóng đá
    def KiemTraBlockCuocBongDa(self):
        self.database.__init__()
        Query = "SELECT * FROM blockcuocbongda"
        Check = self.database.execute_select_query(Query)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return True
            else:
                self.database.close_database_connection()
                return False
        else:
            self.database.close_database_connection()
            return
    
    
    # Lây đơn cược bóng đá
    def LayDonCuocBongDa(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM doncuocbongda WHERE IdTelegram = %s LIMIT 10"
        Value = [IdTelegram,]
        Data = self.database.execute_select_query(Query,Value)
        if Data != False:
            if not Data:
                self.database.close_database_connection()
                return False
            else:
                return Data
        else:
            self.database.close_database_connection()
            return
    
    
    # Kiểm tra đơn cược bàn tài xỉu 
    def KiemTraDonCuocBanTaiXiu(self,IdTelegram, Nickname, Cau, TienCuoc):
        self.database.__init__()
        Query = "SELECT * FROM doncuocbantaixiu WHERE IdTelegram = %s"
        Values = [IdTelegram]
        Check = self.database.execute_select_query(Query,Values)
        if Check != False:
            if not Check:
                Query = "INSERT INTO  doncuocbantaixiu (IdTelegram,Nickname,Cau,TienCuoc,TrangThai) VALUES (%s,%s,%s,%s,%s)"
                Values = [IdTelegram,Nickname,Cau,TienCuoc,'Đang Xử Lý']
                self.database.execute_non_select_query(Query,Values)
                self.database.close_database_connection()
                return 
            else:
                if Cau == Check[0][2]:
                    UpdateSoTienCuoc = int(Check[0][3]) + int(TienCuoc)
                    Query = "UPDATE doncuocbantaixiu SET TienCuoc = %s WHERE IdTelegram = %s AND Cau = %s"
                    Values = [UpdateSoTienCuoc,IdTelegram,Cau]
                    self.database.execute_non_select_query(Query,Values)
                    self.database.close_database_connection()
                    return True
                else:
                    self.database.close_database_connection()
                    return False
        else:
            self.database.close_database_connection()
            return
    
    # Kiểm tra block cược bàn tài xỉu
    def KiemTraBlockCuocBanTaiXiu(self):
        self.database.__init__()
        Query = "SELECT * FROM blockcuocbantaixiu"
        Check = self.database.execute_select_query(Query)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return True
            else:
                self.database.close_database_connection()
                return False
        else:
            self.database.close_database_connection()
            return
    
    
    # Lấy timestick
    def get_timeticks(self):
        
        # Lấy thời gian hiện tại
        current_time = int(time.time())

        # Chuyển đổi số giây thành số Timeticks
        timeticks = current_time * 1

        # Lấy 10 số cuối cùng của số Timeticks
        random_timeticks = str(timeticks)[-10:]

        return random_timeticks