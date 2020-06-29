<?php

namespace Treefung\Comment\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = null, $message = null) {

        return $this->_result(true, $message, $data);
    }

    public function fail($message = null) {



        return $this->_result(false, $message, null);
    }

    private function _result($success, $message, $data) {

        $json = [
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ];

        if($success) {
            unset($json['message']);
        }

        if(!$success) {
            unset($json['data']);
        }


        return Response::json($json);
    }
}
