<?php

namespace Statbench\Console;

class ConsoleIO
{
    public const STYLE_BOLD    = 'bold';
    public const STYLE_BLACK   = 'black';
    public const STYLE_RED     = 'red';
    public const STYLE_GREEN   = 'green';
    public const STYLE_YELLOW  = 'yellow';
    public const STYLE_BLUE    = 'blue';
    public const STYLE_MAGENTA = 'magenta';
    public const STYLE_CYAN    = 'cyan';

    private $input_stream;
    private $output_stream;

    public function __construct($input_stream = STDIN, $output_stream = STDOUT)
    {
        $this->input_stream = $input_stream;
        $this->output_stream = $output_stream;
    }

    public function gets()
    {
        return fgets($this->input_stream);
    }

    public function puts(string $text, ?string $style = null, bool $newline = true)
    {
        // Use https://github.com/adoxa/ansicon to make the escape sequences work on windows cmd
        $styles = [
            self::STYLE_BOLD    => "\033[1m%s\033[0m",
            self::STYLE_BLACK   => "\033[0;30m%s\033[0m",
            self::STYLE_RED     => "\033[0;31;31m%s\033[0m",
            self::STYLE_GREEN   => "\033[0;32m%s\033[0m",
            self::STYLE_YELLOW  => "\033[0;33m%s\033[0m",
            self::STYLE_BLUE    => "\033[0;34m%s\033[0m",
            self::STYLE_MAGENTA => "\033[0;35m%s\033[0m",
            self::STYLE_CYAN    => "\033[0;36m%s\033[0m"
        ];
        fwrite(
            $this->output_stream,
            sprintf(isset($styles[$style]) ? $styles[$style] : "%s", $text)
        );
        if ($newline) {
            fwrite($this->output_stream, PHP_EOL);
        }
    }
}
