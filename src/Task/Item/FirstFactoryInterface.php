<?php

namespace Task\Item;

use Task\Data\DataItemInterface;

/**
 * Interface FirstFactoryInterface
 * @package Task\Item
 */
interface FirstFactoryInterface
{
    /**
     * FirstFactoryInterface constructor.
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem);

}