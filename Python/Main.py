import telebot
import time
from telebot import types 
import re
import time
import random
import json
import datetime

from Core.User import User
UserHandler = User()
from Core.Tele import Tele
tele = Tele()

# Global
Domain = ''
Admin = ''
DangKyUrl = 'https://127.0.0.1/TeleBotV3/?DangKy'
DangNhapUrl = 'https://127.0.0.1/TeleBotV3/?DangNhap'
CapNhapBankingUrl = 'https://127.0.0.1/TeleBotV3/?CaiDatBank'
GiftCodeUrl = 'https://t.me/GiftcodeLixi66Bot/NhapGiftcode'
UrlBanTaiXiu = 'https://t.me/Lixi66_bot/BanTaiXiu'
ImagePath = ""
PathFileGames = "C:/xampp/htdocs/TeleBotV3/Server/Public/Json/GameTele.json"

API_TOKEN = ""
bot = telebot.TeleBot(API_TOKEN)

# Start Game
@bot.message_handler(commands=['start'])
@bot.message_handler(func=lambda message: message.text == 'start')
def StartGame(msg):
    IdUser = msg.from_user.id   
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    welcome_message = f"Chào mừng bạn đã đến với thiên đường giải trí {Domain} 👏👏👏\n\n" \
                        "🍀 Tại đây, bạn có thể chơi rất nhiều game trực tiếp trên Telegram mà không cần cài đặt bất kỳ app nào 🍀\n\n" \
                        "👉 Cách chơi đơn giản, tiện lợi 🎁\n\n" \
                        "👉 Nạp rút nhanh chóng, đa dạng hình thức 💸\n\n" \
                        "👉 Đua top thật hăng, nhận quà cực căng 💍\n\n" \
                        "👉 An toàn, bảo mật tuyệt đối 🏆\n\n" \
                        "⚠️ Chú ý đề phòng lừa đảo ⚠️\n\n" \
                        f"👉 Admin: {Admin} \n" \
                        "Bạn đã sẵn sàng bùng nổ chưa? 💣💣💣"
    Chienthoi_button = telebot.types.InlineKeyboardButton( "👉 Chiến thôi !!!!", callback_data="chienthoi")
    keyboard = telebot.types.InlineKeyboardMarkup()
    keyboard.row(Chienthoi_button)
    bot.send_message(IdUser, welcome_message, reply_markup=keyboard)
    return

@bot.callback_query_handler(func=lambda call: call.data == 'chienthoi')
def Welcome(call):
    IdUser = call.from_user.id   
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    markup = telebot.types.ReplyKeyboardMarkup(row_width=2,
                                               one_time_keyboard=False,
                                               resize_keyboard=False)
    markup.add("🎲 Danh sách Game", "👤 Tài khoản", "📜 Event", "🥇 Bảng xếp hạng" , "💴 Nạp tiền" , "💴 Rút tiền")
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:    
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'👤 Nickname: <b>{x[5]}</b> \n\n' \
                        f'✅ <b>Đã liên kết tài khoản</b> \n' \
                        f'✅ <b>Đã cập nhập banking</b> \n\n' \
                        f"⚠️ Chú ý đề phòng lừa đảo ⚠️\n\nBOT KHÔNG tự nhắn tin cho người dùng được. Vì vậy, tuyệt đối không tin tưởng bất kỳ ai, bất kỳ tài khoản nào có thông tin giống BOT khi nhắn tin cho bạn trước.\n\nNào, bây giờ bạn hãy chọn món theo Menu ở bên dưới nhé 👇\n\n"

                bot.send_message(call.from_user.id, Msg ,parse_mode='HTML',reply_markup=markup)
                return
            else:   
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'👤 Nickname: <b>{x[5]}</b> \n\n' \
                        f'✅ <b>Đã liên kết tài khoản</b> \n' \
                        f'❌ <b>Chưa cập nhập banking</b> \n\n' \
                        f"⚠️ Chú ý đề phòng lừa đảo ⚠️\n\nBOT KHÔNG tự nhắn tin cho người dùng được. Vì vậy, tuyệt đối không tin tưởng bất kỳ ai, bất kỳ tài khoản nào có thông tin giống BOT khi nhắn tin cho bạn trước.\n\nNào, bây giờ bạn hãy chọn món theo Menu ở bên dưới nhé 👇\n\n"

                bot.send_message(call.from_user.id, Msg ,parse_mode='HTML',reply_markup=markup)
                return
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
    
#############################################################################################################

