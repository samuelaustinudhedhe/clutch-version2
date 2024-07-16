<?php

// /**
//  * Recursively includes files based on their extensions and optional filename pattern.
//  *
//  * @param string $directory The directory to start the search from.
//  * @param array $extensions An array of file extensions to include (e.g., ['php', 'js', 'css']).
//  * @param string $filename Optional. A filename pattern to match (default is an empty string, which matches all files).
//  * @param int $maxDepth Optional. The maximum depth to recurse into directories (default is 5).
//  * @param int $currentDepth Internal use. The current depth of recursion (default is 0).
//  *
//  * @return void This function does not return a value.
//  */
// function require_recursively($directory, $extensions = ['php'], $filename = '', $maxDepth = 5, $currentDepth = 0)
// {
//     try {
//         // Validate directory
//         if (!is_dir($directory) || !is_readable($directory)) {
//             throw new Exception("Directory does not exist or is not readable: $directory");
//         }

//         // Normalize extensions to lowercase
//         $extensions = array_map('strtolower', $extensions);

//         // Create a recursive directory iterator and skip dots
//         $iterator = new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS);
//         $recursiveIterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);

//         // Iterate over files in the directory and its subdirectories
//         foreach ($recursiveIterator as $file) {
//             // Check if the file is a regular file and within the max depth
//             if ($file->isFile() && $recursiveIterator->getDepth() <= $maxDepth) {
//                 $fileExtension = strtolower($file->getExtension());

//                 // Check if the file extension is in the list of specified extensions
//                 if (in_array($fileExtension, $extensions)) {
//                     // Check if the filename matches the specified pattern
//                     if ($filename === '' || strpos($file->getFilename(), $filename) !== false) {
//                         $filePath = $file->getPathname();

//                         // Handle the file based on its extension
//                         switch ($fileExtension) {
//                             case 'php':
//                                 // Include PHP files
//                                 require_once $filePath;
//                                 break;
//                             case 'js':
//                                 // Generate a script tag for JS files
//                                 echo '<script src="' . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8') . '"></script>';
//                                 break;
//                             case 'css':
//                                 // Generate a link tag for CSS files
//                                 echo '<link rel="stylesheet" href="' . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8') . '">';
//                                 break;
//                             default:
//                                 // Log unsupported file extensions if necessary
//                                 error_log("Unsupported file extension: $fileExtension");
//                                 break;
//                         }
//                     }
//                 }
//             }
//         }

//         // Recursively call the function for subdirectories
//         foreach ($iterator as $subDirectory) {
//             if ($subDirectory->isDir()) {
//                 require_recursively($subDirectory->getPathname(), $extensions, $filename, $maxDepth, $currentDepth + 1);
//             }
//         }
//     } catch (Exception $e) {
//         echo 'Error: ' . $e->getMessage();
//     }
// }
/**
 * Recursively includes files based on their extensions and optional filename pattern.
 *
 * @param string $directory The directory to start the search from.
 * @param array $extensions An array of file extensions to include (e.g., ['php', 'js', 'css']).
 * @param string $filename Optional. A filename pattern to match (default is an empty string, which matches all files).
 * @param int $maxDepth Optional. The maximum depth to recurse into directories (default is 5).
 * @param int $currentDepth Internal use. The current depth of recursion (default is 0).
 *
 * @return void This function does not return a value.
 */
function require_recursively($directory, $extensions = ['php'], $filename = '', $maxDepth = 5, $currentDepth = 0)
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
            if (is_dir($filePath)) {
                // Recursively call the function for subdirectories
                require_recursively($filePath, $extensions, $filename, $maxDepth, $currentDepth + 1);
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

// Example usage
require_recursively(__DIR__, ['php'], 'Helper', 5, 0);