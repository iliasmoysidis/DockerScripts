FROM mcr.microsoft.com/mssql/server:2022-latest

USER root

# Install the necessary tools
RUN apt-get update && \
    apt-get install -y curl gnupg && \
    curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/ubuntu/22.04/prod.list > /etc/apt/sources.list.d/mssql-release.list && \
    apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools unixodbc-dev && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir -p /usr/config
RUN mkdir /var/opt/mssql/backup

COPY ./certh_database.bak /var/opt/mssql/backup/certh_database.bak
COPY ./configure-db.sh /usr/config/configure-db.sh
COPY ./entrypoint.sh /usr/config/entrypoint.sh
COPY ./setup.sql /usr/config/setup.sql

RUN chmod +x /usr/config/entrypoint.sh
RUN chmod +x /usr/config/configure-db.sh

ENTRYPOINT ["/usr/config/entrypoint.sh"]
