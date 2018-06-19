<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit054fd5fa760d4ecb6dc765e0fa70e675
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DataEndpoint\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DataEndpoint\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'DataEndpoint\\Includes\\Settings' => __DIR__ . '/../..' . '/Includes/Settings.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit054fd5fa760d4ecb6dc765e0fa70e675::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit054fd5fa760d4ecb6dc765e0fa70e675::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit054fd5fa760d4ecb6dc765e0fa70e675::$classMap;

        }, null, ClassLoader::class);
    }
}
