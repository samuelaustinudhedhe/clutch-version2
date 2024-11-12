<?php

namespace App\View\Livewire\User\Bookings;

use Livewire\Component;
use App\Models\Trip;
use App\Notifications\Trips\Approve\TripApprovedForOwner;
use App\Notifications\Trips\Approve\TripApprovedForTraveler;
use App\Notifications\Trips\Cancel\TripCanceled;
use App\Notifications\Trips\Cancel\TripCancellationRequest;
use App\Notifications\Trips\Cancel\TripCancellationRequestSubmitted;
use App\Notifications\Trips\End\TripEnded;
use App\Notifications\Trips\End\TripEndRequest;
use App\Notifications\Trips\End\TripEndRequestSubmitted;

class Show extends Component
{
    public $booking;

    public function mount(Trip $booking)
    {
        $this->booking = $booking;
    }

    public function requestEndBooking()
    {
        if (getUser()->id !== $this->booking->vehicle->owner->id) {
            // Traveler initiates end booking request
            $this->booking->vehicle->owner->notify(new TripEndRequest($this->booking, $this->booking->traveler));
            $this->booking->traveler->notify(new TripEndRequestSubmitted($this->booking, $this->booking->traveler));
        } else {
            if ($this->booking->status === 'in_progress') {
                $this->booking->status = 'ended';
                $this->booking->save();

                $this->booking->traveler->notify(new TripEnded($this->booking, $this->booking->traveler));
                $this->booking->vehicle->owner->notify(new TripEnded($this->booking, $this->booking->traveler));

                return redirect()->route('user.bookings.index')->with('success', "Booking #({$this->booking->id}) ended successfully.");
            } else {
                session()->flash('error', 'This booking cannot be ended at this time.');
            }
        }
    }
    /**
     * Handles the cancellation request for a booking.
     *
     * This function checks the booking status and the start time to determine
     * if a cancellation request can be submitted or if the booking can be directly
     * cancelled. It sends notifications to the traveler and vehicle owner accordingly.
     *
     * @return \Illuminate\Http\RedirectResponse Redirects to the bookings index page with a success message
     *                                           if the cancellation is requested or completed successfully.
     *                                           Otherwise, flashes an error message to the session.
     */
    public function requestCancelBooking()
    {
        if ($this->booking->details->start->timestamp <= now()->timestamp && $this->booking->status === 'pending') {
            $this->booking->traveler->notify(new TripCancellationRequest($this->booking, $this->booking->traveler));
            $this->booking->vehicle->owner->notify(new TripCancellationRequestSubmitted($this->booking, $this->booking->traveler));

            return redirect()->route('user.bookings.index')->with('success', "Booking #({$this->booking->id}) cancellation has been requested.");
            
        } elseif ($this->booking->status === 'pending') {
            $this->booking->status = 'cancelled';
            $this->booking->save();

            $this->booking->traveler->notify(new TripCanceled($this->booking, $this->booking->traveler));
            $this->booking->vehicle->owner->notify(new TripCanceled($this->booking, $this->booking->traveler));

            return redirect()->route('user.bookings.index')->with('success', "Booking #({$this->booking->id}) cancelled successfully.");
        } else {
            session()->flash('error', "Booking #({$this->booking->id}) cannot be canceled.");
        }
    }

    public function approveBooking()
    {
        if ($this->booking->status === 'pending') {
            $this->booking->status = 'approved';
            $this->booking->save();

            $this->booking->traveler->notify(new TripApprovedForTraveler($this->booking));
            $this->booking->vehicle->owner->notify(new TripApprovedForOwner($this->booking));

            return redirect()->route('user.bookings.index')->with('success', "Booking #({$this->booking->id}) approved successfully.");
        } else {
            session()->flash('error', "Booking #({$this->booking->id}) cannot be approved.");
        }
    }

    public function render()
    {
        return view('user.bookings.show')->layout('layouts.user');
    }
}