<?php

namespace Ideasoft\Enums;

enum MessageStatus: string
{
    case Received = "received";
    case Checked = "checked";
    case FlowResolving = "flow_resolving";
    case CheckedFailure = "checked_failure";
    case EmptyCondition = "empty_condition";
    case TrueConditionNotExists = "true_condition_not_exists";
    case ActionDispatched = "action_dispatched";
    case ActionResolve = "action_resolve";
    case InsufficientFunds = "insufficient_funds";
    case SelfTriggeredMessage = "self_triggered_message";
    case TriggerNotFound = "trigger_not_found";
    case FlowNotFound = "flow_not_found";
    case FlowPassiveStatus = "flow_passive_status";
}
