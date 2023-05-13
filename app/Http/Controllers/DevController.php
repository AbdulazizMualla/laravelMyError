<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
        $output = shell_exec('git pull 2>&1');
        echo '<per>';
        return [$output];
    }
}
