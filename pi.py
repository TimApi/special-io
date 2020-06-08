import serial
import MySQLdb as mdb
import schedule

uno = serial.Serial("/dev/ttyACM0")
uno.baudrate=9600
def insert():
    print("Start")
    data = str(uno.readline()).strip("b").strip("'").replace("\\","").replace("rn","").split(";")
    temp1 = float(data[0].strip("\\"))
    temp2 = float(data[1].strip("\\"))
    tempAvg = ((temp1+temp2)/2)
    print("Temp1: "+str(temp1))
    print("Temp2: "+str(temp2))
    print("Avg: "+str(tempAvg))
    dbh = mdb.connect("127.0.0.1","root","root","thermometer")
    with dbh:
        sth = dbh.cursor()
        sth.execute("INSERT INTO temperatuur (thermo1,thermo2,therm_avg) VALUES(%s,%s,%s);",(temp1,temp2,tempAvg))
        dbh.commit()
        sth.close()
            
schedule.every(5).seconds.do(insert)

while True:
    schedule.run_pending()
