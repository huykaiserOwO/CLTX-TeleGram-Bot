import mysql.connector
import datetime

class DataBase:
    
    #Connect database
    def __init__(self):
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
        global db_conn
        db_conn = None
        try:
            if not db_conn:
                self.db_conn = mysql.connector.connect(host='127.0.0.1',
                                                  user ='root',
                                                  password = '',
                                                  database = 'game'
                                                  )
                self.db_conn_cursor = self.db_conn.cursor()
        except mysql.connector.Error as e:
            self.ErrorLogDataBase(f'{self.TimeDate} | Loi khi ket noi den co so du lieu: {e} \n')
            print(f'{self.TimeDate} | Loi khi ket noi den co so du lieu: {e} \n')
            return None
    
    #Hàm thực hiện truy vấn select
    def execute_select_query(self, query, params = None):
        try:
            self.db_conn_cursor.execute(query, params)
            result = self.db_conn_cursor.fetchall()
            return result
        except mysql.connector.Error as e:
            self.ErrorLogDataBase(f'{self.TimeDate} | Loi khi thuc hien truy van SELECT: {e} \n')
            print(f'{self.TimeDate} | Loi khi thuc hien truy van SELECt: {e} \n')
            return False
        
    # Hàm thực hiện truy vấn INSERT, UPDATE hoặc DELETE
    def execute_non_select_query(self, query, params = None):
        try:
              self.db_conn_cursor.execute(query, params)
              self.db_conn.commit()
              return True
        except mysql.connector.Error as e:
            self.ErrorLogDataBase(f'{self.TimeDate} | Loi khi thuc hien truy van INSERT, UPDATE, DELETE: {e} \n')
            print(f'{self.TimeDate} | Loi khi thuc hien truy van INSERT, UPDATE, DELETE: {e} \n')
            return False
        
    # Hàm để đóng kết nối 
    def close_database_connection(self):
        try:
            self.db_conn.close()
            msg = 'Đã đóng kết nối đến cơ sở dữ liệu'
            return msg
        except mysql.connector.Error as e:
            self.ErrorLogDataBase(msg)
            msg = f'Lỗi khi đóng kết nối đến cơ sở dữ liệu {e}'
            return msg
    
      
    