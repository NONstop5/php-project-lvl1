install:
	composer install

validate:
	composer validate

dump:
	composer dump-autoload -o

lint:
	composer exec --verbose phpcs -- --standard=PSR12 --colors src bin

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 --colors src bin

phpstan:
	vendor/bin/phpstan analyse

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime
