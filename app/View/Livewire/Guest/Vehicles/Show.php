<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Trip;
use App\Models\Vehicle;
use App\Traits\Trips\TripData;
use App\View\Livewire\Toast\Notify;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Show extends Component
{
    use TripData;

    public $vehicle;
    public $trip;
    public $times = ['05:30 AM', '06:00 AM', '06:30 AM', '07:00 AM', '07:30 AM', '08:00 AM', '08:30 AM', '09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM', '05:00 PM',];

    /**
     * Initializes the component with the given vehicle.
     *
     * This function sets the vehicle property to the vehicle with the specified ID,
     * retrieves stored trip data for the vehicle, and ensures the trip data structure
     * is properly defined with default values.
     *
     * @param Vehicle $vehicle The vehicle instance to be initialized.
     * @return void
     */
    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = Vehicle::where('id', $vehicle->id)->firstOrFail();

        $this->trip = $this->getTripData(true)[$this->vehicle->id] ?? [];

        $this->defineTripData();

        //  Get available times for the selected date
        $this->times = $this->generateTimes();
    }

    /**
     * Checks if the vehicle is currently on another trip that hasn't finished
     * and if the booked date falls within the vehicle's availability range.
     *
     * @return bool Returns true if the vehicle is on another trip or the booked date is out of range, false otherwise.
     */
    private function isVehicleOnAnotherTrip()
    {
        // Check if the vehicle is currently booked
        if (isVehicleBooked($this->vehicle->id)) {

            // Get the booking date range for the vehicle
            $bookingDateRange = getBookingDateRange($this->vehicle, false);

            // Check if the trip start date is within the available date range
            $tripStartDate = \DateTime::createFromFormat('m/d/Y', $this->trip['start']['date']);
            if ($tripStartDate < $bookingDateRange['minDate'] || $tripStartDate > $bookingDateRange['maxDate']) {
                return true;
            }
        }

        return false;
    }

    /**
     * Books a trip for the vehicle.
     *
     * This function validates the trip data, calculates timestamps and intervals,
     * formats human-readable dates, stores the trip data, and redirects the user
     * to the appropriate route based on their authentication status.
     *
     * @return \Illuminate\Http\RedirectResponse Redirects to the login page if the user is not authenticated,
     *                                           otherwise redirects to the checkout page for the vehicle.
     */
    public function bookTrip()
    {
        // Check if the vehicle is currently on another trip that hasn't finished.
        if ($this->isVehicleOnAnotherTrip()) {
            $this->dispatch('notify', 'This vehicle is currently on another trip.', 'error');
            return;
        }

        $this->validationRule();

        $this->trip['start']['timestamp'] = strtotime($this->trip['start']['date'] . ' ' . $this->trip['start']['time']);
        $this->trip['end']['timestamp'] = strtotime($this->trip['end']['date'] . ' ' . $this->trip['end']['time']);

        $startDate = new \DateTime('@' . $this->trip['start']['timestamp']);
        $endDate = new \DateTime('@' . $this->trip['end']['timestamp']);
        $interval = $startDate->diff($endDate);
        $this->trip['days'] = $interval->days;

        $this->trip['start']['humanized_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $this->trip['start']['date'])->format('D, M d');
        $this->trip['end']['humanized_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $this->trip['end']['date'])->format('D, M d');

        // 
        $this->trip['price']['currency'] = $this->vehicle->price->currency ?? app_currency(false);
        $this->trip['passengers'] = $this->vehicle->interior->seats;
        $this->trip['distance'] = [
            'max_allowed' => $this->vehicle->details->distance_allowed ?? 'unlimited',
            'additional' =>  $this->vehicle->price->additional ?? null,
        ];

        //Location data (update to use custom location setup by the user or fallback to default location setup by the vehicle owner)
        $this->trip['start']['location'] = $this->vehicle->location->pickup;
        $this->trip['end']['location'] = $this->vehicle->location->drop_off;

        // Store strip data
        $this->storeTripData();

        if (!getUser()) {

            // Set the intended route for the user after the user logged in and completes onboarding
            set_intended_route('vehicles.show', ['vehicle' => $this->vehicle->id], condition: [
                'onboarding_completed',
                'is_logged_in',
            ],  validity: 60);

            // Redirect the user to the login page
            return redirect()->route('login');
        } else {

            // Redirect the user to the checkout page for the vehicle
            return redirect()->route('checkout.show', ['vehicle' => $this->vehicle->id]);
        }
    }

    /**
     * Validates the trip data according to specified rules.
     *
     * This function ensures that the trip's start and end dates and times
     * adhere to the defined validation rules. It checks for required fields,
     * correct date formats, and logical date and time sequences.
     *
     * @return void
     */
    public function validationRule()
    {
        $this->validate(
            [
                'trip.start.date' => 'required|date|before_or_equal:trip.end.date',
                'trip.start.time' => 'required|date_format:h:i A|after_or_equal:05:00 AM|before_or_equal:08:00 PM',
                'trip.end.date' => 'required|date_format:m/d/Y|after_or_equal:trip.start.date',
                'trip.end.time' => 'required|date_format:h:i A|after_or_equal:05:00 AM|before_or_equal:08:00 PM',
            ],
            [
                'trip.start.date.required' => 'Please select a pickup date',
                'trip.start.time.required' => 'Please select a start time',
                'trip.end.date.required' => 'Please select an drop off date',
                'trip.end.time.required' => 'Please select an end time',
                'trip.end.date_format' => 'Drop off date must be in the format MM/DD/YYYY',
                'trip.end.date.after_or_equal' => 'Drop off date must be after the pickup date',
                'trip.start.date_format' => 'Pickup date must be in the format MM/DD/YYYY',
                'trip.start.date.before_or_equal' => 'Pickup date must be before the drop off date',
                'trip.start.time.after_or_equal' => 'Start time must be after 05:00 AM',
                'trip.start.time.before_or_equal' => 'Start time must be before 08:00 PM',
                'trip.end.time.after_or_equal' => 'End time must be after 05:00 AM',
                'trip.end.time.before_or_equal' => 'End time must be before 08:00 PM',
            ],
            [
                'trip.start.date' => 'pickup date',
                'trip.start.time' => 'pickup time',
                'trip.end.date' => 'drop off date',
                'trip.end.time' => 'drop off time',
            ]
        );
    }

    /**
     * Defines the start and end dates for the trip.
     *
     * @return void
     */
    public function defineTripData()
    {
        // Get the booking date range for the vehicle
        $bookingDateRange = getBookingDateRange($this->vehicle, false);

        // Check if start date is not set, set it to the available start date
        if (!isset($this->trip['start']['date']) || empty($this->trip['start']['date'])) {
            $this->trip['start']['date'] = $bookingDateRange['minDate']->format('m/d/Y');
        }

        // Check if start time is not set, set it to 10:00 AM
        if (!isset($this->trip['start']['time'])) {
            $this->trip['start']['time'] = '10:00 AM';
        }

        // Check if end date is not set, set it to two days after the available start date
        if (!isset($this->trip['end']['date']) || empty($this->trip['end']['date'])) {
            $endDate = (clone $bookingDateRange['minDate'])->add(new \DateInterval('P2D'));

            // Ensure the end date does not exceed the max date allowed by the vehicle
            if ($endDate > $bookingDateRange['maxDate']) {
                $endDate = $bookingDateRange['maxDate'];
            }

            $this->trip['end']['date'] = $endDate->format('m/d/Y');
        }

        // Check if end time is not set, set it to 10:00 AM
        if (!isset($this->trip['end']['time'])) {
            $this->trip['end']['time'] = '10:00 AM';
        }
    }
    /**
     * Generates an array of time slots in 30-minute intervals.
     *
     * This function creates an array of time slots starting from 05:00 AM to 08:30 PM,
     * with each slot being 30 minutes apart. The times are formatted in 'h:i A' format.
     *
     * @return array An array of time slots in 'h:i A' format.
     */
    private function generateTimes()
    {
        $times = [];
        $start = strtotime('05:00 AM');
        $end = strtotime('8:30 PM');

        for ($time = $start; $time <= $end; $time = strtotime('+30 minutes', $time)) {
            $times[] = date('h:i A', $time);
        }

        return $times;
    }


    public function render()
    {
        return view('pages.vehicles.show')->layout('layouts.guest');
    }
}
