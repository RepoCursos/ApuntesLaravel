# Usamos la imagen oficial de PHP con FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Acepta el UID y GID como argumentos. Si no se proporcionan, usarán 1000 por defecto.
ARG UID=1000
ARG GID=1000

# Instalar dependencias necesarias (extensiones de PHP y herramientas del sistema)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    curl \
    nano \
    build-essential \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql bcmath\
    && apt-get clean

# Node.js (versión moderna) y npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer (gestor de dependencias para PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crear usuario
RUN groupadd --gid ${GID} laravel && \
    useradd --uid ${UID} --gid laravel --create-home --shell /bin/bash laravel

# Establecer el directorio de trabajo en /var/www
WORKDIR /var/www

# si es un proyecto nuevo de laravel omitimos el COPY, sino lo descomentamos
# Copiar los archivos de la aplicación al contenedor (asegúrate de usar .dockerignore para excluir archivos innecesarios)
# COPY . /var/www
# RUN chown -R laravel:laravel /var/www

# Crear los directorios necesarios si no existen NOTA: Si no funciona sacar /html/
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R laravel:laravel /var/www && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar el directorio html antes de usarlo
RUN rm -rf /var/www/html/*

# CAMBIAR AL NUEVO USUARIO ANTES DE COPIAR ARCHIVOS ---
USER laravel

# Exponer puertos de Laravel y Vite
EXPOSE 9000

# Ejecutar PHP-FPM cuando el contenedor se inicie
CMD ["php-fpm"]
