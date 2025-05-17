<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Apis\Traits\ApiResponseTrait;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    use ApiResponseTrait;
    public function store(StoreContactRequest $request, User $user)
{
    $contactData = $request->validated();
    $contact = Contact::create($contactData);

    // ✅ لو AJAX: رجع JSON
    if ($request->ajax()) {
        return $this->successResponse($contact, 'Contact created successfully', 201);
    }

    return $contact
    ? redirect()->back()->with('success', 'Thank you for contacting us! We will contact you soon.')
    : redirect()->back()->withErrors('Failed to create contact.');
}

}
