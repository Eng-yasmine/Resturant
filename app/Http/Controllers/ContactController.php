<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request ,User $user)
    {
        $contactData = $request->validated();

        $contacts = Contact::create($contactData);

        if ($contacts->withRelationshipAutoloading()) {
            // Mail::to(auth()->user()->email)->send(new ContactMessageMail($user));
            return redirect()->back()->with("success",  "Thank you for contacting us!  We will contact you soon.");

        }
        return redirect()->back()->withErrors('something error ! please try again');
    }
}
