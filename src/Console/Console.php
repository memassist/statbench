<?php

namespace Statbench\Console;

class Console
{
    private CmdInterface $command;

    public function __construct(CmdInterface $command)
    {
        $this->command = $command;
    }

    public function setCommand(CmdInterface $command)
    {
        $this->command = $command;
    }

    public function runCommand() : bool
    {
        return $this->command->execute();
    }
}
