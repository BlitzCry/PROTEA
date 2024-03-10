<?php

namespace App\Factories;

use App\Contracts\PipelineContract;
use App\Exceptions\NotImplementedPipelineException;
use App\Pipelines\DatePipeline;

class PipelineFactory
{
    public static function getPipeline(string $pipeline): PipelineContract
    {
        return match ($pipeline) {
            "date" => new DatePipeline(),
            default => throw new NotImplementedPipelineException(),
        };
    }
}
