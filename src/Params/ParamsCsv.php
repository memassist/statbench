<?php

namespace Statbench\Params;

class ParamsCsv
{
    private bool $reduction = false;        // Calculate reduction instead of speedup (ex. for cache-misses measure instead of execution time)
    private ?string $input_filename = null; // The input CSV file. null if not in 'file' mode

    public function __construct(
        ?bool $reduction = null,
        ?string $input_filename = null
    ) {
        $this->reduction      = $reduction      ?? $this->reduction;
        $this->input_filename = $input_filename ?? $this->input_filename;
    }

    public function getReduction() :     bool    { return $this->reduction;      }
    public function getInputFilename() : ?string { return $this->input_filename; }
}
