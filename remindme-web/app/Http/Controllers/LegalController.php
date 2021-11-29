<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    /**
     * Show legal site
     *
     * @return \Illuminate\View\View
     */
    public function inprint()
    {
        return view('legal.inprint');
    }

    /**
     * Show privacy policy
     *
     * @return \Illuminate\View\View
     */
    public function privacyPolicy()
    {
        return view('legal.privacy-policy');
    }
}
