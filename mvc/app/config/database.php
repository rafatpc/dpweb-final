<?php

return array(
    'driver' => 'PDODriver',
    'dsn' => 'odbc:Driver={SQL Server};Server=127.0.0.1;Database=MuOnline',
    'username' => 'sa',
    'password' => 'sql_pass',
    'options' => array(
            \PDO::ATTR_PERSISTENT => true, 
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        )
);