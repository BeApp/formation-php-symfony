FROM alpine:latest

# Install necessary packages for file synchronization
RUN apk update && apk add rsync && apk add --no-cache bash && apk add supervisor

# Copy any custom scripts or configurations if needed
COPY --chmod=755 ./docker/engine/sync-vendor/sync_script.sh /usr/local/bin/
COPY --chmod=755 ./docker/engine/sync-vendor/myprogram.conf /etc/supervisor/conf.d/
COPY --chmod=755 ./docker/engine/sync-vendor/supervisord.conf /etc/supervisor/

# Convert the script to unix format
RUN apk add dos2unix
RUN dos2unix /usr/local/bin/sync_script.sh

# Set the working directory
WORKDIR /app
