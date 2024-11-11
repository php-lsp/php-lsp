#!/bin/sh
set -eu

# cleanup previous vendor files
rm -rf vendor

# ensure that deps will work on lowest supported PHP version
composer config platform.php 8.1

# install package deps without dev-deps / remove already installed dev-deps
# box can ignore dev-deps, but dev-deps, when installed, may lower version of prod-deps
COMPOSER_MIRROR_PATH_REPOS=1 composer update --optimize-autoloader --no-interaction --no-progress --no-scripts --no-dev
composer info -D | sort

chmod +x bin/lsp

bin/lsp cache:clear --env=prod
bin/lsp cache:warmup --env=prod

# install box/phar
mkdir -p build/bin
if [ ! -x build/bin/box ]; then
    wget -O build/bin/box "https://github.com/box-project/box/releases/download/4.1.0/box.phar"
    chmod +x build/bin/box
fi
build/bin/box --version

# build phar file
build/bin/box compile

# cleanup previous vendor files
rm -rf vendor

composer update
