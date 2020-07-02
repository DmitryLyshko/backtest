<?php

namespace Task\Item;

use Task\AbstractFactory;
use Task\Item\FirstFactoryInterface;
use Task\Item\Task\TaskInterface;
use Task\Data\DataItemInterface;

/**
 * Class AccountFirstFactory
 * @package Flagmer\Task\Item
 */
final class AccountFirstFactory extends AbstractFactory implements FirstFactoryInterface
{
    private DataItemInterface $dataItem;

    /**
     * AccountFirstFactory constructor.
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem)
    {
        $this->dataItem = $dataItem;
    }

    /**
     * @param DataItemInterface $dataItem
     * @return TaskInterface
     */
    public function getTask(DataItemInterface $dataItem): TaskInterface
    {
        return self::getFactoryTask($dataItem);
    }
}