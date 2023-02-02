<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0ed03017d9070eb9a5daaefc7ed0b2e6
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'dosamigos\\tinymce\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'dosamigos\\tinymce\\' => 
        array (
            0 => __DIR__ . '/..' . '/2amigos/yii2-tinymce-widget/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'dosamigos\\tinymce\\TinyMce' => __DIR__ . '/..' . '/2amigos/yii2-tinymce-widget/src/TinyMce.php',
        'dosamigos\\tinymce\\TinyMceAsset' => __DIR__ . '/..' . '/2amigos/yii2-tinymce-widget/src/TinyMceAsset.php',
        'dosamigos\\tinymce\\TinyMceLangAsset' => __DIR__ . '/..' . '/2amigos/yii2-tinymce-widget/src/TinyMceLangAsset.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0ed03017d9070eb9a5daaefc7ed0b2e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0ed03017d9070eb9a5daaefc7ed0b2e6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0ed03017d9070eb9a5daaefc7ed0b2e6::$classMap;

        }, null, ClassLoader::class);
    }
}
