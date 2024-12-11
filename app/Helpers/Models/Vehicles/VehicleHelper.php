 <?php
 
 use App\Models\Trip;
 use App\Models\Vehicle;
  use Carbon\Carbon;

 /**
  * Checks if the vehicle is currently on another trip that hasn't finished.
  *
  * @param int|Vehicle $vehicle The vehicle ID or vehicle object to check.
  * @return bool Returns true if the vehicle is on another trip, false otherwise.
  */
 function isVehicleBooked($vehicle): bool
 {
     $vehicleId = $vehicle instanceof Vehicle ? $vehicle->id : $vehicle;
     $currentTimestamp = time();
     
     return Trip::where('vehicle_id', $vehicleId)
         ->where(function ($query) use ($currentTimestamp) {
             $query->where('details->end->timestamp', '>', $currentTimestamp)
                 ->orWhereHas('vehicle', function ($query) {
                     $query->whereNotIn('status', ['completed', 'failed', 'cancelled']);
                 });
         })
         ->exists();
 }

 
 
 /**
  * Get the minimum and maximum dates for booking a vehicle.
  *
  * @param Vehicle $vehicle The vehicle object to check.
  * @return array Returns an array with 'minDate' and 'maxDate' for booking.
  */
 function getBookingDateRange(Vehicle $vehicle, bool $format = true): array
 {
     $currentTimestamp = Carbon::now();
     $minDate = $currentTimestamp;
     $maxDate = $currentTimestamp->copy()->addMonth(); // Default max date to one month from now
 
     $upcomingTrips = Trip::where('vehicle_id', $vehicle->id)
         ->where('details->end->timestamp', '>', $currentTimestamp->timestamp)
         ->orderBy('details->start->timestamp')
         ->get();
 
     if ($upcomingTrips->isNotEmpty()) {
         $lastTrip = $upcomingTrips->last();
         $lastTripEndTimestamp = $lastTrip->details->end->timestamp ?? null;
         $lastTripStartTimestamp = $lastTrip->details->start->timestamp ?? null;
 
         if ($lastTripEndTimestamp && $lastTripStartTimestamp) {
             // Ensure the end timestamp is after the start timestamp
             if ($lastTripEndTimestamp > $lastTripStartTimestamp) {
                 $tripDuration = Carbon::createFromTimestamp($lastTripStartTimestamp)
                     ->diffInDays(Carbon::createFromTimestamp($lastTripEndTimestamp));
                 // Add 1 day cooldown if the trip duration is more than 2 days
                 if ($tripDuration > 2) {
                     $minDate = Carbon::createFromTimestamp($lastTripEndTimestamp)->addDay();
                 } else {
                     $minDate = Carbon::createFromTimestamp($lastTripEndTimestamp);
                 }
             } else {
                 // Handle the case where the timestamps are incorrect
                 // Log an error or handle it as needed
                 // For now, we'll just set minDate to the current timestamp
                 $minDate = $currentTimestamp;
             }
         }
     }
 
     foreach ($upcomingTrips as $trip) {
         $tripStartTimestamp = $trip->details->start->timestamp ?? null;
         if ($tripStartTimestamp && $tripStartTimestamp > $currentTimestamp->timestamp) {
             $maxDate = Carbon::createFromTimestamp($tripStartTimestamp)->subDay();
             break;
         }
     }
 
     return [
         'minDate' => $format ? $minDate->format('m/d/Y') : $minDate,
         'maxDate' => $format ? $maxDate->format('m/d/Y') : $maxDate,
     ];
 }