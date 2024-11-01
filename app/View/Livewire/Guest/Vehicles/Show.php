<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Show extends Component
{
    public $vehicle;
    public $trip;
    public $storeData;
    public $storeDataPath;
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

        $this->trip = $this->getStoreData(true)[$this->vehicle->id] ?? [];

        $this->defineStoreData();

        //  Get available times for the selected date
        $this->times = $this->generateTimes();
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
        $this->validationRule();

        $this->trip['start']['timestamp'] = strtotime($this->trip['start']['date'] . ' ' . $this->trip['start']['time']);
        $this->trip['end']['timestamp'] = strtotime($this->trip['end']['date'] . ' ' . $this->trip['end']['time']);

        $startDate = new \DateTime('@' . $this->trip['start']['timestamp']);
        $endDate = new \DateTime('@' . $this->trip['end']['timestamp']);
        $interval = $startDate->diff($endDate);
        $this->trip['days'] = $interval->days;

        $this->trip['start']['humanized_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $this->trip['start']['date'])->format('D, M d');
        $this->trip['end']['humanized_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $this->trip['end']['date'])->format('D, M d');
        $this->store();

        if (!getUser()) {

            // Set the intended route for the user after the user logged in and completes onboarding
            set_intended_route('vehicles.show', ['vehicle' => $this->vehicle->id], condition:[
                'onboarding_completed', 'is_logged_in',
            ],  validity:60);

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
     * Ensures that the trip data structure is properly defined with default values.
     * This function checks if the start and end dates and times are set in the trip array.
     * If they are not set, it initializes them with empty strings or retains existing values.
     *
     * @return void
     */
    public function defineStoreData()
    {
        if (!isset($this->trip['start']['date'])) {
            $this->trip['start'] = [
                'time' => $this->trip['start']['time'] ?? '',
                'date' => date('m/d/Y')
            ];
        }
        if (!isset($this->trip['start']['time'])) {
            $this->trip['start'] = [
                'date' => $this->trip['start']['date'] ?? '',
                'time' => '10:00 AM',
            ];
        }
        if (!isset($this->trip['end']['date'])) {
            $this->trip['end'] = [
                'time' => $this->trip['end']['time'] ?? '',
                'date' => date('m/d/Y', strtotime('+3 days')),
            ];
        }
        if (!isset($this->trip['end']['time'])) {
            $this->trip['end'] = [
                'date' => $this->trip['end']['date'] ?? '',
                'time' => '10:00 AM',
            ];
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

    /**
     * Generates the storage path for trip data.
     *
     * This function constructs the file path where the trip data will be stored.
     * It uses the user's private storage directory and appends the specific file path.
     *
     * @return string The full path to the trip data JSON file.
     */
    public static function storeDataPath()
    {
        if (getUser()) {
            return getUserStorage('private') . "/data/trip.json";
        }
    }

    /**
     * Stores the trip data in a JSON file.
     *
     * This function formats the trip data associated with the current vehicle
     * and saves it to a specified path in JSON format. The path is determined
     * by the `storeDataPath` method.
     *
     * @return void
     */
    public function store()
    {
        $data = $this->trip;
        $formattedData = [
            $this->vehicle->id => $data,
        ];
        $path = $this->storeDataPath();
        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($formattedData));
        }
    }

    /**
     * Stores the provided data in a JSON file.
     *
     * This function takes the given data, converts it to JSON format, and saves it
     * to a specified path determined by the `storeDataPath` method.
     *
     * @param mixed $data The data to be stored, which will be encoded to JSON format.
     * @return void
     */
    public function putData($data)
    {
        $path = $this->storeDataPath();
        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($data));
        }
    }

    /**
     * Retrieves stored trip data from a JSON file.
     *
     * This function reads the trip data from a specified JSON file path and
     * decodes it into an associative array or an object based on the provided parameter.
     *
     * @param bool|null $associative Optional. When true, returned objects will be converted into associative arrays.
     *                               When false, returned objects will be instances of stdClass. Defaults to null.
     * @return mixed The decoded JSON data, either as an associative array or an object, or null if the file does not exist.
     */
    public static function getStoreData($associative = null)
    {
        $path = self::storeDataPath();
        if (!empty($path) && Storage::exists($path)) {
            return  json_decode(Storage::get($path), $associative);
        }
    }

    public function render()
    {
        return view('pages.vehicles.show')->layout('layouts.guest');
    }
}
