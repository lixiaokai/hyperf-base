<?php

declare(strict_types=1);

namespace App\Controller\Demo;

use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * 演示 - 控制器.
 *
 * @Controller(prefix="demo/demo")
 */
class DemoController extends AbstractController
{
    /**
     * 演示 - 列表.
     *
     * @GetMapping(path="")
     */
    public function index(): array
    {
        return [];
    }
}
