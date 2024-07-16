<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function show(Request $request){

        return view('admin.dashboard.show',[
            'request' => $request,
            'admin' => $request->user('admin')
        ]);
    }
}
