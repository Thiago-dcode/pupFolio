 Installation guide for windows os

Requirements:
Have composer and docker installed on your local machine.

Clone repo:

git clone https://github.com/Thiago-dcode/pupFolio.git

cd pupFolio

//Backend setup
cd api

//install dependecies
composer install

copy .env.example file and rename it to .env 

In .env on DB_CONNECTION=mysql
set a value for DB_DATABASE, DB_USERNAME, DB_PASSWORD

//dockerize mysql
docker compose up -d

make sure your mysql instance is running

//run migrations
php artisan migrate

//seed db
//sizes
 php artisan db:seed --class=sizeSeeder
 //breeds
  php artisan db:seed --class=breedSeeder
//dogs (optional)
 php artisan db:seed --class=dogSeeder

//link storage with public folder
php artisan storage:link

//run the server
php artisan serve

//frontend setup

in another terminal access the folder pupFolio/front

once inside
//install node dependecies
npm i
//run quasar server
quasar dev





 
