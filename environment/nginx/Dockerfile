FROM nginx:stable

COPY nginx.conf /etc/nginx/
COPY fallout.conf /etc/nginx/sites-available/

RUN rm /etc/nginx/conf.d/default.conf
RUN ln -s /etc/nginx/sites-available/fallout.conf /etc/nginx/conf.d/default.conf

RUN echo 'upstream php-upstream { server php-fpm:9000; }' > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data