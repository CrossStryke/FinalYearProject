import random
url="http://localhost/rfid/test.html"
def generateRandomNumber():
    return random.randint(0,9) 

pyscript.write('labelTag',generateRandomNumber())