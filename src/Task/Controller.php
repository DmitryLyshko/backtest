<?php


namespace Task;

use Task\Item\Task\TaskInterface;
use Task\Data\DataItemInterface;

/**
 * Class Controller
 * @package Flagmer\Task
 */
final class Controller extends AbstractFactory
{
    /**
     * @param DataItemInterface $dataItem
     * @return TaskInterface
     */
    public static function start(DataItemInterface $dataItem): TaskInterface
    {
        $factory = self::getFactory($dataItem);
        return $factory->getTask($dataItem);
    }
}