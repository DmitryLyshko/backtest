<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use QXS\WorkerPool\WorkerPool;
use Task\Init;
use Task\Controller;
use Task\WorkerTask\WorkerTask;

/**
 * Class App
 */
class App
{
    /**
     * @throws Exception
     */
    public static function main(): void
    {
        $log = new Logger('App');
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $myArgs = ['type' => 'file', 'filename' => 'tasks.json'];
        for ($i = 1; $i < count($_SERVER['argv']); $i++) {
            if (preg_match('/^--([^=]+)=(.*)/', $_SERVER['argv'][$i], $match)) {
                $myArgs[$match[1]] = $match[2];
            }
        }

        try {
            $data = Init::getData($myArgs['type'], $myArgs['filename']);
        } catch (RuntimeException $e) {
            $log->pushHandler(new StreamHandler('log/error.log', Logger::ERROR));
            $log->warning('RuntimeException');
            $log->error($e->getMessage(), ['trace' => $e->getTrace()]);
            printf($e->getMessage() . "\n");
            die();
        }

        $tasks = [];
        foreach ($data as $item) {
            $tasks[] = Controller::start($item);
        }

        $wp = new WorkerPool();
        $wp->setWorkerPoolSize((int) $_ENV['FORK_PROCESS'])
            ->create(new WorkerTask());
        if ($tasks !== []) {
            foreach ($tasks as $task) {
                $wp->run($task);
            }
        }

    }
}

App::main();
