<?php

namespace Youngyezi\Mutex;
/**
 * mutex.php
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   lumen
 * @author    youngeyzi<github.com>
 * @copyright 2018/12/27
 */
use Illuminate\Support\Str;
class Mutex
{
    /**
     * The redis instance.
     *
     * @var \Illuminate\Redis\RedisManager
     */
    protected $redis;

    /**
     * Lock token
     *
     * @var string
     */
    protected $token;

    /**
     * Mutex constructor.
     *
     */
    public function __construct()
    {
        $this->redis = app('redis');

        $this->makeToken();
    }

    /**
     * Create a locking.
     *
     * @param string $resource_name
     * @param int $lock_time
     * @return mixed null or Predis\Response\Status
     */
    public function lock($resource_name, $lock_time = 3)
    {
        return $this->redis->set(
            $this->getResourceName($resource_name), $this->token, "nx", "ex", $lock_time
        );
    }

    /**
     * @param  string $resource_name
     * @return int 1/0
     */
    public function unlock($resource_name)
    {
        return $this->redis->eval(
            LuaScripts::del(), 1, $this->getResourceName($resource_name),  $this->token
        );
    }

    /**
     * @param  string $resource_name
     * @return string
     */
    public function getResourceName($resource_name)
    {
        return "{lumen:lock}:$resource_name";
    }

    /**
     * Create token && set token.
     *
     * @return void
     */
    public function makeToken()
    {
        $this->token = Str::random(32);
    }
}