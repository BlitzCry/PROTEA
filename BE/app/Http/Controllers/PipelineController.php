<?php

namespace App\Http\Controllers;

use App\DTO\PipeDataDto;
use App\Services\PipelineService;
use Illuminate\Http\Request;

class PipelineController
{
    public function __controller()
    {
    }

    public function __invoke(Request $request)
    {
        $pipelineService = new PipelineService();
        try {
            $pipelines = $request->pipelines;
            $pipelineDTO = PipeDataDto::fromArray($request->data);

            $response = $pipelineService->pipe($pipelines, $pipelineDTO);

            return response()->json(["data" => $response->toArray()]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getMessage(),
                "trace" => $th->getTrace(),
            ]);
        }
    }
}
