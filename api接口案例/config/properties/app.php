<?php

/*
 * This file is part of Swoft.
 * (c) Swoft <group@swoft.org>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'env' => env('APP_ENV', 'test'),
    'debug' => env('APP_DEBUG', false),
    'version' => '1.0',
    'autoInitBean' => true,
    'bootScan' => [
        'App\Commands',
        'App\Boot',
    ],
    'excludeScan' => [

    ],
    'I18n' => [
        'sourceLanguage' => '@root/resources/messages/',
    ],
    'db' => require __DIR__ . DS . 'db.php',
    'cache' => require __DIR__ . DS . 'cache.php',
    'service' => require __DIR__ . DS . 'service.php',
    'breaker' => require __DIR__ . DS . 'breaker.php',
    'provider' => require __DIR__ . DS . 'provider.php',
    'jwt' => require __DIR__ . DS . 'jwt.php',
    'devtool' => [
        // 是否开启 DevTool，默认值为 false
        'enable' => false,
        // (可选)前台运行服务器时，是否打印事件调用到 Console
        'logEventToConsole' => false,
        // (可选)前台运行服务器时，是否打印 HTTP 请求到 Console
        'logHttpRequestToConsole' => false,
    ],
];
