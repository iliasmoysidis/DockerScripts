USE master;
GO

RESTORE DATABASE certh
FROM DISK = '/var/opt/mssql/backup/certh_database.bak'
WITH 
    MOVE 'certh' TO '/var/opt/mssql/data/certh.mdf',
    MOVE 'certh_log' TO '/var/opt/mssql/data/certh_log.ldf',
    REPLACE;
GO

USE certh;
GO

-- Replace email and username with yours
DECLARE @Email NVARCHAR(50) = '$(Email)';
UPDATE cerEmployeePersonalInfos set Email = @Email;
GO

DECLARE @Email NVARCHAR(50) = '$(Email)';
DECLARE @XUsername NVARCHAR(50) = '$(XUsername)';
UPDATE ac3Users set XPassword = (select XPassword from ac3Users where XUsername = @XUsername), 
Email = @Email, freetext1=@Email where XUsername NOT IN ('visitor');
GO

