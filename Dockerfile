# Use the official PHP image with Apache
FROM php:8.0-apache

# Copy the PHP file to the Apache document root
COPY index.php /var/www/html/

# Set the DirectoryIndex to prioritize index.php
RUN echo '<IfModule dir_module>\n    DirectoryIndex index.php index.html\n</IfModule>' > /etc/apache2/mods-enabled/dir.conf

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
