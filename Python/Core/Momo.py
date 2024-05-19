from Config.DB import DataBase
import datetime


class Momo():
    
    def __init__(self):
        self.database = DataBase()
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
    
    
    # Kiểm tra mã giao dịch momo có tồn tại trong DB
    def CheckExist_transactionCodeMomo(self, Code, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM momocode WHERE IdTelegram = %s"
        Values = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Values)
        if Check != False:
            if not Check:
                Query = "INSERT INTO momocode (IdTelegram,Code) VALUES (%s,%s)"
                Values = [IdTelegram,Code]
                Check = self.database.execute_non_select_query(Query,Values)
                if Check != False:
                    self.database.close_database_connection()
                    return 
                else:
                    self.database.close_database_connection()
                    print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van chen du lieu vao bang Momocode \n')
                    return
            else:
                Query = "UPDATE momocode SET Code = %s WHERE IdTelegram = %s"
                Values = [Code, IdTelegram]
                Check = self.database.execute_non_select_query(Query,Values)
                if Check != False:
                    self.database.close_database_connection()
                    return
                else:
                    self.database.close_database_connection()
                    print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien cap nhap du lieu vao bang Momocode \n')
                    return
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang Momocode \n')
            return

################################################################################################################################

    # Lấy danh sách nạp tiền momo
    def GetAllListMomo(self):
        self.database.__init__()
        Query = "SELECT * FROM momolist"
        Data = self.database.execute_select_query(Query)
        if Data != False:
            if not Data:
                self.database.close_database_connection()
                return {
                    'Status' : 'error',
                    'Data' : ''
                }
            else:
                self.database.close_database_connection()
                return {
                    'Status' : 200,
                    'Data' : Data
                }
        
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | Loi thuc hien truy van lay du lieu tu bang Listmomo \n')
            return

#################################################################################################################################