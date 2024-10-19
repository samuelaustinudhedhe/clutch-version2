<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;

class BlogPageController extends PageController
{
    /**
     * Display the blog index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.blog.index');
    }

    /**
     * Display a specific blog post.
     *
     * @param string $slug The slug of the blog post.
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        return view('pages.blog.show', compact('slug'));
    }
}