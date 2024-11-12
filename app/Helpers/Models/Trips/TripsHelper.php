<?php



/**
 * Calculates the width of a loading bar as a percentage based on the current time
 * relative to a given start and end time.
 *
 * @param int|string $start The start time, either as a Unix timestamp or a date string.
 * @param int|string $end The end time, either as a Unix timestamp or a date string.
 * 
 * @return int The percentage of the loading bar width, rounded to the nearest integer.
 *             Returns 100 if the total duration is zero or negative.
 */
function calculateLoadingBarWidth($start, $end)
{
    $now = new DateTime();

    // Determine if $start and $end are timestamps or date strings
    if (is_numeric($start) && is_numeric($end)) {
        // If they are timestamps
        $startDate = (new DateTime())->setTimestamp($start);
        $endDate = (new DateTime())->setTimestamp($end);
    } else {
        // If they are date strings
        $startDate = new DateTime($start);
        $endDate = new DateTime($end);
    }

    $totalDuration = $endDate->getTimestamp() - $startDate->getTimestamp();

    if ($totalDuration <= 0) {
        return 100;
    }

    $elapsedDuration = $now->getTimestamp() - $startDate->getTimestamp();

    $percentage = ($elapsedDuration / $totalDuration) * 100;

    return round($percentage);
}