# Info User
@bot.message_handler(commands=['info'])
@bot.message_handler(func=lambda message: message.text == '👤 Tài khoản')
def InfoUser(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                keyboard = types.InlineKeyboardMarkup()
                nap_tien = types.InlineKeyboardButton('💴 Nạp tiền',
                                                                callback_data='naptien') 
                rut_tien = types.InlineKeyboardButton('💴 Rút tiền',
                                                                callback_data='ruttien')
                nhap_gitcode = types.InlineKeyboardButton('🎁 Nhập gifcode',
                                                            callback_data='gifcode')
                chuyen_tien = types.InlineKeyboardButton('💴 Chuyển tiền',
                                                            callback_data='chuyentien')
                lich_su_nap_tien = types.InlineKeyboardButton('📈 Lịch sự nạp',
                                                            callback_data='lichsunaptien')
                lich_su_rut_tien = types.InlineKeyboardButton('📉 Lịch sử rút',
                                                            callback_data='lichsuruttien')
                lich_su_nap_gitcode = types.InlineKeyboardButton('Lịch sử nạp Giftcode',
                                                                    callback_data='lichsugifcode')
                all_lich_su_cuoc = types.InlineKeyboardButton('🎮 Lịch sử chơi gần đây',
                                                                callback_data='lichsuchoi')
                keyboard.row(nap_tien, rut_tien)
                keyboard.row(nhap_gitcode, chuyen_tien)
                keyboard.row(lich_su_nap_tien, lich_su_rut_tien)
                keyboard.row(lich_su_nap_gitcode, all_lich_su_cuoc)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'👤 Nickname: <b>{x[5]}</b> \n' \
                        f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                        f'🏦 App banking: <b>{x[7]}</b> \n' \
                        f'🏦 Số tài khoản: <b>{x[8]}</b> \n' \
                        f'🏦 Tên chủ tài khoản: <b>{x[9]}</b> \n'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
            
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'👤 Nickname: <b>{x[5]}</b> \n' \
                        f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
    
###############################################################################################################

# ListGame
@bot.message_handler(commands=['game'])
@bot.message_handler(func=lambda message: message.text == '🎲 Danh sách Game')
def ListGame(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                keyboard = types.InlineKeyboardMarkup()
                XucXac_button = types.InlineKeyboardButton("🎲 Xúc Xắc Tele",
                                                        callback_data="XucXacTele")
                ChanLe_button = types.InlineKeyboardButton("🤘 Chẳn Lẻ Tele",
                                                        callback_data="ChanLeTele")
                TaiXiu_button = types.InlineKeyboardButton("🤜 Tài Xỉu Tele",
                                                        callback_data="TaiXiuTele")
                slotTele_button = types.InlineKeyboardButton("🎰 Slot Tele",
                                                            callback_data="SlotTele")
                DuDoanBtc_button = types.InlineKeyboardButton("💲 BTC Tele",
                                                        callback_data="DuDoanBtc")
                BanTaiXiu_button = types.InlineKeyboardButton("🎲 Bàn Tài Xỉu", callback_data="BanTaiXiu")
                BetBongDa_button = types.InlineKeyboardButton("⚽️ Bóng Đá Tele",
                                                            callback_data="BongDaTele")
                soxo_button = types.InlineKeyboardButton("🍀 Số xổ-Lô đề",
                                                    callback_data='SoXoTele')

                keyboard.row(ChanLe_button,TaiXiu_button)
                keyboard.row(XucXac_button,slotTele_button)
                keyboard.row(DuDoanBtc_button,BanTaiXiu_button)
                keyboard.row(BetBongDa_button,soxo_button)
                image_path = ImagePath
            
                # Gửi hình ảnh và văn bản
                with open(image_path, "rb") as image_file:
                    bot.send_photo(msg.chat.id,
                            image_file,
                            caption="Chọn món bạn thích theo menu bên dưới nào 👇 👇 👇",reply_markup=keyboard)
                return
            
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
        
 
##############################################################################################################
    
# Các phương thức nạp tiền
@bot.message_handler(commands=['naptien'])
@bot.message_handler(func=lambda message: message.text == '💴 Nạp tiền')
def handle_naptien(msg):
    IdUser = msg.from_user.id   
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:  
                keyboard = types.InlineKeyboardMarkup()
                Momo_button = types.InlineKeyboardButton('🏦 Momo',
                                                        callback_data = 'momo')
                Zalopay_button = types.InlineKeyboardButton('🏦 Zalopay',
                                                            callback_data='zalopay')
                Bank_button = types.InlineKeyboardButton('🏦 Bank',
                                                        callback_data='bank')
                thecao_button = types.InlineKeyboardButton('🏦 Thẻ Cào',
                                                        callback_data='thecao')
                keyboard.row(Momo_button, Zalopay_button)
                keyboard.row(Bank_button, thecao_button)
                bot.send_message(IdUser, f'Chọn hai phương thức nạp tiền 👇 👇 👇', reply_markup=keyboard)
                return
            
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
    

@bot.callback_query_handler(func=lambda call: call.data == 'naptien')
def handle_naptien(call):
    IdUser = call.from_user.id
    keyboard = types.InlineKeyboardMarkup()
    Momo_button = types.InlineKeyboardButton('🏦 Momo',
                                             callback_data = 'momo')
    Zalopay_button = types.InlineKeyboardButton('🏦 Zalopay',
                                                callback_data='zalopay')
    Bank_button = types.InlineKeyboardButton('🏦 Bank',
                                             callback_data='bank')
    thecao_button = types.InlineKeyboardButton('🏦 Thẻ Cào',
                                              callback_data='thecao')
    keyboard.row(Momo_button, Zalopay_button)
    keyboard.row(Bank_button, thecao_button)
    bot.send_message(IdUser, f'Chọn các phương thức nạp tiền 👇 👇',reply_markup=keyboard)
    return
    
    
######################################################################################################
    
    
# Momo
from Core.Momo import Momo
momo = Momo()
@bot.callback_query_handler(func=lambda call: call.data == 'momo')
def Momo(call):
    IdUser = call.from_user.id  
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y") 
    RandomCode = str(IdUser)  + ' ' + str(UserHandler.RandStringNumber(3))
    CheckMomoCode = momo.CheckExist_transactionCodeMomo(RandomCode,IdUser)
    DataListMomo = momo.GetAllListMomo()
    Msg =   f'LIXI66.TOP \n\n' \
            f"👉 Chuyển tiền qua MoMo theo thông tin sau: \n" \
                    
    if DataListMomo['Status'] == 200:                
        
        Msg +=  f"📞 Sđt: `{(DataListMomo['Data'])[0][1]}` \n" \
                    f"Tên chủ tài khoản: {(DataListMomo['Data'])[0][0]} \n" \

        Msg +=  f"🔖 Nội dung : `{RandomCode}` <- nhấp vào để copy\n\n\n" \
                f"⚠️ LƯU Ý:\n\n" \
                f"❗️ NẠP TỐI THIỂU 10K. TRƯỜNG HỢP NẠP DƯỚI 10K, GAME KHÔNG HỖ TRỢ GIAO DỊCH LỖI.\n" \
                f'❗️ Nội dung phải CHÍNH XÁC. Nếu không sẽ không nạp được tiền.\n'\
                f'❗️ SỐ Momo và NỘI DUNG nạp giữa các lần luôn KHÁC NHAU.\n'\
                f'❌ KHÔNG SỬ DỤNG NỘI DUNG CŨ ĐỂ NẠP LẦN TIẾP THEO. \n\n' \
                '👉🚫 TRÁNH ẤN NÚT MOMO KHI CHƯA CỘNG TIỀN để gây nhầm lẫn mã hệ thống \n' \
                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n'
    
    else:
        Msg +=  f"🚫 Hiện tại Momo đang gặp trục trặc \n" \
                f"❌ Cấm chuyển tiền qua phương thức Momo \n" \
                f"❗️ Nếu cố tình chúng tôi không hỗ trợ giao dịch này"\


    bot.send_message(IdUser, Msg, parse_mode= 'MarkDown')
    
        
    return


# Zalopay
from Core.Zalopay import Zalopay
zaloPay = Zalopay()
@bot.callback_query_handler(func=lambda call: call.data == 'zalopay')
def Zalopay(call):
    IdUser = call.from_user.id  
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y") 
    
    RandomCode = str(IdUser)  + ' ' + str(UserHandler.RandStringNumber(3))
    CheckZalopayCode = zaloPay.CheckExist_transactionCodeZalopay(RandomCode,IdUser)
    DataListZalopay = zaloPay.GetAllListZalopay()
    Msg =   f'LIXI66.TOP \n\n' \
            f"👉 Chuyển tiền qua Zalopay theo thông tin sau: \n" \
                    
    if DataListZalopay['Status'] == 200:                
        
        Msg +=  f"📞 Sđt: `{(DataListZalopay['Data'])[0][1]}` \n" \
                    f"Tên chủ tài khoản: {(DataListZalopay['Data'])[0][0]} \n" \

        Msg +=  f"🔖 Nội dung : `{RandomCode}` <- nhấp vào để copy\n\n" \
                f"⚠️ LƯU Ý:\n\n" \
                f"❗️ NẠP TỐI THIỂU 10K. TRƯỜNG HỢP NẠP DƯỚI 10K, GAME KHÔNG HỖ TRỢ GIAO DỊCH LỖI.\n" \
                f'❗️ Nội dung phải CHÍNH XÁC. Nếu không sẽ không nạp được tiền.\n'\
                f'❗️ SỐ Zalopay và NỘI DUNG nạp giữa các lần luôn KHÁC NHAU.\n'\
                f'❌ KHÔNG SỬ DỤNG NỘI DUNG CŨ ĐỂ NẠP LẦN TIẾP THEO. \n\n' \
                '👉🚫 TRÁNH ẤN NÚT ZALOPAY KHI CHƯA CỘNG TIỀN để gây nhầm lẫn mã hệ thống \n' \
                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n'
    
    else:
        Msg +=  f"🚫 Hiện tại Zalopay đang gặp trục trặc \n" \
                f"❌ Cấm chuyển tiền qua phương thức Zalopay \n" \
                f"❗️ Nếu cố tình chúng tôi không hỗ trợ giao dịch này"\


    bot.send_message(IdUser, Msg, parse_mode= 'MarkDown')
    
        
    return




# Banking
from Core.Banking import Banking
banking = Banking()
@bot.callback_query_handler(func=lambda call: call.data == 'bank')
def Banking(call):
    IdUser = call.from_user.id  
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y") 
    RandomCode = str(IdUser)  + ' ' + str(UserHandler.RandStringNumber(10))
    CheckBankCode = banking.CheckExist_transactionCodeBank(RandomCode,IdUser)
    DataListBanking = banking.GetAllListBanking()
    Msg =   f'LIXI66.TOP \n\n' \
            f"👉 Chuyển tiền qua Banking theo thông tin sau: \n" \
                    
    if DataListBanking['Status'] == 200:                
        for x in DataListBanking['Data']:
            Msg +=  f"Số tài khoản: `{x[1]}` \n" \
                    f"Tên chủ tài khoản: {x[0]} \n" \
        

        Msg +=  f"🔖 Nội dung : `{RandomCode}` <- nhấp vào để copy\n\n\n" \
                f"⚠️ LƯU Ý:\n\n" \
                f"❗️ NẠP TỐI THIỂU 10K. TRƯỜNG HỢP NẠP DƯỚI 10K, GAME KHÔNG HỖ TRỢ GIAO DỊCH LỖI.\n" \
                f'❗️ Nội dung phải CHÍNH XÁC. Nếu không sẽ không nạp được tiền.\n'\
                f'❗️ SỐ tài khoản banking và NỘI DUNG nạp giữa các lần luôn KHÁC NHAU.\n'\
                f'❌ KHÔNG SỬ DỤNG NỘI DUNG CŨ ĐỂ NẠP LẦN TIẾP THEO. \n\n' \
                '👉🚫 TRÁNH ẤN NÚT BANKING KHI CHƯA CỘNG TIỀN để gây nhầm lẫn mã hệ thống \n' \
                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n'
    
    else:
        Msg +=  f"🚫 Hiện tại Banking đang gặp trục trặc \n" \
                f"❌ Cấm chuyển tiền qua phương thức banking \n" \
                f"❗️ Nếu cố tình chúng tôi không hỗ trợ giao dịch này"\


    bot.send_message(IdUser, Msg, parse_mode= 'MarkDown')
    
        
    return

###################################################################################################################################

# Các phương thức rút tiền
@bot.message_handler(commands=['ruttien'])
@bot.message_handler(func=lambda message: message.text == '💴 Rút tiền')
def RutTien(msg):
    IdUser = msg.from_user.id
    
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    keyboard = types.InlineKeyboardMarkup()
    Momo_button = types.InlineKeyboardButton('🏦 Momo',
                                             callback_data = 'ruttienmomo')
    Zalopay_button = types.InlineKeyboardButton('🏦 Zalopay',
                                                callback_data='ruttienzalopay')
    
    Banking_button = types.InlineKeyboardButton('🏦 Banking',
                                                callback_data='ruttienbanking')
    
    keyboard.row(Momo_button, Zalopay_button)
    keyboard.row(Banking_button)
    bot.send_message(IdUser, f'Chọn các phương thức rút tiền 👇 👇',reply_markup=keyboard)
    return





# Rút tiền banking
@bot.callback_query_handler(func=lambda call: call.data == 'ruttienbanking')
def RutTienBanking(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                
                bot.send_message(IdUser,    
                                f'LIXI66.TOP \n\n' \
                                f"/rutbanking [dấu cách] Mã ngân hàng [dấu cách] Số tài khoản [dấu cách] Số tiền cần rút \n" \
                                f"VD: /rutbanking VCB 123456789 100000 \n" \
                                f"🏦 Số tiền rút tối thiểu là <b>{SoTienRut:,}</b> đ, tối đa là 1,000,000 đ\n" \
                                f"❗️ Lưu ý: nếu chuyển sai số tk ngân hàng sẽ coi như mất toàn bộ số tiền!\n" \
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n\n'
                                'TÊN NGÂN HÀNG - MÃ NGÂN HÀNG \n\n'
                                '📌 Vietcombank => VCB \n'
                                '📌 BIDV => BIDV \n'
                                '📌 Vietinbank => VTB \n'
                                '📌 Techcombank => TCB \n'
                                '📌 MB Bank => MBB \n'
                                '📌 Agribank => AGR \n'
                                '📌 TienPhong Bank => TPB \n'
                                '📌 ACB => ACB \n'
                                '📌 Maritime Bank => MSB \n'
                                '📌 Sacombank => STB \n'
                                '📌 HD Bank => HDB \n'
                                '📌 VP Bank => VPB \n'
                                '📌 VIB => VIB \n',parse_mode='HTML')
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return


# Xử lý rút tiền banking
@bot.message_handler(commands=['rutbanking'])
def XuLyRutTienBanking(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    CommandPart = msg.text.split()
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                Nickname = x[5]
                BankCode = CommandPart[1]
                Stk = CommandPart[2]
                Amount = int(CommandPart[3])
                Wallet = int(x[10]) 
                
                if Amount < SoTienRut:
                    bot.send_message(IdUser,f'❌ Số tiền rút tối thiểu {SoTienRut:,} đ')
                    return
                
                if Amount > 1000000:
                    bot.send_message(IdUser,'❌ Số tiền rút tối đa là 1.000.000 đ')
                    return
                
                if Amount > Wallet:
                    bot.send_message(IdUser,'❌ Số tiền rút lớn hơn số tiền trong ví của bạn')
                    return
                
                
                # Lưu lịch sử rút tiền
                UserHandler.LuuLichSuRutTien(DateTime,IdUser,Nickname,BankCode,Stk,Amount,'Đang xử lý')
                
                
                UpdateWallet = Wallet - Amount
                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWallet)
                
                
                Msg =   f'❗️ Thông tin rút tiền về tài khoản Banking ❗️ \n\n' \
                        f'🏦 Ngân hàng: <b>{BankCode}</b> \n' \
                        f'💳 STK: <b>{Stk}</b> \n' \
                        f'Số tiền: <b>{Amount:,}</b> đ \n\n' \
                        f'✅ Yêu cầu rút tiền đã được thực hiện. Vui lòng chờ trong giây lát.'
                
                
                
                bot.send_message(IdUser, Msg, parse_mode='HTML')
                bot.send_message('-1002025011978',  f'Rút tiền Zalopay \n\n'
                                                    f'Người chơi Id: <b>{IdUser}</b> \n'
                                                    f'Nick name: <b>{Nickname}</b> \n'
                                                    f'Số tiền rút: <b>{Amount:,}</b> đ \n'
                                                    f'Ngân hàng: <b>{BankCode}</b> \n' \
                                                    f'STK: <b>{Stk}</b>',parse_mode='HTML')
                
                socketIo.Emit('Banking','LIXI66TOP')

                return
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return



# Rút tiền zalopay
@bot.callback_query_handler(func=lambda call: call.data == 'ruttienzalopay')
def RutTienZalopay(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                
                bot.send_message(IdUser,    
                                f'LIXI66.TOP \n\n' \
                                f"/rutzalopay [dấu cách] Số điện thoại [dấu cách] Số tiền cần rút \n" \
                                f"VD: /rutzalopay 0987654321 100000 \n" \
                                f"🏦 Số tiền rút tối thiểu là <b>{SoTienRut:,}</b> đ, tối đa là 1,000,000 đ\n" \
                                f"❗️ Lưu ý: nếu chuyển sai số Zalopay sẽ coi như mất toàn bộ số tiền!\n" \
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n',parse_mode='HTML')
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return

# Xử lý rút tiền zalopay
@bot.message_handler(commands=['rutzalopay'])
def XuLyRutTienZalopay(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    CommandPart = msg.text.split()
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                Amount = int(CommandPart[2])
                Nickname = x[5]
                Sdt = (CommandPart[1])
                Wallet = int(x[10]) 
                
                if Amount < SoTienRut:
                    bot.send_message(IdUser,f'❌ Số tiền rút tối thiểu {SoTienRut:,} đ')
                    return
                
                if Amount > 1000000:
                    bot.send_message(IdUser,'❌ Số tiền rút tối đa là 1.000.000 đ')
                    return
                
                if Amount > Wallet:
                    bot.send_message(IdUser,'❌ Số tiền rút lớn hơn số tiền trong ví của bạn')
                    return
                
                
                # Lưu lịch sử rút tiền
                UserHandler.LuuLichSuRutTien(DateTime,IdUser,Nickname,'Zalopay',Sdt,Amount,'Đang xử lý')
                
                
                UpdateWallet = Wallet - Amount
                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWallet)
                                
                
                
                bot.send_message(IdUser,    f'❗️ Thông tin rút tiền về tài khoản Zalopay ❗️ \n\n' \
                                            f'💳 SĐT: <b>{Sdt}</b> \n' \
                                            f'Số tiền: <b>{Amount:,}</b> đ \n\n' \
                                            f'✅ Yêu cầu rút tiền đã được thực hiện. Vui lòng chờ trong giây lát.', parse_mode='HTML')
                
                
                bot.send_message('-1002025011978',  f'Rút tiền Zalopay \n\n'
                                                    f'Người chơi Id: <b>{IdUser}</b> \n'
                                                    f'Nick name: <b>{Nickname}</b> \n'
                                                    f'Số tiền rút: <b>{Amount:,}</b> đ \n'
                                                    f'Sdt: <b>{Sdt}</b> \n', parse_mode='HTML')
                
                socketIo.Emit('Banking','LIXI66TOP')

                return
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return



# Rút tiền momo
@bot.callback_query_handler(func=lambda call: call.data == 'ruttienmomo')
def RutTienMomo(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                
                bot.send_message(IdUser,    
                                f'LIXI66.TOP \n\n' \
                                f"/rutmomo [dấu cách] Số điện thoại [dấu cách] Số tiền cần rút \n" \
                                f"VD: /rutmomo 0987654321 100000 \n" \
                                f"🏦 Số tiền rút tối thiểu là <b>{SoTienRut:,}</b> đ, tối đa là 1,000,000 đ\n" \
                                f"❗️ Lưu ý: nếu chuyển sai số Momo sẽ coi như mất toàn bộ số tiền!\n" \
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n',parse_mode='HTML')
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
      
      
@bot.message_handler(commands=['rutmomo'])
def XuLyRutTienMomo(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    
    # Lấy số tiền rút
    SoTienRut = int((UserHandler.LaySoTienRut())[0][0])
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    CommandPart = msg.text.split()
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    if Check['Status'] == 200:
        for x in Check['Data']:
            if x[7]:
                Amount = int(CommandPart[2])
                Nickname = x[5]
                Sdt = CommandPart[1]
                Wallet = int(x[10]) 
                
                if Amount < SoTienRut:
                    bot.send_message(IdUser,f'❌ Số tiền rút tối thiểu {SoTienRut:,} đ')
                    return
                
                if Amount > 1000000:
                    bot.send_message(IdUser,'❌ Số tiền rút tối đa là 1.000.000 đ')
                    return
                
                if Amount > Wallet:
                    bot.send_message(IdUser,'❌ Số tiền rút lớn hơn số tiền trong ví của bạn')
                    return
                
                Check = UserHandler.RutTien(Sdt,Amount)
                
                if Check != False:
                    if Check['Status'] == 200:
                        if Check['Error'] == 1:
                            bot.send_message(IdUser, Check['Msg'])
                            bot.send_message(IdUser, '⏱ Hãy thử lại sau <b>ít phút</b> \n👉 Nếu không rút được tiền liên hệ admin @Lymannhi \n',parse_mode='HTML')
                            return
                        if Check['Error'] == 0:
                            UpdateWallet = Wallet - Amount
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWallet)
                            UserHandler.LuuLichSuRutTien(DateTime,IdUser,Nickname,'Momo',Sdt,Amount,'Thành công')
                            bot.send_message(IdUser, f'✅ Rút tiền <b>thành công</b> về sdt {Sdt} \n💰 Ví: <b>{UpdateWallet:,}</b> đ',parse_mode='HTML')
                            return
                
            else:
                keyboard = types.InlineKeyboardMarkup()
                Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                              url=CapNhapBankingUrl)
                keyboard.row(Url)
                Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                        f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                        f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                        f'👉 Ấn nút dưới này để cập nhập banking 👇'
                
                bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                return
                            
    else:
        keyboard = types.InlineKeyboardMarkup()
        Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                              url=DangKyUrl)
        keyboard.row(Url)
        
        Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
        bot.send_message(IdUser, Msg,reply_markup=keyboard)
        return
      

          



###############################################################################################################################

# Deposit History
@bot.callback_query_handler(func=lambda call: call.data == 'lichsunaptien')
def DepositHistory(call):
    IdUser = call.from_user.id 
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return   
    Data = UserHandler.GetDepositHistory(IdUser)
    if Data['Status'] == 200:
        Msg = ''.join([     f'LIXI66.TOP \n\n'
                            f"🎮 LỊCH SỬ NẠP TIỀN 🎮\n\n"
                            f"┏━━━━━━━━━━━━━┓\n"
                            f"┣➤ ⏱ Thời gian: {lich_su_code[1]}\n"
                            f"┣➤ 🏦 App Banking: {lich_su_code[4]}\n"
                            f"┣➤ Tên chủ tài khoản: {lich_su_code[5]}\n"
                            f"┣➤ 💳 Id: {lich_su_code[2]}\n"
                            f"┣➤ 👤 Nickname: {lich_su_code[3]}\n"
                            f"┣➤ 💴 Số tiền nạp: {int(lich_su_code[6]):,} đ \n"
                            f"┗━━━━━━━━━━━━━┛\n\n"
                for lich_su_code in Data['Data']      
            ])
        bot.send_message(IdUser, Msg)
        return
    
    else:
        bot.send_message(IdUser, 'Chưa có đơn nạp tiền nào !')
                                    
        
        return
 
################################################################################################################################
    
  
# Lịch sử rút tiền
@bot.callback_query_handler(func=lambda call: call.data == 'lichsuruttien')
def LichSuRutTien(call):
    IdUser = call.from_user.id   
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return 
    Data = UserHandler.GetLichSuRutTien(IdUser)
    if Data['Status'] == 200:
        Msg = ''.join([     f'LIXI66.TOP \n\n'
                            f"🎮 LỊCH SỬ RÚT TIỀN 🎮\n\n"
                            f"┏━━━━━━━━━━━━━┓\n"
                            f"┣➤ ⏱ Thời gian: {lich_su_code[1]}\n"
                            f"┣➤ 💳 Id: {lich_su_code[2]}\n"
                            f"┣➤ 👤 Nickname: {lich_su_code[3]}\n"
                            f"┣➤ 🏦 App Banking: {lich_su_code[4]}\n"
                            f"┣➤ Số tài khoản: {lich_su_code[5]}\n"
                            f"┣➤ 💴 Số tiền rút: {int(lich_su_code[6]):,} đ \n"
                            f"┣➤ Trạng thái: {lich_su_code[7]} \n"
                            f"┗━━━━━━━━━━━━━┛\n\n"
                for lich_su_code in Data['Data']      
            ])
        bot.send_message(IdUser, Msg)
        return
    
    else:
        bot.send_message(IdUser, 'Chưa có đơn rút tiền nào !')
                                    
        
        return

######################################################################################################################


# Giftcode
@bot.callback_query_handler(func=lambda call: call.data == 'gifcode')
def EnteringGifcode(call):
    keyboard = types.InlineKeyboardMarkup()
    IdUser = call.from_user.id    
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    Url = types.InlineKeyboardButton('🎁 Nhập Giftcode',
                                              url=GiftCodeUrl)
    keyboard.row(Url)
    bot.send_message(IdUser,    f'🎁 Ấn nút dưới này để nhập Giftcode 👇 \n' \
                                f'❗️ Lưu ý: \n\n' \
                                f'✅ Hãy đăng nhập trước khi ấn vào link phía dưới nút \n' \
                                f'🔗 Link đăng nhập: {DangNhapUrl}', parse_mode='HTML' ,reply_markup=keyboard)
    return


# Lịch sử giftcode
@bot.callback_query_handler(func=lambda call: call.data == 'lichsugifcode')
def GiftCodeHistory(call):
    IdUser = call.from_user.id  
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    Data = UserHandler.GetGiftCodeHistory(IdUser)
    if Data['Status'] == 200:
        Msg = ''.join([     f'LIXI66.TOP \n\n'
                            f"🎮 LỊCH SỬ NẠP GIFTCODE 🎮\n\n"
                            f"┏━━━━━━━━━━━━━┓\n"
                            f"┣➤ ⏱ Thời gian: {lich_su_code[1]}\n"
                            f"┣➤ 💳 Id: {lich_su_code[2]}\n"
                            f"┣➤ 👤 Nickname: {lich_su_code[3]}\n"
                            f"┣➤ Mã Giftcode: {lich_su_code[4]}\n"
                            f"┣➤ 💴 Số tiền nạp: {int(lich_su_code[5]):,} đ \n"
                            f"┗━━━━━━━━━━━━━┛\n\n"
                for lich_su_code in Data['Data']      
            ])
        bot.send_message(IdUser, Msg)
        return
    
    else:
        bot.send_message(IdUser, 'Chưa có đơn nạp giftcode nào !')
                                    
        
        return




##########################################################################################################################
    
    
    
    
# GAMES

# Game xúc xắc tele
@bot.callback_query_handler(func=lambda call: call.data == 'XucXacTele') 
def XucXacTele(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = File[2]['TiLe1']
    TiLe2 = File[2]['TiLe2']
    bot.send_message(call.message.chat.id,  f'LIXI66.TOP \n\n' \
                                            '🎲 Game Xúc Xắc TeleGram 🎲\n\n'\
                                            '👉 Khi BOT trả lời mới được tính là đã đặt cược thành công. Nếu BOT không trả lời => Lượt chơi không hợp lệ và không bị trừ tiền trong tài khoản.\n'\
                                            '❗️❗️❗️ Lưu ý: Các biểu tượng Emoji của Telegram click vào có thể tương tác được tránh bị nhầm lẫn các đối tượng giả mạo bằng ảnh gif\n\n'\
                                            '👉 Xúc xắc được quay random bởi Telegram nên hoàn toàn xanh chín.\n\n'\
                                            '🔖 Thể lệ:\n'\
                                            '👍 Kết quả được tính bằng mặt Xúc Xắc Telegram trả về sau khi người chơi đặt cược:\n'\
                                            'Nội dung |  Số điểm  |  Tỷ lệ ăn\n'\
                                            f' XXC ➤ 2,4,6 ➤ x{TiLe1} \n'\
                                            f' XXL ➤ 1,3,5 ➤ x{TiLe1} \n'\
                                            f' XXT ➤ 4, 5, 6 ➤ x{TiLe1} \n'\
                                            f' XXX ➤ 1, 2, 3 ➤ x{TiLe1} \n'\
                                            f' D1 ➤ 1 ➤ x{TiLe2} \n'\
                                            f' D2 ➤ 2 ➤ x{TiLe2} \n'\
                                            f' D3 ➤ 3 ➤ x{TiLe2} \n'\
                                            f' D4 ➤ 4 ➤ x{TiLe2} \n'\
                                            f' D5 ➤ 5 ➤ x{TiLe2} \n'\
                                            f' D6 ➤ 6 ➤ x{TiLe2} \n'\
                                            '👉 Số tiền chơi tối thiểu là 1,000đ và tối đa là 1,000,000đ\n'\
                                            '🎮 Cách chơi: Chat tại đây theo cú pháp: \n'\
                                            'nội dung [dấu cách] tiền cược\n'\
                                            'VD: XXC 10000 hoặc XXT 10000 \n' \
                                            '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True)
    
    return



from Core.Game import Game
game = Game()
@bot.message_handler(regexp="^(XXC|XXL|XXT|XXX|D1|D2|D3|D4|D5|D6)")
def XucXacHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[2]['TiLe1'])
    TiLe2 = float(File[2]['TiLe2'])
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return
                    
                    
                        # Kiểm tra block spam 
                        CheckBlockSpam = game.CheckBlockSpam(IdUser)
                        if CheckBlockSpam == False:
                            bot.send_message(IdUser, "🚫 Đợi có kết quả game mới được đánh tiếp")
                            return
                        
                        
                        else:
                            bot.send_message(IdUser, '⏳ Đây là tool chống spam quá nhiều lệnh\n'\
                                        'Bạn thông cảm đợi bot 1s bot đổ xúc xắc 🥺')
                            bot.send_message(IdUser, 'Bot đang đợi tele đổ xúc xắc...')
                            
                            time.sleep(1)
                            
                            UpdateWalletUser = Wallet - BettingMoney
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                            ResultDice = bot.send_dice(msg.from_user.id, '🎲').dice.value 
                            WinAmount = 0
                            ResultTaiXiu = game.ReturnTaiXiu(ResultDice)
                            ResultChanLe = game.ReturnChanLe(ResultDice)
                            
                            time.sleep(5)
                            
                            result_msg =    f'LIXI66.TOP \n\n' \
                                            f"🎮   <b>KẾT QUẢ XÚC XẮC</b>   🎮 \n\n"\
                                            f"┏━━━━━━━━━━━━━┓ \n" \
                                            f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                            f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                            f"┣➤ 👤 Nickname: <i>{Nickname}</i> \n"\
                                            f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                            f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                            f"┣➤ 🎲 Kết quả xúc xắc: <b>{ResultDice}</b>"\
                            
                            # XXC XXL
                            if (BettingContent == 'XXC' and ResultChanLe == 'Chan'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultChanLe}</b>'
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname, (WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                                    
                            if (BettingContent == 'XXL' and ResultChanLe == 'Le'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultChanLe}</b>'
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            if (BettingContent == 'XXC' and ResultChanLe == 'Le') or (BettingContent == 'XXL' and ResultChanLe == 'Chan'):  
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultChanLe}</b>' 
                                result_msg += f"\n┣➤ 🥺 <b>Bạn đã thua</b> ! 💸 Số tiền <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể may mắn !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            
                            # XXT XXX
                            if (BettingContent == 'XXT' and ResultTaiXiu == 'Tai'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultTaiXiu}</b>'
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname, (WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                    
                            if (BettingContent == 'XXX' and ResultTaiXiu == 'Xiu'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultTaiXiu}</b>'
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            if (BettingContent == 'XXT' and ResultTaiXiu == 'Xiu') or (BettingContent == 'XXX' and ResultTaiXiu == 'Tai'):  
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultTaiXiu}</b>' 
                                result_msg += f"\n┣➤ 🥺 <b>Bạn đã thua</b> ! 💸 Số tiền <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể may mắn !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            
                            # D1 D2 D3 D4 D5 D6    
                            if ((BettingContent == 'D1' and int(ResultDice) == 1) or (BettingContent == 'D2' and int(ResultDice) == 2) or (BettingContent == 'D3' and int(ResultDice) == 3) or (BettingContent == 'D4' and int(ResultDice) == 4) or (BettingContent == 'D5' and int(ResultDice) == 5) or (BettingContent == 'D6' and int(ResultDice) == 6)):
                                WinAmount = int(BettingMoney * TiLe2)
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultDice}</b>'
                                result_msg += f"\n┣➤ 🏆 Bạn đã thắng! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                                
                            if ((BettingContent == 'D1' and int(ResultDice) != 1) or (BettingContent == 'D2' and int(ResultDice) != 2) or (BettingContent == 'D3' and int(ResultDice) != 3) or (BettingContent == 'D4' and int(ResultDice) != 4) or (BettingContent == 'D5' and int(ResultDice) != 5) or (BettingContent == 'D6' and int(ResultDice) != 6)):
                                result_msg += f'\n┣➤ 🎲 Kết quả: <b>{ResultDice}</b>'
                                result_msg += f"\n┣➤ 🥺 Bạn đã thua! Số tiền  <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{int(UpdateWalletUser):,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể may mắn !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Xúc Xắc Tele', BettingContent, BettingMoney, ResultDice, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                            
                            
                            # Socket yêu cầu lịch sử chơi
                            socketIo.Emit('GameHistory','1')
                                
                            # Socket yêu cầu lịch sử chơi của người chơi
                            socketIo.Emit('GameHistoryUser', str(IdUser))
                                
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                    "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách]')
                        return
                    
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return
                    
            





##############################################################################################################################################################    





# Bàn tài xỉu
@bot.callback_query_handler(func=lambda call: call.data == 'BanTaiXiu')
def BanTaiXiu(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = File[6]['TiLe1']
    IdUser = call.from_user.id
    keyboard = types.InlineKeyboardMarkup()
    BanTaiXiu = types.InlineKeyboardButton('🎮 BÀN TÀI XỈU', url=UrlBanTaiXiu)
    keyboard.row(BanTaiXiu)
    bot.send_message(IdUser,    f'LIXI66.TOP \n\n' \
                                f'🎲 Bàn Tài Xỉu 🎲 \n\n' \
                                f'🔖 Thể lệ: \n\n' \
                                f'BT ➤ 10 - 11 - 12 - 13 - 14 - 16 - 17 - 18 ➤ x{TiLe1} \n' \
                                f'BX ➤ 3 - 4 - 5 - 6 - 7 - 8 - 9 ➤ x{TiLe1} \n' \
                                f'🎮 Cách chơi: \n' \
                                f'Nội dung [Dấu cách] Tiền cược [Dấu cách]\n' \
                                f'VD: BT 10000 hoặc BX 1000 \n' \
                                '👉 Ấn gửi và đợi kết quả \n'\
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True, reply_markup=keyboard)



from Core.SocketIo import SocketIo
socketIo = SocketIo()
@bot.message_handler(regexp=r"(BT\b|BX\b)")
def BanTaiXiuHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = File[6]['TiLe1']
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return  


                        # Kiểm tra block cược bàn tài xỉu
                        CheckBlockCuocBanTaiXiu = game.KiemTraBlockCuocBanTaiXiu()
                        if CheckBlockCuocBanTaiXiu == False:
                            bot.send_message(IdUser,'Đang trong quá trình trả thưởng... \n')
                            return
                        
                        
                        # Kiểm tra đơn cược bàn tài xỉu
                        CheckDonCuocBanTaiXiu = game.KiemTraDonCuocBanTaiXiu(IdUser,Nickname,BettingContent,BettingMoney)
                        
                        
                        if CheckDonCuocBanTaiXiu == False:
                            bot.send_message(IdUser, 'Bạn đã cược một cửa, không được cược cả hai cửa !')
                            return
                        
                        UpdateWalletUser = Wallet - BettingMoney
                        UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                        
                        result_msg =    f"LIXI66.TOP \n\n" \
                                        f"🎲 BÀN TÀI XỈU 🎲 \n\n" \
                                        f"Ghi cược thành công \n\n"\
                                        f"┏━━━━━━━━━━━━━┓\n" \
                                        f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                        f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                        f"┣➤ 👤 Nickname: <i>{Nickname}</i> \n"\
                                        f"┣➤ Cầu: <b>{BettingContent}</b> \n" \
                                        f"┣➤ Tiền cược <b>{int(BettingMoney):,} đ</b> \n" \
                                        f"┣➤ 💰 Ví: <b>{UpdateWalletUser:,}</b> \n" \
                                        '👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                        "\n┗━━━━━━━━━━━━━┛"

                        socketIo.Emit('DatCuoc', {
                            "TimeInit" : str(DateTime),
                            "IdTelegram" : str(IdUser),
                            "Nickname" : str(Nickname),
                            "Cau" : str(BettingContent),
                            "TienCuoc" : str(BettingMoney),
                            "Vi" : str(UpdateWalletUser),
                            "TiLe": str(TiLe1)
                        })
                        
                        socketIo.Emit('DonCuocBanTaiXiu', str(IdUser))
                        
                        socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                        
                
                        bot.send_message(IdUser, result_msg, parse_mode='HTML')
                        
                        bot.send_message('-1002025011978',result_msg, parse_mode='HTML')
                        bot.send_message('-1002071291215', f'Người chơi {Nickname} cược bàn tài xỉu thành công ✅\n')
                        
                        return
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách] Số dự đoán')
                        return
                
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return



#################################################################################################################################################################
  






# Bóng Đá
@bot.callback_query_handler(func=lambda call: call.data == 'BongDaTele') 
def BongDa(call):
    IdUser = call.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    BongDaData = UserHandler.GetKeoBongDa()
    keyboard = types.InlineKeyboardMarkup()
    DonCuocBongDa = types.InlineKeyboardButton('🎮 Đơn cược bóng đá', callback_data='DonCuocBongDa')
    keyboard.row(DonCuocBongDa)
    Msg =   "LIXI66.TOP \n\n" \
            "⚽️ KÈO BÓNG ĐÁ TELE ⚽️ \n\n" \
            "❗️ Kết quả, tiền thắng sẽ được trả về sau khi kết thúc trận \n"\
            "❗️ Do chính admin trả thưởng \n\n"\
            
    if BongDaData != False:
        Msg +=      f'----------------------------------------------------------\n' \
                    f"⚽️ Giải {BongDaData[0][0]} \n\n" \
                    f"{BongDaData[0][3]} ngày {BongDaData[0][2]} \n" \
                        
        for x in BongDaData:
            Msg +=  f"Trận đấu <b>{x[5]}</b> VS <b>{x[4]}</b> \n" \
                    f"Tỷ lệ cả trận \n" \
                    f"Chấp <b>{x[8]}</b> ➤ Tỉ lệ : <b>{x[9]}</b> | <b>{x[10]}</b> \n" \
                    f"Tài xỉu cả trận \n" \
                    f"TX <b>{x[11]}</b> ➤ Tỉ lệ: <b>{x[12]}</b> | <b>{x[13]}</b>\n" \
                    f"Tỷ lệ H1 \n"\
                    f"Chấp <b>{x[14]}</b> ➤ Tỉ lệ: <b>{x[15]}</b> | <b>{x[16]}</b>\n" \
                    f"Tài xỉu H1 \n" \
                    f"TX <b>{x[17]}</b> ➤ Tỉ lệ: <b>{x[18]}</b> | <b>{x[19]}</b>\n" \
                    f'----------------------------------------------------------\n'
        
        Msg +=  f"Lưu ý: \n\n" \
                f"❗️ Vì mọi giá trị cược của bạn đều trừ tiền nên hãy ghi đúng nội dung cược \n" \
                f"🎮 Cách chơi: \n\n" \
                f"<b>BET</b> [Dấu cách] <b>Tiền cược</b> [Dấu cách] <b>Đội</b> [Dấu cách] <b>Kèo</b> [Dấu cách] <b>Tỉ lệ kèo</b>\n" \
                f"Chấp cả trận = <b>CCT</b> \n" \
                f"Tài xỉu cả trận = <b>TXCT</b> \n" \
                f"Chấp H1 = <b>CH1</b> \n" \
                f"Tài xỉu H1 = <b>TXH1</b> \n" \
                f"VD: BET 1000 Arsenal CCT 1/4 \n" 
                
                 
                        
    else:
        Msg +=  f"⏱ Thời gian: {DateTime} \n" \
                f"❗️ Hiện tại chưa có kèo bóng đá \n"
        
    
    bot.send_message(IdUser,Msg,parse_mode='HTML',disable_web_page_preview=True, reply_markup=keyboard)


@bot.callback_query_handler(func=lambda call: call.data == 'DonCuocBongDa') 
def DonCuocBongDa(call):
    IdUser = call.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    Data = game.LayDonCuocBongDa(IdUser)
    if Data != False:
        Msg = ''.join([     f'LIXI66.TOP \n\n'
                            f"🎮 ĐƠN CƯỢC BÓNG ĐÁ 🎮\n\n"
                            f"┏━━━━━━━━━━━━━┓\n"
                            f"┣➤ ⏱ Thời gian: <b>{lich_su_cuoc[0]}</b>\n"
                            f"┣➤ 💳 Id: <b>{lich_su_cuoc[1]}</b> \n"
                            f"┣➤ 👤 Nickname: <b>{lich_su_cuoc[2]}</b> \n"
                            f"┣➤ Số tiền cược: <b>{lich_su_cuoc[3]:,}</b> \n" 
                            f"┣➤ Đội: <b>{lich_su_cuoc[4]}</b> \n"
                            f"┣➤ Kèo: <b>{lich_su_cuoc[5]}</b> \n"
                            f"┣➤ Tỉ lệ kèo: <b>{lich_su_cuoc[6]}</b> \n"
                            f"┣➤ Trạng thái: <b>{lich_su_cuoc[7]}</b> \n"
                            f"┗━━━━━━━━━━━━━┛\n\n"
                for lich_su_cuoc in Data      
            ])
        bot.send_message(IdUser, Msg, parse_mode='HTML')
        return

    else:
        Msg =       f'LIXI66.TOP \n\n' \
                    f"CHƯA CÓ ĐƠN CƯỢC BÓNG ĐÁ NÀO \n\n" \
                    f"🎮 ĐƠN CƯỢC BÓNG ĐÁ 🎮\n\n" \
                    f"┏━━━━━━━━━━━━━┓\n" \
                    f"┣➤ ⏱ Thời gian: \n" \
                    f"┣➤ 💳 Id:  \n" \
                    f"┣➤ 👤 Nickname: \n" \
                    f"┗━━━━━━━━━━━━━┛\n\n"
                    
        bot.send_message(IdUser, Msg, parse_mode='HTML')
        return

    

@bot.message_handler(regexp=r"(BET\b)")
def BongDaHandler(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 2000000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 2.000.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return 
                        
                        
                        # Check block cược bóng đá
                        CheckBlockCuocBongDa = game.KiemTraBlockCuocBongDa()
                        if CheckBlockCuocBongDa == False:
                            bot.send_message(IdUser, '❗️ Đang trong trận không thể cược thêm \n')
                            return
                        
                        
                        Team = ''.join(CommandsPart[2]).upper()
                        Keo = ''.join(CommandsPart[3]).upper()
                        TiLeKeo = CommandsPart[4]
                        
                        if not Keo in ['CCT','TXCT','CH1','TXH1']:
                            bot.send_message(IdUser, '❗️ Kèo cược không đúng \n')
                            return
                        
                        
                        
                        
                        result_msg =    f'LIXI66.TOP \n\n' \
                                        f"Ghi Cược Thành Công \n\n" \
                                        f"⚽️   <b>KÈO BÓNG ĐÁ</b>   ⚽️\n\n"\
                                        f"┏━━━━━━━━━━━━━┓ \n" \
                                        f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                        f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                        f"┣➤ 👤 Nickname: <i>{Nickname}</i> \n"\
                        
                        
                        # Kiểm tra cược bóng đá có tồn tại DB
                        CheckCuocBongDa = game.KiemTraDonCuocBongDa(IdUser,Team,Keo,TiLeKeo,'Đang Xử Lý',BettingMoney)
                        if CheckCuocBongDa == True:
                            game.LuuCuocBongDa(DateTime,IdUser,Nickname,BettingMoney,Team,Keo,TiLeKeo,'Đang Xử Lý')
                            
                        
                        
                        UpdateWalletUser = Wallet - BettingMoney
                        UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                        
                        result_msg +=   f"┣➤ Đội cược: <b>{Team}</b> \n"\
                                        f"┣➤ Kèo cược <b>{Keo} </b>\n" \
                                        f"┣➤ Tỉ lệ kèo <b>{TiLeKeo}</b> \n" \
                                        f"┣➤ 💰 Ví: <b>{UpdateWalletUser:,}</b> \n" \
                        
                        
                        
                        result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                        "\n┗━━━━━━━━━━━━━┛"
                                        
                        
                        socketIo.Emit('System', 'LIXI66TOP')
                        
                        socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                        
                        socketIo.Emit('Game', 'LIXI66TOP')
                
                        bot.send_message(IdUser, result_msg, parse_mode='HTML')
                        
                        bot.send_message('-1002025011978','1 đơn cược bóng đá thành công', parse_mode='HTML')
                        bot.send_message('-1002071291215', f'Người chơi {Nickname} cược game bóng đá thành công ✅\n')
                        
                        return
                            
                            
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n' \
                                                    f"<b>BET</b> [Dấu cách] <b>Tiền cược</b> [Dấu cách] <b>Đội</b> [Dấu cách] <b>Kèo</b> [Dấu cách] <b>Tỉ lệ kèo</b>\n" \
                                                    f"Chấp cả trận = <b>CCT</b> \n" \
                                                    f"Tài xỉu cả trận = <b>TXCT</b> \n" \
                                                    f"Chấp H1 = <b>CH1</b> \n" \
                                                    f"Tài xỉu H1 = <b>TXH1</b> \n" \
                                                    f"VD: BET 1000 Arsenal CCT 1/4 \n", parse_mode='HTML')
                        return
                
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return








#####################################################################################################################################################################


# Game chẳn lẻ telegram

@bot.callback_query_handler(func=lambda call: call.data == 'ChanLeTele') 
def ChanLeTele(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[0]['TiLe1'])
    bot.send_message(call.message.chat.id,  'LIXI66.TOP \n\n'\
                                            '🤘 🎲 Game Chẳn Lẻ Tele 🎲 🤘\n\n'\
                                            '👉 Khi BOT trả lời mới được tính là đã đặt cược thành công. Nếu BOT không trả lời => Lượt chơi không hợp lệ và không bị trừ tiền trong tài khoản.\n'\
                                            '🔖 Thể lệ:\n'\
                                            '👉 Timeticks sẽ bằng chính xác thời gian hiện tại (tính đến mili giây) nên hoàn toàn xanh chín nhá ae.\n'\
                                            '👉 Link check Timeticks https://www.epochconverter.com \n\n' \
                                            'Nội dung |  Số điểm  |  Tỷ lệ ăn\n'\
                                            f' C ➤ 0 - 2 - 4 - 6 - 8 ➤ x{TiLe1} \n'\
                                            f' L ➤ 1 - 3 - 5 - 7 - 9 ➤ x{TiLe1} \n'\
                                            '👉 Số tiền chơi tối thiểu là 1,000đ và tối đa là 1,000,000đ\n'\
                                            '🎮 Cách chơi: Chat tại đây theo cú pháp: \n'\
                                            'nội dung [dấu cách] tiền cược\n'\
                                            'VD: C 10000 hoặc L 10000 \n' \
                                            '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True)
    
    return


@bot.message_handler(regexp=r"(C\b|L\b)")
def ChanLeTeleHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[0]['TiLe1'])
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return
                    
                    
                        # Kiểm tra block spam 
                        CheckBlockSpam = game.CheckBlockSpam(IdUser)
                        if CheckBlockSpam == False:
                            bot.send_message(IdUser, "🚫 Đợi có kết quả game mới được đánh tiếp")
                            return
                        
                        
                        else:
                            bot.send_message(IdUser, '⏳ Đây là tool chống spam quá nhiều lệnh\n'\
                                        'Bạn thông cảm đợi bot 1s bot lấy time stick 🥺')      
                            time.sleep(1)
                            
                            UpdateWalletUser = Wallet - BettingMoney
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                           
                            WinAmount = 0
                            TimeStick = game.get_timeticks()
                            SoCuoiTimeStick = game.get_timeticks()[-1]
                            
                            # Bẻ cầu
                            BeCau = game.BeCau(IdUser)
                            if BeCau == True:
                                ReturnChanLeTele =game.ReturnChanLeTimeStick(SoCuoiTimeStick) 
                                if BettingContent == "C":
                                    if ReturnChanLeTele == "Chan":
                                        TimeStick = int(TimeStick) + 1
                                        SoCuoiTimeStick = int(SoCuoiTimeStick) + 1
                                elif BettingContent == "L":
                                    if ReturnChanLeTele == "Le":
                                        TimeStick = int(TimeStick) + 1
                                        SoCuoiTimeStick = int(SoCuoiTimeStick) + 1 
                            
                            ReturnChanLeTele =game.ReturnChanLeTimeStick(SoCuoiTimeStick)
                            
                            time.sleep(2)
                            
                            result_msg =    f'LIXI66.TOP \n\n' \
                                            f"🎮  <b>KẾT QUẢ CHẲN LẺ TELE</b>  🎮 \n\n"\
                                            f"┏━━━━━━━━━━━━━┓ \n" \
                                            f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                            f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                            f"┣➤ 👤 Nickname: <i>{Nickname}</i> \n"\
                                            f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                            f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                            f"┣➤ Time stick: <b>{TimeStick}</b> \n"\
                                            f"┣➤ Kết quả time stick: <b>{SoCuoiTimeStick}</b>"\
                            
                            if (BettingContent == 'C' and ReturnChanLeTele == 'Chan'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền  <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Chẳn Lẻ Tele', BettingContent, BettingMoney, TimeStick, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                            
                            if (BettingContent == 'L' and ReturnChanLeTele == 'Le'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền  <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Chẳn Lẻ Tele', BettingContent, BettingMoney, TimeStick, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                            if (BettingContent == 'C' and ReturnChanLeTele == 'Le') or (BettingContent == 'L' and ReturnChanLeTele == 'Chan'):   
                                result_msg += f"\n┣➤ 🥺 <b>Bạn đã thua</b> ! Số tiền  <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: {int(UpdateWalletUser):,} VND"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể <b>may mắn</b> !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Chẳn Lẻ Tele', BettingContent, BettingMoney, TimeStick, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            
                            
                            # Socket yêu cầu lịch sử chơi
                            socketIo.Emit('GameHistory','1')
                                
                            # Socket yêu cầu lịch sử chơi của người chơi
                            socketIo.Emit('GameHistoryUser', str(IdUser))
                            
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                            
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                    "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách]')
                        return
                    
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return
    
#############################################################################################################################################################
    
    
# Game Tài xỉu telegram
@bot.callback_query_handler(func=lambda call: call.data == 'TaiXiuTele') 
def TaiXiuTele(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[1]['TiLe1'])
    bot.send_message(call.message.chat.id,  'LIXI66.TOP \n\n'\
                                            '🤘 Game Tài Xỉu Tele 🤘\n\n'\
                                            '👉 Khi BOT trả lời mới được tính là đã đặt cược thành công. Nếu BOT không trả lời => Lượt chơi không hợp lệ và không bị trừ tiền trong tài khoản.\n'\
                                            '🔖 Thể lệ:\n'\
                                            '👉 Timeticks sẽ bằng chính xác thời gian hiện tại (tính đến mili giây) nên hoàn toàn xanh chín nhá ae.\n'\
                                            '👉 Link check Timeticks https://www.epochconverter.com \n\n' \
                                            'Nội dung |  Số điểm  |  Tỷ lệ ăn\n'\
                                            f' T ➤ 5 - 6 - 7 - 8 - 9 ➤ x{TiLe1} \n'\
                                            f' X ➤ 0 - 1 - 2 - 3 - 4 ➤ x{TiLe1} \n'\
                                            '👉 Số tiền chơi tối thiểu là 1,000đ và tối đa là 1,000,000đ\n'\
                                            '🎮 Cách chơi: Chat tại đây theo cú pháp: \n'\
                                            'nội dung [dấu cách] tiền cược\n'\
                                            'VD: T 10000 hoặc X 10000 \n' \
                                         '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True)







@bot.message_handler(regexp=r"(T\b|X\b)")
def TaiXiuTeleHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[1]['TiLe1'])
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return
                    
                    
                        # Kiểm tra block spam 
                        CheckBlockSpam = game.CheckBlockSpam(IdUser)
                        if CheckBlockSpam == False:
                            bot.send_message(IdUser, "🚫 Đợi có kết quả game mới được đánh tiếp")
                            return
                        
                        
                        else:
                            bot.send_message(IdUser, '⏳ Đây là tool chống spam quá nhiều lệnh\n'\
                                        'Bạn thông cảm đợi bot 1s bot lấy time stick 🥺')      
                            time.sleep(1)
                            
                            UpdateWalletUser = Wallet - BettingMoney
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                           
                            WinAmount = 0
                            TimeStick = game.get_timeticks()
                            SoCuoiTimeStick = game.get_timeticks()[-1]
                            
                            # Bẻ cầu
                            BeCau = game.BeCau(IdUser)
                            if BeCau == True:
                                ReturnTaiXiuTele =game.ReturnTaiXiuTimeStick(SoCuoiTimeStick) 
                                if BettingContent == "T":
                                    if ReturnTaiXiuTele == "Tai":
                                        SoCuoiTimeStick = random.randint(0,4)
                                        TimeStick = TimeStick[:9] + str(SoCuoiTimeStick)
                                elif BettingContent == "X":
                                    if ReturnTaiXiuTele == "Xiu":
                                        SoCuoiTimeStick = random.randint(5,9) 
                                        TimeStick = TimeStick[:9] + str(SoCuoiTimeStick)
                            
                            ReturnTaiXiuTele =game.ReturnTaiXiuTimeStick(SoCuoiTimeStick)
                            
                            time.sleep(2)
                            
                            result_msg =    f'LIXI66.TOP \n\n' \
                                            f"🎮  <b>KẾT QUẢ TÀI XỈU TELE</b>  🎮 \n\n"\
                                            f"┏━━━━━━━━━━━━━┓ \n" \
                                            f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                            f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                            f"┣➤ 👤 Nickname: <i>{Nickname}</i> \n"\
                                            f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                            f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                            f"┣➤ Time stick: <b>{TimeStick}</b> \n"\
                                            f"┣➤ Kết quả time stick: <b>{SoCuoiTimeStick}</b>"\
                            
                            if (BettingContent == 'T' and ReturnTaiXiuTele == 'Tai'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền  <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Tài Xỉu Tele', BettingContent, BettingMoney, TimeStick, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                            
                            if (BettingContent == 'X' and ReturnTaiXiuTele == 'Xiu'):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền  <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Tài Xỉu Tele', BettingContent, BettingMoney, TimeStick, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                            if (BettingContent == 'T' and ReturnTaiXiuTele == 'Xiu') or (BettingContent == 'X' and ReturnTaiXiuTele == 'Tai'):   
                                result_msg += f"\n┣➤ 🥺 <b>Bạn đã thua</b> ! Số tiền  <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{int(UpdateWalletUser):,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể <b>may mắn</b> !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Tài Xỉu Tele', BettingContent, BettingMoney, TimeStick, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            
                            
                            
                            # Socket yêu cầu lịch sử chơi
                            socketIo.Emit('GameHistory','1')
                                
                            # Socket yêu cầu lịch sử chơi của người chơi
                            socketIo.Emit('GameHistoryUser', str(IdUser))
                            
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                    "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách]')
                        return
                    
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return
    
####################################################################################################################################


# Game Slot 
@bot.callback_query_handler(func=lambda call: call.data == 'SlotTele') 
def SlotTele(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[3]['TiLe1'])
    TiLe2 = float(File[3]['TiLe2'])
    bot.send_message(call.message.chat.id,  'LIXI66.TOP \n\n'\
                                            '🎰 Game Slot Tele 🎰\n\n'\
                                            '👉 Khi BOT trả lời mới được tính là đã đặt cược thành công. Nếu BOT không trả lời => Lượt chơi không hợp lệ và không bị trừ tiền trong tài khoản.\n'\
                                            '❗️❗️❗️ Lưu ý: Các biểu tượng Emoji của Telegram click vào có thể tương tác được tránh bị nhầm lẫn các đối tượng giả mạo bằng ảnh gif\n\n'\
                                            '🌟🌟🌟 Thể lệ 🌟🌟🌟\n'\
                                            'Nội dung |  Số điểm  |  Tỷ lệ ăn\n'\
                                            f'S ➤ 🎁 Kết quả 3 Nho ➤ x{TiLe1}\n'\
                                            f'S ➤ 🎁 Kết quả 3 Chanh ➤ x{TiLe1} \n'\
                                            f'S ➤ 🎁 Kết quả 3 Bar ➤ x{TiLe1} \n'\
                                            f'S ➤ 🎁  Kết quả 777 ➤ x{TiLe2} \n'\
                                            '👉 Số tiền chơi tối thiểu là 1,000đ và tối đa là 1,000,000đ\n'\
                                            '🎰 Cách chơi: Chat tại đây theo cú pháp: \n'\
                                            'nội dung [dấu cách] tiền cược\n'\
                                            'VD: S 1000 \n' \
                                            '👉 Ấn gửi và đợi kết quả \n'\
                                            '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True)




@bot.message_handler(regexp=r"(S\b)")
def SlotTeleHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[3]['TiLe1'])
    TiLe2 = float(File[3]['TiLe2'])
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return
                    
                    
                        # Kiểm tra block spam 
                        CheckBlockSpam = game.CheckBlockSpam(IdUser)
                        if CheckBlockSpam == False:
                            bot.send_message(IdUser, "🚫 Đợi có kết quả game mới được đánh tiếp")
                            return
                        
                        
                        else:
                            bot.send_message(IdUser, '⏳ Đây là tool chống spam quá nhiều lệnh\nBạn thông cảm đợi bot 1s bot đổ slot 🎰\n')      
                            time.sleep(1)
                            
                            UpdateWalletUser = Wallet - BettingMoney
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                           
                            WinAmount = 0
                            
                            ResultSlot = bot.send_dice(msg.from_user.id, '🎰').dice.value
                    
                            ResultSlotTele = game.ReturnSlotTele(ResultSlot)

                            time.sleep(2)
                            
                            result_msg =    f"LIXI66.TOP \n\n"\
                                            f"🎮 🎰  <b>KẾT QUẢ SLOT TELE</b>  🎰 🎮 \n\n"\
                                            f"┏━━━━━━━━━━━━━┓ \n" \
                                            f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                            f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                            f"┣➤ 👤 Nickname: <b>{Nickname}</b> \n"\
                                            f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                            f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                    
                            
                            if (BettingContent == 'S' and (ResultSlotTele == '3BAR' or ResultSlotTele == '3CHANH' or ResultSlotTele == '3NHO')):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"┣➤ Kết quả: <b>{ResultSlotTele}</b> \n"
                                result_msg += f"┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Tài Xỉu Tele', BettingContent, BettingMoney, ResultSlotTele, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                    
                            if (BettingContent == 'S' and ResultSlotTele == '777'):
                                WinAmount = int(BettingMoney * TiLe2)
                                result_msg += f"┣➤ Kết quả: <b>{ResultSlotTele}</b> \n"
                                result_msg += f"┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{(WinAmount - BettingMoney):,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Tài Xỉu Tele', BettingContent, BettingMoney, ResultSlotTele, 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                                
                                
                            if (BettingContent == 'S' and ResultSlotTele == 'Other'):   
                                result_msg += f"┣➤ 🥺 <b>Bạn đã thua</b> ! Số tiền  <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{int(UpdateWalletUser):,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể <b>may mắn</b> !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'Slot Tele', BettingContent, BettingMoney, ResultSlotTele, 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                            
                            
                            # Socket yêu cầu lịch sử chơi
                            socketIo.Emit('GameHistory','1')
                                
                            # Socket yêu cầu lịch sử chơi của người chơi
                            socketIo.Emit('GameHistoryUser', str(IdUser))
                            
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                    "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách]')
                        return
                    
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return



#####################################################################################################################################################################################################################

# BTC/USDT
@bot.callback_query_handler(func=lambda call: call.data == 'DuDoanBtc') 
def DuDoanBtc(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = File[4]['TiLe1']
    IdUser = call.from_user.id  
    bot.send_message(IdUser,    f'LIXI66.TOP \n\n' \
                                f'💲 Game Dự Đoán BTC/USDT 💲 \n\n' \
                                '👉 Khi BOT trả lời mới được tính là đã đặt cược thành công. Nếu BOT không trả lời => Lượt chơi không hợp lệ và không bị trừ tiền trong tài khoản.\n' \
                                '👉 Kết quả game được tính bằng giá BTC trong 10s \n' \
                                '👉 Sàn giao dịch: https://www.binance.com/vi/trade/BTC_USDT?_from=markets&type=spot \n' \
                                '🌟🌟🌟 Thể lệ 🌟🌟🌟\n'\
                                'Nội dung | Tỷ lệ ăn\n'\
                                f'UP ➤ x{TiLe1}\n'\
                                f'DOWN ➤ x{TiLe1}\n'\
                                f'Trong đó: \n' \
                                f'UP giá BTC đi lên 📈 \n'\
                                f'DOWN giá BTC đi xuống 📉 \n' \
                                '👉 Số tiền chơi tối thiểu là 1,000đ và tối đa là 1,000,000đ\n'\
                                'Cách chơi: Chat tại đây theo cú pháp: \n'\
                                'Nội dung [dấu cách] tiền cược\n'\
                                'VD: UP 1000 \n' \
                                '👉 Ấn gửi và đợi kết quả \n'\
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True)
    
    return



@bot.message_handler(regexp=r"(UP\b|DOWN\b)")
def DuDoanBTCHandler(msg):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = float(File[4]['TiLe1'])
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return
                    
                    
                        # Kiểm tra block spam 
                        CheckBlockSpam = game.CheckBlockSpam(IdUser)
                        if CheckBlockSpam == False:
                            bot.send_message(IdUser, "🚫 Đợi có kết quả game mới được đánh tiếp")
                            return
                        
                        
                        else:
                            
                            ResultBtc = game.BTCGAME()
                            bot.send_message(IdUser, f'⏳ Đợi bot lấy giá 💲 BTC/USDT')
                            bot.send_message(IdUser, f'💲 Giá BTC/USDT hiện tại: {ResultBtc: ,} $\n')
                            bot.send_message(IdUser, '⏳ Chờ 10s đợi kết quả.... \n')  
                            time.sleep(0.5) 
                            bot.send_message(IdUser, '10s')       
                            time.sleep(4)
                            bot.send_message(IdUser, '5s') 
                            time.sleep(1)
                            bot.send_message(IdUser, '4s')   
                            time.sleep(1)
                            bot.send_message(IdUser, '3s')    
                            time.sleep(1)
                            bot.send_message(IdUser, '2s') 
                            time.sleep(0.5)  
                            bot.send_message(IdUser, '1s') 
                            bot.send_message(IdUser, '🎮 Kết quả...')  
                            ResultBtcLast = game.BTCGAME()
    
                            UpdateWalletUser = Wallet - BettingMoney
                            UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                           
                            WinAmount = 0
                            
                            
                            # Bẻ cầu
                            BeCau = game.BeCau(IdUser)
                            if BeCau == True:
                                ResultBtcLastStr = game.ReturnBtcGame(ResultBtc,ResultBtcLast)
                                if BettingContent == "UP":
                                    if ResultBtcLastStr == "UP":
                                        ResultBtcLast = float(float(ResultBtcLast) - (float(ResultBtcLast) - float(ResultBtc) + float(str(random.uniform(0.01, 0.5))[:4])))
                                elif BettingContent == "DOWN":
                                    if ResultBtcLastStr == "DOWN":
                                        ResultBtcLast = float(float(ResultBtcLast) + (float(ResultBtcLast) - float(ResultBtc) + float(str(random.uniform(0.01, 0.5))[:4])))
                            
                            
                            ResultBtcLastStr = game.ReturnBtcGame(ResultBtc,ResultBtcLast)
                            
                            result_msg =    f"LIXI66.TOP \n\n" \
                                            f"🎮 💲 <b>KẾT QUẢ BTC/USDT</b> 💲 🎮 \n\n"\
                                            f"┏━━━━━━━━━━━━━┓ \n" \
                                            f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                            f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                            f"┣➤ 👤 Nickname: <b>{Nickname}</b> \n"\
                                            f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                            f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                            f"┣➤ 👉 Kết quả giá BTC Trước Cược: <b>{ResultBtc: ,}</b> $\n"\
                                            f"┣➤ 👉 Kết quả giá BTC Sau Cược: <b>{ResultBtcLast: ,}</b> $"

                            
                            if (BettingContent == 'UP' and ResultBtcLastStr == "UP"):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{WinAmount:,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'BTC Tele', BettingContent, BettingMoney, str(ResultBtc) + ' | ' + str(ResultBtcLast), 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                    
                            if (BettingContent == 'DOWN' and ResultBtcLastStr == "DOWN"):
                                WinAmount = int(BettingMoney * TiLe1)
                                result_msg += f"\n┣➤ 🏆 <b>Bạn đã thắng</b> ! 💸 Với số tiền <b>{WinAmount:,}</b> đ 🏆"
                                UpdateWalletUser = WinAmount + UpdateWalletUser
                                result_msg += f"\n┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser,UpdateWalletUser)
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'BTC Tele', BettingContent, BettingMoney, str(ResultBtc) + ' | ' + str(ResultBtcLast), 'Win' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                

                            
                            if (BettingContent == 'UP' and ResultBtcLastStr != 'UP') or (BettingContent == 'DOWN' and ResultBtcLastStr != 'DOWN'):
                                result_msg += f"\n┣➤ 🥺 <b>Bạn đã thua</b> ! Số tiền  <b>{BettingMoney:,}</b> đ"
                                result_msg += f"\n┣➤💰 Ví: <b>{int(UpdateWalletUser):,}</b> đ"
                                result_msg += f"\n┣➤ Không sao cố lên ván sau có thể <b>may mắn</b> !"
                                game.ThongKeNguoiChoi(IdUser,Nickname,(WinAmount - BettingMoney),BettingMoney)
                                game.ThongKeGameTele(IdUser,Nickname, (WinAmount - BettingMoney), BettingMoney)
                                game.LuuLichSuChoi(DateTime,IdUser,Nickname,'BTC Tele', BettingContent, BettingMoney, str(ResultBtc) + ' | ' + str(ResultBtcLast), 'Losing' ,(WinAmount - BettingMoney), UpdateWalletUser, msg.text)
                                game.DeleteBlockSpam(IdUser)
                                
                            
                            # Socket yêu cầu lịch sử chơi
                            socketIo.Emit('GameHistory','1')
                                
                            # Socket yêu cầu lịch sử chơi của người chơi
                            socketIo.Emit('GameHistoryUser', str(IdUser))
                            
                            
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
    
    
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                    "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách]')
                        return
                    
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return




# Sổ xố
@bot.callback_query_handler(func=lambda call: call.data == 'SoXoTele') 
def SoXo(call):
    File = UserHandler.OpenFileJson(PathFileGames)
    TiLe1 = File[5]['TiLe1']
    TiLe2 = File[5]['TiLe2']
    TiLe3 = File[5]['TiLe3']
    TiLe4 = File[5]['TiLe4']
    TiLe5 = File[5]['TiLe5']
    IdUser = call.from_user.id
    keyboard = types.InlineKeyboardMarkup()
    DonCuocSoXo = types.InlineKeyboardButton('🎮 Đơn Cược Sổ Xố Của Bạn', callback_data='DonCuocSoXo')
    keyboard.row(DonCuocSoXo)
    bot.send_message(IdUser,    f'LIXI66.TOP \n\n' \
                                f'🍀 Sổ Xố Tele 🍀 \n\n' \
                                f'🔖 Thể lệ: \n\n' \
                                f'👉 Kết quả được xác định thông qua KẾT QUẢ XỔ SỐ MIỀN BẮC ngày hôm đó. \n' \
                                f'----------------------------------------------------------\n' \
                                f'LO  ➤  1 số tất cả giải XSMB  ➤  x{TiLe4} \n' \
                                f'DE  ➤  Giải Đặc Biệt XSMB  ➤  x{TiLe5} \n' \
                                f'XIEN2  ➤  2 số Tất cả giải XSMB  ➤  x{TiLe1} \n' \
                                f'XIEN3  ➤  3 số Tất cả giải XSMB  ➤  x{TiLe2} \n' \
                                f'XIEN4  ➤  4 số Tất cả giải XSMB  ➤  x{TiLe3} \n\n' \
                                f'🎮 Cách chơi: \n' \
                                f'Nội dung [Dấu cách] Tiền cược [Dấu cách] Số dự đoán \n' \
                                f'VD: XIEN2 1000 36 69 hoặc LO 1000 36 \n' \
                                '👉 Ấn gửi và đợi kết quả \n'\
                                '👉 Nếu bị lỗi liên hệ admin @Lymannhi \n', disable_web_page_preview=True, reply_markup=keyboard)



@bot.callback_query_handler(func=lambda call: call.data == 'DonCuocSoXo') 
def DonCuocSoXo(call):
    IdUser = call.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    Data = game.LayDonCuocSoXo(IdUser)
    if Data != False:
        Msg = ''.join([     f'LIXI66.TOP \n\n'
                            f"🎮 ĐƠN CƯỢC SỔ XỐ 🎮\n\n"
                            f"┏━━━━━━━━━━━━━┓\n"
                            f"┣➤ ⏱ Thời gian: <b>{lich_su_cuoc[0]}</b>\n"
                            f"┣➤ 💳 Id: <b>{lich_su_cuoc[1]}</b> \n"
                            f"┣➤ 👤 Nickname: <b>{lich_su_cuoc[2]}</b> \n"
                            f"┣➤ Nội dung cược: <b>{lich_su_cuoc[3]}</b> \n"
                            f"┣➤ Số tiền cược: <b>{int(lich_su_cuoc[4]):,} đ</b> \n"
                            f"┣➤ Số dự đoán: <b>{lich_su_cuoc[5]}</b> \n"
                            f"┣➤ Trạng thái: <b>{lich_su_cuoc[6]}</b> \n"
                            f"┗━━━━━━━━━━━━━┛\n\n"
                for lich_su_cuoc in Data      
            ])
        bot.send_message(IdUser, Msg, parse_mode='HTML')
        return

    else:
        Msg =       f'LIXI66.TOP \n\n' \
                    f"CHƯA CÓ ĐƠN CƯỢC SỔ XỐ NÀO \n\n" \
                    f"🎮 ĐƠN CƯỢC SỔ XỐ 🎮\n\n" \
                    f"┏━━━━━━━━━━━━━┓\n" \
                    f"┣➤ ⏱ Thời gian: \n" \
                    f"┣➤ 💳 Id:  \n" \
                    f"┣➤ 👤 Nickname: \n" \
                    f"┣➤ Nội dung cược: \n" \
                    f"┣➤ Số tiền cược: \n" \
                    f"┣➤ Số dự đoán: \n" \
                    f"┣➤ Trạng thái: \n" \
                    f"┗━━━━━━━━━━━━━┛\n\n"
                    
        bot.send_message(IdUser, Msg, parse_mode='HTML')
        return


@bot.message_handler(regexp=r"(LO\b|DE\b|XIEN2\b|XIEN3\b|XIEN4\b)")
def XoSoHandler(msg):
    IdUser = msg.from_user.id
    # BlackList
    CheckBlackList = UserHandler.CheckUserInBlackList(IdUser)
    if CheckBlackList == False:
        bot.send_message(IdUser,    '🚫 Bạn đã bị admin đưa vào danh sách Black list \n' \
                                    f'👉 Liên hệ admin {Admin} để gỡ Black list', parse_mode='HTML')
        return
    DateTime = datetime.datetime.now().strftime("%H:%M  %d-%m-%Y")
    Check = UserHandler.CheckExistIdTelegram(IdUser)
    keyboard = types.InlineKeyboardMarkup()
    if Check != False:
        if Check['Status'] == 200:
            for x in Check['Data']:
                if x[7]:
                    try:
                        Nickname = x[5]
                        Wallet = int(x[10])
                        CommandsPart = msg.text.split()
                        BettingMoney = int(CommandsPart[1])
                        BettingContent = ''.join(CommandsPart[0]).upper()
                        if (BettingMoney < 1000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối thiểu 1.000 đ')
                            return
                        if (BettingMoney > 500000):
                            bot.send_message(IdUser, '❌ Số tiền cược tối đa 500.000 đ')
                            return
                        if (BettingMoney > Wallet):
                            naptien_button = types.InlineKeyboardButton('💴 Nạp Tiền 💴',
                                                                        callback_data='naptien')
                            keyboard.row(naptien_button)
                            bot.send_message(msg.from_user.id, f'❌ Số dư của bạn {Wallet:,} đ không đủ để cược', reply_markup=keyboard)
                            return  
                        
                        
                        SoXoData = game.LaySoXoMienBac()
                        OpenTime = str((SoXoData['t']['issueList'])[0]['openTimeStamp'])[:10]
                        TimeNow = game.get_timeticks()
                        Check = int((int(TimeNow) - int(OpenTime)) / 3600)
                        if Check < 23:
                            
            
                            result_msg =    f"LIXI66.TOP \n\n" \
                                                f"GHI CƯỢC THÀNH CÔNG \n\n"\
                                                f"🍀  Sổ Xố Tele  🍀 \n\n"\
                                                f"┏━━━━━━━━━━━━━┓ \n" \
                                                f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                                f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                                f"┣➤ 👤 Nickname: <b>{Nickname}</b> \n"\
                                                f"┣➤ Nội dung cược: <b>{BettingContent}</b> \n"\
                                                f"┣➤ 💴 Tiền cược: <b>{BettingMoney :,}</b> đ \n"\
                                                    
                            
                            if BettingContent == "LO" or BettingContent == "DE":
                                SoDuDoan1 = int(CommandsPart[2])
                                if (len(str(SoDuDoan1)) != 2):
                                    bot.send_message(IdUser,'❗️ Số dự đoán phải là 2 chữ số \n')
                                    return
                                
                                UpdateWalletUser = Wallet - BettingMoney
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                                CheckCuocSoXo = game.KiemTraCuocSoXo(IdUser,BettingContent,SoDuDoan1,BettingMoney)
                                if CheckCuocSoXo == True:
                                    game.LuuCuocSoXo(DateTime,IdUser,Nickname,BettingContent,BettingMoney,SoDuDoan1,'Đang Xử Lý')
                                

                                result_msg +=   f"┣➤ Số dự đoán: <b>{SoDuDoan1}</b> \n" \
                                                f"┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                                    
                        
                            if BettingContent == "XIEN2":
                                SoDuDoan1 = int(CommandsPart[2])
                                SoDuDoan2 = int(CommandsPart[3])
                                
                                
                                if (len(str(SoDuDoan1)) != 2 and len(str(SoDuDoan2)) != 2):
                                    bot.send_message(IdUser,'❗️ Số dự đoán phải là 2 chữ số \n')
                                    return
                                
                                if SoDuDoan1 == SoDuDoan2:
                                    bot.send_message(IdUser,'❗️ Số dự đoán XIÊN không được trùng lặp nhau\n')
                                    return
                                
                                UpdateWalletUser = Wallet - BettingMoney
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                                CheckCuocSoXo = game.KiemTraCuocSoXo(IdUser,BettingContent,(str(SoDuDoan1) + ' ' + str(SoDuDoan2)),BettingMoney)
                                if CheckCuocSoXo == True:
                                    game.LuuCuocSoXo(DateTime,IdUser,Nickname,BettingContent,BettingMoney,(str(SoDuDoan1) + ' ' + str(SoDuDoan2)),'Đang Xử Lý')
                                    
                                    
                                result_msg +=   f"┣➤ Số dự đoán: <b>{str(SoDuDoan1) + ' ' + str(SoDuDoan2)}</b> \n" \
                                                f"┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"                      
                                                
                                
                                
                            if BettingContent == "XIEN3":
                                SoDuDoan1 = int(CommandsPart[2])
                                SoDuDoan2 = int(CommandsPart[3])
                                SoDuDoan3 = int(CommandsPart[4])
                                        
                                if (len(str(SoDuDoan1)) != 2 and len(str(SoDuDoan2)) != 2 and len(str(SoDuDoan3)) != 2):
                                    bot.send_message(IdUser,'❗️ Số dự đoán phải là 2 chữ số \n')
                                    return
                                
                                if SoDuDoan1 == SoDuDoan2 or SoDuDoan1 == SoDuDoan3 or SoDuDoan2 == SoDuDoan3:
                                    bot.send_message(IdUser,'❗️ Số dự đoán XIÊN không được trùng lặp nhau\n')
                                    return
                                
                                
                                UpdateWalletUser = Wallet - BettingMoney
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                                CheckCuocSoXo = game.KiemTraCuocSoXo(IdUser,BettingContent,(str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3)),BettingMoney)
                                if CheckCuocSoXo == True:
                                    game.LuuCuocSoXo(DateTime,IdUser,Nickname,BettingContent,BettingMoney,(str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3)),'Đang Xử Lý')
                                    
                                result_msg +=   f"┣➤ Số dự đoán: <b>{str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3)}</b> \n" \
                                                f"┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                            
                            if BettingContent == "XIEN4":
                                SoDuDoan1 = int(CommandsPart[2])
                                SoDuDoan2 = int(CommandsPart[3])
                                SoDuDoan3 = int(CommandsPart[4])
                                SoDuDoan4 = int(CommandsPart[5])
                                if (len(str(SoDuDoan1)) != 2 and len(str(SoDuDoan2)) != 2 and len(str(SoDuDoan3)) != 2 and len(str(SoDuDoan4)) != 2):
                                    bot.send_message(IdUser,'❗️ Số dự đoán phải là 2 chữ số \n')
                                    return
                                
                                if SoDuDoan1 == SoDuDoan2 or SoDuDoan1 == SoDuDoan3 or SoDuDoan2 == SoDuDoan3 or SoDuDoan1 == SoDuDoan4 or SoDuDoan2 == SoDuDoan4 or SoDuDoan3 == SoDuDoan4:
                                    bot.send_message(IdUser,'❗️ Số dự đoán XIÊN không được trùng lặp nhau\n')
                                    return
                                
                                UpdateWalletUser = Wallet - BettingMoney
                                UserHandler.CapNhapSoDuNguoiChoi(IdUser, UpdateWalletUser)
                                CheckCuocSoXo = game.KiemTraCuocSoXo(IdUser,BettingContent,(str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3) + ' ' + str(SoDuDoan4)),BettingMoney)
                                if CheckCuocSoXo == True:
                                    game.LuuCuocSoXo(DateTime,IdUser,Nickname,BettingContent,BettingMoney,(str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3) + ' ' + str(SoDuDoan4)),'Đang Xử Lý')
                                    
                                result_msg +=   f"┣➤ Số dự đoán: <b>{str(SoDuDoan1) + ' ' + str(SoDuDoan2) + ' ' + str(SoDuDoan3) + ' ' + str(SoDuDoan4)}</b> \n" \
                                                f"┣➤💰 Ví: <b>{UpdateWalletUser:,}</b> đ"
                            
                            
                            socketIo.Emit('System', 'LIXI66TOP')
                            
                            socketIo.Emit('QuanLyNguoiChoi', 'LIXI66TOP')
                            
                            socketIo.Emit('Game', 'LIXI66TOP')
                            
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                            "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            bot.send_message('-1002025011978','1 Đơn cược sổ xố thành công', parse_mode='HTML')
                            bot.send_message('-1002071291215', f'Người chơi {Nickname} cược game sổ xố thành công ✅\n')
                            return
                        
                        else:
                            
                            result_msg =    f"LIXI66.TOP \n\n" \
                                                f"GHI CƯỢC KHÔNG THÀNH CÔNG \n\n"\
                                                f"🍀  Sổ Xố Tele  🍀 \n\n"\
                                                f"┏━━━━━━━━━━━━━┓ \n" \
                                                f"┣➤ ⏱ Thời gian: <b>{DateTime}</b> \n"\
                                                f"┣➤ 💳 Id: <b>{IdUser}</b> \n"\
                                                f"┣➤ 👤 Nickname: <b>{Nickname}</b> \n"\
                                                f"┣➤ Lý do: đang trong quá trình <b>SỔ XỐ</b>, không được <b>ĐẶT CƯỢC</b>"
                                                    
                                                    
                            
                            result_msg +=   '\n👉 Nếu bị lỗi liên hệ admin @Lymannhi' \
                                            "\n┗━━━━━━━━━━━━━┛"
                    
                            bot.send_message(IdUser, result_msg, parse_mode='HTML')
                            return
                            
                            
                            
                    
                    except (ValueError, IndexError):
                        bot.send_message(IdUser,    f'🚫 Nội dung cược sai cú pháp định dạng  \n'
                                                    f'✅ Nội dung cược [Dấu cách] Tiền cược [Dấu cách] Số dự đoán')
                        return
                
                    
                    
                else:
                    keyboard = types.InlineKeyboardMarkup()
                    Url = types.InlineKeyboardButton('🏦 Cập nhập banking',
                                                url=CapNhapBankingUrl)
                    keyboard.row(Url)
                    Msg =   f'⏱ Thời gian hiện tại: {DateTime} \n' \
                            f'💳 ID của bạn: <b>{IdUser}</b> \n' \
                            f'👤 Nickname: <b>{x[5]}</b> \n' \
                            f'💴 Ví: <b>{int(x[10]):,}</b> đ \n' \
                            f'🏦 App banking: <b>bạn chưa cập nhập banking</b> \n' \
                            f'👉 Ấn nút dưới này để cập nhập banking 👇' \
                            f'❗️ Lưu ý: hãy đăng nhập trước hẳn ấn link ở dưới \n' \
                            f'🔗 Link đăng nhập: {DangNhapUrl} \n'
                    
                    bot.send_message(IdUser, Msg, parse_mode='HTML',reply_markup=keyboard)
                    return
                
                
        else:
            keyboard = types.InlineKeyboardMarkup()
            Url = types.InlineKeyboardButton('🎮 Liên kết tài khoản',
                                                url=DangKyUrl)
            keyboard.row(Url)
            
            Msg =   f'❌ Bạn chưa liên kết tài khoản\n\nHãy ấn ở dưới để đăng nhập hoặc đăng ký 👇 \n' 
            bot.send_message(IdUser, Msg,reply_markup=keyboard)
            return



#################################################################################################################################################################




    

@bot.message_handler(func=lambda message: message.from_user.id)
def handler_chat(msg):
    markup = types.ReplyKeyboardMarkup(row_width=2,
                                               one_time_keyboard=False,
                                               resize_keyboard=False)
    markup.add("🎲 Danh sách Game", "👤 Tài khoản", "📜 Event", "🥇 Bảng xếp hạng" , "💴 Nạp tiền" , "💴 Rút tiền")
    bot.send_message(msg.chat.id, f'🎮 Chiến tiếp thôi!!!', reply_markup=markup)


bot.infinity_polling()

