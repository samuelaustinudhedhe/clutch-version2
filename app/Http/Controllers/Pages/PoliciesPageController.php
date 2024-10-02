<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Jetstream\Jetstream;

class PoliciesPageController extends PageController
{
    /**
     * Display the Policies Home page .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('pages.policies.show', [
            'request' => $request,
            'user' => $request->user(),
            'admin' => $request->user('admin'),
        ]);
    }
    /**
     * Convert the content of a Markdown file to HTML and return a view with the content.
     *
     * @param string $name The name of the Markdown file (without extension) to be read.
     * @param string $path The path of the view to be returned.
     * @return View The view displaying the converted HTML content.
     */
    public function index($name, $path): View
    {
        // $content = Str::markdown(File::get(resource_path('markdown/' . $name . '.md')));        
        // return view($path, compact('content'));

        $file = Jetstream::localizedMarkdownPath($name . '.md');

        return view($path, [
            'content' => Str::markdown(file_get_contents($file)),
        ]);
    }

    /**
     * Display the Terms of Service page.
     *
     * This method reads the terms.md file from the resources/markdown directory,
     * converts its content from Markdown to HTML, and returns the terms view with
     * the rendered HTML content.
     *
     * @return View The view displaying the Terms of Service.
     */
    public function terms(): View
    {
        return $this->index('terms', 'pages.policies.terms');
    }

    /**
     * Display the Privacy Policy page.
     *
     * This method reads the privacy.md file from the resources/markdown directory,
     * converts its content from Markdown to HTML, and returns the policy view with
     * the rendered HTML content.
     *
     * @return View The view displaying the Privacy Policy.
     */
    public function privacy(): View
    {
        return $this->index('privacy', 'pages.policies.privacy');
    }

    /**
     * Display the Cookie Policy page.
     *
     * This method reads the cookie.md file from the resources/markdown directory,
     * converts its content from Markdown to HTML, and returns the cookie policy view with
     * the rendered HTML content.
     *
     * @return View The view displaying the Cookie Policy.
     */
    public function cookie(): View
    {
        return $this->index('cookie', 'pages.policies.cookie');
    }

    /**
     * Check if the application has the Terms and Privacy Policy feature enabled.
     *
     * This method checks if the Jetstream package has the Terms and Privacy Policy feature enabled.
     * It is a static method, meaning it can be called without instantiating the PoliciesPageController class.
     *
     * @return bool Returns true if the Terms and Privacy Policy feature is enabled, false otherwise.
     */
    public static function hasTermsAndPrivacyPolicyFeature()
    { // !Note: turn on terms and policy feature
        return Jetstream::hasTermsAndPrivacyPolicyFeature();
    }
}
