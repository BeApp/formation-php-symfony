OS=$(uname)

if [[ ${OS} -eq "Darwin" ]]; then
	mutagen project terminate
	docker-compose -f docker-compose.yml -f docker-compose-sync.yml stop
else
	docker-compose stop
fi
