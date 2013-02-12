dsnfromenv
==========

Parses a database URL from the environment into a DSN connection string for use in PHP's PDO.
 
Useful for parsing heroku config DATABASE_URL variable.

e.g.

A database URL set in an environment variable:
    
    export DATABASE_URL=postgres://USER:PASS@HOST:PORT/DBNAME

...can be parsed into this string:

    'pgsql:host=HOST;port=PORT;user=USER;dbname=DBNAME;password=PASSWORD'

...using this code:

    <?php

    $dsn = new enru\DsnFromEnv();
    $dsn_string = $dsn->parse();

A database connection can then easily be made:

    <?php

    try {
        $dsn = new enru\DsnFromEnv();
        $dbh = new PDO($dsn->parse());
    }   
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    } 



    




