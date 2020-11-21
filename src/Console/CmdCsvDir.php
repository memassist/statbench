<?php

namespace Statbench\Console;

use Statbench\Params\ParamsCsv;
use Statbench\Params\ParamsMain;

class CmdCsvDir implements CmdInterface
{
    private ConsoleIO $io;
    private ParamsCsv $params_csv;
    private ParamsMain $params_main;

    public function __construct(
        ConsoleIO $io,
        ParamsCsv $params_csv,
        ParamsMain $params_main
    ) {
        $this->io = $io;
        $this->params_csv = $params_csv;
        $this->params_main = $params_main;
    }

    public function execute() : bool
    {
        // TODO: ...
        return true;
    }
}
