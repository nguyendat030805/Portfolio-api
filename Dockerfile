FROM richarvey/nginx-php-fpm:3.1.6

# Copy toàn bộ code vào server
COPY . /var/www/html

# Cấu hình Laravel
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Các lệnh build
RUN composer install --no-dev --optimize-autoloader

# Phân quyền cho storage
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache