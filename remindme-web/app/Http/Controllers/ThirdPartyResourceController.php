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

    /**
     * Delete third party resource
     *
     * @return \Illuminate\View\View
     */
    public function delete(Request $request, int $channelID, int $resourceID)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $api->ThirdPartyResourcesDelete($channelID, $resourceID);

        return back();
    }

    /**
     * Add a third party resource
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request, int $channelID)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $api->ThirdPartyResourcesAdd($channelID, $request->get("type"), $request->get("url"));

        return back();
    }
}
