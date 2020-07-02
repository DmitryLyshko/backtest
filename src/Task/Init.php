<?php

namespace Task;

use Task\Data\DataItem;

/**
 * Class Init
 * @package Flagmer\Task\Data
 */
final class Init
{
    /**
     * @param string $type
     * @param string $fileName
     * @return array
     * @throws \Exception
     */
    public static function getData(string $type, string $fileName): array
    {
        switch ($type) {
            case 'file';
                $array = self::getFileData($fileName);
                break;
            default;
                $array = [];
                break;
        }

        return $array;
    }

    /**
     * @param string $fileName
     * @return array $array
     */
    private static function getFileData(string $fileName): array
    {
        $array = [];
        if (file_exists($fileName) === false) {
            throw new \RunTimeException("File {$fileName} not found");
        }

        $file_handle = fopen($fileName, "r");

        while (!feof($file_handle)) {
            $line = rtrim(preg_replace('/[\t|\s]/', '', fgets($file_handle)), ',');
            $data = json_decode($line, true);
            if ($data !== null) {
                $array[] = new DataItem($data['category'], $data['task'], $data['data']);
            }
        }

        fclose($file_handle);

        return $array;
    }

}