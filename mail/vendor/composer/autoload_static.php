<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c2c1c2db57b58f4790c73d8347e4460
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c2c1c2db57b58f4790c73d8347e4460::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c2c1c2db57b58f4790c73d8347e4460::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}