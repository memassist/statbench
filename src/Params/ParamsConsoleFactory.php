<?php

namespace Statbench\Params;

class ParamsConsoleFactory
{
    private array $args;

    public function __construct(array $args)
    {
        $this->args = $args;
    }

    /**
     * @param   array  $commands_whitelist
     *
     * @return \Statbench\Params\ParamsConsoleWrapper
     * @throws \Exception
     */
    public function createParams(array $commands_whitelist) : ParamsConsoleWrapper
    {
        $params_console = $this->createParamsConsole($commands_whitelist);
        $params_csv     = $this->createParamsCsv();
        $params_main    = $this->createParamsMain();

        return new ParamsConsoleWrapper(
            $params_console,
            $params_csv,
            $params_main
        );
    }

    /**
     * @param   array  $commands_whitelist
     *
     * @return \Statbench\Params\ParamsConsole
     * @throws \Exception
     */
    private function createParamsConsole(array $commands_whitelist) : ParamsConsole
    {
        $executable = array_shift($this->args);
        $command_name = array_shift($this->args);

        if (!array_key_exists($command_name, $commands_whitelist)) {
            throw new \Exception("The command {$command_name} is not recognized");
        }

        $params = new ParamsConsole();
        // TODO: ...
        return $params;
    }

    /**
     * @return \Statbench\Params\ParamsCsv
     */
    private function createParamsCsv() : ParamsCsv
    {
        $params = new ParamsCsv();
        // TODO: ...
        return $params;
    }

    /**
     * @return \Statbench\Params\ParamsMain
     */
    private function createParamsMain() : ParamsMain
    {
        $params = new ParamsMain();
        // TODO: ...
        return $params;
    }
}
