<?php namespace Config;
	
    class Autoload {
        
        public static function Start() {
            spl_autoload_register(function($className)
			{
                // echo 'className ' . $className . '<br>';
                $classPath = ucwords(str_replace("\\", "/", ROOT.$className).".php");
                
                // echo 'classPath ' . $classPath;
				include_once($classPath);
			});
        }
    }
?>