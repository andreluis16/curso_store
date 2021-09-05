<?php 

namespace Framework\DB;

/**
 * Description of Connection
 *
 * @author andre
 */
class Connection {
    static $CONN;
    
    /**
     * 
     * Singleton
     * 
     * @return type
     * @throws \Exception
     */
    
    public static function getConnection() {
        if(self::$CONN !== null){
            return self::$CONN;
        }
        
        $host = getenv('MYSQL_HOST');
        $username = getenv('MYSQL_USER');
        $passwd = getenv('MYSQL_PASSWORD');
        $dbname = getenv('MYSQL_DATABASE');
        
        $con = new \mysqli($host, $username, $passwd, $dbname);
        if($con->errno){
            throw new \Exception("error on connecting on database: ".$con->error);
        }
        
        return self::$CONN = $con;
    }
}
