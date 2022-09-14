<?php

declare(strict_types=1);

use RazonYang\Yii\Runner\Swoole\SwooleApplicationRunner;

ini_set('display_errors', 'stderr');

require_once __DIR__ . '/autoload.php';

(new SwooleApplicationRunner(__DIR__, $_ENV['YII_DEBUG'], $_ENV['YII_ENV']))->run();
