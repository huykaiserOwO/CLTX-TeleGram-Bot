import socketio
import datetime
from Config.DB import DataBase

sio = socketio.SimpleClient()
sio.connect('http://localhost:8000')

class SocketIo():
    
    def __init__(self):
        self.database = DataBase()
        self.TimeDate = datetime.datetime.now().strftime("%H:%M:%S - %d-%m-%Y")
    
    
    # Emit Event
    def Emit(self,emitText, data):
        sio.emit(emitText, data)
        return True