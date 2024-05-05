DC = docker compose

.DEFAULT_GOAL      = help

.PHONY: help
help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' Makefile | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

### DEV
.PHONY: app-build app-init up down
app-build: ## Build image
	$(DC) build

app-init: up ## Init application
	@$(DC) exec php composer install

up: ## Start the project docker containers
	@$(DC) up -d

down: ## Down the docker containers
	@$(DC) down --timeout 5

.PHONY: shell
shell: ## Run shell in php container
	@$(DC) exec -it -u appuser php bash
