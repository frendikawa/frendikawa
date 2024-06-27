<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Method index
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.pages.index');
    }
}
