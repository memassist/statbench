<?php

namespace Statbench\Params;

class ParamsConsole
{
    private string $executable = 'statbench';
    private string $command    = '';

    public function __construct(
        ?string $executable = null,
        ?string $command = null
    ) {
        $this->executable = $executable ?? $this->executable;
        $this->command    = $command    ?? $this->command;
    }

    public function getExecutable() : string { return $this->executable; }
    public function getCommand() :    string { return $this->command;    }
}
