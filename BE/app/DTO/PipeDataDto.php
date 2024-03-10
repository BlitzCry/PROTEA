<?php

namespace App\DTO;

use App\Contracts\DTOContract;

class PipeDataDto implements DTOContract
{
    public function __construct(
        private array $data
    ) {
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public static function fromArray($data): PipeDataDto
    {
        return new PipeDataDto($data);
    }
}
