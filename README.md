# 项目介绍

基于 Hyperf 的骨架基础库

# 环境要求
 - php >= 7.4
 - ext-swoole >= 4.5 ( php.ini swoole.use_shortname=Off )
 - ext-json
 - ext-openssl
 - ext-pdo
 - ext-pdo_mysql
 - ext-redis
 - ext-xlswriter ( 导入、导出 excel )
 
# 安装或更新依赖

```
# 安装依赖 ( 也可以运行 composer update -o 更新依赖来安装 )
composer install

# 更新依赖
composer update -o
```

# PhpStorm 推荐配置

## 1. runtime 目录设为排除目录
在左侧项目目录中选择 runtime 文件 > 鼠标右键 > Mark Directory as > Excluded

## 2. .php-cs-fixer.php 配置

设置中搜索 `php-cs-fixer`，并配置上，使得团队代码风格统一，且支持简单的质量检查

## 3. 推荐安装插件 ( Plugins )

- .env files support
- Hyperf
- PHP Annotations

# 目录说明

- app - 通用目录
- common - 公共资源目录
- demo - 示例目录

# 常用命令

## 运行项目
```
# 开发环境 ( 热更新模式 )
composer dev

# 生产环境
composer start

# kill 进程
composer kill
```

## 发布配置
```
# 发布 Redis 消息异步队列配置 ( 如果要发布其他组件的配置，直接修改最后的组件名即可 )
php bin/hyperf.php vendor:publish hyperf/async-queue
```

## 创建消费任务

```
# 后面的名称首字母建议用大写，因为是创建同名文件
php bin/hyperf.php gen:job DemoJob
```

# 其他

## 根目录增加 php 相关文件夹时需要修改的地方

```
1. composer.json                   // 增加自动加载目录
2. config/autoload/watcher.php     // 增加热更新目录
3. config/autoload/annotations.php // 增加注解扫描目录
```
