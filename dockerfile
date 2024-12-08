FROM ubuntu/apache2:latest

# Actualizar los repositorios y instalar PHP y los módulos de Apache para PHP
RUN apt-get update && apt-get install -y \
    php \
    libapache2-mod-php \
    php-mysql \   
    && apt-get clean

# Copiar el contenido de la carpeta local "html" al contenedor
COPY ./html/ /var/www/html/

# Exponer el puerto 80 para que el servidor sea accesible
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2ctl", "-D", "FOREGROUND"]
