<?php
    
/*
 *  @desc Contain Databaseu Provider Implementations
 *  @class DatabaseProvider
 *  @author Philane Msibi
 *  @version 1.0
 */

namespace Msibi_PHP;

class DatabaseProvider {


    /*
     *  @desc The Database Driver
     *  @var $driver
     *  @ version 1.0
     *
     */

    private $driver;

    /*
     *  @desc The server database IP
     *  @var $server
     *  @ version 1.0
     *
     */

    private $server;

    /*
     *  @desc $ 
     *  @var $database
     *  @ version 1.0
     *
     */

    private $databse;

     /*
     *  @desc The Username 
     *  @var $username
     *  @ version 1.0
     *
     */

    private $password;

     /*
     *  @desc Charset 
     *  @var $charset
     *  @ version 1.0
     *
      */

    private $charset;
    
    /*
     *  @desc Connection String 
     *  @var $connection_string
     *  @ version 1.0
     *
     */

    private $connection_string;

     /*
     *  @desc Constructor 
     *  @func __construct
     *  @param void 
     *  @ version 1.0
     *
     */

    public function __construct($driver, $server, $port, $database, $username, $password, $charset){

        $this->driver     = $driver;
        $this->server     = $server;
        $this->port       = $port;
        $this->database   = $database;
        $this->username   = $username;
        $this->password   = $password;
        $this->charset    = $charset;
    }

     /*
     *  @desc Construct the connection string 
     *  @func get_connection_string()
     *  @param void
     *  @return string - Database Connection string
     *  @ version 1.0
     *
     */
        
    public function get_connection_string() {

        $this->connection_string = [
            $this->driver.":host=".$this->server.";port=".$this->port.";dbname=".$this->database.";charset=".$this->charset,
            $this->username,
            $this->password
        ];

        return $this->connection_string;
    }
}

