#!/usr/bin/env bash

OS=$(uname)

if [[ ${OS} -eq "Darwin" ]]; then
    # check if Docker-sync is installed
    if ! [[ -x "$(command -v mutagen)" ]]; then
        echo "You must install mutagen to use this script on Mac OS"
        echo "Please read the README.md file on the project for instructions"

        exit 1
    fi

	docker-compose -f docker-compose.yml -f docker-compose-sync.yml up -d

  # Ensure previous mutagen session is correctly stopped
	mutagen project list > /dev/null 2>&1
  if [ $? -eq 0 ]; then
    mutagen project terminate
  fi

  mutagen project start

else
	docker-compose up -d
fi
