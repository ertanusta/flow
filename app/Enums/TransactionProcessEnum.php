<?php

namespace App\Enums;

enum TransactionProcessEnum: string
{
    case SUCCESS = "success";
    case FAIL = "failure";
    case ERROR = "error";
}
