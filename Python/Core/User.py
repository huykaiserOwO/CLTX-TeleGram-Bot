from Config.DB import DataBase
import datetime
import random
import json
import requests

class User():
    def __init__(self):
        self.database = DataBase()
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
        
    # Kiểm tra Id telegram có tồn tại trong db
    def CheckExistIdTelegram(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM  user WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check == False:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang User \n')
            return
        else:
            if not Check:
                self.database.close_database_connection()
                return {
                    'Status' : 'error',
                    'Msg' : 'Id telegram không có dữ liệu trong Database'
                }
            else:
                self.database.close_database_connection()
                return {
                    'Status' : 200,
                    'Data' : Check,
                    'Msg' : 'Id telegram có dữ liệu trong Database'
                }

#############################################################################################################

    # Kiểm tra người chơi có trong danh sách black list
    def CheckUserInBlackList(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM blacklist WHERE IdTelegram = %s"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check == False:
            self.database.close_database_connection()
            return
        else:
            if not Check:
                self.database.close_database_connection()
                return True
            else:
                self.database.close_database_connection()
                return False

################################################################################################################


    # Lấy lịch sử nạp tiền
    def GetDepositHistory(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM deposit_history WHERE IdTelegram = %s ORDER BY Id DESC LIMIT 3"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return {
                    'Status' : 'error',
                    'Data' : ''
                }
            else: 
                self.database.close_database_connection()
                return {
                'Status' : 200,
                'Data' : Check 
                }
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang deposit_history \n')
            return

#################################################################################################################################################


    # Lấy lịch sử rút tiền
    def GetLichSuRutTien(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM lichsuruttien WHERE IdTelegram = %s ORDER BY Id DESC LIMIT 3"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return {
                    'Status' : 'error',
                    'Data' : ''
                }
            else: 
                self.database.close_database_connection()
                return {
                'Status' : 200,
                'Data' : Check 
                }
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang Lichsuruttien \n')
            return


##########################################################################################################################################################

    # Lấy lịch Giftcode
    def GetGiftCodeHistory(self, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM giftcodehistory WHERE IdTelegram = %s ORDER BY Id DESC LIMIT 3"
        Value = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Value)
        if Check != False:
            if not Check:
                self.database.close_database_connection()
                return {
                    'Status' : 'error',
                    'Data' : ''
                }
            else: 
                self.database.close_database_connection()
                return {
                'Status' : 200,
                'Data' : Check 
                }
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang Giftcodehistory \n')
            return
        
           

##############################################################################################################################################################

    # Cập nhập số dư người chơi
    def CapNhapSoDuNguoiChoi(self,IdTelegram, Update):
        self.database.__init__()
        Query = "UPDATE user SET Wallet = %s WHERE IdTelegram = %s"
        Values = [Update, IdTelegram]
        self.database.execute_non_select_query(Query,Values)
        self.database.close_database_connection()
        return True

################################################################################################################################################################

    # Lưu lịch sử rút tiền 
    def LuuLichSuRutTien(self, TimeInit, IdTelegram, Nickname, AppBanking, SoTaiKhoan, SoTienRut, TrangThai):
        self.database.__init__()
        Query = "INSERT INTO lichsuruttien (TimeInit,IdTelegram,Nickname,AppBanking,SoTaiKhoan,SoTienRut,TrangThai) VALUES (%s,%s,%s,%s,%s,%s,%s)"
        Values = [TimeInit,IdTelegram,Nickname,AppBanking,SoTaiKhoan,SoTienRut,TrangThai]
        self.database.execute_non_select_query(Query,Values)
        self.database.close_database_connection()
        return

    # Rút tiền momo
    def RutTien(self, SdtUser, Money):
        self.database.__init__()
        
        # Lấy danh sách Momo
        Query = "SELECT * FROM momolist"
        Data = self.database.execute_select_query(Query)
        if Data != False:
            if Data:
                Sdt = Data[0][1]
                Token = Data[0][3]
                
                Url = 'https://momosv3.apimienphi.com/api/sendMoneyMomo'
                
                DataPost = {
                    "access_token": Token,
                    "phone": Sdt,
                    "phoneto": SdtUser,
                    "amount": int(Money),
                    "note": ""
                }
                
                DataMomoSv3 = requests.post(Url,json.dumps(DataPost))
                if json.loads(DataMomoSv3.text)['error'] == 1:
                    self.database.close_database_connection()
                    return {
                        'Status' : 200,
                        'Error' : 1,
                        'Msg' : json.loads(DataMomoSv3.text)['msg']
                    }
                
                else:
                    self.database.close_database_connection()
                    return {
                        'Status' : 200,
                        'Error' : 0,
                        'Msg' : json.loads(DataMomoSv3.text)['msg']
                    }
            
            else:
                self.database.close_database_connection()
                return False
    
    
    
##################################################################################################################################################
    
    # Lấy dữ liệu kèo bóng đá
    def GetKeoBongDa(self):
        self.database.__init__()
        Query = "SELECT * FROM keobongda"
        Data = self.database.execute_select_query(Query)
        if Data != False:
            if Data:
                self.database.close_database_connection()
                return Data

            else: 
                self.database.close_database_connection()
                return False
        
        else:
            self.database.close_database_connection()
            return
            

    # Lấy số tiền rút
    def LaySoTienRut(self):
        self.database.__init__()
        Query = "SELECT * FROM sotienrut"
        Data = self.database.execute_select_query(Query)
        if Data != False:
            if Data:
                self.database.close_database_connection()
                return Data

            else: 
                self.database.close_database_connection()
                return False
        
        else:
            self.database.close_database_connection()
            return





####################################################################################################################################################

    

    # Mở File Json
    def OpenFileJson(self,filepath):
        f = open(filepath)
        data = json.load(f)
        return data

    # Random String And Number
    def RandStringNumber(self,length):
        random_code = ''.join(random.choices('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', k=length))
        return random_code