<?php

namespace Statbench\Params;

class ParamsConsoleWrapper
{
    private ParamsConsole $params_console;
    private ParamsCsv $params_csv;
    private ParamsMain $params_main;

    public function __construct(
        ParamsConsole $params_console,
        ParamsCsv $params_csv,
        ParamsMain $params_main
    ) {
        $this->params_console = $params_console;
        $this->params_csv     = $params_csv;
        $this->params_main    = $params_main;
    }

    public function getParamsConsole() : ParamsConsole { return $this->params_console; }
    public function getParamsCsv() :     ParamsCsv     { return $this->params_csv;     }
    public function getParamsMain() :    ParamsMain    { return $this->params_main;    }
}
