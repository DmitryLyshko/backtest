<?php

namespace Task\Item\Task;

use Task\Data\DataItemInterface;

/**
 * Interface TaskInterface
 * @package Task\Item\Task
 */
interface TaskInterface
{
    /**
     * TaskInterface constructor.
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem);
}