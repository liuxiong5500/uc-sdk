<?php
/**
 * Created by PhpStorm.
 * User: simple
 * Date: 2018/10/12
 * Time: 10:29 AM
 */

namespace UcSdk\UC\Department;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['department'] = function ($pimple) {
            return new Client($pimple);
        };
    }

}
