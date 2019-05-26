<?php

declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

use Swoft\Redis\RedisDb;
use Swoft\Http\Server\HttpServer;
use Swoft\Task\Swoole\TaskListener;
use Swoft\Server\Swoole\SwooleEvent;
use Swoft\Task\Swoole\FinishListener;

return [
    'logger' => [
        'flushRequest' => true,
        'enable' => true,
        'json' => false,
    ],
    'httpServer' => [
        'class' => HttpServer::class,
        'port' => 9501,
        'listener' => [
        ],
        'on' => [
            SwooleEvent::TASK => bean(TaskListener::class),  // Enable task must task and finish event
            SwooleEvent::FINISH => bean(FinishListener::class),
        ],
        /* @see HttpServer::$setting */
        'setting' => [
            'enable_coroutine' => true,
            'worker_num' => 4,
            'pid_file' => 'runtime/swoft.pid',
            'open_tcp_nodelay' => true,
            'max_coroutine' => 100000,
            'open_http2_protocol' => true,
            'max_request' => 100000,
            'socket_buffer_size' => 2 * 1024 * 1024,
            'task_worker_num' => 12,
            'task_enable_coroutine' => true,
        ],
    ],
    'db' => [
        'dsn' => env('DB_DSN', 'mysql:dbname=test;host=localhost'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', null),
    ],
    'redis' => [
        'class' => RedisDb::class,
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_AUTH', null),
        'port' => (int) env('REDIS_PORT', 6379),
        'database' => (int) env('REDIS_DB', 0),
    ],
];
