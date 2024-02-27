<?php

namespace Ideasoft;


use Ideasoft\Models\Authentication;
use Ideasoft\Models\Trigger;

class Message
{
    private $processId;
    private Authentication|null $authentication = null;
    private Trigger|null $trigger = null;
    private $flowId;
    private $flowName;
    private $flowStatus;
    private $triggerId;
    private $triggerName;
    private $triggerApplicationId;
    private $triggerApplicationName;
    private $userId;
    private $condition;
    private $conditionId;
    private $actionContextId;
    private $actionId;
    private $actionName;
    private $actionApplicationId;
    private $actionApplicationName;
    private $cost;
    private $avaibleCredit;
    private $status;
    private $message;
    private $actionContext;
    private $transactionId;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function getProcessId(): string
    {
        return $this->processId;
    }

    public function setProcessId(string $processId): void
    {
        $this->processId = $processId;
    }

    public function getAuthentication(): Authentication|null
    {
        return $this->authentication;
    }

    public function setAuthentication(Authentication $authentication): void
    {
        $this->authentication = $authentication;
    }

    public function getTrigger(): Trigger|null
    {
        return $this->trigger;
    }

    public function setTrigger(Trigger $trigger): void
    {
        $this->trigger = $trigger;
    }

    public function getFlowId(): mixed
    {
        return $this->flowId;
    }

    public function setFlowId(mixed $flowId): void
    {
        $this->flowId = $flowId;
    }

    public function getFlowName(): mixed
    {
        return $this->flowName;
    }

    public function setFlowName(mixed $flowName): void
    {
        $this->flowName = $flowName;
    }

    public function getFlowStatus(): mixed
    {
        return $this->flowStatus;
    }

    public function setFlowStatus(mixed $flowStatus): void
    {
        $this->flowStatus = $flowStatus;
    }

    /**
     * @return mixed
     */
    public function getTriggerId()
    {
        return $this->triggerId;
    }

    /**
     * @param mixed $triggerId
     */
    public function setTriggerId($triggerId): void
    {
        $this->triggerId = $triggerId;
    }

    /**
     * @return mixed
     */
    public function getTriggerName()
    {
        return $this->triggerName;
    }

    /**
     * @param mixed $triggerName
     */
    public function setTriggerName($triggerName): void
    {
        $this->triggerName = $triggerName;
    }

    /**
     * @return mixed
     */
    public function getTriggerApplicationId()
    {
        return $this->triggerApplicationId;
    }

    /**
     * @param mixed $triggerApplicationId
     */
    public function setTriggerApplicationId($triggerApplicationId): void
    {
        $this->triggerApplicationId = $triggerApplicationId;
    }

    /**
     * @return mixed
     */
    public function getTriggerApplicationName()
    {
        return $this->triggerApplicationName;
    }

    /**
     * @param mixed $triggerApplicationName
     */
    public function setTriggerApplicationName($triggerApplicationName): void
    {
        $this->triggerApplicationName = $triggerApplicationName;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition): void
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getConditionId()
    {
        return $this->conditionId;
    }

    /**
     * @param mixed $conditionId
     */
    public function setConditionId($conditionId): void
    {
        $this->conditionId = $conditionId;
    }

    /**
     * @return mixed
     */
    public function getActionContextId()
    {
        return $this->actionContextId;
    }

    /**
     * @param mixed $actionContextId
     */
    public function setActionContextId($actionContextId): void
    {
        $this->actionContextId = $actionContextId;
    }

    /**
     * @return mixed
     */
    public function getActionId()
    {
        return $this->actionId;
    }

    /**
     * @param mixed $actionId
     */
    public function setActionId($actionId): void
    {
        $this->actionId = $actionId;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param mixed $actionName
     */
    public function setActionName($actionName): void
    {
        $this->actionName = $actionName;
    }

    /**
     * @return mixed
     */
    public function getActionApplicationId()
    {
        return $this->actionApplicationId;
    }

    /**
     * @param mixed $actionApplicationId
     */
    public function setActionApplicationId($actionApplicationId): void
    {
        $this->actionApplicationId = $actionApplicationId;
    }

    /**
     * @return mixed
     */
    public function getActionApplicationName()
    {
        return $this->actionApplicationName;
    }

    /**
     * @param mixed $actionApplicationName
     */
    public function setActionApplicationName($actionApplicationName): void
    {
        $this->actionApplicationName = $actionApplicationName;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        //todo: burada bir event fırlatıp tüm durumu update ettiricez
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getAvaibleCredit()
    {
        return $this->avaibleCredit;
    }

    /**
     * @param mixed $avaibleCredit
     */
    public function setAvaibleCredit($avaibleCredit): void
    {
        $this->avaibleCredit = $avaibleCredit;
    }

    /**
     * @return mixed
     * @throws \JsonException
     */
    public function getActionContext()
    {
        return json_decode($this->actionContext, JSON_THROW_ON_ERROR, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param mixed $actionContext
     */
    public function setActionContext($actionContext): void
    {
        $this->actionContext = $actionContext;
    }

    public function check()
    {
        //todo: burada ne yapacağız
    }
}
