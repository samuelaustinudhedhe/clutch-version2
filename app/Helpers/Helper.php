<?php

/**
 * Recursively includes files based on their extensions and optional filename pattern, with exclusion support.
 *
 * This function traverses a directory structure and includes or processes files based on specified criteria.
 * It can be used to autoload PHP files, include JavaScript and CSS files, or perform operations on files
 * matching certain patterns while excluding others.
 *
 * @param string $directory The directory to start the search from (eg: __DIR__ . '/src').
 * @param array $extensions An array of file extensions to include (e.g: ['php', 'js', 'css']).Default is ['php'].
 * @param string $filename Optional. A filename pattern to match (default is an empty string, which matches all files).Example: 'Helper' to match all files containing 'Helper' in their name.
 * @param string|array $exclude Optional. A filename pattern or array of patterns to exclude (default is an empty array).Example: ['test', '*.bak'] to exclude all files containing 'test' and with '.bak' extension.
 * @param int $maxDepth Optional. The maximum depth to recurse into directories (default is 5). Use a lower value to limit deep directory traversal.  Use 0 to include only files in the current directory
 * @param int $currentDepth Internal use. The current depth of recursion (default is 0). This parameter is used internally to track the recursion depth.
 *
 * @return void This function does not return a value.
 *
 * @throws Exception If the specified directory does not exist or is not readable.
 *
 * @example How to Use this function:
 *  - Include all PHP files in the current directory and subdirectories, excluding test files: require_recursively(__DIR__, ['php'], '', ['*test*']);
 *  - Include all Helper PHP files in the 'src' directory, up to 3 levels deep: require_recursively(__DIR__ . '/src', ['php'], 'Helper', [], 3);
 *  - Include JavaScript and CSS files, excluding minified versions: require_recursively(__DIR__ . '/assets', ['js', 'css'], '', ['*.min.*']);
 */
function require_recursively($directory, $extensions = ['php'], $filename = '', $exclude = [], $maxDepth = 5, $currentDepth = 0)
{
    try {
        // Validate directory
        if (!is_dir($directory) || !is_readable($directory)) {
            throw new Exception("Directory does not exist or is not readable: $directory");
        }

        // Check if the current depth exceeds the maximum depth
        if ($currentDepth > $maxDepth) {
            return;
        }

        // Normalize extensions to lowercase
        $extensions = array_map('strtolower', $extensions);

        // Ensure $exclude is an array
        $exclude = (array)$exclude;

        // Open the directory
        $dirHandle = opendir($directory);
        if ($dirHandle === false) {
            throw new Exception("Failed to open directory: $directory");
        }

        // Iterate over the files and directories within the current directory
        while (($file = readdir($dirHandle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = $directory . DIRECTORY_SEPARATOR . $file;

            // Check if the file or directory should be excluded
            $shouldExclude = false;
            foreach ($exclude as $pattern) {
                if (fnmatch($pattern, $file)) {
                    $shouldExclude = true;
                    break;
                }
            }

            if ($shouldExclude) {
                continue;
            }

            if (is_dir($filePath)) {
                // Recursively call the function for subdirectories
                require_recursively($filePath, $extensions, $filename, $exclude, $maxDepth, $currentDepth + 1);
            } elseif (is_file($filePath)) {
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Check if the file extension is in the list of specified extensions
                if (in_array($fileExtension, $extensions)) {
                    // Check if the filename matches the specified pattern
                    if ($filename === '' || strpos($file, $filename) !== false) {
                        // Handle the file based on its extension
                        switch ($fileExtension) {
                            case 'php':
                                // Include PHP files
                                require_once $filePath;
                                break;
                            case 'js':
                                // Generate a script tag for JS files
                                echo '<script src="' . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8') . '"></script>';
                                break;
                            case 'css':
                                // Generate a link tag for CSS files
                                echo '<link rel="stylesheet" href="' . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8') . '">';
                                break;
                            default:
                                // Log unsupported file extensions if necessary
                                error_log("Unsupported file extension: $fileExtension");
                                break;
                        }
                    }
                }
            }
        }

        // Close the directory handle
        closedir($dirHandle);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

/**
 * Include all helper files with
 */
require_recursively(__DIR__, ['php'], 'Helper', ['_Old'], 10, 0);
