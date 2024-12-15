<?php

if (!function_exists('remove_whitespace')) {

    /**
     * Removes whitespace characters from a given string.
     *
     * @param string $str The input string with spaces.
     * @return string An associative array with keys 'str_replace' and 'preg_replace'
     *               containing the results of removing spaces using preg_replace.
     */
    function remove_whitespace($input)
    {
        // Remove spaces, tabs, and newlines from the input string
        $output = preg_replace('/\s+/', '', $input);

        return $output;
    }
}

if (!function_exists('remove_space')) {

    /**
     * Removes spaces characters from a given string.
     *
     * @param string $str The input string with spaces.
     * @return string An associative array with keys 'str_replace'
     *               containing the results of removing spaces using str_replace.
     */
    function remove_space($input)
    {
        // Remove spaces, tabs, and newlines from the input string
        $output = str_replace(' ', '', $input);

        return $output;
    }
}

if (!function_exists('toSlug')) {

    /**
     * Converts a given string to a URL-friendly slug by replacing non-alphanumeric characters with a specified separator.
     *
     * @param string $input The input string to be converted to a slug.
     * @param string $separator The character to use as a separator in the slug. Default is '_'.
     * @return string The slugified version of the input string, converted to lowercase.
     *
     * Example:
     * ```
     * $input = "This is a Test";
     * $slug = to_slug($input, '-');
     * echo $slug; // Output: this-is-a-test
     * ```
     *
     * Note: This function does not handle special characters or multiple consecutive separators.
     */
    function toSlug(string $input, string $separator = '_')
    {
        return strtolower(preg_replace('/[^a-zA-Z0-9]+/', $separator, $input));
    }
}

if (!function_exists('str_uuid')) {
    /**
     * Generates a UUID (Universally Unique Identifier) string.
     *
     * This function uses Laravel's Str::uuid() method to create a new UUID.
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    function str_uuid():\Ramsey\Uuid\UuidInterface
    {
        return \Illuminate\Support\Str::uuid();
    }
}

if (!function_exists('error')) {

    /**
     * Handles error codes by invoking the appropriate method from the ErrorPageController.
     *
     * @param int $code The HTTP status code to handle.
     * @param string $message An optional message to be displayed with the error page. Default is an empty string.
     * @return never This function does not return a value. It either returns a response or aborts the request.
     */
    function error($code, $message = ''): never
    {
        // Get an instance of the ErrorPageController
        $error = app('App\Http\Controllers\Pages\ErrorPageController');

        // Handle the error code by calling the dynamic method on the controller
        echo $error->showErrorPage($code, $message);

        // Ensure the function never returns
        exit;
    }
}

/**
 * Retrieves a specific word from a string based on its position.
 *
 * @param string $string The input string.
 * @param int $position The position of the word to retrieve (1-based index).
 * @return string|null The word at the specified position, or null if the position is not valid.
 */
function getWordFromString($string, $position)
{
    // Split the string into an array of words
    $words = explode(' ', $string);

    // Count the number of words in the string
    $wordCount = count($words);

    // Check if the position is valid
    if ($position > 0 && $position <= $wordCount) {
        return $words[$position - 1];
    }

    // Return null if the position is not valid
    return null;
}


// function aggregateData(array $data, string $filter): array {
//     // Filter the data to include only users in the specified category
//     $filteredData = array_filter($data, function($user) use ($category) {
//         return $user['category'] === $category;
//     });

//     // Extract the names from the filtered data
//     $names = array_column($filteredData, 'name');
//     $totalUsers = count($names);

//     if ($totalUsers <= 4) {
//         // If there are 4 or fewer users, display all names and 0 remaining
//         return [
//             'names' => implode(', ', $names),
//             'remaining' => 0
//         ];
//     } else {
//         // Otherwise, display the first 4 names and count the remaining users
//         $firstFourNames = array_slice($names, 0, 4);
//         $remainingUsers = $totalUsers - 4;
//         return [
//             'names' => implode(', ', $firstFourNames),
//             'remaining' => $remainingUsers
//         ];
//     }
// }

// /**
//  * Aggregates user data by slicing the input collection and calculating the remaining count.
//  *
//  * @param \Illuminate\Support\Collection $input The input collection of user data.
//  * @param int $offset The offset to start slicing the collection. Default is 0.
//  * @param int $limit The maximum number of items to include in the output. Default is 4.
//  * @param \Illuminate\Support\Collection &$output The output collection containing the sliced data.
//  * @param int &$count The count of remaining items after slicing.
//  * 
//  * @return void This function does not return a value. It modifies the $output and $count parameters by reference.
//  */
// function aggregateUserData(&$output, &$count, $input, int $offset = 0, int $limit = 4)
// {
//     // Check if the input is a collection, if not convert it to a collection
//     if (!($input instanceof \Illuminate\Support\Collection)) {
//         $input = collect($input);
//     }

//     // Extract the total number of users from the input collection
//     $totalUsers = $input->count();

//     // Slice the input collection based on the offset and limit
//     $data = $input->slice($offset, $limit);

//     // Calculate the number of remaining users after slicing
//     $remaining = $totalUsers - $data->count();

