# Pull OS image
FROM ubuntu:22.04
#
MAINTAINER M21AIE249

# Required for php-8.1-fpm
ENV TZ=Asia/Calcutta
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Update repository
RUN apt update
RUN apt upgrade -y

# Install the packages
RUN apt install -y nginx php-fpm supervisor
RUN rm -rf /var/lib/apt/lists/*
RUN apt clean

# Copy over conf and the application php files
COPY nginx/default /etc/nginx/sites-available/default
COPY default/ /usr/share/nginx/html/

# Enable PHP-FPM
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/8.1/fpm/php.ini && echo "\ndaemon off;" >> /etc/nginx/nginx.conf

# Copy supervisord configuration
COPY supervisord.conf /etc/supervisor/supervisord.conf

# Copy over starting shell script
COPY start.sh /start.sh
CMD ["./start.sh"]

# Open the port to host
EXPOSE 80
