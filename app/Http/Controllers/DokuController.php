<?php

namespace App\Http\Controllers;

use App\DokuLog;

class DokuController extends Controller
{
    public function logDokuRequest($request)
    {
        DokuLog::create(['contents' => json_encode($request)]);
    }

    public function verify()
    {
        $this->logDokuRequest(request()->all());
    }

    public function notify()
    {
        $this->logDokuRequest(request()->all());
    }
}