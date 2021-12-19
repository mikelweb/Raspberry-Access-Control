# arduino-access-control
###### A simple RFID card access control using Arduino+PHP+MySQL

The purpose of this project is to provide a very low cost access control system.

## Behavior
When a card is readed, the reader sends card number to the Arduino, which will make an http request to the web server and will wait for a response.
The web server has a PHP script that is specting to read POST requests.
When it gets an http request, it checks on its database whether that card number is allowed to open that specific door and it will return true or false. It will track right or wrong card numbers by inserting in database.
Arduino will process the response and open the door by activating the relay attached.

## We need:
- RFID 125 KHz Card Reader - https://es.aliexpress.com/item/32836280021.html
- Arduino UNO Wifi Rev.2 - https://tienda.bricogeek.com/arduino-original/1285-arduino-uno-wifi-rev2.html
- 5 VDC Relay - https://es.aliexpress.com/item/32669140447.html
- USB wire A-B https://es.aliexpress.com/item/1005003094802033.html
- Cards* - https://es.aliexpress.com/item/4000045799078.html
- Electric door lock https://es.aliexpress.com/item/4001259674157.html
- Local or remote web server runing a classic WAMP / LAMP setup

*There are more chip formats such as keychains (https://es.aliexpress.com/item/32434392248.html)

## Setup
###### Single responsability principle: Each element does only one thing.

### Card reader
**Card reader** only sends card number to Arduino.
It needs 12 VDC and two data wires conected to Arduino
Make sure your card reader uses **Wiegand26** protocol.

### Arduino
**Arduino** is runing a program that uses [this library](https://github.com/ugge75/Wiegand-V3-Library-for-all-Arduino).
It is waiting to receive a card number from the reader. When it gets one, it makes an http request to the server passing the card number readed and the reader name as parameters. If the response is true, it activates the pin where the relay is connected for 1 second.

### Web server
**Web server** can be a local PC runing Apache, PHP and MySql, or a remote web server with a public domain name.
