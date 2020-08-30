<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


# Hanoti-API for manage small business stores

## Features of this API

### 1 -  Authentication

  * [X] Install and Setting up Jwt-auth Package
      if you fork it you need an jwt key by run this command 
      __php artisan jwt:secret__
  * [X] Login and Register Functions
  * [X] Get user Logted Details and Logout Functions
  * [X] Test all Functions with Postman
  * [ ] ....

### 2 - Access Control List (Roles)

  * [X] Install and setting up spatie laravel permissions package
  * [X] create a admin , manager and cashier users
  * [X] assign every users with role
  * [X] Admin Role manage Users (Create,Read,Delete)
  * [X] Admin Role manage Roles and Permissions
  * [ ] Create factory and seed for Users
  * [ ] ....

### 3 - Products Management Module
  * [X] CRUD Products
  * [X] CRUD Categoty Products
  * [X] CRUD Unit Products
  * [X] Relation : Categoty hasMany Products => Product belongToOne Categoty
  * [X] Relation : Unit belongToOne Product => Product hasOne Unit 
  * [X] Create factory and seed for Products
  * [X] Create factory and seed for Categoties
  * [X] Create factory and seed for Units
  * [X] test all route with Postman
  * [ ] ....

### 4 - Customer Management Module
  * [X] CRUD Customers
  * [X] Relation : Customer hasMany Sales
  * [X] Create factory and seed for Customer
  * [X] test CRUD Customers route with Postman

### 5 - Provider Management Module
  * [X] CRUD Providers
  * [X] Relation : Provider hasMany Purchases
  * [X] Create factory and seed for Provider
  * [X] test CRUD Providers route with Postman

### 6 - Expense and Salary Management Module
  * [ ] CRUD Expenses
  * [ ] Create factory and seed for Expense
  * [ ] test CRUD Expenses route with Postman
  * [ ] CRUD Salary
  * [ ] Create factory and seed for Salary
  * [ ] test CRUD Salary route with Postman

### 7 - Purchase Management Module
  * [ ] CRUD Purchases
  * [ ] Relation : Purchase belongTo Provider
  * [ ] Create factory and seed for Purchase
  * [ ] test CRUD Purchases route with Postman

### 8 - Sale Management Module
  * [ ] CRUD Sales
  * [ ] Relation : Sale belongTo Customer
  * [ ] Create factory and seed for Sale
  * [ ] test CRUD Sales route with Postman

### 10 - Generate Reports for all Modules
### 11 - Generate Activity Log
### 12 - backup and restore database
### 12 - Desktop app using elecron.js

