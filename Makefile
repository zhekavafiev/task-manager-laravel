server:
	php artisan serve

lint:
	composer run-script phpcs -- -n --standard=PSR12 app/ tests/ routes/ resources/

test:
	php artisan config:clear 
	composer run-script phpunit tests -- --coverage-clover ./build/logs/clover.xml

deploy:
	git push heroku master

install:
	composer install
	npm install
	cp -n .env.example .env || true
	touch project4
	php artisan config:cache
	php artisan key:generate
	php artisan migrate
	php artisan db:seed

test-ci:
	php artisan config:clear
	composer run-script phpunit tests -- --coverage-clover ./build/logs/clover.xml

clear:
	php artisan cache:clear
	php artisan config:cache
	php artisan view:clear
