<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
    use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('user')->latest()->paginate(10);

        return view('Admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->check() ? auth()->user()->id : null;
        $booking = Booking::create($validated);

        return $booking
            ? redirect()->back()->with('success', 'Booking successfully.we will send you a confirmation email.')
            : redirect()->back()->withErrors( 'Failed to Book.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // $booking = Booking::with('user','table')->findOrFail($booking->id);
        // if ($booking->user_id !== auth()->id()) {
        //     abort(403, 'Unauthorized action.');
        // }

        // return view('Admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $booking =Booking::withRelationshipAutoloading()->get();
        return view('User.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->check() ? auth()->user()->id : null;
        $booking = Booking::update($validated);

        return $booking
            ? redirect()->route('bookings.pdf')->with('success', 'Booking successfully updated.')
            : redirect()->back()->withErrors( 'Failed to update booking.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking successfully deleted.');
    }


public function generatePDF($id)
{
    $booking = Booking::with(['user', 'table'])->findOrFail($id);

    $pdf = Pdf::loadView('User.bookings.booking_pdf', compact('booking'));
    return $pdf->download('Booking-Ticket-'.$booking->id.'.pdf');
}

public function updateStatus(Request $request, Booking $booking)
{
    $request->validate([
        'status' => 'required|in:pending,confirmed,rejected',
    ]);

    $booking->status = $request->status;
    $booking->save();


     if ($booking->status === 'confirmed') {
        Mail::to($booking->email)->send(new BookingConfirmedMail($booking));
    }

    return redirect()->back()->with('success', 'Booking status updated successfully.');
}
 public function editStatus($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('Admin.bookings.updateStatus', compact('booking'));
    }

}
