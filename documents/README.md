# Documents

Here is the project documents. 

All the application version, tools, directories, ....

## Tools
- Backend
    - Laravel
- Frontend
    - Blade
    - HTML
    - CSS
    - JavaScript
    - Bootstrap

## Versions 
- Laravel 4.2.8
- MySQl (any)
- PHP 8.0.7
- Composer 2.3.1
- HTML 5
- CCS 3
- Bootstrap 4

## External Libraries
- Faker for creating fake data in seeders
- Debugbar for project debugging 
- Ajax for sending HTTP requests to front
- jQuery for front managing


## Project features
- Using laravel controllers
  - Resource controllers 
  - Invoke controllers
- Middlewares 
- Validations
  - Using laravel form requests
- Routing 
  - Using resource routes with middlewares 
- Authentication
  - Admin authentication
  - User authorize
- Storage
  - File managing
  - Disk and link storage
- Eloquent 
  - Morph relations
  - Eloquent joins 
  - Relation models
  - Soft delete
- Database
  - Laravel Eloquent models
  - Many to many relations
  - One to many relations 
  - Migrations
- Admin 
  - Main Panel
  - CRUD users
  - CRUD posts
  - CRUD tags
  - CRUD categories
- Post
  - Publish / Draft posts
  - Update posts and images
  - Post tags and categories
  - Posts soft delete
- User
  - Like
  - Comment
  - Love
  - Save
  - CRUD posts
  - View post
  - View user
  - Profile update
  - Recently deleted
  - Drafts
- Search by keywords
- Debugging

## Install commands

Initialize:
```shell
$ git clone https://github.com/amirhnajafiz/Lara-Blog.git
$ cd lara-blog
```

Composer:
```shell
$ composer install
```

Server:
```shell
$ php artisan serve
```

After you created a database and set <i>.evn</i> file.<br />
Database:
```shell
$ php artisan migration --seed
```

Then you will have your website available on:<br />
<b> http://127.0.0.1:8000 </b>