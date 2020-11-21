<?php

namespace Statbench\Console;

class CmdList implements CmdInterface
{
    private ConsoleIO $io;
    private array $commands_whitelist;

    public function __construct(
        ConsoleIO $io,
        array $commands_whitelist
    ) {
        $this->io = $io;
        $this->commands_whitelist = $commands_whitelist;
    }

    public function execute() : bool
    {
        echo 'Available commands:' . PHP_EOL;
        foreach ($this->commands_whitelist as $key => $value) {
            echo ' - statbench ' . $key . PHP_EOL;
        }
        return true;
    }
}
