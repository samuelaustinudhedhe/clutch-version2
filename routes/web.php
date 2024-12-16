<?php

use Illuminate\Support\Facades\Route;
use App\Http\Kernel;

/**
 * Include all PHP files in the routes root folder.
 *
 * This function recursively includes all PHP files in the current directory.
 * It's used to modularize the routing logic across multiple files.
 *
 * @param string $dir The directory to search in (current directory in this case)
 * @param array $extensions File extensions to include (PHP in this case)
 * @param string $folder Subdirectory to search in (empty string in this case)
 * @param int $depth How deep to recurse into subdirectories (1 in this case)
 * @param int $hidden Whether to include hidden files (0 in this case)
 */
require_recursively(__DIR__ );

