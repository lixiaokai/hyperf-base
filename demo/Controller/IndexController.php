<?php

declare(strict_types=1);

namespace Demo\Controller;

use App\Controller\AbstractController;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * 演示首页 - 控制器.
 *
 * @Controller(prefix="/demo")
 */
class IndexController extends AbstractController
{
    /**
     * 演示首页.
     *
     * @GetMapping(path="")
     */
    public function index(): array
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
