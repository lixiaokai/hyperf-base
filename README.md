# 项目介绍

基于 Hyperf 的骨架基础库

# 环境要求
 - PHP >= 8.0
 - Swoole PHP extension >= 4.5，and Disabled `Short Name`
   - php.ini 配置文件增加 1 行 `swoole.use_shortname="Off"`
 - OpenSSL PHP extension
 - JSON PHP extension
 - PDO PHP extension
 - Redis PHP extension
 
# 安装或更新依赖

```
# 安装依赖 ( 也可以运行更新依赖来安装 )
composer install
# 更新依赖
composer update -o
```

# 常用命令

## 运行项目
```
# 开发模式 ( 热更新模式 )
composer dev
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
