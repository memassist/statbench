<?php

namespace Statbench\Params;

class ParamsMain
{
    private int    $verbosity            = 2;         // 0, 1, or 2
    private float  $target_rel_precision = 0.05;      // 5% target precision
    private float  $target_abs_precision = 0;         // no target absolute precision (in s)
    private int    $initial_runs         = 20;        // no. of guaranteed initial runs
    private int    $max_iterations       = 1000;      // hard max. no of iterations
    private string $variability_measure  = 'mad_dev'; // method for calculating uncertainty - Standard deviation (std_dev) or Median absolute deviation (mad_dev)
    private array  $instances            = [];
    private bool   $started              = false;
    private int    $outlier_rejection    = 3;         // no. of "sigma"s for the outlier rejection
    private bool   $subtract_dry_run     = true;

    public function __construct(
        ?int $verbosity = null,
        ?float $target_rel_precision = null,
        ?float $target_abs_precision = null,
        ?int $initial_runs = null,
        ?int $max_iterations = null,
        ?string $variability_measure = null,
        ?array $instances = null,
        ?bool $started = null,
        ?int $outlier_rejection = null,
        ?bool $subtract_dry_run = null
    ) {
        $this->verbosity            = $verbosity            ?? $this->verbosity;
        $this->target_rel_precision = $target_rel_precision ?? $this->target_rel_precision;
        $this->target_abs_precision = $target_abs_precision ?? $this->target_abs_precision;
        $this->initial_runs         = $initial_runs         ?? $this->initial_runs;
        $this->max_iterations       = $max_iterations       ?? $this->max_iterations;
        $this->variability_measure  = $variability_measure  ?? $this->variability_measure;
        $this->instances            = $instances            ?? $this->instances;
        $this->started              = $started              ?? $this->started;
        $this->outlier_rejection    = $outlier_rejection    ?? $this->outlier_rejection;
        $this->subtract_dry_run     = $subtract_dry_run     ?? $this->subtract_dry_run;
    }

    public function getVerbosity() :          int    { return $this->verbosity;            }
    public function getTargetRelPrecision() : float  { return $this->target_rel_precision; }
    public function getTargetAbsPrecision() : float  { return $this->target_abs_precision; }
    public function getInitialRuns() :        int    { return $this->initial_runs;         }
    public function getMaxIterations() :      int    { return $this->max_iterations;       }
    public function getVariabilityMeasure() : string { return $this->variability_measure;  }
    public function getInstances() :          array  { return $this->instances;            }
    public function getStarted() :            bool   { return $this->started;              }
    public function getOutlierRejection() :   int    { return $this->outlier_rejection;    }
    public function getSubtractDryRun() :     bool   { return $this->subtract_dry_run;     }
}
