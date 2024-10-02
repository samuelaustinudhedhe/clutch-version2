<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    /**
     * Show the user dashboard.
     *
     * @param Request $request The current HTTP request instance.
     * @return \Illuminate\View\View The view for the user dashboard.
     */
    public function checkout(Request $request)
    {
        return view('pages.checkout', [
            'request' => $request,
            'admin' => $request->user(),
            'order' => $request->session()->get('order', new \App\Models\Order())
        ]);
    }
}
