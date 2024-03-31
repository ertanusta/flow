<?php

namespace App\Services\App;

use App\Contracts\Services\App\FlowServiceInterface;
use App\Exceptions\HandlerException;
use App\Models\User;
use App\Services\App\Pipeline\FlowCreator\ActionContextCreatorHandler;
use App\Services\App\Pipeline\FlowCreator\ConditionCreatorHandler;
use App\Services\App\Pipeline\FlowCreator\FlowCreatorHandler;
use App\Services\App\Pipeline\FlowCreator\FlowCreatorMessage;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $message = new FlowCreatorMessage($flowData);
            $this->pipeline
                ->send($message)
                ->through([
                    FlowCreatorHandler::class,
                    ConditionCreatorHandler::class,
                    ActionContextCreatorHandler::class
                ])
                ->thenReturn();
            DB::commit();
        } catch (HandlerException $exception) {
            dd($exception);
            DB::rollBack();
            //todo: handler exceptionlara dikkat et
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            //todo: hadlerExceptionlara dikkat et
        }
        return $message;
    }
}
