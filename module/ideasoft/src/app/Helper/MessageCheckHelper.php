<?php

namespace Ideasoft\Helper;

use Ideasoft\Constants\AppConstants;
use Illuminate\Support\Facades\Cache;

class MessageCheckHelper
{
    public static function checkSelfTrigger($data, $userId)
    {
        $text = "";
        if (!is_array($data)) {
            $text = $data;
        } elseif (is_array($data)) {
            foreach ($data as $value) {
                if (!is_array($value)) {
                    $text .= $value;
                }
            }
        }
        $crpytText = md5($text . $userId . AppConstants::APP_NAME);
        if (Cache::has($crpytText)) {
            Cache::delete($crpytText);
            return true;
        }
        return false;
    }


}
