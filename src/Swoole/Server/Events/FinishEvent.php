<?php

namespace CrCms\Foundation\Swoole\Server\Events;

use CrCms\Foundation\Swoole\Server\AbstractServer;
use CrCms\Foundation\Swoole\Server\Contracts\EventContract;

/**
 * Class FinishEvent
 * @package CrCms\Foundation\Swoole\Server\Events
 */
class FinishEvent extends AbstractEvent implements EventContract
{
    /**
     * @var int
     */
    protected $taskId;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * FinishEvent constructor.
     * @param int $taskId
     * @param mixed $data
     */
    public function __construct(int $taskId, $data)
    {
        $this->taskId = $taskId;
        $this->data = $data;
    }

    /**
     * @param AbstractServer $server
     */
    public function handle(AbstractServer $server): void
    {
        parent::handle($server); // TODO: Change the autogenerated stub
    }
}