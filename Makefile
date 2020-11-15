.DEFAULT_GOAL := do_nothing

do_nothing:
	echo 'Nothing to do'

build:
	docker build -t php-cli-statbench-dev:latest .

#composer:
#	docker run -it \
#	--name=statbench \
#	-v $(pwd):/app \
#	php-cli-statbench-dev \
#	composer dump-autoload
