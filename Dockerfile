FROM php:8.2-cli-alpine

### Install dependencies
RUN apk update \
 && apk upgrade \
    # PHPIZE_DEPS: autoconf dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c
 && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
    linux-headers \
#    curl \
### Install PECL extensions
 && pecl install \
    xdebug-3.2.2 \
### Enable extensions
 && docker-php-ext-enable \
    xdebug \
### Delete dependencies
 && apk del \
    .phpize-deps \
### Make sure PHP's source files are deleted
 && docker-php-source delete \
### Clear cache
 && rm -rf /var/cache/apk/* \
### Use the default development configuration
 && mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" \
### Configure Xdebug
 && echo '[xdebug]'                            >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'zend_extension=xdebug.so'            >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.mode=develop,coverage,debug'  >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_depth=5'      >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_children=256' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_data=1024'    >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.profiler_enabled=0'           >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.log=/tmp/xdebug.log'          >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.log_level=7'                  >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.start_with_request=yes'       >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.discover_client_host=0'       >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.client_port=9000'             >> /usr/local/etc/php/conf.d/xdebug.ini \
### Install Composer
 && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

EXPOSE 9000
