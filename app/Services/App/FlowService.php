<?php

namespace App\Services\App;

use App\Contracts\Services\App\FlowServiceInterface;
use App\Models\User;
use App\Services\App\Pipeline\FlowCreator\FlowCreatorHandler;
use App\Services\App\Pipeline\FlowCreator\FlowCreatorMessage;
use Illuminate\Pipeline\Pipeline;

class FlowService implements FlowServiceInterface
{

    private Pipeline $pipeline;

    public function __construct(Pipeline $pipeline)
    {
        $this->pipeline = $pipeline;
    }

    public function getFlows(User $user)
    {
        return $user->getFlows()
            ->with('application')
            ->paginate(10);
    }

    public function create(array $flowData)
    {
        $message = new FlowCreatorMessage($flowData);
        $this->pipeline
            ->send($message)
        ->through([
            FlowCreatorHandler::class,
            //diğerleri buraya gelecek
        ]);
    }
}
