<?php

declare(strict_types=1);

namespace Cases\Casbin;

use Casbin\Enforcer;
use Casbin\Exceptions\CasbinException;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class CasbinTest extends HttpTestCase
{
    /**
     * @throws CasbinException
     */
    public function testEnforce()
    {
        $modelFile = __DIR__ . '/config/casbin-rbac-domain-restful-model.conf';
        $policyFile = __DIR__ . '/config/casbin-rbac-domain-restful-policy.csv';

        $enforcer = new Enforcer($modelFile, $policyFile);

        // 用户 1 属于租户 1
        self::assertTrue($enforcer->enforce('user:1', 'dom:1', '/demo', 'get'));
        self::assertTrue($enforcer->enforce('user:1', 'dom:2', '/demo', 'get'));

        // 用户 2 属于租户 1
        self::assertTrue($enforcer->enforce('user:2', 'dom:1', '/demo', 'get'));      // 列表
        self::assertTrue($enforcer->enforce('user:2', 'dom:1', '/demo/1', 'get'));    // 详情
        self::assertTrue($enforcer->enforce('user:2', 'dom:1', '/demo', 'post'));     // 创建
        self::assertTrue($enforcer->enforce('user:2', 'dom:1', '/demo/1', 'put'));    // 修改
        self::assertTrue($enforcer->enforce('user:2', 'dom:1', '/demo/1', 'delete')); // 删除

        // 用户 2 不属于租户 2，所以没有权限
        self::assertFalse($enforcer->enforce('user:2', 'dom:2', '/demo', 'get'));     // 列表

        // 用户 3 属于租户 2
        self::assertTrue($enforcer->enforce('user:3', 'dom:2', '/demo', 'get'));      // 列表
        self::assertTrue($enforcer->enforce('user:3', 'dom:2', '/demo/1', 'get'));    // 详情
        self::assertTrue($enforcer->enforce('user:3', 'dom:2', '/demo', 'post'));     // 创建
        self::assertTrue($enforcer->enforce('user:3', 'dom:2', '/demo/1', 'put'));    // 修改
        self::assertTrue($enforcer->enforce('user:3', 'dom:2', '/demo/1', 'delete')); // 删除

        // 用户 4 属于租户 2
        self::assertTrue($enforcer->enforce('user:4', 'dom:2', '/demo', 'get'));      // 列表
        self::assertTrue($enforcer->enforce('user:4', 'dom:2', '/demo/1', 'get'));    // 详情
        self::assertTrue($enforcer->enforce('user:4', 'dom:2', '/demo/1', 'put'));    // 修改
    }
}
