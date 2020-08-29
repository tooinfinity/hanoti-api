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
  * [] ....

### 2 - Access Control List (Roles)

  * [X] Install and setting up spatie laravel permissions package
  * [X] create a admin , manager and cashier users
  * [X] assign every users with role
  * [X] Admin Role manage Users (Create,Read,Delete)
  * [X] Admin Role manage Roles and Permissions
  * [] Create factory and seed for Users
  * [] ....

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
  * [] ....

