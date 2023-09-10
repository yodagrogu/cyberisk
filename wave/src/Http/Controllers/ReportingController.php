<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;

class ReportingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application reporting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::reporting.index');
    }
}
