<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8bc6fa32dacf1fe8891ddd2d10f002e8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Photos\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Photos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8bc6fa32dacf1fe8891ddd2d10f002e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8bc6fa32dacf1fe8891ddd2d10f002e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8bc6fa32dacf1fe8891ddd2d10f002e8::$classMap;

        }, null, ClassLoader::class);
    }
}
