import sys
sys.path.append('usr/local/python3.9/dist-package')
import RPi.GPIO as GPIO
import mfrc522
import time
url = "http://localhost"

#Initialize the RFID Reader
MIFAREReader = mfrc522.MFRC522()

# Define a function to read the card and return its ID
def read_card():
    (status, TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)
    if status != MIFAREReader.MI_OK:
        return None
    (status, uid) = MIFAREReader.MFRC522_Anticoll()
    if status != MIFAREReader.MI_OK:
        return None
    card_id = ''.join(str(x) for x in uid)
    return card_id

card_id = read_card()

pyscript.write('UIDCard',card_id)
