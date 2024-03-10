<?php

namespace App\Exceptions;

use Exception;

class NotImplementedPipelineException extends Exception
{
    public function __toString()
    {
        return "Pipeline is not implemented yet.";
    }
}
