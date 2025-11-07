DC = docker compose

.DEFAULT_GOAL      = help

.PHONY: help
help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' Makefile | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

### DEV
.PHONY: build
build: ## Build image
	$(DC) build

.PHONY: init
init: up ## Init application
	@$(DC) exec php composer install

.PHONY: up
up: ## Start the project docker containers
	@$(DC) up -d

.PHONY: down
down: ## Down the docker containers
	@$(DC) down --timeout 5

.PHONY: shell
shell: ## Run shell in php container
	@$(DC) exec -it php bash

.PHONY: serve
serve:
	@$(DC) exec -it php sh -c "./bin/rr serve -c ./.rr.dev.yaml"
