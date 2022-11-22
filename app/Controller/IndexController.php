<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

/**
 * 首页 - 控制器.
 *
 * @Controller(prefix="/")
 */
class IndexController extends AbstractController
{
    /**
     * 网站首页.
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
