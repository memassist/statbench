<?php

namespace Statbench\Params;

class ParamsCsv
{
    private bool $reduction = false;    // Calculate reduction instead of speedup (ex. for cache-misses measure instead of execution time)
    private ?string $input_file = null; // The input CSV file. null if

    public function __construct(
        ?bool $reduction = null
    ) {
        $this->reduction = $reduction ?? $this->reduction;
    }

    public function getReduction() : bool { return $this->reduction; }
}
