#!/bin/sh
currentpwd=$(pwd)
# create log files
mkdir -p data/logs
[ -e "data/logs/access.log" ] || touch "data/logs/access.log"
[ -e "data/logs/error.log" ] || touch "data/logs/error.log"

if [[ $1 == '' ]]; then
    echo "Please use one of the following (dev/stg/prd)"
    exit 0;
fi

if [[ $1 == 'stg' || $1 == 'dev' ]]; then
    cd docker && docker-compose -f docker-compose.yml -f docker-compose.$1.yml up -d
else
    cd docker && docker-compose up -d
fi

##Ensuring Perms are correct
cd $currentpwd && sudo chown -R  $USER: code/

if [[ $1 == 'stg' || $1 == 'dev' ]]; then
    docker exec -it $(cd docker && docker-compose -f docker-compose.yml -f docker-compose.$1.yml config | grep 'container_name:' | cut -d":" -f 2)  \
    sh -c "php -r \"copy('https://getcomposer.org/installer', '/var/www/html/composer-setup.php');\" \
      && php /var/www/html/composer-setup.php \
      && /var/www/html/composer.phar install \
      && rm /var/www/html/composer.phar /var/www/html/composer-setup.php"
else
    docker exec -it $(cd docker && docker-compose config | grep 'container_name:' | cut -d":" -f 2)  \
    sh -c "php -r \"copy('https://getcomposer.org/installer', '/var/www/html/composer-setup.php');\" \
      && php /var/www/html/composer-setup.php \
      && /var/www/html/composer.phar install \
      && rm /var/www/html/composer.phar /var/www/html/composer-setup.php"
fi
