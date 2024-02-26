<?php

namespace Ideasoft\Services;

use Ideasoft\Constants\AppConstants;
use Ideasoft\Contracts\Services\CommunicationServiceInterface;
use Illuminate\Support\Facades\Http;

class CommunicationService implements CommunicationServiceInterface
{

    public function findFlow($userId, $applicationId, $triggerId)
    {
        $query = [
            'userId' => $userId,
            'applicationId' => $applicationId,
            'triggerId' => $triggerId
        ];
        $response = Http::get(AppConstants::CORE_REQUEST_URL . '/internal/flow/find', $query);
        $response->throw();
        return $response->json()['data'];
    }

    public function checkCredit($userId)
    {
        $query = ['userId' => $userId];
        $response = Http::get(AppConstants::CORE_REQUEST_URL . '/internal/user/check-credit', $query);
        $response->throw();
        return $response->json();
    }

    public function findConditions($flowId)
    {
        $query = ['flowId' => $flowId];
        $response = Http::get(AppConstants::CORE_REQUEST_URL . '/internal/condition/find', $query);
        $response->throw();
        $response = $response->json();
        return $response;
    }

    public function findActions($conditionId)
    {
        $query = ['conditionId' => $conditionId];
        $response = Http::get(AppConstants::CORE_REQUEST_URL . '/internal/action-context/find', $query);
        $response->throw();
        $response = $response->json();
        return $response;
    }

    public function decrementCredit($userId, $cost)
    {
        // TODO: burayı yaz
    }
}
