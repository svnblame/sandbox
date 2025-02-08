# Use official NGINX image
FROM nginx:latest
# Remove default NGINX configuration
RUN rm /etc/nginx/conf.d/default.conf
# Copy custom NGINX configuration
COPY ./nginx/nginx.conf /etc/nginx/conf.d/

