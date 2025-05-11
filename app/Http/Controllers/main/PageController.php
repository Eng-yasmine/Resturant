<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        return view('User.pages.contact');
    }

    public function booking()
    {
        return view('User.pages.booking');
    }

    public function testimonial()
    {
        return view('User.pages.testimonial');
    }
    public function ContactView()
    {
        $contacts = Contact::with('user')->latest()->paginate(10);
        // dd($contact);
        return view('Admin.users.ContactView', compact('contacts'));
    }
    public function add_category()
    {
        return view('Admin.pages.addCategory');
    }
    public function add_employee()
    {
        return view('Admin.pages.addEmployee');
    }
    // public function add_Posts()
    // {

    // }
    public function add_menu_item()
    {
        return view('Admin.pages.addMenuItem');
    }
}
