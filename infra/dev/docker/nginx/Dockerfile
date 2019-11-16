FROM nginx:1.15-alpine

COPY backend/public /var/www/public
COPY infra/dev/docker/nginx/conf.d/ /etc/nginx/conf.d/

EXPOSE 80