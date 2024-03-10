<?php

namespace App\Pipelines;

use App\Contracts\PipelineContract;
use App\DTO\PipeDataDto;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Carbon;

class DatePipeline implements PipelineContract
{
    public static function pipe(string $field, PipeDataDto $pipeDataDto): PipeDataDto|InvalidFormatException
    {
        $parsedData = collect($pipeDataDto->toArray())->map(function (array $value) use ($field) {

            $value[$field] = Carbon::rawParse($value[$field])->toDateString();

            return $value;
        })->toArray();

        return PipeDataDto::fromArray($parsedData);
    }
}
