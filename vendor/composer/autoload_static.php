<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74ae289dff07725a6894c1a0a6de8a81
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'venyuanbsn\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'venyuanbsn\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/venyuan/bsn/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74ae289dff07725a6894c1a0a6de8a81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74ae289dff07725a6894c1a0a6de8a81::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit74ae289dff07725a6894c1a0a6de8a81::$classMap;

        }, null, ClassLoader::class);
    }
}
