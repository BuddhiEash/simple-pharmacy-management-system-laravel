# Scenario

### A pharmacy with the stakeholders involved are the owner, manager and cashier requires a system to streamline its business processes, involving authentication, medication inventory management, and customer record management. The system needs to enforce user roles and permissions for different actions.

### Requirements for the new system:
### Authentication System:
#### o Implement user authentication using username and password.
#### o User model should include fields like Name, Username, Password, and Role.
#### o Additional fields may be included as needed.

### Medication Inventory Management:
#### o Implement CRUD operations for managing medication inventory.
#### o Each medication record should have fields for Name, Description, Quantity, and any other relevant fields.
#### o Soft delete functionality should be implemented for medication records.

### Customer Record Management:
#### o Implement CRUD operations for managing customer records.
#### o Each customer record should include necessary details.
#### o Soft delete functionality should be implemented for customer records.

### User Role-Based Access Control:
#### o All users can query medication and customer records.
#### o Only the Owner can perform CRUD operations and permanent deletion of records.
#### o Managers can update and soft delete records but cannot insert or permanently delete.
#### o Cashiers can update records but cannot insert or delete.

# Outcome
1. REST API using Laravel:
##### o Utilize Laravel framework to build the RESTful API.
##### o Database interactions should be managed using Laravel's Eloquent ORM.
##### o SQLite database may be used for storing test data or you may use mock data.

2. Database Schema and Models:
##### o Provide an Entity-Relationship (ER) diagram representing the database schema.
##### o Include models for user, medication, and customer entities.

3. Postman Collection:
##### o A Postman collection with endpoints for API testing.

# Setup Guide

## Clone the repository

* Clone the repository to local development environment by using: 
```
git clone 
```

## Install Dependencies

* Install the dependencies using:
```
composer install
```

## Setup .env file

* Copy the .env.example and rename to .env

## Generate APP KEY for the .env

* Generate an app key using:
```
php artisan key:generate
```

## Database Setup

* The app is using the inbuilt SQLite DB. So no need to worry about the database connection.

### Run Migrations

```
php artisan migrate:fresh
```

### Run Seeders

```
php artisan db:seed
```

* Setup the dev server using:
```
php artisan serve
```

* The app will be runnning on port 8000 with the following base url:
```
http://127.0.0.1:8000
```

### Test User Accounts & Roles
```
User Role - Owner
Username - j_smith
Password - j_smith@123

User Role - Manager
Username - a_taylor
Password - a_taylor@123

User Role - Cashier
Username - w_white
Password - w_white@123
```


## Explore API Endpoints with Postman

* Download the Postman collection and enviornment variables - [Dropbox Link](https://www.dropbox.com/scl/fo/r445bqy76cnpv8bw7j7em/AFE7DMK5J3F5bwo3EaemjQU?rlkey=b5q7f2lp1kcdo99rj9sec76wx&st=ym2w25jg&dl=0) 
* Import the both postman collection and enviornment variables to the postman
* Once imported the environment variables, and once getting an API token after a successful login to the application, you can update the 'token' value in the enviornment variables with the received API token, and the change will be refelcted across all the api calls.

## ER Diagram

* [Dropbox Link](https://www.dropbox.com/scl/fi/nr0penn6pu6y8rftcqjk7/Wire-Apps-ER-Diagram.jpg?rlkey=xkl59m4jmbrpwkukibcta900c&st=kcplk27l&dl=0)
