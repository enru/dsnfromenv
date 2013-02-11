dsnfromenv
==========

Parses a database URL from the environment into a DSN connection string for use in PHP's PDO.
 
Useful for parsing heroku config DATABASE_URL variable.

e.g.

A database URL set in an environment variable:
    
    export DATABASE_URL=postgres://USER:PASS@HOST:POST/DBNAME

...can be parsed this string:

    'pgsql:host=HOST;port=POST;user=USER;dbname=DBNAME;password=PASSWORD'

...using this code:

    <?php

    $dsn = enru\DsnFromEnv\parse();

A database connection can then easily be made:

    <?php

    try {
        $dsn = enru\DsnFromEnv\parse();
        $dbh = new PDO($dsn);
    }   
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    } 



    




