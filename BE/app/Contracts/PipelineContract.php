<?php

namespace App\Contracts;

use App\DTO\PipeDataDto;
use Exception;

interface PipelineContract
{
    public static function pipe(string $field, PipeDataDto $pipeDataDto): PipeDataDto|Exception;
}
