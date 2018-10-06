PWD	= $(shell pwd)

install:
	@docker build -t wordfinder .

composer-install:
	@./scripts/install-composer.sh

configure: composer-install
	@./composer.phar install

docker-run: install
	@docker run -d -p 8080:80 wordfinder

docker-stop:
	@echo "Bringing down Wordfinder..."
	@docker stop $(shell docker ps -q --filter "ancestor=wordfinder")

test-unit:
	docker run -v="${PWD}:/app" -w="/app" -it phalconphp/php:alpine-3-php7 vendor/bin/codecept run unit

test-api: docker-run test-run-api docker-stop

test-run-api:
	@echo "Waiting for API to come up" && sleep 2
	./vendor/bin/codecept run api

test: test-unit test-api