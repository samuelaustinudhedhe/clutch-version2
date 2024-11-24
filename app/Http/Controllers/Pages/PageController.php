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

    /**
     * This function is responsible for displaying the about page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function aboutShow()
    {
        return view('pages.about');
    }

    /**
     * This function is responsible for displaying the how It Works page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function howItWorksShow()
    {
        return view('pages.how-it-works');
    }

    /**
     * This function is responsible for displaying the becomeHost page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function becomeHostShow()
    {
        return view('pages.become-a-host');
    }

    /**
     * This function is responsible for displaying the contact page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function contactShow()
    {
        return ContactPageController::show();
    }

}
