.DEFAULT_GOAL := do_nothing

do_nothing:
	echo 'Nothing to do'

.PHONY: run
run:
	@echo -e "\n\n# Run statbench without any parameters"
	@echo "============================="
	./statbench.sh "php ./bin/statbench"

.PHONY: phpunit
phpunit:
	@echo -e "\n\n# Run phpunit tests"
	@echo "============================="
	./statbench.sh "./vendor/bin/phpunit"

.PHONY: composer-install
composer-install:
	@echo -e "\n\n# Composer install"
	@echo "============================="
	./statbench.sh "composer install"

.PHONY: composer-update
composer-update:
	@echo -e "\n\n# Composer update"
	@echo "============================="
	./statbench.sh "composer update"
