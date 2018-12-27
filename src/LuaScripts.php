<?php
/**
 * LuaScripts.php
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   lumen
 * @author    Cool Li
 * @copyright 2018/12/27
 */

namespace Youngyezi\Mutex;

/**
 * Class LuaScripts
 * @package Youngyezi\Mutex
 */
class LuaScripts
{
    /**
     * Get the Lua script for del the lock.
     *
     * KEYS[1] - The name of the resource name
     * ARGV[1] - The name of the lock token
     *
     * @return string
     */
    public static function del()
    {
        return <<<'LUA'
if redis.call("get",KEYS[1]) == ARGV[1] 
then
    return redis.call("del",KEYS[1])
else
    return 0
end
LUA;
    }
}