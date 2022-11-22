<?php

declare(strict_types=1);

namespace App\Process;

use Hyperf\AsyncQueue\Process\ConsumerProcess;
use Hyperf\Process\Annotation\Process;

/**
 * 异步 - 消费进程.
 *
 * 说明：该进程会随着服务启动而启动，然后一直监听队列，并消费任务.
 * @see https://hyperf.wiki/2.2/#/zh-cn/async-queue
 *
 * @Process(name="async-queue")
 */
class AsyncConsumerProcess extends ConsumerProcess
{
}
