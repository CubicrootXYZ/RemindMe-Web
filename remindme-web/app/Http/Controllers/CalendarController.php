<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\RemindMeApi;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    /**
     * Patch calendar
     *
     * @return \Illuminate\View\View
     */
    public function patch(Request $request, int $calendarID)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $api->CalendarPatch($calendarID);

        return back();
    }
}
