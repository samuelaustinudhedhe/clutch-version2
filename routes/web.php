<?php

use App\Http\Controllers\RolePermissionController;

use Illuminate\Support\Facades\Route;

/**
 * This function returns a JSON response containing the CSRF token.
 *
 * @return \Illuminate\Http\JsonResponse
 *
 * @throws \Exception If the CSRF token cannot be generated.
 */
Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

// Route::middleware(['auth:admin'])->group(function () {
//     Route::post('/roles/{role}/assign-permission', [RolePermissionController::class, 'assignPermission'])->name('roles.assign-permission');
//     Route::post('/roles/{role}/remove-permission', [RolePermissionController::class, 'removePermission'])->name('roles.remove-permission');
// });



// Route::middleware(['auth', 'role:administrator||SuperAdmin'])->group(function () {
//     Route::get('/admin-dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });





#includes all files in routes sub-folders 

require_recursively(__DIR__, ['php'], '', 5, 0);