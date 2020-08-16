<?php
/**
 * This file is part of the mucts.com.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @version 1.0
 * @author herry<yuandeng@aliyun.com>
 * @copyright © 2020  MuCTS.com All Rights Reserved.
 */

namespace MuCTS\Laravel\Sobot;

use Exception;
use Illuminate\Container\Container;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use MuCTS\Laravel\Sobot\Exceptions\ConfigException;

/**
 * Class Sobot
 * @mixin \MuCTS\Sobot\Sobot
 * @package MuCTS\Laravel\Sobot
 */
class Sobot
{
    /** @var Application|Container */
    protected $app;
    /** @var string|null */
    protected ?string $connection;
    /** @var Cache */
    protected Cache $cache;

    /**
     * Sobot constructor.
     * @param Application|Container $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->cache = new Cache();
    }

    /**
     * Get default connection
     *
     * @return string
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['sobot.default'];
    }

    /**
     * sobot connection
     *
     * @param string|null $name
     * @return $this
     * @throws Exception
     */
    public function connection(?string $name = null)
    {
        $this->connection = $name ?: $this->getDefaultConnection();
        return $this;
    }

    /**
     * Get the configuration for a connection.
     *
     * @param string $name
     * @return array
     * @throws ConfigException
     */
    protected function configuration(string $name): array
    {
        $name = $name ?: $this->getDefaultConnection();
        $connections = $this->app['config']['sobot.connections'];
        if (is_null($config = Arr::get($connections, $name))) {
            throw new ConfigException("Sobot connection [{$name}] not configured.");
        }
        return $config;
    }

    /**
     * Make the sobot connection instance.
     *
     * @param string $name
     * @return \MuCTS\Sobot\Sobot
     * @throws Exception
     */
    protected function makeConnection(string $name)
    {
        $config = $this->configuration($name);
        return new \MuCTS\Sobot\Sobot($config, $this->cache);
    }

    /**
     * Get Connection
     *
     * @return \MuCTS\Sobot\Sobot
     * @throws Exception
     */
    protected function getConnection()
    {
        $name = $this->connection ?: $this->getDefaultConnection();
        return $this->makeConnection($name);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        return $this->getConnection()->{$name}(...$arguments);
    }
}