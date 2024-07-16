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

if (!function_exists('error')) {

    /**
     * Handles error codes by invoking the appropriate method from the ErrorPageController.
     *
     * @param int $code The HTTP status code to handle.
     * @return \Illuminate\Http\Response The response from the ErrorPageController method.
     */
    function error($code)
    {
        // Get an instance of the ErrorPageController
        $error = app('App\Http\Controllers\Pages\ErrorPageController');

        // Handle the error code by calling the corresponding method on the controller
        switch ($code) {
            case 404:
                return $error->notFound();
            case 503:
                return $error->serviceUnavailable();
            case 419:
                return $error->pageExpired();
            case 500:
                return $error->serverError();
            case 403:
                return $error->forbidden();
            case 401:
                return $error->unauthorized();
            default:
                // If the code does not match any case, abort with the given code
                abort($code);
        }
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

/**
 * Aggregates user data by slicing the input collection and calculating the remaining count.
 *
 * @param \Illuminate\Support\Collection $input The input collection of user data.
 * @param int $offset The offset to start slicing the collection. Default is 0.
 * @param int $limit The maximum number of items to include in the output. Default is 4.
 * @param \Illuminate\Support\Collection &$output The output collection containing the sliced data.
 * @param int &$count The count of remaining items after slicing.
 * 
 * @return void This function does not return a value. It modifies the $output and $count parameters by reference.
 */
function aggregateUserData($input, int $offset = 0, int $limit = 4, &$output, &$count)
{
    // Extract the total number of users from the input collection
    $totalUsers = $input->count();

    // Slice the input collection based on the offset and limit
    $data = $input->slice($offset, $limit);

    // Calculate the number of remaining users after slicing
    $remaining = $totalUsers - $data->count();

    // Assign the sliced data to the output parameter
    $output = collect($data);

    // Assign the remaining count to the count parameter
    $count = $remaining;
}
