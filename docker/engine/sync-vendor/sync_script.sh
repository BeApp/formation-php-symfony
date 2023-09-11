#!/bin/bash
while true; do
  # Rsync command to synchronize files
  rsync -av --delete "/app/vendor/" "/app/synced_vendor/"
  rsync -av --delete "/app/var/" "/app/synced_var/"
  rsync -av --delete "/app/node_modules/" "/app/synced_node_modules/"
done
