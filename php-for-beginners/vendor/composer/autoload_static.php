<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad1c752fbcdb7a1b42c83dd7e6ded198
{
    public static $classMap = array (
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'App\\Controllers\\TasksController' => __DIR__ . '/../..' . '/app/controllers/TasksController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/app/controllers/UsersController.php',
        'ComposerAutoloaderInitad1c752fbcdb7a1b42c83dd7e6ded198' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitad1c752fbcdb7a1b42c83dd7e6ded198' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'Core\\Database\\Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'Core\\Database\\QueryBuider' => __DIR__ . '/../..' . '/core/database/QueryBuider.php',
        'Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'Task' => __DIR__ . '/../..' . '/Task.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitad1c752fbcdb7a1b42c83dd7e6ded198::$classMap;

        }, null, ClassLoader::class);
    }
}