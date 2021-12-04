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
        $data = [
            'usersTotal' => 0,
            'usersAdmin' => 0,
            'channelsTotal' => 0,
            'dailyReminderEnabled' => 0,
        ];

        $users = $api->UserGet();
        $data['usersTotal'] = count($users['data']);
        foreach ($users['data'] as $user) {
            foreach ($user['channels'] as $channel) {
                if ($channel['role'] == RemindMeApi::ROLE_ADMIN) {
                    $data['usersAdmin'] += 1;
                }

                if ($channel['daily_reminder']) {
                    $data['dailyReminderEnabled'] += 1;
                }

                $data['channelsTotal'] += 1;
            }
        }

        return view('main.overview')->with($data);
    }
}
