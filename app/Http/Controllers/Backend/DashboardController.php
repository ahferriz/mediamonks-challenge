<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get current user
        $oUser = Auth::user();

        // Define data to show on dashboard
        $dashboardData = [];

        // Return view
        return view('dashboard')->with($dashboardData);
    }

}
