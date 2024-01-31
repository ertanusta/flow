<?php

namespace App\Http\Controllers\Internal;

use App\Http\Requests\Internal\FlowFinderRequest;

class FlowController
{

    public function flowFind(FlowFinderRequest $request)
    {
        $data = $request->validationData();
        //todo: burayı kontrol edip tamamla gerçekten flow id yi verecek mi.
    }
}
