<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function home(): View
    {
        return view('home');
    }

    /**
     * Display the about page.
     *
     * @return View
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Display the contact page.
     *
     * @return View
     */
    public function contact(): View
    {
        return view('contact');
    }
}
