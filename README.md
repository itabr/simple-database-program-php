# simple-database-program-phpProject 1A
Therese Horey
Ilya Tabriz


Contains files:

readme.txt
team.txt
create.sql
load.sql
queries.sql
query.php
violate.sql


How to run sql files:

1) Have files in vm-shared

2) Navigate to www directory in virtual machine

3) run command: mysql

4) Change database with USE <database>
   ex: USE TEST

5) run command: SOURCE <filename>
   ex: SOURCE create.sql
   start with create, then load, then queries



How to run PHP server:

1) Have files in vm-shared

2) Navigate to www directory in virtual machine

3) use ifconfig to get the ip address

4) Run php -S 0.0.0.0:8000 query.php
   to run it on localhost use: php -S localhost:8000 query.php

5) put the ip address in browser http:// <IP address> :8000/

