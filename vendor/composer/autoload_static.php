<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4ffd8f4e6022be2cf450794bec39e2a
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FatihOzpolat\\JWTValidity\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FatihOzpolat\\JWTValidity\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4ffd8f4e6022be2cf450794bec39e2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4ffd8f4e6022be2cf450794bec39e2a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd4ffd8f4e6022be2cf450794bec39e2a::$classMap;

        }, null, ClassLoader::class);
    }
}
