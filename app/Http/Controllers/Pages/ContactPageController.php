<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends PageController
{

    /**
     * This function is responsible for displaying the contact page.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public static function show()
    {
        return view('pages.contact');
    }


    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'topic' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'terms' => 'accepted',
        ]);


        // Process the form data (e.g., send an email)
        // You can use Laravel's Mail facade to send an email
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('support@' . app_domain())
                ->subject($request->subject)
                ->from($request->email);
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
