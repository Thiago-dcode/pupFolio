# PupFolio



## Description

PupFolio is a delightful project that showcases a portfolio of adorable puppies. Follow the steps below to set it up on your Windows machine.

## Installation

### Requirements
Make sure you have the following installed on your local machine:

* [Composer](https://getcomposer.org/)
* [Node.js](https://nodejs.org/en)
* [Docker](https://www.docker.com/get-started/)

### Clone this repository

```
git clone https://github.com/Thiago-dcode/pupFolio.git
```

### Navigate into the project
```
cd pupFolio
```


## API Setup

### Navigate to the backend folder:
```
cd api
```

### Install dependencies using Composer:
```
composer install
```
* ####  Copy the **.env.example** file and rename it to **.env.** 

* #### Update the following values in the **.env** file below DB_CONNECTION=mysql:
```
  DB_DATABASE
  DB_USERNAME
  DB_PASSWORD
```
### Dockerize MySQL

***Assuming docker is correctly installed on your local machine, run this command:***

```
docker-compose up -d

```
***Ensure that your MySQL instance is running.***
#### Run migrations:
```
php artisan migrate
```
#### Seed the database with sizes, breeds, and optional dogs:
```
php artisan db:seed --class=sizeSeeder
php artisan db:seed --class=breedSeeder
php artisan db:seed --class=dogSeeder  
```

#### Link storage with the public folder:
```
php artisan storage:link
```

#### Run the server:
```
php artisan serve
```

## Frontend Setup

#### In another terminal, navigate to **frontend** folder:
```
cd pupFolio/front
```


#### Install Node dependencies:
```
npm i
```


#### Finally, run the Quasar server:
```
quasar dev
```
