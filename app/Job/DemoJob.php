<?php

declare(strict_types=1);

namespace App\Job;

use Hyperf\AsyncQueue\Job;

/**
 * 演示 - 队列任务.
 *
 * 说明：
 * 该类会被序列化然后存到 Redis，所以成员变量值最好只赋值待处理的普通数据
 * 例如：数组、字符串、数字，避免为对象使得序列化后的数据很大
 * 其他相关数据，可以在 handle 方法中重新获取
 *
 * 注意：不推荐用 make 方法来创建 job 对象，推荐直接 new job()
 */
class DemoJob extends Job
{
    public array $params;

    /**
     * @var int
     */
    protected $maxAttempts = 2; // 任务执行失败后的重试次数，即最大执行次数为 $maxAttempts+1 次

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * 根据参数处理具体逻辑.
     *
     * 说明：这里的逻辑会在 ConsumerProcess 进程中执行
     */
    public function handle()
    {
        var_dump($this->params);
    }
}
