<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    // ...
    'doctrine'        => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => 'xminds',
                    'dbname'   => 'leavemanagement'
                )
            )
        ),
        'driver'        => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(dirname(dirname(__DIR__)) . '/module/Application/src/Application/Model'),
            ),
            'orm_default'          => array(
                'drivers' => array(
                    'Application\Model' => 'application_entities'
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'proxy_dir'       => __DIR__ . '/../../module/Application/src/Application/Model/Proxy',
                'proxy_namespace' => 'Application\Model\Proxy',
            )
        )
    ),
);
