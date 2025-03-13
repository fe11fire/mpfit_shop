<!-- docker-compose -p mpfit_shop up --build -d -->
git clone https://github.com/fe11fire/mpfit_shop.git .

docker-compose up nginx --build -d

docker-compose run composer install


cd src
npm i


create database shop
