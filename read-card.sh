#!/bin/bash
while : ; do
read cardNumber
wget http://192.168.1.5/read-card.php?cardNumber=${cardNumber}
done