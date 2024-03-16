FROM php:8.3.4-fpm


# Instalando Composer
RUN echo "Install COMPOSER"
RUN cd /tmp \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php


# Instalando extensões requeridas do PHP
RUN docker-php-ext-install pdo pdo_mysql


# Atualizando o gerenciador de pacotes e instalando ferramentas úteis
RUN apt-get update && apt-get -y install apt-utils nano wget dialog vim


# Instalando libs uteis
RUN echo "Instalando libs uteis"
RUN apt-get -y install --fix-missing \
    apt-utils \
    build-essential \
    git \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libzip-dev \
    zip \
    libbz2-dev \
    locales \
    libmcrypt-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev


# Instalando Postgres PDO (ajuste para Windows, se necessário)
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql


# Limpando arquivos temporários
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# definindo diretório de trabalho
WORKDIR /var/www


# Expondo a porta 9000
EXPOSE 9000


# Definindo o ponto de entrada
CMD ["php-fpm"]