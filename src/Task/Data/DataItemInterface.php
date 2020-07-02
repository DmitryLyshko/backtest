<?php

namespace Task\Data;

/**
 * Class DataInterface
 * @package App\Task\Data
 */
interface DataItemInterface
{
    /**
     * @return string
     */
    public function getTask(): string;

    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @param string $value
     * @return string
     */
    public function getData(string $value): string;
}
