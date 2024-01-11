<?php

namespace iboxs\queue;

use iboxs\helper\Arr;
use iboxs\helper\Str;
use iboxs\Queue;
use iboxs\queue\command\FailedTable;
use iboxs\queue\command\FlushFailed;
use iboxs\queue\command\ForgetFailed;
use iboxs\queue\command\Listen;
use iboxs\queue\command\ListFailed;
use iboxs\queue\command\Restart;
use iboxs\queue\command\Retry;
use iboxs\queue\command\Table;
use iboxs\queue\command\Work;
use iboxs\queue\command\Amqp;

class Service extends \iboxs\Service
{
    public function register()
    {
        $this->app->bind('queue', Queue::class);
        $this->app->bind('queue.failer', function () {

            $config = $this->app->config->get('queue.failed', []);

            $type = Arr::pull($config, 'type', 'none');

            $class = false !== strpos($type, '\\') ? $type : '\\iboxs\\queue\\failed\\' . Str::studly($type);

            return $this->app->invokeClass($class, [$config]);
        });
    }

    public function boot()
    {
        $this->commands([
            FailedJob::class,
            Table::class,
            FlushFailed::class,
            ForgetFailed::class,
            ListFailed::class,
            Retry::class,
            Work::class,
            Restart::class,
            Listen::class,
            FailedTable::class,
            Amqp::class,
        ]);
    }
}
