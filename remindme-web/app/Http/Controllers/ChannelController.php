<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\RemindMeApi;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Show channel list
     *
     * @return \Illuminate\View\View
     */
    public function list(Request $request)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $channels = $api->ChannelGet();

        return view('channel.list')->with($channels);
    }

    /**
     * Delete channel
     *
     * @return \Illuminate\View\View
     */
    public function delete(Request $request, int $channelID)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $api->ChannelIDDelete($channelID);

        return back();
    }
}
