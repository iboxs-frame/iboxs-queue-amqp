<?php
// +----------------------------------------------------------------------
// | iboxsPHP [ WE CAN DO IT JUST iboxs IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://iboxsphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

use iboxs\facade\Queue;

if (!function_exists('queue')) {

    /**
     * 添加到队列
     * @param        $job
     * @param string $data
     * @param int    $delay
     * @param null   $queue
     */
    function queue($job, $data = '', $delay = 0, $queue = null)
    {
        if ($delay > 0) {
            Queue::later($delay, $job, $data, $queue);
        } else {
            Queue::push($job, $data, $queue);
        }
    }
}
