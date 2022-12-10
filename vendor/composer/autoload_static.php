<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5bc3b09541463a8d085876bc87084af
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'timeuh\\spotifree\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'timeuh\\spotifree\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5bc3b09541463a8d085876bc87084af::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5bc3b09541463a8d085876bc87084af::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5bc3b09541463a8d085876bc87084af::$classMap;

        }, null, ClassLoader::class);
    }
}
