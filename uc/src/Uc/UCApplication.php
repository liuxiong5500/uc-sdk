<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 2:55 PM
 */

namespace UcSdk\UC;


use UcSdk\UC\Kernel\ServiceContainer;

class UCApplication extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Department\ServiceProvider::class,
        Common\ServiceProvider::class,
        Enterprise\ServiceProvider::class,
        JsApi\ServiceProvider::class,
        Member\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        // http://docs.guzzlephp.org/en/stable/request-options.html
        'http' => [
            'base_uri' => '',
        ],
    ];
}