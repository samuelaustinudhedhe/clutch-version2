<?php

// app/Http/Controllers/PdfController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;


class PdfController extends Controller
{
    public function showPdf($path)
    {
        $fullPath = storage_path('app/public/' . $path);

        if (!file_exists($fullPath)) {
            abort(404, 'File not found.');
        }

        $filename = basename($fullPath);

        return Response::make(file_get_contents($fullPath), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}
