<?php

namespace App\Services;

use App\DTO\PipeDataDto;
use App\Exceptions\NotImplementedPipelineException;
use App\Factories\PipelineFactory;

class PipelineService
{
    public function __construct()
    {
    }

    public function pipe(array $pipelines, PipeDataDto $pipeDataDto): PipeDataDto
    {
        foreach ($pipelines as [
            "field" => $field,
            "pipeline" => $pipeline
        ]) {
            try {
                $nextPipeline = PipelineFactory::getPipeline($pipeline);
            } catch (NotImplementedPipelineException $th) {
                dump("[" . $pipeline . "] pipeline is not implemented.");
            }

            $pipeDataDto = $nextPipeline->pipe($field, $pipeDataDto);
        }

        return $pipeDataDto;
    }
}
