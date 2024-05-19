from Config.DB import DataBase
import datetime
import requests
import json


class Zalopay():
    
    def __init__(self):
        self.database = DataBase()
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
    
     # Kiểm tra mã giao dịch zalopay có tồn tại trong DB
    def CheckExist_transactionCodeZalopay(self, Code, IdTelegram):
        self.database.__init__()
        Query = "SELECT * FROM zalopaycode WHERE IdTelegram = %s"
        Values = [IdTelegram,]
        Check = self.database.execute_select_query(Query,Values)
        if Check != False:
            if not Check:
                Query = "INSERT INTO zalopaycode (IdTelegram,Code) VALUES (%s,%s)"
                Values = [IdTelegram,Code]
                Check = self.database.execute_non_select_query(Query,Values)
                if Check != False:
                    self.database.close_database_connection()
                    return 
                else:
                    self.database.close_database_connection()
                    print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van chen du lieu vao bang Zalopaycode \n')
                    return
            else:
                Query = "UPDATE zalopaycode SET Code = %s WHERE IdTelegram = %s"
                Values = [Code, IdTelegram]
                Check = self.database.execute_non_select_query(Query,Values)
                if Check != False:
                    self.database.close_database_connection()
                    return
                else:
                    self.database.close_database_connection()
                    print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien cap nhap du lieu vao bang Zalopaycode \n')
                    return
        else:
            self.database.close_database_connection()
            print(f'{self.TimeDate} | IdUser: {IdTelegram} | Loi thuc hien truy van lay du lieu tu bang Zalopaycode \n')
            return
    
    
    # Lấy danh sách nạp tiền zalopay
    def GetAllListZalopay(self):
        self.database.__init__()
        Query = "SELECT * FROM zalopaylist"
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
            print(f'{self.TimeDate} | Loi thuc hien truy van lay du lieu tu bang zalopay list \n')
            return
    
    
    # Rút tiền Zalopay 
    def GetInfoWeb(self,Phone,Cookie,AccessToken):
        headers = {
            'x-access-token' :  f'{AccessToken}',
            'Connection' : 'keep-alive',
            'x-device-model' : 'iphone15,2',
            'x-device-id' : '3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os' : 'IOS',
            'x-density' : 'iphone3x',
            'Cookie' : f'{Cookie}',
            'x-os-version' : '17.3.1',
            'x-zalo-id' : '983361338403216366',
            'x-app-version' : '9.4.0',
            'x-user-agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host' : 'sapi.zalopay.vn',
            'User-Agent' : 'ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform' : 'NATIVE',
            'x-zalopay-id' : '230326001509714',
            'sessionid' : 'GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization': f'Bearer {AccessToken}'
        }
        Url = f'https://sapi.zalopay.vn/v2/ibft/web/get-user-info?phone=84{Phone}'
        
        Data = requests.get(Url,headers=headers)
        
        return json.loads(Data.text)
        

    def Get_zalo_access_token(self, Cookie , AccessToken):
        Header = {
            'x-access-token' : AccessToken,
            'Connection' : 'keep-alive',
            'x-device-model' : 'iphone15,2',
            'x-device-id' : '3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os' : 'IOS',
            'x-density' : 'iphone3x',
            'Cookie' :  Cookie,
            'x-os-version' : '17.3.1',
            'x-zalo-id' : '983361338403216366',
            'x-app-version' : '9.4.0',
            'x-user-agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host' : 'sapi.zalopay.vn',
            'User-Agent' : 'ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform' : 'NATIVE',
            'x-zalopay-id' : '230326001509714',
            'sessionid' : 'GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization' : 'Bearer ' + AccessToken
        }
        
        Url = "https://sapi.zalopay.vn/v2/zalo/access-token"
        Data = requests.get(Url,headers=Header)
        
        return json.loads(Data.text)
    
    
    
    def Get_token_sendmoney(self, data_zalo_token, Cookie, AccessToken):
        
        Header = {
            'Host' : 'graph.zalo.me',
            'Cookie' : Cookie,
            'Accept' :  '*/*',
            'Origin' : 'https://social.zalopay.vn',
            'User-Agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/8.6.0 OS/16.0.2 Platform/ios Secured/true  ZaloPayWebClient/8.6.0',
            'Accept-Language' : 'vi-VN,vi;q=0.9',
        }
        
        Url = f"https://graph.zalo.me/v2.0/ottoken?access_token= {data_zalo_token['data']['zalo_access_token']}" 
        
        Data = requests.get(Url,headers=Header)
        
        return json.loads(Data.text)
    
    
    
    def Order_Money_web(self, info, data_token, msg, amount, Cookie, AccessToken):
        
        Post = json.dumps(
                {
                    "receiver_zalopay_id" : info['data']['zalopay_id'],
                    "receiver_zalo_id" : info['data']['zalo_id'],
                    "receiver_name" : info['data']['name'],
                    "receiver_avatar" : info['data']['avatar'],
                    "amount" : amount,
                    "note" : msg,
                    "zalo_token" : data_token['token'],
                    "media" : {
                        "greeting_card" : {
                            "theme_id" : "133"
                        }
                    },
                    "utoken" : "",
                    "zpp" : Cookie,
            }
        )
        
        Header = {
            'x-access-token' :  AccessToken,
            'Connection' : 'keep-alive',
            'x-device-model' : 'iphone15,2',
            'x-device-id' : '3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os' : 'IOS',
            'x-density' : 'iphone3x',
            'Cookie' : Cookie,
            'x-os-version' : '17.3.1',
            'x-zalo-id' : '983361338403216366',
            'x-app-version' : '9.4.0',
            'x-user-agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host' : 'sapi.zalopay.vn',
            'User-Agent' : 'ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform' : 'NATIVE',
            'x-zalopay-id' : '230326001509714',
            'sessionid' : 'GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization' : 'Bearer ' + AccessToken

        }
        
        Data = requests.post('https://sapi.zalopay.vn/mt/v5/create-order-v2',data=Post,headers=Header)
        return json.loads(Data.text)
    
    def Get_assets_web(self, info, Cookie, AccessToken):
        Post = json.dumps(
            {
                "display_mode" : 1,
                "token_data" : {
                    "order_token" : info['data']['order_token'],
                },
                "full_assets" : True,
                "order_data" : '',
                "order_type" : 3,
            }
        )
        
        Header = {
            'x-access-token' :  AccessToken,
            'Connection' : 'keep-alive',
            'x-device-model': 'iphone15,2',
            'x-device-id' : '3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os' : 'IOS',
            'x-density' : 'iphone3x',
            'Cookie' : Cookie,
            'x-os-version' : '17.3.1',
            'x-zalo-id' : '983361338403216366',
            'x-app-version' : '9.4.0',
            'x-user-agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host' : 'sapi.zalopay.vn',
            'User-Agent' : 'ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform' : 'NATIVE',
            'x-zalopay-id' : '230326001509714',
            'sessionid' : 'GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization' : 'Bearer ' + AccessToken
        }
        
        
        Data = requests.post('https://sapi.zalopay.vn/v2/cashier/assets',data=Post,headers=Header)
        return json.loads(Data.text)
    
    
    def Pay_Money_web(self, info, Cookie, AccessToken):
        
        Header = {
            'x-access-token' :  AccessToken,
            'Connection' : 'keep-alive',
            'x-device-model': 'iphone15,2',
            'x-device-id' : '3DC4A50F-FA69-44FF-AC7A-C78018658892',
            'x-device-os' : 'IOS',
            'x-density' : 'iphone3x',
            'Cookie' : Cookie,
            'x-os-version' : '17.3.1',
            'x-zalo-id' : '983361338403216366',
            'x-app-version' : '9.4.0',
            'x-user-agent' : 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 ZaloPayClient/9.4.0 OS/17.3.1 Platform/ios Secured/true  ZaloPayWebClient/9.4.0',
            'Host' : 'sapi.zalopay.vn',
            'User-Agent' : 'ZaloPay/819135 CFNetwork/1492.0.1 Darwin/23.3.0',
            'x-platform' : 'NATIVE',
            'x-zalopay-id' : '230326001509714',
            'sessionid' : 'GLeCx9iWwoMQZGC1nqxv5J1EU215gnpRj7d378JUZRo1JijCNuiZAaBQeMZxeX8tkC31XyaUBznvEgMRMuHEmpRjpxTXYVFwFcJFApPYBWytAEh18gQmxSJLePwkEzudgPn5TCmgALKbLewnCeND1JZcY4qg8R8A5wHk5rk6HgK1iQNBR5jo',
            'Authorization' : 'Bearer ' + AccessToken
        }
        
        Data = {
            "authenticator" : {
                "authen_type" : 1,
                "pin" : hash("sha256", '010224'),
            },
            "order_fee" : [0],
            "order_token" : info['data']['order_token'],
            "promotion_token" : "",
            "service_id" : 19,
            "sof_token" : info['data']['source_of_fund']['sof_token'],
            "user_fee" : [0],
            "zalo_token" : "",
            "callback_url" : "zalo : //qr/jp/nibvlsoj2j?cb_t=dotp&k="+ datetime.datetime.now() +"&otp=",
            "card" : None,
            "is_zmp" : False
        }
        
        Data = requests.post('https://sapi.zalopay.vn/v2/cashier/pay',data=Data,headers=Header)
        return json.loads(Data.text)
    
    
    def Send_money_web(self,phone, msg, amount, Cookie, AccessToken):
        

        # check name
        check_info = self.GetInfoWeb(phone,Cookie,AccessToken)
        if not check_info:
            return {
                'status' : 'error',
                'data' : ''
            }
        
        
        # get zalo access_token
        DataZaloToken = self.Get_zalo_access_token(Cookie,AccessToken)
        DataToken = self.Get_token_sendmoney(DataZaloToken,Cookie,AccessToken)
        Result = self.Order_Money_web(check_info,DataToken,'',amount,Cookie,AccessToken)
        if not Result:
            return {
                'status' : 'error',
                'type' : 'error',
                'message' : 'Lỗi Dữ Liệu Chuyển Tiền',
            }
        
        if not Result['data']:
            return {
                'status' : 'error',
                'type' : 'error',
                'message' : 'Không Thể Tạo Đơn Chuyển Tiền',
            }
        
        return Result
    
        Result2 = self.Get_assets_web(Result,Cookie,AccessToken)
        if not Result2:
            return {
                'status' : 'error',
                'type' : 'error',
                'message' : 'Không Thể Lấy Thông Tin Chuyển Tiền',
            }
        
        sof_token = Result2['data']['source_of_fund']['sof_token']
        message = Result2['data']['source_of_fund']['message']
        balance = Result2['data']['source_of_fund']['balance']
        
        if balance < int(amount):
            return {
                'status' : 'error',
                'type' : 'not_money',
                'message' : 'Số Dư Không Đủ',
            }
        
        # chuyển tiền
        send = self.Pay_Money_web(Result2,Cookie,AccessToken)
        
        if not send:
            return {
                'status' : 'error',
                'type' : 'error',
                'message' : 'Không Thể Chuyển Tiền',
            }
        
        if send['data'] and send['data']['is_processing']:
            return {
                'status' : 'success',
                'message' : 'Chuyển Tiền Thành Công',
                'data' : {
                    'partner_name' : check_info['data']['name'],
                    'partner_id' : check_info['data']['zalopay_id'],
                    'avatar' : check_info['data']['avatar'],
                    'amount' : amount,
                    'comment' : msg
                }
            }
        
        else:
            return {
                'status' : 'error',
                'type' : 'error',
                'message' : 'Chuyển Tiền Thất Bại'
            }
        