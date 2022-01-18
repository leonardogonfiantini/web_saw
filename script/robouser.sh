#!/bin/bash
for value in {1..10}
    do
        curl -X POST -F "firstname=$value" -F "lastname=$value" -F "email=$value@$value.it" -F 'pass=12345678' -F 'confirm=12345678' -F 'button1=1' http://localhost/eserciziSAW/gitSAW/Progetto-SAW/html/php/registration.php
    done
