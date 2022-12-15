
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
WiFiClient wifiClient;

const char* ssid     = "Cisco1438_2.4G";
const char* password = "14381438";

void setup() 
{
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) 
  {
    delay(1000);
    Serial.println("Connecting...");
  }
}

void loop() 
{
  sendGet();
  sendPost();
  delay(5000);
}

void sendGet(){
  if (WiFi.status() == WL_CONNECTED) 
  {
    HTTPClient http; //Object of class HTTPClient
    http.begin(wifiClient,"http://smartfarm.chs.ac.th/api/plant/test");
    int httpCode = http.GET();

    if (httpCode > 0) 
    {
      const size_t bufferSize = JSON_OBJECT_SIZE(2) + JSON_OBJECT_SIZE(3) + JSON_OBJECT_SIZE(5) + JSON_OBJECT_SIZE(8) + 370;
      DynamicJsonBuffer jsonBuffer(bufferSize);
      JsonObject& root = jsonBuffer.parseObject(http.getString());
 
      const char* moise = root["moise"]; 


      Serial.print("moise:");
      Serial.println(moise);

    }
    http.end(); //Close connection
  }
}

void sendPost(){
  if (WiFi.status() == WL_CONNECTED)  {
  HTTPClient http; //Object of class HTTPClient
  http.begin(wifiClient,"http://smartfarm.chs.ac.th/api/plant/test");
  http.addHeader("Content-Type", "application/json");
  int httpCode = http.PUT("{moise:50}");
  if (httpCode > 0) {
    String response = http.getString();
    Serial.println(response);
    } 
    else {
      Serial.printf("[HTTP] POST... failed, error: %s\n", http.errorToString(httpCode).c_str());
  }
  http.end();
}
}
