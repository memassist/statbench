FROM php:7.4-cli-alpine

### Install dependencies
RUN apk update \
 && apk upgrade \
    # PHPIZE_DEPS: autoconf dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c
 && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
#    curl \
### Install PECL extensions
 && pecl install \
    xdebug-2.9.7 \
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
 && echo 'xdebug.default_enable=1'             >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_depth=5'      >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_children=256' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.var_display_max_data=1024'    >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.profiler_enabled=0'           >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_enable=1'              >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_autostart=0'           >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_connect_back=0'        >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_mode=req'              >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_handler="dbgp"'        >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_host="docker.for.win.host.internal"' >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.remote_port=9000'             >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.idekey=PHPSTORM'              >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo 'xdebug.max_nesting_level=256'        >> /usr/local/etc/php/conf.d/xdebug.ini
### Install Composer
# && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
