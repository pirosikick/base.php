<?php
namespace Base;

class AutoLoader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'load_class'));
    }

    public static function load_class($className)
    {
        if (static::_has_the_namespace($className)) {
            $className = static::_remove_prefix($className);
            $fileName = '';
            if (false !== ($lastNsPos = strripos($className, '\\'))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

            require realpath(__DIR__.'/.') . DIRECTORY_SEPARATOR . $fileName;
        }
    }

    private static function _has_the_namespace($className)
    {
        return __NAMESPACE__.'\\' === substr($className, 0, strlen(__NAMESPACE__.'\\'));
    }

    private static function _remove_prefix($className)
    {
        $className = ltrim($className, '\\');
        return substr($className, strlen(__NAMESPACE__.'\\'));
    }
}
