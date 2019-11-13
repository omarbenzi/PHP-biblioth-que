<?php

class SingletonPDO
{
    private $PDOInstance = null;
    private static $instance = null;

    // const DEFAULT_SQL_HOST = 'localhost';
    // const DEFAULT_SQL_DBN = 'tp-2';
    // const DEFAULT_SQL_USER = 'root';
    // const DEFAULT_SQL_PASS = '';
    const DEFAULT_SQL_HOST = 'localhost';
    const DEFAULT_SQL_DBN = 'e1995039';
    const DEFAULT_SQL_USER = 'e1995039';
    const DEFAULT_SQL_PASS = '81daxuBq8dNrrOoGZSy9';

    private function __construct()
    {
        $this->PDOInstance = new PDO(
            'mysql:host=' . self::DEFAULT_SQL_HOST . ';dbname=' . self::DEFAULT_SQL_DBN,
            self::DEFAULT_SQL_USER,
            self::DEFAULT_SQL_PASS
        );
        $this->PDOInstance->exec("SET NAMES UTF8");
        $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone()
    { }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SingletonPDO();
        }
        return self::$instance;
    }

    function __call($name, $params)
    {
        return $this->PDOInstance->{$name}(...$params);
    }
}
