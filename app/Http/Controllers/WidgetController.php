<?php

namespace App\Http\Controllers;

use App\Models\Packsize;
use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function order(Request $request)
    {
        $packSizes = Packsize::all();
        $desiredWidgets = $request->order;

        $result = Widget::optimizePacks($packSizes->pluck('capacity')->toArray(), $desiredWidgets);

        return view('welcome')->with([
            'result' => $result,
            'packSizes' => $packSizes,
            'order' => $desiredWidgets
        ]);
    }
}
