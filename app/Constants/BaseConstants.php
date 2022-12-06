<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;

/**
 * 枚举常量 - 基类.
 */
class BaseConstants extends AbstractConstants
{
    public static function codes(): array
    {
        return ConstantsCollector::getValues(static::class);
    }

    /**
     * 获取 - 枚举字典.
     *
     * 根据注解名获取数组
     * 例如：self::dict('text')
     */
    public static function dict(string $with, array $map = []): array
    {
        [$k, $v] = $map + ['key', 'value'];
        $method = "get{$with}";
        return array_map(static fn ($key) => [
            $k => $key,
            $v => call_user_func([static::class, $method], $key),
        ], static::codes());
    }
}
