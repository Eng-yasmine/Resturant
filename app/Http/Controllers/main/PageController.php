<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('User.pages.index');
    }

    public function about()
    {
        return view('User.pages.about');
    }

    public function service()
    {
        return view('User.pages.service');
    }

    public function menu()
    {
        return view('User.pages.menu');
    }

    public function team()
    {
        return view('User.pages.team');
    }

    public function contact()
    {
        return view('User.pages.menu');
    }

    public function booking()
    {
        return view('User.pages.booking');
    }

    public function testimonial()
    {
        return view('User.pages.testimonial');
    }
}
