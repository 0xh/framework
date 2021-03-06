<?php

namespace CrCms\Foundation;

/**
 * Interface ServerApplication
 * @package CrCms\Foundation
 */
interface ServerApplication
{
    /**
     * @param Application $app
     * @return void
     */
    public function setApp(Application $app);

    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return void
     */
    public function loadKernel(): void;

    /**
     * @return string
     */
    public function kernel(): string;

    /**
     * @return void
     */
    public function reloadProviders(): void;

    /**
     * @return void
     */
    public function registerConfiguredProviders(): void;

    /**
     * @return string
     */
    public function getCachedServicesPath(): string;

    /**
     * @return string
     */
    public function getCachedPackagesPath(): string;

    /**
     * Get the path to the configuration cache file.
     *
     * @return string
     */
    public function getCachedConfigPath(): string;

    /**
     * @return string
     */
    public function getCachedRoutesPath(): string;
}