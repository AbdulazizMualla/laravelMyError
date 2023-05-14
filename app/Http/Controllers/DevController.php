<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $output = shell_exec('git pull');
        //exec('git pull');
        return response()->json($output);
    }
}
