<?php

namespace Statbench\Console;

use Statbench\Params\ParamsMain;

class CmdRun implements CmdInterface
{
    private ConsoleIO $io;
    private ParamsMain $params_main;

    public function __construct(
        ConsoleIO $io,
        ParamsMain $params_main
    ) {
        $this->io = $io;
        $this->params_main = $params_main;
    }

    public function execute() : bool
    {
        // TODO: ...
        return true;
    }
}
