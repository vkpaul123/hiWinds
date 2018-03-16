#include <SoftwareSerial.h>

SoftwareSerial SIM900(8, 7);    //  TX, RX

//  MASTER

#include <Wire.h>
#include <dht.h>
dht DHT;

#define DHT11_PIN A0

#define PAYLOAD_SIZE 2 			// how many bytes to expect from each I2C salve node
#define NODE_MAX 5 				// maximum number of slave nodes (I2C addresses) to probe
#define START_NODE 2 			// The starting I2C address of slave nodes
#define NODE_READ_DELAY 2000 	// Some delay between I2C node reads

int nodePayload[PAYLOAD_SIZE];

void setup()
{
	SIM900.begin(9600);
	Serial.begin(9600);  
	Serial.println("MASTER READER NODE");
	Serial.print("Maximum Slave Nodes: ");
	Serial.println(NODE_MAX);
	Serial.print("Payload size: ");
	Serial.println(PAYLOAD_SIZE);
	Serial.println("***********************");
	delay(10000);

	Wire.begin();        // Activate I2C link
}

void loop()
{
	for (int nodeAddress = START_NODE; nodeAddress <= NODE_MAX; nodeAddress++) { 	// we are starting from Node address 2
		Wire.requestFrom(nodeAddress, PAYLOAD_SIZE);    							// request data from node#
		if(Wire.available() == PAYLOAD_SIZE) {  									// if data size is avaliable from nodes
			for (int i = 0; i < PAYLOAD_SIZE; i++)
				nodePayload[i] = Wire.read();  			// get nodes data
			for (int j = 0; j < PAYLOAD_SIZE; j++)
				Serial.println(nodePayload[j]);   		// print nodes data   
			Serial.println("*************************");
			delay(1000);
		}

		DHT.read11(DHT11_PIN);
 
		Serial.print("Temperature = ");
		String tempStr = String(DHT.temperature);
		Serial.println(tempStr);
		Serial.print("Humidity = ");
		String humStr = String(DHT.humidity);
		Serial.println(humStr);    
		String windmillId = String(nodePayload[0]);
		float windmillVoltF = nodePayload[1] * (5.0/256.0);
		String windmillVolt = String(windmillVoltF);

		String url = String("AT+HTTPPARA=\"URL\",\"http://highwinds.herokuapp.com/store/"+ windmillId + "/"+ windmillVolt + "/" + humStr + "/" + tempStr + "\"");
		Serial.println("*************************");
		Serial.println("HTTP get method :");

		Serial.print("AT+CGATT?\\r\\n");
		SIM900.println("AT+CGATT?");		/* Check Communication */
		delay(250);
		ShowSerialData(); 					/* Print response on the serial monitor */
		delay(250);

		Serial.print("AT+CMEE=2\\r");
		SIM900.println("AT+CMEE=2"); 		/* Check Communication */
		delay(250);
		ShowSerialData(); 					/* Print response on the serial monitor */
		delay(250);

		/* Configure bearer profile 1 */
		Serial.print("AT+SAPBR=3,1,\"CONTYPE\",\"GPRS\"\\r\\n");    
		SIM900.println("AT+SAPBR=3,1,\"CONTYPE\",\"GPRS\"");  	/* Connection type GPRS */
		delay(250);
		ShowSerialData();
		delay(250);

		Serial.print("AT+SAPBR=3,1,\"APN\",\"WAPSOUTH.CELLONE.IN\"\\r\\n"); 
		SIM900.println("AT+SAPBR=3,1,\"APN\",\"WAPSOUTH.CELLONE.IN\""); 	/* APN of the provider */
		delay(250);
		ShowSerialData();
		delay(250);

		Serial.print("AT+SAPBR=3,1,\"USER\",\"PPP\"\\r\\n");  
		SIM900.println("AT+SAPBR=3,1,\"USER\",\"PPP\""); 		/* APN of the provider */
		delay(250);
		ShowSerialData();
		delay(250);

		Serial.print("AT+SAPBR=3,1,\"PWD\",\"PPP123\"\\r\\n");  
		SIM900.println("AT+SAPBR=3,1,\"PWD\",\"PPP123\""); 		/* APN of the provider */
		delay(500);
		ShowSerialData();
		delay(500);

		Serial.print("AT+SAPBR=1,1\\r\\n");
		SIM900.println("AT+SAPBR=1,1"); 		/* Open GPRS context */
		delay(1000);
		ShowSerialData();
		delay(500);

		Serial.print("AT+SAPBR=2,1\\r\\n");
		SIM900.println("AT+SAPBR=2,1"); 		/* Query the GPRS context */
		delay(1000);
		ShowSerialData();
		delay(1000);

		Serial.print("AT+HTTPINIT\\r\\n");
		SIM900.println("AT+HTTPINIT"); /* Initialize HTTP service */
		delay(500); 
		ShowSerialData();
		delay(500);

		//  Serial.print("AT+HTTPPARA=\"PROIP\",\"10.31.54.2\"\\r\\n");
		//  SIM900.println("AT+HTTPPARA=\"PROIP\",\"10.31.54.2\"");  /* Set parameters for HTTP session */
		//  delay(5000);
		//  ShowSerialData();
		//  delay(5000);
		//
		//  Serial.print("AT+HTTPPARA=\"PROPORT\",\"9401\"\\r\\n");
		//  SIM900.println("AT+HTTPPARA=\"PROPORT\",\"9401\"");  /* Set parameters for HTTP session */
		//  delay(5000);
		//  ShowSerialData();
		//  delay(5000);

		Serial.print("AT+HTTPPARA=\"CID\",1\\r\\n");
		SIM900.println("AT+HTTPPARA=\"CID\",1");  	/* Set parameters for HTTP session */
		delay(1000);
		ShowSerialData();
		delay(500);

		Serial.println(url);
		SIM900.println(url);  	/* Set parameters for HTTP session */
		delay(1000);
		ShowSerialData();
		delay(500);

		Serial.print("AT+HTTPACTION=0\\r\\n");
		SIM900.println("AT+HTTPACTION=0");  	/* Start GET session 10000 */
		delay(3000);
		ShowSerialData();
		delay(500);

		Serial.print("AT+HTTPREAD\\r\\n");
		SIM900.println("AT+HTTPREAD");  	/* Read data from HTTP server 8000 */
		delay(3000);
		ShowSerialData();
		delay(500);

		Serial.print("AT+HTTPTERM\\r\\n");  
		SIM900.println("AT+HTTPTERM");  	/* Terminate HTTP service */
		delay(500);
		ShowSerialData();
		delay(500);

		Serial.print("AT+SAPBR=0,1\\r\\n");
		SIM900.println("AT+SAPBR=0,1"); 	/* Close GPRS context */
		delay(500);
		ShowSerialData();
		delay(250);
	}
//	delay(NODE_READ_DELAY);/
}

void ShowSerialData()
{
	while(SIM900.available()!=0)  				/* If data is available on serial port */
		Serial.write(char (SIM900.read())); 	/* Print character received on to the serial monitor */
}
