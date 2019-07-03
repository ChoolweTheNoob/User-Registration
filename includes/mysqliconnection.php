<?php
    /*@todo - This file contains the database access information
             - This file also establishes a connection tp MySQL
             - and selects the database.
      */      
    //@todo Set the database access information as constants:
        define('DB_USER', 'username');
        define('DB_PASSWORD', 'password');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'UserReg');
    
    //@todo Make the connection:
    $dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    //@todo If no connection is made to database, trigger an error:
    if (!$dbc) {
        trigger_error('Could not connect to MySQL: ' . mysqli_connect_error() );
    } else {
        mysql_set_charset($dbc, 'utf8');
    }
                