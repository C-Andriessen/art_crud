<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arts = Art::orderByDesc('created_at')->paginate(20);
        return view('art.index', compact('arts'));
    }
}
