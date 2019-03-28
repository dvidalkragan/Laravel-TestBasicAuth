<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Gets a given user identified by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_user($id) {
        if(\auth('api')->user()->id == $id) {
            \auth('api')->user()->user_info;
            return response()->json(\auth('api')->user(), 200);
        }
        else {
            return response()->json(['error' => 'Unauthorized'],401);
        }
    }

    public function new_user(Request $request) {
        dd();
    }
}
