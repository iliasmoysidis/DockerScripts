# Function to check if SQL Server is up
function wait_for_sqlserver {
    until /opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P "${MSSQL_SA_PASSWORD}" -Q "SELECT 1" &> /dev/null
    do
        echo "Waiting for SQL Server to be up..."
        sleep 1
    done
    echo "SQL Server is up and running!"
}

# Call the function to wait for SQL Server
wait_for_sqlserver

# Run the setup script to create the DB and the schema in the DB
# Note: make sure that your password matches what is in the Dockerfile
/opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P "${MSSQL_SA_PASSWORD}" -v Email="${Email}" -v "XUsername"="${XUsername}" -d master -i /usr/config/setup.sql
