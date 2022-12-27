<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\RemindMeApi;
use Illuminate\Http\Request;

class ThirdPartyResourceController extends Controller
{
    /**
     * Show third party resources
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, int $channelID)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $resources = $api->ThirdPartyResourcesGet($channelID);

        return view('thirdpartyresources.show')->with('data', ['resources' => $resources, 'channelID' => $channelID]);
    }
}
