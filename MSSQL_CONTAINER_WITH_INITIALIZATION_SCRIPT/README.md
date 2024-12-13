This is a docker container that I made to create a MSSQL server with an initialization script. For this container to work we need a backup file (.bak) with the database and a .env file that specifies the environmental variables needed for the docker compose file.

In order to run this container in windows you first need to execute
```
dos2unix configure-db.sh
dos2unix entrypoint.sh
```
