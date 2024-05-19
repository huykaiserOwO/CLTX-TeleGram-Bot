import requests
import datetime

class Request():
    
    def __init__(self):
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
    
    # METHOD GET
    def GET (self, URL = None, Headers = None):
        Data = requests.get(URL, Headers)
        return {
            'Status' : Data.status_code,
            'ResponseData' : Data.text
        }
    
    # METHOD POST
    def POST (self, URL = None, Json = None, Headers = None):
        Data = requests.post(URL, Json, Headers)
        return {
            'Status' : Data.status_code,
            'ResponseData' : Data.text
        }