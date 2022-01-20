#!/bin/bash
for value in {30..40}
    do
        curl -X POST -F "firstname=$value" -F "lastname=$value" -F "email=$value@$value.it" -F 'pass=12345678' -F 'confirm=12345678' -F 'submit=1' http://localhost/eserciziSAW/gitSAW/web_saw/html/php/registration.php
    done
