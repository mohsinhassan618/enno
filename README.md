# Enno Digital Project Configuration

## Virtual Host
Please create a virtual host and make sure local the domain points to the public folder inside
the repository **Not the root of the repository**


```
C:\SomeAddress\ProjectRoot\public"
Following is my configuration
C:\xampp\htdocs\ennotest\public"
```
 
## Install Project Dependencies 
Please run the following command to install project dependencies from project root where composer.json is located.
This also requires composer to be installed globally 
 
 ```
 composer install
 ```
 
## Create the .env File for Laravel Configuration
This command will copy the .env file from .env.example from project root.
You can also manually copy and rename that file 
 
  ```
  cp .env.example .env
  ```
  
## Generate the Application Key
Please run the following command
  
   ```
   php artisan key:generate
   ```
    
## Configure the database credentials in .env File
Please create the DB and update the following variables in .env file you can also configure the other env variables 
    
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=enno
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   
## Run database migration command 
This command will create all the database tables/structure required for the project
   ```
   php artisan migrate
   ```
 
## Populate database with dummy users data
I am using fzaninotto/faker library to create the fake users data. Please run the following command
   ```
   php artisan db:seed
   ```
 
## Application is deployed on a test server.  
I have setup the application on a demo environment. 
   ```
   Please visit: http://ennodigital.herokuapp.com
   ```
## Done :)