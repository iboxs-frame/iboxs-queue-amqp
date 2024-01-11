<?php

namespace iboxs\facade;

use iboxs\Facade;

/**
 * Class Queue
 * @package iboxs\facade
 * @mixin \iboxs\Queue
 */
class Queue extends Facade
{
    protected static function getFacadeClass()
    {
        return 'queue';
    }
}
