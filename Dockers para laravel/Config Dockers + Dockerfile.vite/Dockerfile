# Usamos la imagen oficial de PHP con FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# --- PASO CLAVE 1: ACEPTAR ARGUMENTOS DINÁMICOS ---
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
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql \
    && apt-get clean

# Instalar Composer (gestor de dependencias para PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# --- PASO 2: CREAR USUARIO PERSONALIZADO (mismo UID/GID que fuera del contenedor) ---
RUN if getent passwd www-data; then deluser www-data; fi
RUN if getent group www-data; then groupdel www-data; fi

# Crea el grupo y el usuario 'www-data' usando los UID y GID que le pasamos.
# Ahora, el usuario 'www-data' DENTRO del contenedor tendrá el mismo ID que 'paulo' FUERA.
RUN groupadd --gid ${GID} www-data && \
    useradd --uid ${UID} --gid www-data --create-home --shell /bin/bash www-data

# Instalar Laravel Installer (opcional)
RUN composer global require laravel/installer

# Establecer el directorio de trabajo en /var/www
WORKDIR /var/www

# si es un proyecto nuevo de laravel omitimos el COPY, sino lo descomentamos
# Copiar los archivos de la aplicación al contenedor (asegúrate de usar .dockerignore para excluir archivos innecesarios)
COPY . /var/www

# Crear directorios necesarios y ajustar permisos (como root)
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# --- PASO CLAVE 3: CAMBIAR AL NUEVO USUARIO ANTES DE COPIAR ARCHIVOS ---
# A partir de aquí, todos los comandos se ejecutarán como nuestro usuario 'www-data' personalizado.
USER www-data

# Instalar dependencias de Laravel. Esto es mejor hacerlo aquí para que se cachee.
# Si tu 'vendor' está en .dockerignore, este paso es necesario.
# Si no lo está, puedes omitirlo y correrlo con `docker-compose exec`.
# RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Exponer el puerto 9000 (PHP-FPM)
EXPOSE 9000

# Ejecutar PHP-FPM cuando el contenedor se inicie
CMD ["php-fpm"]

