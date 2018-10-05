<?php

namespace App\Http\Controllers\Emnel3000;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabController extends Controller
{
    public function index()
    {
        return view('emnel3000.welcome');
    }

    public function new()
    {
        return view('emnel3000.new');
    }

    public function show()
    {
        return view('emnel3000.new');
    }
}
