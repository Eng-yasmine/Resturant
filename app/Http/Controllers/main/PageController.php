<?php

namespace App\Http\Controllers\main;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Employee;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('User.pages.index');
    }

    public function about()
    {
        $employees = Employee::with('user')->latest()->paginate(5);
        return view('User.pages.about', compact('employees'));
    }

    public function service()
    {
        return view('User.pages.service');
    }

    public function menu()
    {
//  $menuItems = MenuItem::all();

        $menus = Menu::with('categories.menuItems')->latest()->get();
        return view('User.pages.menu', compact('menus'));
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
        $bookings = Booking::with('user')->get();
        $tables = Table::where('status', 'available')->get();
        return view('User.pages.booking', compact(['bookings', 'tables']));
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



}
