<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * This function is responsible for displaying the home page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     *
     * @throws \Throwable
     */
    public function homeShow()
    {
        return view('pages.home');
    }

    public function carsShow(){
        $cars = \App\Models\Vehicle::paginate(10);

        return view('pages.cars', compact('cars'));
    }
}
