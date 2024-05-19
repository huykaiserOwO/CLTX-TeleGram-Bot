from Config.DB import DataBase
import datetime
import random
import json
import requests

class Tele():
    
    def SEND_GROUP(self,Text):   
        url = "https://api.telegram.org/bot6562374329%3AAAGpe0dZVpJzkMJf2LUVvg1zT-GytH02YQU/sendMessage"

        payload = {
            "text": Text,
            "parse_mode": "HTML",
            "disable_web_page_preview": False,
            "disable_notification": False,
            "reply_to_message_id": None,
            "chat_id": '-1002071291215'
        }
        headers = {
            "accept": "application/json",
            "User-Agent": "Telegram Bot SDK - (https://github.com/irazasyed/telegram-bot-sdk)",
            "content-type": "application/json"
        }
        return
    
        
