<?php

namespace CrCms\Foundation\Rpc\Contracts;

/**
 * Class ServiceDiscoverContract
 * @package CrCms\Foundation\Rpc\Contracts
 */
interface ServiceDiscoverContract
{
    /**
     * @param string $service
     * @param null|string $driver
     * @return array
     */
    public function discover(string $service, ?string $driver = null): array;
}