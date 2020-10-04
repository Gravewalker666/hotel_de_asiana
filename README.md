# Hotel de Asiana
SCS 1203 - Take Home Group Assignment

## Setup Local Environment

### Prerequisites

* MySQL 8 or higher
* PHP 
* Apache server

### Steps

1. Clone your forked `hotel_de_asiana` repository
```
> git clone https://github.com/<your-user-name-here>/hotel_de_asiana.git
```

2. Create database
```
> cd hotel_de_asiana
> mysql -u root -p < scripts\hotel_de_asiana.sql
```
Note: Enter your mysql root password when prompt

3. Create users and grant privileges
```
> mysql -u root -p < scripts\user_privileges.sql
```
Note: Enter your mysql root password when prompt
