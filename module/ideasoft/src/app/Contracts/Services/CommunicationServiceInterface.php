<?php

namespace Ideasoft\Contracts\Services;

interface CommunicationServiceInterface
{
    public function findFlow($userId, $applicationId, $triggerId);

    public function checkCredit($userId);

    public function findCondition($flowId);

    public function findActions($conditionId);

    public function decrementCredit($userId,$cost);
}
