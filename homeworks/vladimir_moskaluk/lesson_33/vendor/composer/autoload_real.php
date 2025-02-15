<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9f9946af232e46a84166e1b8b6b20bc6
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit9f9946af232e46a84166e1b8b6b20bc6', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9f9946af232e46a84166e1b8b6b20bc6', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9f9946af232e46a84166e1b8b6b20bc6::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
