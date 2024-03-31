<?php

namespace App\Services\App\Pipeline\FlowCreator;

use App\Contracts\Services\Pipeline\FlowCreator\FlowCreatorInterface;
use App\Models\Condition;

class ConditionCreatorHandler implements FlowCreatorInterface
{

    public function handle(FlowCreatorMessage $message, \Closure $next)
    {
        $condition = Condition::create([
            'flow_id' => $message->flow->id,
            'condition' => $message->content['condition'],
        ]);
        //todo: burada condition doğru çalışıyor mu diye bir kontrol etmek lazım
        // rule engine il böyle bir kontrol mekanizması sağlayabilirsin
        // objenin fieldlarına gerekli değerleri ver true veya false sonuç vermesnin bir önemi yok sadece çalışsın
        $message->condition = $condition;
        $next($message);
    }
}
