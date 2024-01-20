PupFolio

PupFolio is a project that showcases a portfolio of adorable puppies. Follow the steps below to set it up on your Windows machine.
Installation Guide for Windows OS
Requirements

Make sure you have the following installed on your local machine:

    Composer
    Docker

Clone Repository

bash

git clone https://github.com/Thiago-dcode/pupFolio.git
cd pupFolio

Backend Setup

Navigate to the backend folder:

bash

cd api

Install dependencies using Composer:

bash

composer install

Copy the .env.example file and rename it to .env. Update the following values in the .env file under DB_CONNECTION=mysql:

    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD

Dockerize MySQL

bash

docker-compose up -d

Ensure that your MySQL instance is running.

Run migrations:

bash

php artisan migrate

Seed the database with sizes, breeds, and optional dogs:

bash

php artisan db:seed --class=sizeSeeder
php artisan db:seed --class=breedSeeder
php artisan db:seed --class=dogSeeder  # Optional

Link storage with the public folder:

bash

php artisan storage:link

Run the server:

bash

php artisan serve

Frontend Setup

In another terminal, access the frontend folder:

bash

cd pupFolio/front

Install Node dependencies:

bash

npm i

Run the Quasar server:

bash

quasar dev

Now, you should have the PupFolio project up and running on your local machine. Access it through your browser at http://localhost:8080.

Feel free to explore and enjoy the adorable puppies in your portfolio!
