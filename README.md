# raspberry-access-control
###### A simple RFID card access control using RaspberryPi+PHP+MySQL

The purpose of this project is to provide a very low cost access control system.

## Behavior
When a card is near the reader, raspberry pi gets the card number and makes an http request to the web server and waits for a response.
The web server has a PHP script that is specting to read a GET request.
When it gets an http request, it checks on its database whether that card number is allowed to open that specific door and it will return true or false. It will track right or wrong card numbers by inserting in the database.
Arduino will process the response and open the door by activating the relay attached.

## We need:
- USB RFID 125 KHz Card Reader - https://es.aliexpress.com/item/32787717670.html
- Raspberry Pi (model zero, 2b, 3, 3b, 4, 4b) - https://es.aliexpress.com/item/4000054878108.html
- 5 VDC Relay - https://es.aliexpress.com/item/32669140447.html
- Cards* - https://es.aliexpress.com/item/4000045799078.html
- Electric door lock https://es.aliexpress.com/item/4001259674157.html
- Local or remote web server runing a classic WAMP/LAMP setup

*There are more chip formats such as keychains (https://es.aliexpress.com/item/32434392248.html)

## Setup
###### Single responsability principle: Each element does only one thing.

### Card reader
**Card reader** only types the card number to the Raspberry like a keyboard does.
It only needs a mini USB cable conected to Raspberry, usually provided with the card reader.

### Raspberry
**Raspberry** is runing raspbian or linux debian in console mode, configured to automatically log in and automatically run a bash script. This script is waiting to read a card number from the ~~keyboard~~ reader. When it gets one, it makes an http GET request to the server passing the card number readed and the reader name as parameters. If the response is true, it activates the pin where the relay is connected for 1 second.

### Web server
**Web server** can be the Raspberry itself, a local PC runing Apache, PHP and MySql, or a remote web server with a public domain name.
