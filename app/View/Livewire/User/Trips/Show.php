<?php

namespace App\View\Livewire\User\Trips;

use Livewire\Component;
use App\Models\Trip;
use App\Notifications\Trips\Cancel\TripCanceled;
use App\Notifications\Trips\Cancel\TripCancellationRequest;
use App\Notifications\Trips\Cancel\TripCancellationRequestSubmitted;
use App\Notifications\Trips\End\TripEnded;
use App\Notifications\Trips\End\TripEndRequest;
use App\Notifications\Trips\End\TripEndRequestSubmitted;

class Show extends Component
{
    public Trip $trip;
    public $traveler;

    public function mount(Trip $trip)
    {
        $this->trip = $trip;
        $this->traveler = $trip->traveler;
    }

    /**
     * Cancel the current trip if it is in a pending state.
     *
     * This function checks the status of the trip. If the trip is pending,
     * it changes the status to cancelled and saves the change. It then redirects
     * the user to the trips index page with a success message. If the trip is not
     * pending, it dispatches a notification indicating that the trip cannot be canceled.
     *
     * @return \Illuminate\Http\RedirectResponse|\Livewire\Redirector
     *         Redirects to the trips index page with a success message if the trip is cancelled,
     *         or dispatches a notification if the trip cannot be canceled.
     */
    public function requestCancelTrip()
    {
        // (Last minute cancel) check if the trip start date is in the passed and the trip has not yet started
        if ($this->trip->details->start->timestamp <= now()->timestamp && $this->trip->status === 'pending') {

            // Notify the traveler that the request has been submitted
            $this->trip->traveler->notify(new TripCancellationRequestSubmitted($this->trip, $this->traveler));

            // Notify the chuffer that the request has been submitted
            $this->trip->vehicle->owner->notify(new TripCancellationRequest($this->trip, $this->traveler));

            // Notify the Owner that the request has been submitted
            $this->trip->vehicle->chauffeur->notify(new TripCancellationRequest($this->trip, $this->traveler));

            return redirect()->route('user.trips.index')->with('success', "Trip #({$this->trip->id}) cancellation has been requested. Please wait for the {$this->trip->vehicle->owner->name} to cancel the trip.");
        } elseif ($this->trip->status === 'pending') {

            // Cancel the trip if the start date is in the future and it is pending
            $this->trip->status = 'cancelled';
            $this->trip->save();

            // Notify the traveler that the trip has been cancelled
            $this->trip->traveler->notify(new TripCanceled($this->trip, $this->traveler));

            // Notify the chuffer that the trip has been cancelled
            $this->trip->vehicle->owner->notify(new TripCanceled($this->trip, $this->traveler));

            // Notify the Owner that the trip has been cancelled
            $this->trip->vehicle->chauffeur->notify(new TripCanceled($this->trip, $this->traveler));

            return redirect()->route('user.trips.index')->with('success', "Trip #({$this->trip->id}) cancelled successfully. Your payment will be refunded according to our return policy.");
        } else {
            // Trip cannot be canceled
            return $this->dispatch('notify', "Trip #({$this->trip->id}) cannot be canceled", 'error');
        }
    }

    /**
     * Retrieve the details of the driver associated with the current trip.
     *
     * This function accesses the vehicle associated with the trip and returns
     * the chauffeur (driver) details.
     *
     * @return \App\Models\Chauffeur
     *         The chauffeur details of the vehicle associated with the trip.
     */
    public function getDriverDetails()
    {
        return $this->trip->vehicle->chauffeur;
    }

    /**
     * Request to end the current trip.
     *
     * This function allows the user to request the end of a trip. The trip status
     * is updated to indicate that an end request has been made. The vehicle owner
     * must initiate the actual end of the trip.
     *
     * @return void
     */
    public function requestEndTrip()
    {
        // Check if the person initiating this is the vehicle owner
        if (getUser()->id !== $this->trip->vehicle->owner->id) {
            // Traveler initiates end trip request
            // Notify the owner of the end trip end request         
            $this->trip->vehicle->owner->notify(new TripEndRequest($this->trip, $this->traveler));

            // Notify the traveler of the end trip request            
            $this->trip->traveler->notify(new TripEndRequestSubmitted($this->trip, $this->traveler));
        } else {
            // Vehicle owner initiates end trip
            if ($this->trip->status === 'in_progress') {
                $this->trip->status = 'cancelled';
                $this->trip->save();

                // Notify both parties of the end trip
                $this->trip->traveler->notify(new TripEnded($this->trip, $this->traveler));
                $this->trip->vehicle->owner->notify(new TripEnded($this->trip, $this->traveler));

                // Redirect the user to the trips index page with a success message
                return redirect()->route('user.trips.index')->with('success', "Trip #({$this->trip->id}) cancelled successfully.");
            } else {
                session()->flash('error', 'This trip cannot be ended at this time.');
            }
        }
    }


    public function contactSupport()
    {
        // Implement logic to initiate support contact
        // This is just a placeholder
        session()->flash('message', 'Support request sent. We will contact you shortly.');
    }

    public function render()
    {
        return view('user.trips.show')
            ->layout('layouts.user');
    }
}
