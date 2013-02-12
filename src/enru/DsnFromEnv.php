<?php

/*
@author Neill Russell <n@enru.co.uk>
*/

namespace enru {

    class DsnFromEnv {

        function __construct($db_url='DATABASE_URL') {
            $this->db_url = $db_url;
        }

        function parse() {

            // parse the URL
            $db = parse_url(getenv($this->db_url));
            
            // get the DB name
            $path = ltrim($db['path'], '/');
            $db['dbname'] = $path;

            // we gotta password?
            if(isset($db['pass'])) {
                $db['password'] = $db['pass'];
            }

            // schemes map
            $schemes = array(
                'postgres' => 'pgsql',
                'postgresql' => 'pgsql',
            );

            // set & remap the scheme
            $scheme = $db['scheme'];
            if(isset($schemes[$scheme])) {
                $scheme = $schemes[$scheme];
            }
            
            // clear unneeded values
            unset($db['pass']);
            unset($db['path']);
            unset($db['scheme']);

            return $scheme.':'.http_build_query($db, null, ';');
        }
    }
}