//     // Assign the sliced data to the output parameter
//     $output = collect($data);

//     // Assign the remaining count to the count parameter
//     $count = $remaining;
// }

/**
 * Aggregates user data by slicing the input and calculating the remaining count.
 *
 * @param mixed $input The input which can be a collection, array, or string.
 * @param int $offset The offset to start slicing. Default is 0.
 * @param int $limit The maximum number of items to include in the output. Default is 4.
 * @param mixed &$output The output containing the sliced data.
 * @param int &$count The count of remaining items after slicing.
 * 
 * @return void This function does not return a value. It modifies the $output and $count parameters by reference.
 */
use Illuminate\Support\LazyCollection;

function aggregateUserData(&$output, &$count, $input, int $offset = 0, int $limit = 4)
{
    if ($input instanceof \Illuminate\Support\Collection) {
        $lazyInput = LazyCollection::make($input);
        $totalItems = $lazyInput->count();
        $data = $lazyInput->skip($offset)->take($limit);
    } elseif (is_array($input)) {
        $lazyInput = LazyCollection::make($input);
        $totalItems = $lazyInput->count();
        $data = $lazyInput->skip($offset)->take($limit);
    } elseif (is_string($input)) {
        $totalItems = strlen($input);
        $data = substr($input, $offset, $limit);
    } else {
        throw new InvalidArgumentException("Unsupported input type.");
    }

    $remaining = $totalItems - $offset - (is_array($data) ? count($data) : (is_string($data) ? strlen($data) : $data->count()));

    $output = $data->all();
    $count = max(0, $remaining);
}



if (!function_exists('numberToWords')) {
    /**
     * Converts a number into its word representation.
     *
     * This function can convert numbers into their word equivalents, and optionally
     * into their ordinal form (e.g., "First", "Second").
     *
     * @param int $number The number to be converted into words.
     * @param bool $ordinal Optional. If true, converts the number into its ordinal form. Default is false.
     * @return string The word representation of the number, or its ordinal form if specified.
     */
    function numberToWords($number, $ordinal = false)
    {
        $words = [
            0 => 'Zero',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety'
        ];

        $ordinals = [
            1 => 'First',
            2 => 'Second',
            3 => 'Third',
            4 => 'Fourth',
            5 => 'Fifth',
            6 => 'Sixth',
            7 => 'Seventh',
            8 => 'Eighth',
            9 => 'Ninth',
            10 => 'Tenth',
            11 => 'Eleventh',
            12 => 'Twelfth',
            13 => 'Thirteenth',
            14 => 'Fourteenth',
            15 => 'Fifteenth',
            16 => 'Sixteenth',
            17 => 'Seventeenth',
            18 => 'Eighteenth',
            19 => 'Nineteenth',
            20 => 'Twentieth',
            30 => 'Thirtieth',
            40 => 'Fortieth',
            50 => 'Fiftieth',
            60 => 'Sixtieth',
            70 => 'Seventieth',
            80 => 'Eightieth',
            90 => 'Ninetieth'
        ];

        if ($ordinal) {
            // Check if the number is 20 or less, or a multiple of 10 less than 100
            if ($number <= 20 || ($number < 100 && $number % 10 == 0)) {
                // Increment the number if it is 0 to handle the ordinal case
                if ($number == 0) {
                    $number++;
                }
                // Return the ordinal word for the number
                return $ordinals[$number];
            } elseif ($number < 100) {
                // For numbers between 21 and 99, split into tens and units
                $tens = intval($number / 10) * 10;
                $units = $number % 10;
                // Return the combined ordinal word for tens and units
                return $ordinals[$tens] . '-' . $ordinals[$units];
            } elseif ($number < 1000) {
                // For numbers between 100 and 999, split into hundreds and remainder
                $hundreds = intval($number / 100);
                $remainder = $number % 100;
                // Return the combined word for hundreds and the ordinal word for the remainder
                return $remainder ? $words[$hundreds] . ' Hundred and ' . numberToWords($remainder, true) : $words[$hundreds] . ' Hundredth';
            } elseif ($number == 1000) {
                // Special case for 1000
                return 'One Thousandth';
            }
        } else {
            // Handle non-ordinal numbers
            if ($number <= 20) {
                // Return the word for numbers 20 or less
                return $words[$number];
            } elseif ($number < 100) {
                // For numbers between 21 and 99, split into tens and units
                $tens = intval($number / 10) * 10;
                $units = $number % 10;
                // Return the combined word for tens and units
                return $units ? $words[$tens] . '-' . $words[$units] : $words[$tens];
            } elseif ($number < 1000) {
                // For numbers between 100 and 999, split into hundreds and remainder
                $hundreds = intval($number / 100);
                $remainder = $number % 100;
                // Return the combined word for hundreds and the word for the remainder
                return $remainder ? $words[$hundreds] . ' Hundred ' . numberToWords($remainder) : $words[$hundreds] . ' Hundred';
            } elseif ($number == 1000) {
                // Special case for 1000
                return 'One Thousand';
            }
        }

        // Fallback for numbers above 1000, return as string
        return (string)$number;
    }
}
