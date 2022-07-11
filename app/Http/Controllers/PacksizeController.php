<?php

namespace App\Http\Controllers;

use App\Models\Packsize;
use App\Models\Widget;
use Illuminate\Http\Request;

class PacksizeController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $packsize = new Packsize;
        $packsize->capacity = $request->packsize;
        $packsize->save();

        return redirect()->action([HomeController::class, 'index']);
    }

    public function update(Request $request, Packsize $packsize)
    {
        $packsize->capacity = $request->packsize;
        $packsize->save();

        return redirect()->action([HomeController::class, 'index']);
    }

    public function destroy(Packsize $packsize)
    {
        $packsize->delete();

        return redirect()->action([HomeController::class, 'index']);
    }
}
