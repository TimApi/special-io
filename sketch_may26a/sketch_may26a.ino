
#include <OneWire.h>
#include <DallasTemperature.h>
#define ONE_WIRE_BUS 2
OneWire oneWire(ONE_WIRE_BUS);  
DallasTemperature sensors(&oneWire);

float temp1 = .0;
float temp2 = .0;


void setup(void)
{
  sensors.begin();
  Serial.begin(9600);
}

void loop(void)
{ 
  sensors.requestTemperatures();   
  
  temp1 = sensors.getTempCByIndex(0);
  temp2 = sensors.getTempCByIndex(1);
  Serial.print(temp1);
  Serial.print(";");
  Serial.println(temp2); 
  
  delay(1000);
}
