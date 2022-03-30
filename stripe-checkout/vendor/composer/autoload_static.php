<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit22e1b207eebcc0773435a776f452005e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit22e1b207eebcc0773435a776f452005e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit22e1b207eebcc0773435a776f452005e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit22e1b207eebcc0773435a776f452005e::$classMap;

        }, null, ClassLoader::class);
    }
}
