# Pull OS image
FROM ubuntu:22.04
#
MAINTAINER M21AIE249

# Required for php-fpm
ENV TZ=Asia/Calcutta
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Update repository
RUN apt update
RUN apt upgrade -y

# Install the packages and then cleanup
RUN apt install -y nginx php-fpm supervisor mysql-server php-mysql
RUN rm -rf /var/lib/apt/lists/*
RUN apt clean

# Copy over nginx conf and the application files
COPY nginx/default /etc/nginx/sites-available/default
COPY default/ /usr/share/nginx/html/

# Copy database password file and initial database of phonebook
COPY mysql/passwords_init /etc/mysql/passwords_init
RUN debconf-set-selections /etc/mysql/passwords_init
COPY mysql/phonebook.sql /etc/mysql/phonebook.sql

# Enable PHP-FPM
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/8.1/fpm/php.ini && echo "\ndaemon off;" >> /etc/nginx/nginx.conf

# Enable mysql bindings and create a database
RUN sed -i -e"s/^bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
RUN /usr/sbin/mysqld & \
    sleep 10s &&\
    echo "CREATE USER 'm21aie249'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Csl7510@';" | mysql -u root --password=Csl7510@ &&\
    echo "GRANT ALL ON `database`.* TO 'm21aie249'@'localhost';" &&\
    echo "create database phonebook" | mysql -u root --password=Csl7510@ &&\
    mysql -u root -pCsl7510@ phonebook < /etc/mysql/phonebook.sql
    
  
# Copy supervisord configuration
COPY supervisord.conf /etc/supervisor/supervisord.conf

# Copy over starting shell script
COPY start.sh /start.sh
CMD ["./start.sh"]

# Open the port to host
EXPOSE 80
EXPOSE 3306
