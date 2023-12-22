#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#include <Arduino_JSON.h>
#include <assert.h>

#include <Bonezegei_DHT11.h>

//param = DHT11 signal pin
Bonezegei_DHT11 dht(D4);

const char* ssid = "plamwifi";
const char* password = "12345678";

int V1 = 0;
//Your Domain name with URL path or IP address with path
String serverName = "http://10.120.4.38/espapi/api";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;


String recv_token = "";

void getSimpleToken(){
  String token = "";
  while(token==""){
    
  }
 
  
}

void setup() {
  Serial.begin(115200); 
  pinMode(D1,OUTPUT);
  dht.begin();

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  // Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
  if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;    
      
      http.begin(client,"http://10.120.4.38/espapi/login");
      // http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      http.addHeader("Content-Type", "application/json");

      String httpRequestData = "{\"email\" : \"sworawat@tsu.ac.th\",\"password\" : \"12345678\"}";

			// Send HTTP POST request
      int httpResponseCode = http.POST(httpRequestData);
      Serial.print("httpResponse Code: ");
      Serial.println(httpResponseCode);
      if (httpResponseCode>0) {

        String payload = http.getString();
        //Serial.println(payload);
        JSONVar jsonpayload = JSON.parse(payload);
        Serial.println(jsonpayload["user"]["token"]);
        recv_token = "Bearer " + String(jsonpayload["user"]["token"]); 
              
      

      }else{
        recv_token = "";

      }
      
    }  
  
}

void loop() {
  // Send an HTTP POST request depending on timerDelay
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;

      	// Adding "Bearer " before token		
			// Serial.println(recv_token);
			
			

      String serverPath = serverName + "/Log_last/V1";

      String sendDHT = serverName + "/storeByGET/V2/";
      
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverPath.c_str());
      http.addHeader("Authorization", recv_token);  
      int httpResponseCode = http.GET();
      
      if (httpResponseCode>0) {
        // Serial.print("HTTP Response code: ");
        // Serial.println(httpResponseCode);
        String payload = http.getString();
        JSONVar jsonpayload = JSON.parse(payload);
        V1 = jsonpayload["v_integer"];
        Serial.print("V1:");
        Serial.println(jsonpayload["v_integer"]);
        if(V1){
          digitalWrite(D1,HIGH);
        }else{
          digitalWrite(D1,LOW);
        }

        
        delay(200);

      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
  }
}