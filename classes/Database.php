<?php

class Database
{
    protected static $_instance = null;

    private $db_host;
    private $db_user;
    private $db_password;
    private $db_name;

    function __construct($db_host, $db_user, $db_password, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }

    function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
            self::$_instance->set_charset("utf8");
            if (self::$_instance->connect_error) {
                die("Connection to database failed: " . self::$_instance->connect_error);
            }
        }
        return self::$_instance;
    }

    function isInitialized()
    {
        return self::$_instance != null;
    }

    protected function __clone()
    {
    }
}