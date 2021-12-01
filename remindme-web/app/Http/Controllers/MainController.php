<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\RemindMeApi;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Show overview site
     *
     * @return \Illuminate\View\View
     */
    public function overview(Request $request)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));

        return view('main.overview')->with(['data' => json_encode($api->UserGet())]);
    }
}
