<?php 

namespace app\models;

/**
 * Description of Session
 *
 * @author Vera
 */
class Session
{     
    /**
     * Start method
     */
    public static function start()
        {
		if(!isset($_SESSION)){
                    
			session_start();
		}
	}
        
    /**
     * Stop method
     */
	public static function stop()
        {
		self::start();
                
		foreach($_SESSION as $k=>$v){
                    
			unset($_SESSION[$k]);
		}
		session_destroy();
	}
        
    /**
     *
     * @param string $key
     * @param string/boolean/int $default
     * @return string/boolean/int
     */
	public static function get($key,$default=null)
        {
		self::start();
                
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return $default;
	}
        
    /**
     *
     * @param string $key
     * @param string/int/boolean $value
     */
	public static function set($key,$value)
        {
		self::start();
                
		$_SESSION[$key]=$value;
	}
}
