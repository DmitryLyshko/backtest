<?php

namespace Task\Data;

/**
 * Class DataItem
 * @package App\Task\Data
 */
final class DataItem implements DataItemInterface
{
    private string $category;
    private string $task;
    private array $data;

    /**
     * DataItem constructor.
     * @param string $category
     * @param string $task
     * @param array $data
     */
    public function __construct(string $category, string $task, array $data)
    {
        $this->category = $category;
        $this->task = $task;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getTask(): string
    {
        return $this->task;
    }

    /**
     * @param string $value
     * @return string
     */
    public function getData(string $value): string
    {
        return $this->data[$value];
    }
}