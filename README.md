# Hotel De Asiana
SCS 1203 - Take Home Group Assignment

Hotel De Asiana is a php based web app designed to demonstrate the funcationalities of sql roles and user account previlleges.  

## Setup Local Environment

### Prerequisites

* MySQL 8 or higher
* PHP 

### Steps

1. Clone your forked `hotel_de_asiana` repository
```
> git clone https://github.com/<your-user-name-here>/hotel_de_asiana.git
```

2. Create database
```
> cd hotel_de_asiana
> mysql -u root -p < scripts/hotel_de_asiana.sql
```
Note: Enter your mysql root password when prompt

3. Create users and grant privileges
```
> mysql -u root -p < scripts/user_privileges.sql
```
Note: Enter your mysql root password when prompt

4. Deploy app to the server
```
> php -S localhost:8080
```

5. Add test data (Optional)
```
> mysql -u root -p < scripts/test_data.sql
```

**Open http://localhost:8080 on a web-browser to use the app**