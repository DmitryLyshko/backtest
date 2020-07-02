<?php

namespace Task;

use Task\Item\AccountFirstFactory;
use Task\Item\AmoFirstFactory;
use Task\Item\Task\AccountProcessPaymentTask;
use Task\Item\Task\AmoSendLeadTask;
use Task\Item\Task\TaskInterface;
use Task\Data\DataItemInterface;

/**
 * Class AbstractFactory
 * @package Flagmer\Task
 */
abstract class AbstractFactory
{
    /**
     * @param DataItemInterface $dataItem
     * @return AccountFirstFactory|AmoFirstFactory
     */
    public static function getFactory(DataItemInterface $dataItem)
    {
        switch ($dataItem->getCategory()) {
            case 'amocrm':
                return new AmoFirstFactory($dataItem);
            case 'account':
                return new AccountFirstFactory($dataItem);
        }

        throw new \RuntimeException("Error: fabric state category:{$dataItem->getCategory()}");
    }

    /**
     * @param DataItemInterface $dataItem
     * @return AmoSendLeadTask
     */
    public static function getFactoryTask(DataItemInterface $dataItem): TaskInterface
    {
        switch ($dataItem->getTask()) {
            case 'sendLead':
                return new AmoSendLeadTask($dataItem);
            case 'processPayment':
                return new AccountProcessPaymentTask($dataItem);
        }

        throw new \RuntimeException("Error: fabric state task:{$dataItem->getTask()}");
    }
}