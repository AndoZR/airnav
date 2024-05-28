<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;

class authorizationController extends Controller
{
    private ?string $requestAccess;
    private ?string $userId;

    protected function __construct(string $access = null, string $uniq_id = null) {
        $this->requestAccess = $access;
        $this->userId = $uniq_id;
    }
    protected function checkAccess() {
        try {
            $user = DB::table("authorization_account")->where('uniq_id',$this->userId)->value($this->requestAccess);
            return $user;
        } catch (Exception $e) {
            return 0;
        }
    }
    protected function getParam($param)
    {
        return $this->$param;
    }
}
