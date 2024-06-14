# Use a imagem oficial do PHP como base
FROM php:8.0-fpm

# Atualize os pacotes e instale as dependências necessárias
RUN apt-get update \
    && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copie o arquivo de configuração do PHP customizado
# COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /var/www

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie e instale as dependências do Laravel
COPY . /var/www
RUN composer install --no-dev

# Copie o arquivo de configuração do Laravel (opcional, se necessário)
# COPY .env.example .env

# Rodar as migrações do Laravel
# RUN php artisan migrate --force

# Exponha a porta 9000 para o servidor web Nginx
EXPOSE 9000

# Comando padrão para iniciar o servidor PHP-FPM
CMD ["php-fpm"]
