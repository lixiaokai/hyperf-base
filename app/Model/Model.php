<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Database\Model\Concerns\CamelCase;
use Hyperf\DbConnection\Model\Model as BaseModel;
use Hyperf\ModelCache\Cacheable;
use Hyperf\ModelCache\CacheableInterface;

/**
 * 模型 - 抽象基类.
 */
abstract class Model extends BaseModel implements CacheableInterface
{
    use Cacheable;
    use CamelCase;

    public static function column($col = '*'): string
    {
        $cols = (array) $col;
        $tbName = self::tableName();

        return collect($cols)->map(fn (string $col) => $tbName . '.' . $col)->implode(',');
    }

    public static function tableName(bool $withDb = false): string
    {
        $self = make(static::class);
        $tbName = $self->getTable();
        if ($withDb) {
            $dbName = make(ConfigInterface::class)->get("databases.{$self->getConnectionName()}.database");
            $tbName = $dbName . '.' . $tbName;
        }

        return $tbName;
    }
}
