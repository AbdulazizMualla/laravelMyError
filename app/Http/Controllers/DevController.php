<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DevController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        chdir('/Applications/XAMPP/xamppfiles/htdocs/laravelMyError');
        $output = shell_exec('git pull 2>&1');
        //exec('git pull');
        return response()->json($output);
    }
}
