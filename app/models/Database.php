<?php

namespace app\models;

/**
 * Description of Database
 *
 * @author Vera
 */
class Database 
{
    /**
     * @var object
     */
    public static $conn = null;
    
    /**
     *
     * @return object
     */
    public static function GetConnection()
    {
        if(!self::$conn){
            self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
        } 
        
        return self::$conn;
    }
}
