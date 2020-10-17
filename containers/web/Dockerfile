FROM ubuntu
ENV TZ=Asia/Tokyo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update
RUN apt-get install -y vim
# RUN apt-get install -y curl
RUN apt-get -y install php-curl
RUN apt-get -y install apache2
RUN apt-get -y install php-dom
RUN apt-get -y install php libapache2-mod-php php-mysql

# Copy file config for server and httpd
ADD ./envfiles/httpd/conf.d/* /etc/apache2/sites-available/

# Set working directory
# WORKDIR /var/www/html
CMD apachectl -D FOREGROUND