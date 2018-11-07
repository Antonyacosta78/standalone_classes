<?php  
/* PHP Class for create and managing sessions
 * AUTHOR: Mickael Souza
 * LAST EDIT: 2018-11-07
 */
class Session 
{
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	public static function setSession($name, $value)
	{
		$_SESSION[$name] = $value;
	}

    public static function setSessions(Array $sessions)
    {
        foreach ($sessions as $name => $value) {
            self::setSession($name, $value);
        }
    }

	public static function getSession($name)
	{
		return (isset($_SESSION[$name])) ? $_SESSION[$name] : false;
	}

    public static function getSessions(Array $sessions)
    {   
        foreach ($sessions as $name) {
            self::getSession($name);
        }
    }

	public static function setSessionAttribute($name, $attr, $value) 
    {
        $_SESSION[$name][$attr] = $value;
    }

    public static function getSessionAttribute($name, $attr) 
    {
        return $_SESSION[$name][$attr];
    }

    public static function sessionExists($name) 
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function destroySession()
    {
    	session_destroy();
    }
}