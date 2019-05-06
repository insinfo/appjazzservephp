<?php
/**
 * Created by PhpStorm.
 * User: Isaque
 * Date: 14/07/2017
 * Time: 18:09
 */

namespace AppJazz\Util;
class DBConfig extends \PmroPadraoLib\Util\DBConfig
{
    const DEFAULT_CONNECTION = 'laravel';    
    const DEFAULT_DATABASE_NAME = 'appjazz';
    const DEFAULT_SCHEMA_NAME = 'public';

    public static function getConnections()
    {
        return $connections = [

            'connections' => [

                'laravel' => [
                    'driver' => 'pgsql',
                    'host' => DB_HOST_APP_JAZZ,
                    'port' => '5432',
                    'database' => 'sistemas',
                    'username' => 'sisadmin',
                    'password' => 's1sadm1n',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => ['public'],
                    'sslmode' => 'prefer',
                ],
            ],

        ];
    }
}