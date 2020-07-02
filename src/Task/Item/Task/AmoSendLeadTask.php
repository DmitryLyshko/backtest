<?php

namespace Task\Item\Task;

use Flagmer\Integrations\AmoCrm;
use Flagmer\Integrations\Amocrm\sendLeadDto;
use QXS\WorkerPool\Semaphore;
use QXS\WorkerPool\WorkerInterface;
use Task\Data\DataItemInterface;

/**
 * Class AmoSendLeadTask
 * @package Flagmer\Task\Item\Task
 */
final class AmoSendLeadTask implements TaskInterface
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
        $amoLeadDto = new sendLeadDto();
        $amoLeadDto->lead_id = $this->dataItem->getData('lead_id');

        $amoCrm = new AmoCrm();
        $amoCrm->sendLeadAction($amoLeadDto);
        return true;
    }
}