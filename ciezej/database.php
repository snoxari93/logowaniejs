<?php
class Database
{
    private static $dbName = 's141179' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 's141179';
    private static $dbUserPassword = 'KyU2TF5nYMLq';
    private static $cont = null;
    public function __construct() {
        die('Funkcja Init function nie jest dozwolona');
    }
    public static function connect()
{
// Jedno połaczenie za pośrednictwem aplikacji
    if ( null == self::$cont )
    {
        try
        {
            self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername,
                self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
    return self::$cont;
}
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
