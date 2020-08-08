<?php

    interface LoggerInterface
    {
        public function write($text);
    }

    class Logger
    {
        private $logger;

        public function __construct(LoggerInterface $logger)
        {
            $this->logger = $logger;
        }

        public function error($text)
        {
               $this->logger->write("ERROR: " . $text);
        }

        public function warning($text)
        {
            $this->logger->write("WARNING: " . $text);
        }

        public function info($text)
        {
            $this->logger->write("INFO: " . $text);
        }
    }

    class TextFileLogWriter implements LoggerInterface
    {
        public function write($text)
        {
            // TODO: Implement write() method.
        }
    }

    class DatabaseLogWriter implements LoggerInterface
    {
        public function write($text)
        {
            // TODO: Implement write() method.
        }
    }


    $fileLogger = new TextFileLogWriter();
    $databaseLogger = new DatabaseLogWriter();

    (new Logger($fileLogger))->error("error text");
    (new Logger($databaseLogger))->error("error text");