<?php
/**
 * Description of this file（修改完成）
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:42 PM
 */

namespace UcSdk\UC\Kernel;


use Pimple\Container;

class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $providers = [];
    /**
     * @var array
     */
    protected $defaultConfig = [];
    /**
     * @var array
     */
    protected $userConfig = [];


    public function __construct(array $config = [], array $prepends = [])
    {
        $this->registerProviders($this->getProviders());
        parent::__construct($prepends);
        $this->userConfig = $config;

    }

    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return $this->providers;
    }
}