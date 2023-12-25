<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index');
    }

    public function search(Request $request)
    {
        $users = User::search($request->input('query'))->get();
        if( $users->isNotEmpty() )
            return $users;
        else
            return abort(500);
    }
}
