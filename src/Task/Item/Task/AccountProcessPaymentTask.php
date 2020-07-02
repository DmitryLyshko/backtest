<?php

namespace Task\Item\Task;

use Flagmer\Billing\Account;
use Flagmer\Billing\Account\processPaymentDto;
use QXS\WorkerPool\Semaphore;
use QXS\WorkerPool\WorkerInterface;
use Task\Data\DataItemInterface;

/**
 * Class AccountProcessPaymentTask
 * @package Flagmer\Task\Item\Task
 */
final class AccountProcessPaymentTask implements TaskInterface
{
    private DataItemInterface $dataItem;

    /**
     * AccountProcessPaymentTask constructor.
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem)
    {
        $this->dataItem = $dataItem;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        $paymentDto = new processPaymentDto();
        $paymentDto->account_id = $this->dataItem->getData('account_id');
        $paymentDto->amount = $this->dataItem->getData('amount');

        $account = new Account();
        $account->processPaymentAction($paymentDto);

        return true;
    }
}