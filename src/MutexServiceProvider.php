<?php
namespace Youngyezi\Mutex;
/**
 * MutexServiceProvider.php
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   lumen
 * @author    Cool Li
 * @copyright 2018/12/27
 */

use Illuminate\Support\ServiceProvider;
/**
 * Class MutexServiceProvider
 * @package Youngyezi\Mutex
 */
class MutexServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mutex', function($app)
        {
            return new Mutex($app);
        });
    }
}