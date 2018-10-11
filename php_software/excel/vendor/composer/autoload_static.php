<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit999c74b285a13515013d02c31ecf9486
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit999c74b285a13515013d02c31ecf9486::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit999c74b285a13515013d02c31ecf9486::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit999c74b285a13515013d02c31ecf9486::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
