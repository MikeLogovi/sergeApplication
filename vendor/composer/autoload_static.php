<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8775e78cbb656517f49d4a2fc8510b72
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8775e78cbb656517f49d4a2fc8510b72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8775e78cbb656517f49d4a2fc8510b72::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}