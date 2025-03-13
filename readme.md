<!-- docker-compose -p mpfit_shop up --build -d -->
git clone https://github.com/fe11fire/mpfit_shop.git .

docker-compose run --rm composer install

docker-compose run --rm artisan migrate:seed

docker-compose up nginx --build -d

http://localhost:8000/
