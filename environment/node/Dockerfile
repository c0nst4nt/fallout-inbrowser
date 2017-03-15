FROM node:argon

WORKDIR /var/www/src/Fallout/GameBundle/Resources/frontend

COPY docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]