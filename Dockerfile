FROM php:8.2.11-fpm

# Install important libraries
RUN apt update  && apt install -y \
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
    libxml2-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Postgre PDO
RUN apt install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
# setup GD extension
RUN apt update && apt install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev && \
    docker-php-ext-configure gd --enable-gd --with-webp --with-jpeg \
    --with-xpm --with-freetype && \
    docker-php-ext-install -j$(nproc) gd && \
    rm -rf /var/lib/apt/lists/*
RUN mkdir /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 22.3.0
RUN curl https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

WORKDIR /var/www/stroygrad

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/stroygrad

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/stroygrad


# Change current user to www
USER www

# RUN npm i
# RUN npm run build
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

