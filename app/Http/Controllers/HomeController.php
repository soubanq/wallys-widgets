<?php

namespace App\Http\Controllers;

use App\Models\Packsize;
use App\Models\Widget;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $packSizes = Packsize::all();

        return view('welcome')->with('packSizes', $packSizes);
    }
}
