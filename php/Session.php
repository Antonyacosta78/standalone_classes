<?php  
/* PHP Class for create and managing sessions
 * AUTHOR: Mickael Souza
 * LAST EDIT: 2018-11-056
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

	public static function getSession($name)
	{
		return (isset($_SESSION[$name])) ? $_SESSION[$name] : false;
	}

	public static function setSessionAtribute($name, $attr, $value) 
    {
        $_SESSION[$name][$attr] = $value;
    }

    public static function getSessionAtribute($name, $attr) 
    {
        return $_SESSION[$name][$attr];
    }

    public static function sessionExists($name) 
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function createSessionByArray($array)
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function destroySession()
    {
    	session_destroy();
    }
}