<?php

declare(strict_types=1);

return [
    'model' => [
        // Available Settings: "file", "text"
        'config_type' => 'file',
        'config_file_path' => BASE_PATH . '/config/autoload/casbin-rbac-model.conf',
        'config_text' => '',
    ],
    'csv' => '',
    'adapter' => [
        'class' => \Donjan\Casbin\Adapters\Mysql\DatabaseAdapter::class,
        'constructor' => [
            'tableName' => 'casbin_rule',
        ],
    ],
    'watcher' => [
        'enabled' => false,
        'class' => \Donjan\Casbin\Watchers\RedisWatcher::class,
        'constructor' => [
            'channel' => 'casbin',
        ],
    ],
    'log' => [
        'enabled' => false,
    ],
];
