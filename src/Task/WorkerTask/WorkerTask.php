<?php


namespace Task\WorkerTask;

use QXS\WorkerPool\WorkerInterface;

/**
 * Class WorkerTask
 * @package Task\WorkerTask
 */
class WorkerTask implements WorkerInterface
{
    public function onProcessCreate(\QXS\WorkerPool\Semaphore $semaphore)
    {
        // TODO: Implement onProcessCreate() method.
    }

    public function onProcessDestroy()
    {
        // TODO: Implement onProcessDestroy() method.
    }

    public function run($input)
    {
        $input->send();
    }
}
