<?php

declare(strict_types=1);

namespace App\Controller\Demo;

use App\Controller\AbstractController;
use App\Job\DemoJob;
use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * 异步队列 - 控制器.
 *
 * @Controller(prefix="demo/async-queue")
 */
class AsyncQueueController extends AbstractController
{
    /**
     * 投递消息.
     *
     * @GetMapping(path="push")
     */
    public function push(): array
    {
        $driver = make(DriverFactory::class)->get('default');
        $isSuccess = $driver->push(new DemoJob(['id' => 1]));

        return ['isSuccess' => $isSuccess];
    }
}
