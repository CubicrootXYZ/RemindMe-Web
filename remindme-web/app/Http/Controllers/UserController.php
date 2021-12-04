<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\RemindMeApi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show users list
     *
     * @return \Illuminate\View\View
     */
    public function list(Request $request)
    {
        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $users = $api->UserGet(['blocked']);

        return view('user.list')->with($users);
    }

    /**
     * Change user
     *
     * @return \Illuminate\View\View
     */
    public function changeUser(Request $request, string $userID)
    {
        $input = $request->only(['blocked', 'block_reason']);
        if (isset($input['blocked'])) {
            $input['blocked'] = strval($input['blocked']) == "true";
        }

        $api = new RemindMeApi($request->get('username'), $request->get('password'));
        $api->UserIDPost($userID, $input);

        return back();
    }
}
