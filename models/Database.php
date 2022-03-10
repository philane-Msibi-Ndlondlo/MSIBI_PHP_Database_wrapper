<?php
    
/*
 *  @desc Contain Database Connection Implementations
 *  @class Database
 *  @author Philane Msibi
 *  @version 1.0
 */

namespace Msibi_PHP;

use PDO;

class Database {


    /*
     *  @desc The Database Instance
     *  @var $database
     *  @ version 1.0
     *
     */

    private static $database;

    /*
     *  @desc The database connection
     *  @var $connection
     *  @ version 1.0
     *
     */

    private static $connection;

    /*
     *  @desc Database Provider Instance 
     *  @var $provider
     *  @ version 1.0
     *
     */

    private static $provider;

     /*
     *  @desc Private Constructor 
     *  @func __construct
     *  @param $provider - Database Provider
     *  @ version 1.0
     *
     */

    private function __construct($provider) {

        self::$provider = $provider;

        try {

            self::$connection = new \PDO(...self::$provider->get_connection_string());
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch(Exception $error) {
            die("Error: ". $error->getMessage());
        }
    }

     /*
     *  @desc Connect to the Database 
     *  @func connect()
     *  @param void
     *  @return $connection - PDO DB connection
     *  @ version 1.0
     *
     */
        
    public static function connect() {

    
        if (self::$database !== null && self::$connection !== null) {
            return self::$connection;
        }

        self::$database = new Database(
            new DatabaseProvider(
                DriverType::MYSQL,
                '127.0.0.1',
                3307,
                'id4891398_vippydb',
                'root',
                '',
                'utf8'
            )
        );

        return self::$connection;
    }
}

