<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9cb2f2b1004a7be637e0f408e1d36e58
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9cb2f2b1004a7be637e0f408e1d36e58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9cb2f2b1004a7be637e0f408e1d36e58::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}